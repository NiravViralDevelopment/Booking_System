<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilityModel;
use App\Models\FacilityBookingModel;
use App\Models\MsterAccount;
use App\Models\FacilityManagment;
use App\Models\FacilityAttendance;
use Session;

class TakeAttendanceController extends Controller
{
    public function index(request $request){
        

        if(!empty($request->calender_date)){
            $date_list_calender = $request->calender_date;
        }else{
            $date_list_calender = date('Y-m-d');
        }
        // dd($date_list_calender);
        $data  = FacilityModel::with('FacilityManagment')->orderBy('id', 'DESC')->get();

        $time = date("Y-m-d");
        $strDateFrom = date("Y-m-d", strtotime($date_list_calender));
        $strDateTo = date("Y-m-d", strtotime($date_list_calender.'+6 days'));
        $aryRange = [];
        
        $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
        $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));
        if ($iDateTo >= $iDateFrom) {
            array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
            while ($iDateFrom < $iDateTo) {
                $iDateFrom += 86400; // add 24 hours
                array_push($aryRange, date('Y-m-d', $iDateFrom));
            }
        }

        $start_time = strtotime('00:00:00');
        $end_time = strtotime('24:00:00');
        $slot = strtotime(date('Y-m-d H:i:s',$start_time) . ' +2 hours');
        $slotsTime = [];

        for ($i=0; $slot <= $end_time; $i++) { 
            $slotsTime[$i] = [ 
                'date'  => $time,
                'start' => date('Y-m-d H:i:s', $start_time),
                'end' => date('Y-m-d H:i:s', $slot),
            ];

            $start_time = $slot;
            $slot = strtotime(date('Y-m-d H:i:s',$start_time) . ' +2 hours');
        }

        if(!empty($request->id)){
            Session::flash('success', 'Facility attendance successFully!.');
        }

        $facility_get_id = ($request->facility_get_id) ? $request->facility_get_id : $request->id;
        if(empty($facility_get_id)){
            $facdata = FacilityModel::first();
            $facility_get_id = $facdata->id;
        }
        $data = FacilityModel::OrderBy('id','DESC')->get();
        // $data_table  = FacilityModel::with('FacilityManagment')->find($facility_get_id);
        // $sortDirection = 'DESC';
        // $data_table  = FacilityModel::with(['FacilityManagment' => function ($query) use ($sortDirection) {
        //     $query->orderBy('_key');
        // }])->find($facility_get_id);
        
        $data_table = FacilityManagment::where('facity_id',$facility_get_id)->get();
        $facilityData = FacilityModel::find($facility_get_id);

        if(!empty($request->calender_date)){
            $date_list = $request->calender_date;

            $selectDate = $request->calender_date;
            
            $selectDay = date('D', strtotime($date_list));
            $selectDay1 = date('D', strtotime($date_list.'+1 days'));
            $selectDay2 = date('D', strtotime($date_list.'+2 days'));
            $selectDay3 = date('D', strtotime($date_list.'+3 days'));
            $selectDay4 = date('D', strtotime($date_list.'+4 days'));
            $selectDay5 = date('D', strtotime($date_list.'+5 days'));
            $selectDay6 = date('D', strtotime($date_list.'+6 days'));

            $days = [
                date('D', strtotime($date_list))=>1,
                date('D', strtotime($date_list.'+1 days'))=>2,
                date('D', strtotime($date_list.'+2 days'))=>3,
                date('D', strtotime($date_list.'+3 days'))=>4,
                date('D', strtotime($date_list.'+4 days'))=>5,
                date('D', strtotime($date_list.'+5 days'))=>6,
                date('D', strtotime($date_list.'+6 days'))=>7,
            ];
            // dd($days);
        }else{
            $selectDate = date('Y-m-d');
            $selectDay = date('D');

            $selectDay1 = date('D',strtotime('+1 days'));
            $selectDay2 = date('D',strtotime('+2 days'));
            $selectDay3 = date('D',strtotime('+3 days'));
            $selectDay4 = date('D',strtotime('+4 days'));
            $selectDay5 = date('D',strtotime('+5 days'));
            $selectDay6 = date('D',strtotime('+6 days'));

            $days = [
                date('D')=>1,
                date('D',strtotime('+1 days'))=>2,
                date('D',strtotime('+2 days'))=>3,
                date('D',strtotime('+3 days'))=>4,
                date('D',strtotime('+4 days'))=>5,
                date('D',strtotime('+5 days'))=>6,
                date('D',strtotime('+6 days'))=>7,
            ];
        }

        // return $data_table;

        $sortingDays = array();
        foreach($days as $day => $value)
        {
            $sortingDays[] = $data_table->where('_key',$day);
        }
        $data_table = collect($sortingDays)->flatten();

        // return $data_table;
        $booking_count = new FacilityBookingModel;
        $Attendance_booking_count = new FacilityAttendance;

        foreach($data_table as $key=>$time){
            $time->time  =  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four;
        }

        // return $data_table->FacilityManagment;
        $timeSlot1 = $data_table;
        $timeSlot = [];
        foreach($data_table as $key=>$time){
            // dd($time);

            
            // FacilityAttendance::where();
            if($time->_key == date('D')){
                $timeSlot[$key] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  date('D'),
                ];
            }
            
            if($time->_key == 'Tue'){
                $timeSlot[$key] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Tue',
                ];
            }
            if($time->_key == 'Wed'){
                $timeSlot[$key] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Wed',
                ];
            }
            if($time->_key == 'Thu'){
                $timeSlot[$key]= [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Thu',
                ];
            }

            if($time->_key == 'Fri'){
                $timeSlot[$key] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Fri',
                ];
            }


            if($time->_key == 'Sat'){
                $timeSlot[$key] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Sat',
                ];
            }

            if($time->_key == 'Sun'){
                $timeSlot[$key] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Sun',
                ];
            }
        }

       
        $timeSlotdata1 =  array_unique(array_column($timeSlot, 'time',));
        $lastSlotData = array_intersect_key($timeSlot, $timeSlotdata1);
        // return view('front.TakeAttendance.index',compact('booking_count','data_table','data','aryRange','slotsTime','facility_get_id','lastSlotData','timeSlot'));
        return view('front.TakeAttendance.index',compact('date_list_calender','selectDate','selectDay','selectDay1','selectDay2','selectDay3','selectDay4','selectDay5','selectDay6','Attendance_booking_count','data','booking_count','data_table','data','aryRange','slotsTime','facility_get_id','lastSlotData','timeSlot'));
    }

    public function log_attendance_detail(request $request){
        
       
        $facility_id_data = $request->facility_id_data;
        $date_data        = $request->date_data;
        $date_days        = $request->date_days;
        
        $data = FacilityModel::OrderBy('id','DESC')->get();


    //     $facility_booking = FacilityBookingModel::where('time_slot',$date_days)
    //    ->get();
        $facility_booking = MsterAccount::
        join('towers','master_account.tower_id','towers.id')
        ->join('facility_booking','facility_booking.user_id','master_account.id')
        ->join('floars','master_account.floor_id','floars.id')
        ->join('facility','facility_booking.facility_id','facility.id')
        ->join('units','master_account.unit_id','units.id')
        ->where('facility_booking.time_slot',$date_days)
        ->whereDate('facility_booking.date',$date_data)
        ->select('facility_booking.id as facility_booking_id','facility_booking.created_at as facility_booking_created_at','facility_booking.updated_at as facility_booking_updated_at','facility_booking.date as facility_booking_date','facility_booking.booking_status as facility_booking_status','facility_booking.time_slot as facility_booking_time_slot','facility_booking.facility_id as facility_booking_facility_id','master_account.*','towers.tower_name','towers.id as towers_id','floars.floar_name','floars.id as floars_id','units.unit_name','units.id as units_id','facility.title')
        ->orderBy('id', 'DESC')
        ->get();

        // return $facility_booking;
        
        foreach($facility_booking as $booking){
            $attendace = FacilityAttendance::where('facility_booking_id',$booking->facility_booking_id)
            ->where('facility_booking_id',$booking->facility_booking_id)->first();
            if(!empty($attendace)){
                $booking->checked_attendance = "1";
            }else{
                $booking->checked_attendance = '0';
            }
        }
        // return $facility_booking;
        return view('front.TakeAttendance.log_attendance_detail',compact('facility_id_data','date_data','date_days','facility_booking','data'));
    }

    public function log_attendance_delete($id){
        $data = FacilityBookingModel::find($id);
        $data->delete();
        return redirect()->route('tack_attendance.index');
    }
    public function create(){
        //
    }

    public function store(Request $request){

        $request->validate([
            'facility_booking_id' => 'required',
        ]
        ,[
            'facility_booking_id.required' =>  'Please sected users in table',
        ]);

        $FacilityBookingModel = FacilityBookingModel::find($request->facility_booking_id);
        
        
        $facility_id = $FacilityBookingModel->facility_id;
        $user_id = $FacilityBookingModel->user_id;
        
        $data = new FacilityAttendance();
        $data->facility_id = $facility_id;
        $data->facility_booking_id = $request->facility_booking_id;
        $data->user_id = $user_id;
        $data->date = $request->date;
        $data->month_year  = date('F-Y',strtotime($request->date));
        $data->time_slot = $request->time_slot;
        $data->attendance_status  = 1;
        $data->save();
        return response()->json( ['success' => 1,'facility_id' => $facility_id] );
        // return redirect()->route('tack_attendance.index')->with('success','Data addess Successfully');
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
    
}
