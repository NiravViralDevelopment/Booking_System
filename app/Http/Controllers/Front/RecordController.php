<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilityModel;
use App\Models\FacilityBookingModel;
use App\Models\MsterAccount;
use App\Models\TowerModel;
use App\Models\FacilityAttendance;
use App\Models\FacilityManagment;




class RecordController extends Controller
{
    
    public function index(){
        $data  = FacilityModel::with('FacilityManagment')->orderBy('id', 'DESC')->get();
        $towerData = TowerModel::get();
        
        
        $facility_booking = MsterAccount::
            join('towers','master_account.tower_id','towers.id')
            ->join('facility_booking','facility_booking.user_id','master_account.id')
            ->join('floars','master_account.floor_id','floars.id')
            ->join('facility','facility_booking.facility_id','facility.id')
            ->join('units','master_account.unit_id','units.id')
            // ->join('facility_attendance','master_account.id','facility_attendance.user_id')
            // 'facility_attendance.attendance_status',
            ->select('facility_booking.id as facility_booking_id','facility_booking.created_at as facility_booking_created_at','facility_booking.updated_at as facility_booking_updated_at','facility_booking.date as facility_booking_date','facility_booking.booking_status as facility_booking_status','facility_booking.time_slot as facility_booking_time_slot','facility_booking.facility_id as facility_booking_facility_id','master_account.*','towers.tower_name','towers.id as towers_id','floars.floar_name','floars.id as floars_id','units.unit_name','units.id as units_id','facility.title')
            ->orderBy('id', 'DESC')
        ->get();

        foreach($facility_booking as $booking){
            $attendace = FacilityAttendance::where('facility_booking_id',$booking->facility_booking_id)->first();
            if(!empty($attendace)){
                $booking->checked_attendance = "1";
            }else{
                $booking->checked_attendance = '0';
            }
        }

        
        // return $facility_booking;
        return view('front.Record.index',compact('data','facility_booking','towerData'));
    }

    public function get_record_date_session(request $request){
        $day = date('D', strtotime($request->Date));
        $arraytimeSlot = [];

        if(!empty($request->FacilityFilter)){
            $data = FacilityManagment::where('_key',$day)->where('facity_id',$request->FacilityFilter)->get();
            // ->select('facity_id')->distinct()
            foreach($data  as $row){
                // $time = FacilityManagment::where('facity_id',$row->facity_id)->first();
                $arraytimeSlot[] = $row->hour_first .':'.$row->minutes_first. ' - ' . $row->hour_third .':'.$row->minutes_four;
            }
        }else{
            $facilityData = FacilityManagment::where('_key',$day)->get();
            // select('facity_id')->distinct()
            foreach($facilityData  as $data){
                // $time = FacilityManagment::where('facity_id',$data->facity_id)->first();
                $arraytimeSlot[] = $data->hour_first .':'.$data->minutes_first. ' - ' . $data->hour_third .':'.$data->minutes_four;
            }
        }
        return $arraytimeSlot;
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
