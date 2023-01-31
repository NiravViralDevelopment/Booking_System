<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilityModel;
use App\Models\FacilityBookingModel;
use App\Models\FacilityAttendance;
use App\Models\FacilityManagment;
use DateTime;

class ReportController extends Controller
{
    
    public function index(request $request){
        $day_show = false;
        $month_show = false;

        // dd($request->all());
        $facilityData=FacilityModel::get();

        $facility_id = $request->facility_get_id;
        if(!empty($facility_id)){
            $facilityname = FacilityModel::find($facility_id);    
        }else{
            $facilityname = FacilityModel::first();
            $facility_id = $facilityname->id;
           
        }
        
        $facility_name = $facilityname->title;
        
        $start_month = $request->start_month_date_in;
        $end_month = $request->to_month_date_in;

        $start_date_in = $request->start_date_in;
        $end_date_in = $request->end_date_in;
        // /all
        $all = 0;
        
        
        if(empty($request->all)){
            $all = 0; 
        }else{
            $all = $request->all;
        }


        if($all == '0'){
            $FacilityBooking = FacilityBookingModel::select('month_year')->distinct()->where('facility_id',$facility_id)->get();
            $resualt = [];
            
            foreach($FacilityBooking as $k){
                $Booking = FacilityBookingModel::where('month_year',$k->month_year)->where('facility_id',$facility_id)->count();
                $attan = FacilityAttendance::where('month_year',$k->month_year)->where('facility_id',$facility_id)->count();
                $total_attand = 100* $attan /$Booking ;
                
                $resualt[] =array(
                    'date'              => date('F-Y',strtotime($k->month_year)),
                    'booking'           => $Booking,
                    'attan'             => $attan,
                    'total_attand'      => $total_attand,
                );
            }
            $day_show = false;
            $month_show = false;
            $allData_Show = true;
            return view('front.Report.index',compact('allData_Show','all','facility_name','day_show','month_show','start_date_in','end_date_in','start_month','end_month','facilityData','FacilityBooking','resualt','facility_id'));
        }

        //months
        if(!empty($start_month) && !empty($end_month)){
            $FacilityBooking = FacilityBookingModel::
            whereBetween('date',[$start_month,$end_month])
            ->where('facility_id',$facility_id)
            ->select('month_year')->distinct()
            ->get();
            $resualt = [];
            foreach($FacilityBooking as $k){
                $Booking = FacilityBookingModel::where('month_year',$k->month_year)->where('facility_id',$facility_id)->count();
                $attan = FacilityAttendance::where('month_year',$k->month_year)->where('facility_id',$facility_id)->count();
                $total_attand = 100* $attan /$Booking ;
                
                $resualt[] =array(
                    'date'              => date('F-Y',strtotime($k->month_year)),
                    'booking'           => $Booking,
                    'attan'             => $attan,
                    'total_attand'      => $total_attand,
                );
            }
            $day_show = false;
            $month_show = true;
            $allData_Show = false;
            return view('front.Report.index',compact('allData_Show','all','facility_name','start_date_in','end_date_in','start_month','end_month','facilityData','FacilityBooking','resualt','facility_id','day_show','month_show'));
        }

        //days
        if(!empty($start_date_in) && !empty($end_date_in)){
            $begin = new DateTime($start_date_in);
            $end   = new DateTime($end_date_in);
            $bookingData = FacilityBookingModel::select('date')->whereBetween('date',[$start_date_in,$end_date_in])
             ->distinct()->get();
            foreach($bookingData as $booking){
                $bookingDataCount = FacilityBookingModel::whereDate('date',$booking->date)->count();
                $attendanceData = FacilityAttendance::whereDate('date',$booking->date)->count();
                if($attendanceData){
                    $booking->attan = $attendanceData;
                    $booking->booking = $bookingDataCount;
                    $booking->total_attand = $attendanceData*100/$bookingDataCount;

                }else{
                    $booking->attan = $attendanceData;
                    $booking->booking = $bookingDataCount;
                    $booking->total_attand = $attendanceData*100/$bookingDataCount;
                }
            }
            $resualt = $bookingData;
            $day_show = true;
            $month_show = false;
            $allData_Show = false;
            return view('front.Report.index',compact('allData_Show','all','facility_name','start_date_in','end_date_in','start_month','end_month','facilityData','resualt','facility_id','day_show','month_show'));
        }

    }


























