<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TowerModel;
use App\Models\SubAccount;
use App\Models\MsterAccount;
use App\Models\FacilityAttendance;
use App\Models\FacilityBookingModel;




class ResidentController extends Controller
{
    public function index(){
        $towerData = TowerModel::get();
        $MasterData = MsterAccount::
        join('towers','master_account.tower_id','towers.id')
        ->join('floars','master_account.floor_id','floars.id')
        ->join('units','master_account.unit_id','units.id')
        ->select('master_account.*','towers.tower_name','towers.id as towers_id','floars.floar_name','floars.id as floars_id','units.unit_name','units.id as units_id')
        ->orderBy('id', 'DESC')
        ->get();
        return view('front.Resident.index',compact('MasterData','towerData'));
    }
    
    public function create(){
        $towerData = TowerModel::get();
        $countryCode = array("+91", "+87", "+86", "+04");
        return view('front.Resident.create',compact('towerData','countryCode'));
    }
    
    public function store(Request $request){
        
        $request->validate([
            'select_tower'  => 'required',
            'select_floor'  => 'required',
            'select_unit'   => 'required',
            'chinesename_up' => 'required',
            'englishname_up' => 'required',
            'unit_text_up'   => 'required',
            'email_up' => 'required',
            'remarks_up'    =>  'required',
            'up_account_status' => 'required',
            'country_code'      => 'required',
        ],[
            'select_tower.required'         => 'Select tower name',
            'select_floor.required'         => 'Select floor name',
            'select_unit.required'         => 'Select unit name',
            'chinesename_up.required'       =>  'Chinese name is required',
            'englishname_up.required'       =>  'English name is required',
            'select_unit_data.required'     =>  'Please Select unit fiels',
            'email_up.required'             =>  'Email name is required',
            'remarks_up.required'           =>  'Remarks name is required',
            'up_account_status.required'    => 'Status field is required',
            'country_code.required'         => 'Country code is required',
            'unit_text_up.required'                  => 'Contact number field is required',
        ]
    );

   

        $msterData  = new MsterAccount();
        $msterData->chinese_name    = $request->chinesename_up;
        $msterData->tower_id        = $request->select_tower;
        $msterData->floor_id        = $request->select_floor;
        $msterData->english_name    = $request->englishname_up;
        $msterData->unit_id         = $request->select_unit;
        $msterData->country_code    = $request->country_code;
        $msterData->text            = $request->unit_text_up;
        $msterData->email           = $request->email_up;
        $msterData->remarks         = $request->remarks_up;
        $msterData->status          = $request->up_account_status;
        $msterData->save();
        
        $i = 0;
        
        if(!empty($request->sub_chinese_name[0])){
            
            foreach($request->sub_chinese_name as $sub){
                $sub_account  = new SubAccount();
                $sub_account->master_account_id = $msterData->id;
                $sub_account->chinese_name     = $request->sub_chinese_name[$i];
                $sub_account->english_name     = $request->sub_english_name[$i];
                $sub_account->sub_country_code          = $request->sub_country_code[$i];
                $sub_account->sub_text         = $request->sub_unit_text[$i];
                $sub_account->sub_email        = $request->sub_unit_email[$i];
                $sub_account->remarks          = $request->sub_remarks[$i];
                $sub_account->sub_status       = $request->sub_status[$i];
                $sub_account->save();
            }
        }
        
        return redirect()->route('resident.index')->with('success','User Account Created Successfully!.');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $towerData = TowerModel::get();
        $countryCode = array("91", "87", "86", "04");
        $MasterData  = MsterAccount::with('subaccount')->find($id);
        $count = count($MasterData->subaccount);
        return view('front.Resident.edit',compact('towerData','MasterData','count','countryCode'));
    }

    public function update(Request $request, $id){
        
        // dd($request->all());
        $msterData  = MsterAccount::find($id);
        $msterData->chinese_name    = $request->chinesename_up;
        $msterData->tower_id        = $request->select_tower;
        $msterData->floor_id        = $request->select_floor;
        $msterData->english_name    = $request->englishname_up;
        $msterData->unit_id         = $request->select_unit;
        $msterData->country_code    = $request->country_code;
        $msterData->text            = $request->unit_text_up;
        $msterData->email           = $request->email_up;
        $msterData->remarks         = $request->remarks_up;
        $msterData->status          = $request->up_account_status;
        $msterData->save();
        
        $i = 1;
        
        if(!empty($request->sub_chinese_name[1])){
           
            foreach($request->sub_chinese_name as $sub){
                
                if(!empty($request->sub_account_id)){
                    $sub_account  =  SubAccount::find($request->sub_account_id[$i]);
                    $sub_account->master_account_id = $msterData->id;
                    $sub_account->chinese_name     = $request->sub_chinese_name[$i];
                    $sub_account->english_name     = $request->sub_english_name[$i];
                    $sub_account->sub_country_code = $request->sub_country_code[$i];
                    $sub_account->sub_text         = $request->sub_unit_text[$i];
                    $sub_account->sub_email        = $request->sub_unit_email[$i];
                    $sub_account->remarks          = $request->sub_remarks[$i];
                    $sub_account->sub_status       = $request->sub_status[$i];
                    $sub_account->save();
                }else{
                    $sub_account  =  new SubAccount;
                    $sub_account->master_account_id = $msterData->id;
                    $sub_account->chinese_name = $request->sub_chinese_name[$i];
                    $sub_account->english_name = $request->sub_english_name[$i];
                    // $sub_account->unit_id       = $request->select_sub_unit[$i];
                    $sub_account->sub_country_code = $request->sub_country_code[$i];
                    $sub_account->sub_text      = $request->sub_unit_text[$i];
                    $sub_account->sub_email     = $request->sub_unit_email[$i];
                    $sub_account->remarks       = $request->sub_remarks[$i];
                    $sub_account->sub_status    = $request->sub_status[$i];
                    $sub_account->save();
                }
            
                $i++;
            }
        }
        return redirect()->route('resident.index')->with('success','User Account Updated Successfully!.');

    }

    public function destroy($id){
        
    }

    public function resident_delete($id){
        
        SubAccount::where('master_account_id',$id)->delete();
        FacilityBookingModel::where('user_id',$id)->delete(); 
        FacilityAttendance::where('user_id',$id)->delete();
        MsterAccount::find($id)->delete();
        return redirect()->route('resident.index')->with('error','User Account Deleted Successfully!.');
    }

    public function resident_deactive($id){
        $data = MsterAccount::find($id);
        $data->status = 2;
        $data->save();
        FacilityBookingModel::where('user_id',$id)->delete(); 
        FacilityAttendance::where('user_id',$id)->delete();
        return redirect()->route('resident.index')->with('success','User Account Deactive Successfully!.');
    }
    public function resident_active($id){
        $data = MsterAccount::find($id);
        $data->status = 1;
        $data->save();
        return redirect()->route('resident.index')->with('success','User Account Active Successfully!.');
    }
}
