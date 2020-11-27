<?php

namespace App\Http\Controllers;
use Spatie\GoogleCalendar\Event;
use App\Model\Schedule;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Client;
use App\Notifications\ScheduleCreate;
use App\Notifications\ScheduleMail;
use App\Model\Address;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use Notification;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('leads.schedule');
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
    public function store(ScheduleRequest $request)
    {

        $address = new Address;
        $address->address1 = $request->address1;
        $address->city_id = $request->city_id;
        $address->country_id = $request->country_id;
        $address->postal_code = $request->postal_code;
        $address ->save();

        $schedule  = new Schedule;
        $schedule->schedule_time = $request->schedule_time;
        $schedule->call_history_id = $request->call_history_id;
        $schedule->address_id = $address->id;
        $schedule -> save();
        
        $managers = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'manager');
        })->get();

        Notification::send($managers, new ScheduleCreate());
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
        return Schedule::whereId($id)->with('address')->with('callhistory')->with('callhistory.project')->with('callhistory.client')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, $id)
    {
        $schedule  = Schedule::findOrFail($id);
        $address = Address::findOrFail($schedule->address_id);
        $address->address1 = $request->address1;
        $address->city_id = $request->city_id;
        $address->country_id = $request->country_id;
        $address->postal_code = $request->postal_code;
        $address ->update();

        $schedule->employee_id = $request->employee_id;
        $schedule->schedule_time = $request->schedule_time;
        $schedule->call_history_id = $request->call_history_id;
        $schedule->status = $request->status;
        $schedule -> update();

        if($request->employee_id){
            $user = User::findOrFail($schedule->employee_id);
            $client = Client::findOrFail($request->client_id);

            try{

                //$client->notify(new ScheduleMail());
                $user->notify(new ScheduleCreate());
                
                $event = new Event;

                $event->name = 'Metting Event';
                $event->startDate = Carbon::parse($schedule->schedule_time);
                $event->endDate = Carbon::parse($schedule->schedule_time)->addHour();
                $event->addAttendee(['email' => $user->email]);
                $event->addAttendee(['email' => $client->email]);
                $event->save();
               
            }
            catch (\Exception $e) {
                return "fail";
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sch = Schedule::findOrFail($id);
        $sch->address()->delete();
        $sch->delete();
    }

    public function GetDataForDataTable(Request $request){
        $schedule = new Schedule();
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
            $search['clients.phone'] = $request->input('search')['value'];
            $search['users.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }


        $table_col_name = "schedules.employee_id"; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */      
            ['call_histories', 'schedules.call_history_id', 'call_histories.*'],
            ['projects', 'call_histories.project_id', 'projects.name as projectName'],
            ['clients', 'call_histories.client_id', 'clients.*'],
            ['users', 'schedules.employee_id', 'users.name as userName'],
        ];  

        $orderBy = [
            
        ];

       return $schedule->GetDataForDataTable($limit, $offset, $search, $where, $with, $join, $orderBy, $table_col_name);
    }
}