    public function Booking_reports(request $request){
       
        $facilityData=FacilityModel::get();
        $facility_id = $request->facility_get_id;
            if(!empty($facility_id)){
                $facilityname = FacilityModel::find($facility_id);    
            }else{
                $facilityname = FacilityModel::first();
                $facility_id = $facilityname->id;
            }
        
        $facility_name = $facilityname->title;
        
        $start_month = $request->start_month_date_in;
        $end_month = $request->to_month_date_in;

        $start_date_in = $request->start_date_in;
        $end_date_in = $request->end_date_in;
        
        // /all
        $all = 0; 
        if(empty($request->all)){
            $all = 0; 
        }else{
            $all = $request->all;
        }
        

        if($all == '0'){
            $begin = new DateTime($start_month);
            $end   = new DateTime($end_month);
            $resualt = [];
            
            $bookingData = FacilityBookingModel::select('month_year')
            ->distinct()->get();

            $facilitycount = [];
            $total_booking = 0;
            
            foreach($bookingData as $Data){
                $total_booking = 0;
                $facilitycount = FacilityBookingModel::where('facility_id',$facility_id)->where('month_year',$Data->month_year)->get();
                $Data->booking_hour = 0;
                foreach ($facilitycount as $key => $count) {
                    $total_booking= $total_booking + $count->total_hour;
                    $Data->booking_hour = $total_booking;
                }
            }
            
            
            $facilityManagement = FacilityManagment::where('_key','Mon')->where('facity_id',$facility_id)->get();

            $timenagaecount = 0;
            foreach($facilityManagement as $managTime){
                $timenagaecount = $timenagaecount+$managTime->total_hour;
            }
            
            $Opning_Hour = 0;
            foreach($bookingData as $b){
                $Opning_Hour = $facilityname->quota_per_session*$timenagaecount*cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($Data->month_year)), date('Y',strtotime($Data->month_year)));
                $b->booking_ration = $b->booking_hour*100/$Opning_Hour;
                $b->opening_hour = $Opning_Hour;
                $b->date = $b->month_year;
                $b->timenagaecount = $timenagaecount;
            }
            $resualt = $bookingData; 
            $day_show = false;
            $month_show = false;
            $allData_Show = true;
            return view('front.Report.Booking_reports',compact('allData_Show','all','facility_name','start_date_in','end_date_in','start_month','end_month','facilityData','resualt','facility_id','day_show','month_show'));

        }

        //months
       
        if(!empty($start_month) && !empty($end_month)){
            $begin = new DateTime($start_month);
            $end   = new DateTime($end_month);
            $resualt = [];
            
            $bookingData = FacilityBookingModel::select('month_year')->whereBetween('date',[$start_month,$end_month])
            ->distinct()->get();

            $facilitycount = [];
            $total_booking = 0;
            
            foreach($bookingData as $Data){
                $total_booking = 0;
                $facilitycount = FacilityBookingModel::where('facility_id',$facility_id)->where('month_year',$Data->month_year)->get();
                foreach ($facilitycount as $key => $count) {
                    $total_booking= $total_booking + $count->total_hour;
                    $Data->booking_hour = $total_booking;
                }
            }

            $facilityManagement = FacilityManagment::where('_key','Mon')->where('facity_id',$facility_id)->get();

            $timenagaecount = 0;
            foreach($facilityManagement as $managTime){
                $timenagaecount = $timenagaecount+$managTime->total_hour;
            }
            $Opning_Hour = 0;
            foreach($bookingData as $b){
                $Opning_Hour = $facilityname->quota_per_session*$timenagaecount*cal_days_in_month(CAL_GREGORIAN, date('m',strtotime($Data->month_year)), date('Y',strtotime($Data->month_year)));
                $b->booking_ration = $timenagaecount*100/$Opning_Hour;
                $b->opening_hour = $Opning_Hour;
                $b->date = $b->month_year;
            }
            
            $resualt = $bookingData; 
           
            $day_show = false;
            $month_show = false;
            $allData_Show = true;
            return view('front.Report.Booking_reports',compact('allData_Show','all','facility_name','start_date_in','end_date_in','start_month','end_month','facilityData','resualt','facility_id','day_show','month_show'));
        }

        

        //days
        
        if(!empty($start_date_in) && !empty($end_date_in)){
            $begin = new DateTime($start_date_in);
            $end   = new DateTime($end_date_in);
            
            $resualt = [];
            for($i = $begin; $i <= $end; $i->modify('+1 day')){
                $date = $i->format("Y-m-d");
                $day = $i->format("D");
                $start_date_name = date("D", strtotime($start_date_in));
                $end_date_name   = date("D", strtotime($end_date_in));
                $data= FacilityManagment::where('facity_id',$facility_id)->where('_key',$day)->get();
                $session= FacilityModel::where('id',$facility_id)->first();
                (int)$j = $session->quota_per_session;
                $booking = FacilityBookingModel::where('facility_id',$facility_id)->whereDate('date',$date)->get();
                $total_hour=0;
                foreach ($data as $totalvalue){
                    $total_hour=$total_hour+(int)$totalvalue['total_hour'];
                }
                $total_booking = 0;
                foreach($booking as $k){
                    $total_booking = $total_booking+(int)$k['total_hour'];
                }
                $slott= $total_hour*$j;
                $resualt[]=array(
                    'date' => $date,
                    'opening_hour'=>$slott,
                    'booking_hour' => $total_booking,    
                    'booking_ration' =>$total_booking*100/$slott
                );
            }
            $day_show = true;
            $month_show = false;
            $allData_Show = false;
            return view('front.Report.Booking_reports',compact('allData_Show','all','facility_name','start_date_in','end_date_in','start_month','end_month','facilityData','resualt','facility_id','day_show','month_show'));
        }
        
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

    public function by_date(){
        

        $begin = new DateTime( "2022-12-10" );
        $end   = new DateTime( "2022-12-20" );
        $resualt = [];
        for($i = $begin; $i <= $end; $i->modify('+1 day')){
            $date = $i->format("Y-m-d");
            $day = $i->format("D");
            $data= FacilityManagment::where('facity_id',19)->where('_key',$day)->get();
            $booking = FacilityBookingModel::select('time_slot','total_hour')->distinct()->where('facility_id',19)->whereDate('date',$date)->get();
            //Total Hour
            $total_hour=0;
            foreach ($data as $totalvalue)
            {

                $total_hour=$total_hour+(int)$totalvalue['total_hour'];
            }
            //Total Booking
            $total_booking = 0;
            foreach($booking as $k)
            {
                $total_booking=$total_booking+(int)$k['total_hour'];
            }
             $resualt[]=array(
                'date' => $date,
                'opening_hour'=>$total_hour,
                'booking_hour' => $total_booking,    
                'booking_ration' =>$total_booking*100/$total_hour
            );
        }
        return $resualt;


    }

}
