<?php

namespace App\Http\Controllers;
use App\Model\Meeting;
use App\Model\TA;
use App\Model\User;
use Illuminate\Http\Request;
use App\Notifications\MeetingCreate;
use Notification;
use Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\MeetingMinutes;
use App\Http\Requests\MeetingRequest;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('leads.meeting');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingRequest $request)
    {
        $path = $request->file('file')->store('file');

        $meeting = new Meeting;
        $meeting->user_id = $request->user_id;
        $meeting->schedule_id = $request->schedule_id;
        $meeting->client_id = $request->client_id;
        $meeting->path = $path;
        $meeting->meeting_time = $request->meeting_time;
        $meeting->status = $request->status;
        $meeting->save();

        $ta  = new TA;
        $ta->meeting_id =$meeting->id;
        $ta->schedule_id = $request->schedule_id;
        $ta->source = $request->source;
        $ta->destination = $request->destination;
        $ta->cost = $request->cost;
        $ta -> save();

         $managers = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'manager');
        })->get();

        Notification::send($managers, new MeetingCreate());

    }

    public function DownloadFile($id){
        $meeting = Meeting::findOrFail($id);
        return Storage::download($meeting->path);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Meeting::whereId($id)->with('schedule.callhistory.project')->with('client')->first();
    }

    public function sendmail($id){

        try{
            $meeting = Meeting::where('id', $id)->with('schedule')->with('schedule.callhistory')->with('client')->where('tag','0')->first();

            if($meeting){
                Mail::to($meeting->client->email)
                ->send(new MeetingMinutes($meeting));
                $meeting->tag = 1;
                $meeting->update();
            }
            else{
                return '2';
            }
        }
            catch (\Exception $e) {
            return "fail";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function GetDataForDataTable(Request $request){
        $meeting = new Meeting();
        $limit = 20;
        $offset = 0;
        $search = [];
        $where = [];
        $with = [];
        $join = [];
        $orderBy = [];

        if($request->input('length')){
            $limit = $request->input('length');
        }

        if($request->input('start')){
            $offset = $request->input('start');
        }

        if($request->input('search') && $request->input('search')['value'] != ""){

            $search['projects.name'] = $request->input('search')['value'];
            $search['clients.name'] = $request->input('search')['value'];
            $search['users.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $table_col_name = "meetings.user_id";

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */      
            ['schedules', 'meetings.schedule_id', 'schedules.*'],
            ['call_histories', 'schedules.call_history_id', 'call_histories.*'],
            ['projects', 'call_histories.project_id', 'projects.name as projectName'],
            ['clients', 'meetings.client_id', 'clients.*'],
            ['users', 'meetings.user_id', 'users.name as userName'],
        ];  

        $orderBy = [
        ];

       return $meeting->GetDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy, $table_col_name);
    }
}
