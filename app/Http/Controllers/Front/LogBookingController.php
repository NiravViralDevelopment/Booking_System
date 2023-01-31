<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilityModel;
use App\Models\TowerModel;
use App\Models\MsterAccount;
use App\Models\FacilityBookingModel;
use Session;
use DateTime;


class LogBookingController extends Controller
{
   
    public function index(){
        $data  = FacilityModel::with('FacilityManagment')->orderBy('id', 'DESC')->get();
        $towerData = TowerModel::get();
        $MasterData = MsterAccount::
        join('towers','master_account.tower_id','towers.id')
        ->join('floars','master_account.floor_id','floars.id')
        ->join('units','master_account.unit_id','units.id')
        ->select('master_account.*','towers.tower_name','towers.id as towers_id','floars.floar_name','floars.id as floars_id','units.unit_name','units.id as units_id')
        ->orderBy('id', 'DESC')
        ->get();

       
        return view('front.LogBooking.index',compact('data','towerData','MasterData'));
    }

    public function booking(request $request){
        // dd($request->all());
        $request->validate([
            'facility_id_data' => 'required',
        ]
        ,[
            'facility_id_data.required'       =>  'Please select a facility',
        ]);
        
        $facility_id_data = $request->facility_id_data;
        $date_data        = $request->date_data;
        $date_days        = $request->date_days;
        
        $data  = FacilityModel::with('FacilityManagment')->orderBy('id', 'DESC')->get();
        $towerData = TowerModel::get();
        $MasterData = MsterAccount::
        join('towers','master_account.tower_id','towers.id')
        ->join('floars','master_account.floor_id','floars.id')
        ->join('units','master_account.unit_id','units.id')
        ->where('master_account.status',1)
        ->select('master_account.*','towers.tower_name','towers.id as towers_id','floars.floar_name','floars.id as floars_id','units.unit_name','units.id as units_id')
        ->orderBy('id', 'DESC')
        ->get();

        // return $MasterData;
        foreach($MasterData as $row){
            $booking_stsus = FacilityBookingModel::where('user_id',$row->id)->whereDate('date',$date_data)->where('time_slot',$date_days)->first();
            if(!empty($booking_stsus)){
                $row->booking_statu = 1;
            }else{
                $row->booking_statu = 0;
            }
        }
        return view('front.LogBooking.index',compact('data','towerData','MasterData','facility_id_data','date_data','date_days'));
    }
    public function create(){
        //
    }

    public function store(Request $request){
        // dd($request->all());

        $timeSlotData = explode('-',$request->time_slot);

        $d1 = new DateTime($timeSlotData[0]);
        $d2 = new DateTime($timeSlotData[1]);
        $interval = $d2->diff($d1);

       
        
        $request->validate([
            'booking_id' => 'required',
        ]
        ,[
            'booking_id.required' =>  'Please select a user',
        ]);

      
        $facility_name = FacilityModel::find($request->facility);
        
        $facility_booking_check = FacilityBookingModel::
            where('facility_id',$request->facility)
            ->whereDate('date',$request->date)
            ->where('time_slot',$request->time_slot)
        ->count();
        
        if($facility_booking_check == $facility_name->quota_per_session){
            return response()->json( ['success' => 0,'facility_id' => $request->facility,'facility_name' => $facility_name->title,'date' => $request->date,'timeSlot_from'=>$request->time_slot  ] );
        }else{
            $FacilityBooking = new FacilityBookingModel();
            $FacilityBooking->facility_id = $request->facility;
            $FacilityBooking->date        = $request->date;
            $FacilityBooking->month_year  = date('F-Y',strtotime($request->date));
            $FacilityBooking->time_slot   = $request->time_slot;
            $FacilityBooking->user_id     = $request->booking_id;
            $FacilityBooking->total_hour  = $interval->format('%H');      
            // $d1 = new DateTime($assigned_time);
            // $d2 = new DateTime($completed_time);
            // $interval = $d2->diff($d1);
            // $Friday_in->total_hour = $interval->format('%H');

            $FacilityBooking->booking_status = 1;
            $FacilityBooking->save();
            return response()->json( ['success' => 1,'facility_id' => $request->facility] );
        }

       
            
       
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
