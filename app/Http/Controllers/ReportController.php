<?php

namespace App\Http\Controllers;
use App\Model\User;
use App\Model\EmployeeInformation;
use App\Model\Sale;
use App\Model\CallHistory;
use App\Model\Schedule;
use App\Model\TA;
use App\Model\Project;
use App\Model\Meeting;
use Mpdf\Mpdf;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    function fetchUser(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = User::where('name', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:absolute">';
            foreach($data as $row)
            {
                $output .= '
                <li data-id='.$row->id.'><a href="#">'.$row->name.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }


    function fetchProject(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = Project::where('name', 'LIKE', "%{$query}%")
            ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:absolute">';
            foreach($data as $row)
            {
                $output .= '
                <li data-id='.$row->id.'><a href="#">'.$row->name.'</a></li>
                ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

   /* Start Sales*/

    public function salesIndex(){
    	$users = User::all();
    	return view('reports.createSalesReport');
    }

    public function salesReport(Request $request){

        $from_date = \Carbon\Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = \Carbon\Carbon::parse($request->input('to_date'))->endOfDay();

    	$users = User::all();

    	$validatedData = $request->validate([
            'from_date' => 'required',
            'to_date' => 'required|required|after_or_equal:from_date|before:tomorrow',
        ]);

        $formvalue['from_date'] = $request->from_date;
        $formvalue['to_date'] = $request->to_date;
        $formvalue['employee_id'] = $request->user_id;

        $result = Sale::query()
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->with('user', 'client', 'project', 'projectSlab', 'meeting.ta');

        if($request->user_id !=null){
        	$result->where('user_id', $request->user_id);
        }

        $result->orderBy('created_at', 'DESC');
        $sales = $result->get();
      	return view('reports.viewSalesReport', compact('sales', 'users', 'formvalue'));
    }


    public function DownloadPdfSales(Request $request){

        $from_date = \Carbon\Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = \Carbon\Carbon::parse($request->input('to_date'))->endOfDay();

        $result = Sale::query()
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->with('user', 'client', 'project', 'projectSlab', 'meeting.ta');

        $employee_name = '';
        if($request->user_id !=null){
            $result->where('user_id', $request->user_id);
            $employee_name = User::findOrFail($request->user_id)->name;
        }

        $result->orderBy('created_at', 'DESC');
        $sales = $result->get();

        $from_date =$request->from_date;
        $to_date =$request->to_date;

        $html = view('reports.Viewpdf.salespdf', compact('sales', 'from_date','to_date','employee_name'));
        $mpdf = new Mpdf;
        $mpdf->setFooter('Lead Tracking System..  Page# {PAGENO}');
        $mpdf->WriteHTML($html);
        return $mpdf->Output('salesReport'.uniqid().'.pdf','D');
    }

    /*End Sales*/

    /*Start project*/

    public function projectsIndex(){
        $projects = Project::all();
        return view('reports.createProjectsReport', compact('projects'));
    }

    public function projectsReport(Request $request){

        $validatedData = $request->validate([
            'from_date' => 'required',
            'to_date' => 'required|after_or_equal:from_date|before:tomorrow',
            'project_id' => 'required',
        ],
        [
            'project_id.required' => 'Project Name is required!',
            'to_date.after:from_date' => 'To date can not before previous date',
        ]);

        $from_date = \Carbon\Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = \Carbon\Carbon::parse($request->input('to_date'))->endOfDay();

        $formvalue['from_date'] = $request->from_date;
        $formvalue['to_date'] = $request->to_date;
        $formvalue['project_id'] = $request->project_id;


        $result = Sale::where('project_id',$request->project_id)
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->with('user', 'client', 'project', 'projectSlab', 'meeting.ta');

        $result->orderBy('created_at', 'DESC');
        $sales = $result->get();
        return view('reports.viewProjectsReport', compact('sales','formvalue'));
    }

    public function DownloadPdfProjects(Request $request){
        $from_date = \Carbon\Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = \Carbon\Carbon::parse($request->input('to_date'))->endOfDay();

       $result = Sale::where('project_id',$request->project_id)
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->with('user', 'client', 'project', 'projectSlab', 'meeting.ta');

        $result->orderBy('created_at', 'DESC');
        $sales = $result->get();

        $html = view('reports.Viewpdf.projectspdf', compact('sales', 'from_date','to_date'));
        $mpdf = new Mpdf;
        $mpdf->setFooter('Lead Tracking System..  Page# {PAGENO}');
        $mpdf->WriteHTML($html);
        return $mpdf->Output('projectsReport'.uniqid().'.pdf','D');
    }





    /*End projects*/

    /*Meetings*/

    public function meetingsIndex(){
        return view('reports.createMeetingsReport');
    }

    public function meetingsReport(Request $request){

        $from_date = \Carbon\Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = \Carbon\Carbon::parse($request->input('to_date'))->endOfDay();

        $validatedData = $request->validate([
            'from_date' => 'required',
            'to_date' => 'required|after_or_equal:from_date|before:tomorrow',
        ]);

        $formvalue['from_date'] = $request->from_date;
        $formvalue['to_date'] = $request->to_date;

        $result = Meeting::query()
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->with('user', 'client', 'ta', 'schedule', 'schedule.callhistory.project');

        $result->orderBy('created_at', 'DESC');
        $meetings = $result->get();
        return view('reports.viewMeetingsReport', compact('meetings','formvalue'));
    }


    public function DownloadPdfMeetings(Request $request){
        $from_date = \Carbon\Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = \Carbon\Carbon::parse($request->input('to_date'))->endOfDay();

        $formvalue['from_date'] = $request->from_date;
        $formvalue['to_date'] = $request->to_date;

       $result = Meeting::query()
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->with('user', 'client', 'ta', 'schedule', 'schedule.callhistory.project');

        $result->orderBy('created_at', 'DESC');
        $meetings = $result->get();

        $from_date =$request->from_date;
        $to_date =$request->to_date;

        $html = view('reports.Viewpdf.meetingspdf', compact('meetings', 'from_date','to_date'));
        $mpdf = new Mpdf;
        $mpdf->setFooter('Lead Tracking System..  Page# {PAGENO}');
        $mpdf->WriteHTML($html);
        return $mpdf->Output('MeetingReport'.uniqid().'.pdf','D');
    }

    /*End meetings*/

    /*Employees*/

    public function employeesIndex(){
        return view('reports.createEmployeesReport');
    }

    public function employeesReport(Request $request){
        $from_date = \Carbon\Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = \Carbon\Carbon::parse($request->input('to_date'))->endOfDay();

        $sales = []; $callhistories = []; $meetings = []; $schedules = [];

        $users = EmployeeInformation::where('user_id',$request->user_id)->with('company','office','department','designation')->first();

        $validatedData = $request->validate([
            'from_date' => 'required',
            'to_date' => 'required|after_or_equal:from_date|before:tomorrow',
            'user_id' => 'required',
        ],
        [
            'user_id.required' => 'Employee Name is required!',
            'to_date.after:from_date' => 'To date can not before previous date',
        ]);


        $formvalue['from_date'] = $request->from_date;
        $formvalue['to_date'] = $request->to_date;
        $formvalue['employee_id'] = $request->user_id;

        if($users->department->name == 'Marketing'){

            $result = CallHistory::where('user_id', $request->user_id)
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->with('user', 'client', 'project')
                ->orderBy('created_at', 'DESC');
            
            $callhistories = $result->get();

            $sResult = CallHistory::query();

            $sResult->join('schedules', 'call_histories.id', '=', 'schedules.call_history_id')
                    ->whereDate('schedules.created_at', '>=', $from_date)
                    ->whereDate('schedules.created_at', '<=', $to_date)
                    ->with('user', 'client', 'project')
                    ->where('call_histories.user_id' , $request->user_id)
                    ->orderBy('schedules.created_at', 'DESC')
                    ->get();
            
            $schedules = $sResult->get();
        }
        
        else if($users->department->name == 'Sales'){
        
           $result = Sale::where('user_id', $request->user_id)
                    ->whereDate('created_at', '>=', $from_date)
                    ->whereDate('created_at', '<=', $to_date)
                    ->with('user', 'client', 'project', 'projectSlab')
                    ->orderBy('created_at', 'DESC');
            
            $sales = $result->get();

            $mResult = Meeting::where('user_id', $request->user_id)
                    ->whereDate('created_at', '>=', $from_date)
                    ->whereDate('created_at', '<=', $to_date)
                    ->with('user', 'client', 'ta', 'schedule', 'schedule.callhistory.project')
                    ->orderBy('created_at', 'DESC');
            
            $meetings = $mResult->get();
        }

        return view('reports.viewEmployeesReport', compact('sales', 'schedules', 'users', 'callhistories', 'meetings', 'formvalue'));
    }

    public function DownloadPdfEmployees(Request $request){

        $from_date = \Carbon\Carbon::parse($request->input('from_date'))->startOfDay();
        $to_date = \Carbon\Carbon::parse($request->input('to_date'))->endOfDay();

        $sales = []; $callhistories = []; $meetings = []; $schedules = [];

        $users = EmployeeInformation::where('user_id',$request->user_id)->with('company','office','department','designation')->first();

        if($users->department->name == 'Marketing'){
            $result = CallHistory::where('user_id', $request->user_id)
                ->whereDate('created_at', '>=', $from_date)
                ->whereDate('created_at', '<=', $to_date)
                ->with('user', 'client', 'project')
                ->orderBy('created_at', 'DESC');
            
            $callhistories = $result->get();

            $sResult = CallHistory::query();

            $sResult->join('schedules', 'call_histories.id', '=', 'schedules.call_history_id')
                    ->whereDate('schedules.created_at', '>=', $from_date)
                    ->whereDate('schedules.created_at', '<=', $to_date)
                    ->with('user', 'client', 'project')
                    ->where('call_histories.user_id' , $request->user_id)
                    ->orderBy('schedules.created_at', 'DESC')
                    ->get();
            
            $schedules = $sResult->get();
        }
        
        else if($users->department->name == 'Sales'){
        
           $result = Sale::where('user_id', $request->user_id)
                    ->whereDate('created_at', '>=', $from_date)
                    ->whereDate('created_at', '<=', $to_date)
                    ->with('user', 'client', 'project', 'projectSlab')
                    ->orderBy('created_at', 'DESC');
            
            $sales = $result->get();

            $mResult = Meeting::where('user_id', $request->user_id)
                    ->whereDate('created_at', '>=', $from_date)
                    ->whereDate('created_at', '<=', $to_date)
                    ->with('user', 'client', 'ta', 'schedule', 'schedule.callhistory.project')
                    ->orderBy('created_at', 'DESC');
            
            $meetings = $mResult->get();
        }

        $html = view('reports.Viewpdf.employeespdf', compact('sales','schedules', 'users', 'callhistories', 'meetings',  'from_date','to_date'));
        $mpdf = new Mpdf;
        $mpdf->setFooter('Lead Tracking System..  Page# {PAGENO}');
        $mpdf->WriteHTML($html);
        return $mpdf->Output('employeesReport'.uniqid().'.pdf','D');
    }

    /*End employees*/

}