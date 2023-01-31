<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilityModel;
use App\Models\FacilityManagment;
use App\Models\FacilityBookingModel;
use Session;
use DateTime;

class LogCalenderController extends Controller
{
    function getTimeSlot($interval, $start_time, $end_time)
    {
        $start = new DateTime($start_time);
        $end = new DateTime($end_time);
        $startTime = $start->format('H:i');
       
        $endTime = $end->format('H:i');
        $i=0;
        $time = [];
        while(strtotime($startTime) <= strtotime($endTime)){
            $start = $startTime;
            $end = date('H:i',strtotime('+'.$interval.' hours',strtotime($startTime)));
            $startTime = date('H:i',strtotime('+'.$interval.' hours',strtotime($startTime)));
            $i++;
            if(strtotime($startTime) <= strtotime($endTime)){
                $time[$i]['slot_start_time'] = $start;
                $time[$i]['slot_end_time'] = $end;
            }
        }
        return $time;
    }

    public function index(request $request){

        if(!empty($request->calender_date)){
            $date_list_calender = $request->calender_date;
        }else{
            $date_list_calender = date('Y-m-d');
        }

        
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
            Session::flash('success', 'Facility booked successFully!.');
        }
        $facility_get_id = ($request->facility_get_id) ? $request->facility_get_id : $request->id;
        if(empty($facility_get_id)){
            $facdata = FacilityModel::first();
            $facility_get_id = $facdata->id;
        }
        
        $data = FacilityModel::OrderBy('id','DESC')->get();
        $sortDirection = 'DESC';
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
        
        // return $days;
        // return $data_table;

        $sortingDays = array();
        foreach($days as $day => $value)
        {
            $sortingDays[] = $data_table->where('_key',$day);
        }
        $data_table = collect($sortingDays)->flatten();
        
        
        $booking_count = new FacilityBookingModel;
        foreach($data_table as $key=>$time){
            $time->time  =  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four;
        }

        
        $timeSlot1 = $data_table;
        $timeSlot = [];
        foreach($data_table as $key=>$time){
            

            
            if($time->_key == date('D')){

                $timeSlot[] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  date('D'),
                ];
            }
            
            if($time->_key == 'Tue'){
                $timeSlot[] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Tue',
                ];
            }
            if($time->_key == 'Wed'){
                $timeSlot[] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Wed',
                ];
            }
            if($time->_key == 'Thu'){
                $timeSlot[]= [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Thu',
                ];
            }
            if($time->_key == 'Fri'){
                $timeSlot[] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Fri',
                ];
            }

            if($time->_key == 'Sat'){
                $timeSlot[] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Sat',
                ];
            }

            if($time->_key == 'Sun'){
                $timeSlot[] = [
                    'time'   =>  $time->hour_first.':'.$time->minutes_first.' - '.$time->hour_third.':'.$time->minutes_four,
                    'fac_id'   =>  $time->id,
                    'day'   =>  'Sun',
                ];
            }
        }

        
        $timeSlotdata1 =  array_unique(array_column($timeSlot, 'time',));
        $lastSlotData = array_intersect_key($timeSlot, $timeSlotdata1);

        
        return view('front.LogCalender.index',compact('selectDate','selectDay','selectDay1','selectDay2','selectDay3','selectDay4','selectDay5','selectDay6','facilityData','booking_count','data_table','data','aryRange','slotsTime','facility_get_id','lastSlotData','timeSlot'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        //
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
