<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FacilityModel;
use App\Models\FacilityManagment;
use DateTime;
use DateTimeZone;

class facilityController extends Controller
{
    public function index(){
            $assigned_time = "10:00:00";
            $completed_time= "12:00:00";   

            $d1 = new DateTime($assigned_time);
            $d2 = new DateTime($completed_time);
            
            $interval = $d2->diff($d1);
            // dd($interval->format('%H hours'));
            

        
        $data  = FacilityModel::orderBy('id', 'DESC')->get();  
        return view('front.facility.index',compact('data'));
    }

    public function create(){
        return view('front.facility.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'title'  => 'required',
            'Content'  => 'required',
            'Remarks' => 'required',
            'monday_select_hour_first'  =>  'required',
        ],[
            'title.required'      => 'Title field is required',
            'Content.required'    => 'Content field is required',
            'Remarks.required'    => 'Remarks field is required',
            'monday_select_hour_first.required'    => 'Session field is required',
        ]);

        $facility = new FacilityModel();
        $facility->title                = $request->title;
        $facility->content              = $request->Content;
        $facility->remarks              = $request->Remarks;
        $facility->quota_per_facility   = $request->quota_per_facility;
        $facility->quota_per_session    = $request->quota_per_session;
        $facility->status               = $request->status;
        $facility->save();
        
        $m = 0;
        
        foreach($request->monday_select_hour_first as $monday_row){
            $monday = new FacilityManagment();
            $monday->_key           = 'Mon';
            $monday->facity_id      = $facility->id;
            $monday->hour_first     = $request->monday_select_hour_first[$m];
            $monday->minutes_first  = $request->monday_select_minutes_first[$m];
            $monday->hour_third     = $request->monday_select_hour_third[$m];
            $monday->minutes_four      = $request->monday_select_hour_four[$m];
            
            $assigned_time = $request->monday_select_hour_first[$m].':'.$request->monday_select_minutes_first[$m];
            $completed_time = $request->monday_select_hour_third[$m].':'.$request->monday_select_hour_four[$m];
            $d1 = new DateTime($assigned_time);
            $d2 = new DateTime($completed_time);
            $interval = $d2->diff($d1);
            $monday->total_hour = $interval->format('%H');
            $monday->save();
            $m++;
        }
        $tu = 0;
        foreach($request->Tuesday_select_hour_first as $monday_row){
            $monday = new FacilityManagment();
            $monday->_key           = 'Tue';
            $monday->facity_id      = $facility->id;
            $monday->hour_first     = $request->Tuesday_select_hour_first[$tu];
            $monday->minutes_first  = $request->Tuesday_select_minutes_first[$tu];
            $monday->hour_third     = $request->Tuesday_select_hour_third[$tu];
            $monday->minutes_four      = $request->Tuesday_select_hour_four[$tu];
            
            $assigned_time = $request->Tuesday_select_hour_first[$tu].':'.$request->Tuesday_select_minutes_first[$tu];
            $completed_time = $request->Tuesday_select_hour_third[$tu].':'.$request->Tuesday_select_hour_four[$tu];
            $d1 = new DateTime($assigned_time);
            $d2 = new DateTime($completed_time);
            $interval = $d2->diff($d1);
            $monday->total_hour = $interval->format('%H');

            $monday->save();
            $tu++;
        }
        $we = 0;
        foreach($request->Wednesday_select_hour_first as $monday_row){
            $monday = new FacilityManagment();
            $monday->_key           = 'Wed';
            $monday->facity_id      = $facility->id;
            $monday->hour_first     = $request->Wednesday_select_hour_first[$we];
            $monday->minutes_first  = $request->Wednesday_select_minutes_first[$we];
            $monday->hour_third     = $request->Wednesday_select_hour_third[$we];
            $monday->minutes_four      = $request->Wednesday_select_hour_four[$we];

            $assigned_time = $request->Wednesday_select_hour_first[$we].':'.$request->Wednesday_select_minutes_first[$we];
            $completed_time = $request->Wednesday_select_hour_third[$we].':'.$request->Wednesday_select_hour_four[$we];
            $d1 = new DateTime($assigned_time);
            $d2 = new DateTime($completed_time);
            $interval = $d2->diff($d1);
            $monday->total_hour = $interval->format('%H');

            $monday->save();
            $we++;
        }
        $thu = 0;
        foreach($request->Thursday_select_hour_first as $monday_row){
           
            $monday = new FacilityManagment();
            $monday->_key           = 'Thu';
            $monday->facity_id      = $facility->id;
            $monday->hour_first     = $request->Thursday_select_hour_first[$thu];
            $monday->minutes_first  = $request->Thursday_select_minutes_first[$thu];
            $monday->hour_third     = $request->Thursday_select_hour_third[$thu];
            $monday->minutes_four      = $request->Thursday_select_hour_four[$thu];

            $assigned_time = $request->Thursday_select_hour_first[$thu].':'.$request->Thursday_select_minutes_first[$thu];
            $completed_time = $request->Thursday_select_hour_third[$thu].':'.$request->Thursday_select_hour_four[$thu];
            $d1 = new DateTime($assigned_time);
            $d2 = new DateTime($completed_time);
            $interval = $d2->diff($d1);
            $monday->total_hour = $interval->format('%H');

            $monday->save();
            $thu++;
        }
        $fri = 0;
        foreach($request->Friday_select_hour_first as $monday_row){
           
            $monday = new FacilityManagment();
            $monday->_key           = 'Fri';
            $monday->facity_id      = $facility->id;
            $monday->hour_first     = $request->Friday_select_hour_first[$fri];
            $monday->minutes_first  = $request->Friday_select_minutes_first[$fri];
            $monday->hour_third     = $request->Friday_select_hour_third[$fri];
            $monday->minutes_four      = $request->Friday_select_hour_four[$fri];

            $assigned_time = $request->Friday_select_hour_first[$fri].':'.$request->Friday_select_minutes_first[$fri];
            $completed_time = $request->Friday_select_hour_third[$fri].':'.$request->Friday_select_hour_four[$fri];
            $d1 = new DateTime($assigned_time);
            $d2 = new DateTime($completed_time);
            $interval = $d2->diff($d1);
            $monday->total_hour = $interval->format('%H');

            $monday->save();
            $fri++;
        }
        $strdy = 0;
        foreach($request->Saturday_select_hour_first as $monday_row){
           
            $monday = new FacilityManagment();
            $monday->_key           = 'Sat';
            $monday->facity_id      = $facility->id;
            $monday->hour_first     = $request->Saturday_select_hour_first[$strdy];
            $monday->minutes_first  = $request->Saturday_select_minutes_first[$strdy];
            $monday->hour_third     = $request->Saturday_select_hour_third[$strdy];
            $monday->minutes_four      = $request->Saturday_select_hour_four[$strdy];

            $assigned_time = $request->Saturday_select_hour_first[$strdy].':'.$request->Saturday_select_minutes_first[$strdy];
            $completed_time = $request->Saturday_select_hour_third[$strdy].':'.$request->Saturday_select_hour_four[$strdy];
            $d1 = new DateTime($assigned_time);
            $d2 = new DateTime($completed_time);
            $interval = $d2->diff($d1);
            $monday->total_hour = $interval->format('%H');

            $monday->save();
            $strdy++;
        }
        $sundy = 0;
        foreach($request->Sunday_select_hour_first as $monday_row){
           
            $monday = new FacilityManagment();
            $monday->_key           = 'Sun';
            $monday->facity_id      = $facility->id;
            $monday->hour_first     = $request->Sunday_select_hour_first[$sundy];
            $monday->minutes_first  = $request->Sunday_select_minutes_first[$sundy];
            $monday->hour_third     = $request->Sunday_select_hour_third[$sundy];
            $monday->minutes_four      = $request->Sunday_select_hour_four[$sundy];

            $assigned_time = $request->Sunday_select_hour_first[$sundy].':'.$request->Sunday_select_minutes_first[$sundy];
            $completed_time = $request->Sunday_select_hour_third[$sundy].':'.$request->Sunday_select_hour_four[$sundy];
            $d1 = new DateTime($assigned_time);
            $d2 = new DateTime($completed_time);
            $interval = $d2->diff($d1);
            $monday->total_hour = $interval->format('%H');

            $monday->save();
            $sundy++;
        }
        return redirect()->route('facility.index')->with('success','Facility Created Successfully!.');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $data  = FacilityModel::with('FacilityManagment')->find($id);
        $Moncount = FacilityManagment::where('_key','Mon')->where('facity_id',$id)->count()-1;
        // dd($Moncount);
        $tucount = FacilityManagment::where('_key','Tue')->where('facity_id',$id)->count()-1;
        $wecount = FacilityManagment::where('_key','Wed')->where('facity_id',$id)->count()-1;
        $thucount = FacilityManagment::where('_key','Thu')->where('facity_id',$id)->count()-1;
        $fricount = FacilityManagment::where('_key','Fri')->where('facity_id',$id)->count()-1;
        $strdycount = FacilityManagment::where('_key','Sat')->where('facity_id',$id)->count()-1;
        $sundycount = FacilityManagment::where('_key','Sun')->where('facity_id',$id)->count()-1;
        return view('front.facility.edit',compact('data','Moncount','tucount','wecount','thucount','fricount','strdycount','sundycount')); 
    }

    public function update(Request $request, $id){
        // dd($request->all());

        $request->validate([
            'title'  => 'required',
            'Content'  => 'required',
            'Remarks' => 'required',
            
        ],[
            'title.required'      => 'Title field is required',
            'Content.required'    => 'Content field is required',
            'Remarks.required'    => 'Remarks field is required',
            
        ]);

        $facility = FacilityModel::find($id);
        $facility->title                = $request->title;
        $facility->content              = $request->Content;
        $facility->remarks              = $request->Remarks;
        $facility->quota_per_facility   = $request->quota_per_facility;
        $facility->quota_per_session    = $request->quota_per_session;
        $facility->status               = $request->status;
        $facility->save();
        
        $m = 0;
        foreach($request->monday_select_hour_first as $monday_row){
            
            $monday = FacilityManagment::find($request->monday_id[$m]);
            if(!empty($monday)){
                $monday->_key           = 'Mon';
                $monday->facity_id      = $facility->id;
                $monday->hour_first     = $request->monday_select_hour_first[$m];
                $monday->minutes_first  = $request->monday_select_minutes_first[$m];
                $monday->hour_third     = $request->monday_select_hour_third[$m];
                $monday->minutes_four   = $request->monday_select_hour_four[$m];

                $assigned_time = $request->monday_select_hour_first[$m].':'.$request->monday_select_minutes_first[$m];
                $completed_time = $request->monday_select_hour_third[$m].':'.$request->monday_select_hour_four[$m];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $monday->total_hour = $interval->format('%H');

                $monday->update();
            }else{
                $monday_in = new FacilityManagment();
                $monday_in->_key           = 'Mon';
                $monday_in->facity_id      = $facility->id;
                $monday_in->hour_first     = $request->monday_select_hour_first[$m];
                $monday_in->minutes_first  = $request->monday_select_minutes_first[$m];
                $monday_in->hour_third     = $request->monday_select_hour_third[$m];
                $monday_in->minutes_four      = $request->monday_select_hour_four[$m];

                $assigned_time = $request->monday_select_hour_first[$m].':'.$request->monday_select_minutes_first[$m];
                $completed_time = $request->monday_select_hour_third[$m].':'.$request->monday_select_hour_four[$m];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $monday_in->total_hour = $interval->format('%H');

                $monday_in->save();
            }
            $m++;
        }
        
        $tu = 0;
        foreach($request->Tuesday_select_hour_first as $monday_row){
            $Tuesday = FacilityManagment::find($request->Tuesday_id[$tu]);
            if(!empty($Tuesday)){
                $Tuesday->hour_first     = $request->Tuesday_select_hour_first[$tu];
                $Tuesday->minutes_first  = $request->Tuesday_select_minutes_first[$tu];
                $Tuesday->hour_third     = $request->Tuesday_select_hour_third[$tu];
                $Tuesday->minutes_four   = $request->Tuesday_select_hour_four[$tu];

                $assigned_time = $request->Tuesday_select_hour_first[$tu].':'.$request->Tuesday_select_minutes_first[$tu];
                $completed_time = $request->Tuesday_select_hour_third[$tu].':'.$request->Tuesday_select_hour_four[$tu];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Tuesday->total_hour = $interval->format('%H');

                $Tuesday->save();
            }else{
                $Tuesday_in = new FacilityManagment();
                $Tuesday_in->_key           = 'Tue';
                $Tuesday_in->facity_id      = $facility->id;
                $Tuesday_in->hour_first     = $request->Tuesday_select_hour_first[$tu];
                $Tuesday_in->minutes_first  = $request->Tuesday_select_minutes_first[$tu];
                $Tuesday_in->hour_third     = $request->Tuesday_select_hour_third[$tu];
                $Tuesday_in->minutes_four   = $request->Tuesday_select_hour_four[$tu];

                $assigned_time = $request->Tuesday_select_hour_first[$tu].':'.$request->Tuesday_select_minutes_first[$tu];
                $completed_time = $request->Tuesday_select_hour_third[$tu].':'.$request->Tuesday_select_hour_four[$tu];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Tuesday_in->total_hour = $interval->format('%H');

                $Tuesday_in->save();
            }
            $tu++;
        }

        $we = 0;
        foreach($request->Wednesday_select_hour_first as $monday_row){
            $Wednesday = FacilityManagment::find($request->Wednesday_id[$we]);
            if(!empty($Wednesday)){
                $Wednesday->hour_first     = $request->Wednesday_select_hour_first[$we];
                $Wednesday->minutes_first  = $request->Wednesday_select_minutes_first[$we];
                $Wednesday->hour_third     = $request->Wednesday_select_hour_third[$we];
                $Wednesday->minutes_four   = $request->Wednesday_select_hour_four[$we];

                $assigned_time = $request->Wednesday_select_hour_first[$we].':'.$request->Wednesday_select_minutes_first[$we];
                $completed_time = $request->Wednesday_select_hour_third[$we].':'.$request->Wednesday_select_hour_four[$we];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Wednesday->total_hour = $interval->format('%H');

                $Wednesday->save();
            }else{
                $Wednesday_in = new FacilityManagment();
                $Wednesday_in->_key           = 'Wed';
                $Wednesday_in->facity_id      = $facility->id;
                $Wednesday_in->hour_first     = $request->Wednesday_select_hour_first[$we];
                $Wednesday_in->minutes_first  = $request->Wednesday_select_minutes_first[$we];
                $Wednesday_in->hour_third     = $request->Wednesday_select_hour_third[$we];
                $Wednesday_in->minutes_four   = $request->Wednesday_select_hour_four[$we];

                $assigned_time = $request->Wednesday_select_hour_first[$we].':'.$request->Wednesday_select_minutes_first[$we];
                $completed_time = $request->Wednesday_select_hour_third[$we].':'.$request->Wednesday_select_hour_four[$we];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Wednesday_in->total_hour = $interval->format('%H');

                $Wednesday_in->save();
            }
           
            $we++;
        }
        $thu = 0;
        foreach($request->Thursday_select_hour_first as $monday_row){
           
            $Thursday = FacilityManagment::find($request->Thursday_id[$thu]);
            if(!empty($Thursday)){
                $Thursday->hour_first     = $request->Thursday_select_hour_first[$thu];
                $Thursday->minutes_first  = $request->Thursday_select_minutes_first[$thu];
                $Thursday->hour_third     = $request->Thursday_select_hour_third[$thu];
                $Thursday->minutes_four      = $request->Thursday_select_hour_four[$thu];

                $assigned_time = $request->Thursday_select_hour_first[$thu].':'.$request->Thursday_select_minutes_first[$thu];
                $completed_time = $request->Thursday_select_hour_third[$thu].':'.$request->Thursday_select_hour_four[$thu];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Thursday->total_hour = $interval->format('%H');

                $Thursday->save();
            }else{
                $Thursday_in = new FacilityManagment();
                $Thursday_in->_key           = 'Thu';
                $Thursday_in->facity_id      = $facility->id;
                $Thursday_in->hour_first     = $request->Thursday_select_hour_first[$thu];
                $Thursday_in->minutes_first  = $request->Thursday_select_minutes_first[$thu];
                $Thursday_in->hour_third     = $request->Thursday_select_hour_third[$thu];
                $Thursday_in->minutes_four      = $request->Thursday_select_hour_four[$thu];

                $assigned_time = $request->Thursday_select_hour_first[$thu].':'.$request->Thursday_select_minutes_first[$thu];
                $completed_time = $request->Thursday_select_hour_third[$thu].':'.$request->Thursday_select_hour_four[$thu];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Thursday_in->total_hour = $interval->format('%H');

                $Thursday_in->save();
            }
            $thu++;
        }
        $fri = 0;
        foreach($request->Friday_select_hour_first as $monday_row){
           
            $Friday = FacilityManagment::find($request->Friday_id[$fri]);
            if(!empty($Friday)){
                $Friday->hour_first     = $request->Friday_select_hour_first[$fri];
                $Friday->minutes_first  = $request->Friday_select_minutes_first[$fri];
                $Friday->hour_third     = $request->Friday_select_hour_third[$fri];
                $Friday->minutes_four      = $request->Friday_select_hour_four[$fri];

                $assigned_time = $request->Friday_select_hour_first[$fri].':'.$request->Friday_select_minutes_first[$fri];
                $completed_time = $request->Friday_select_hour_third[$fri].':'.$request->Friday_select_hour_four[$fri];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Friday->total_hour = $interval->format('%H');

                $Friday->save();
            }else{
                $Friday_in = new FacilityManagment();
                $Friday_in->_key           = 'Fri';
                $Friday_in->facity_id      = $facility->id;
                $Friday_in->hour_first     = $request->Friday_select_hour_first[$fri];
                $Friday_in->minutes_first  = $request->Friday_select_minutes_first[$fri];
                $Friday_in->hour_third     = $request->Friday_select_hour_third[$fri];
                $Friday_in->minutes_four      = $request->Friday_select_hour_four[$fri];

                $assigned_time = $request->Friday_select_hour_first[$fri].':'.$request->Friday_select_minutes_first[$fri];
                $completed_time = $request->Friday_select_hour_third[$fri].':'.$request->Friday_select_hour_four[$fri];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Friday_in->total_hour = $interval->format('%H');

                $Friday_in->save();
            }
            $fri++;
        }
        $strdy = 0;
        foreach($request->Saturday_select_hour_first as $monday_row){
           
            $Saturday = FacilityManagment::find($request->Saturday_id[$strdy]);
            if(!empty($Saturday)){
                $Saturday->hour_first     = $request->Saturday_select_hour_first[$strdy];
                $Saturday->minutes_first  = $request->Saturday_select_minutes_first[$strdy];
                $Saturday->hour_third     = $request->Saturday_select_hour_third[$strdy];
                $Saturday->minutes_four      = $request->Saturday_select_hour_four[$strdy];

                $assigned_time = $request->Saturday_select_hour_first[$strdy].':'.$request->Saturday_select_minutes_first[$strdy];
                $completed_time = $request->Saturday_select_hour_third[$strdy].':'.$request->Saturday_select_hour_four[$strdy];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Saturday->total_hour = $interval->format('%H');

                $Saturday->save();
            }else{
                $Saturday_in = new FacilityManagment();
                $Saturday_in->_key           = 'Sat';
                $Saturday_in->facity_id      = $facility->id;
                $Saturday_in->hour_first     = $request->Saturday_select_hour_first[$strdy];
                $Saturday_in->minutes_first  = $request->Saturday_select_minutes_first[$strdy];
                $Saturday_in->hour_third     = $request->Saturday_select_hour_third[$strdy];
                $Saturday_in->minutes_four      = $request->Saturday_select_hour_four[$strdy];

                $assigned_time = $request->Saturday_select_hour_first[$strdy].':'.$request->Saturday_select_minutes_first[$strdy];
                $completed_time = $request->Saturday_select_hour_third[$strdy].':'.$request->Saturday_select_hour_four[$strdy];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Saturday_in->total_hour = $interval->format('%H');

                $Saturday_in->save();
            }
            $strdy++;
        }
        $sundy = 0;
        foreach($request->Sunday_select_hour_first as $Sunday_row){
           
            $Sunday_id = FacilityManagment::find($request->Sunday_id[$sundy]);
            if(!empty($Sunday_id)){
                $Sunday_id->hour_first     = $request->Sunday_select_hour_first[$sundy];
                $Sunday_id->minutes_first  = $request->Sunday_select_minutes_first[$sundy];
                $Sunday_id->hour_third     = $request->Sunday_select_hour_third[$sundy];
                $Sunday_id->minutes_four   = $request->Sunday_select_hour_four[$sundy];

                $assigned_time = $request->Sunday_select_hour_first[$sundy].':'.$request->Sunday_select_minutes_first[$sundy];
                $completed_time = $request->Sunday_select_hour_third[$sundy].':'.$request->Sunday_select_hour_four[$sundy];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Sunday_id->total_hour = $interval->format('%H');

                $Sunday_id->save();
            }else{
                $Sunday_in = new FacilityManagment();
                $Sunday_in->_key        = 'Sun';
                $Sunday_in->facity_id   = $facility->id;
                $Sunday_in->hour_first     = $request->Sunday_select_hour_first[$sundy];
                $Sunday_in->minutes_first  = $request->Sunday_select_minutes_first[$sundy];
                $Sunday_in->hour_third     = $request->Sunday_select_hour_third[$sundy];
                $Sunday_in->minutes_four    = $request->Sunday_select_hour_four[$sundy];

                $assigned_time = $request->Sunday_select_hour_first[$sundy].':'.$request->Sunday_select_minutes_first[$sundy];
                $completed_time = $request->Sunday_select_hour_third[$sundy].':'.$request->Sunday_select_hour_four[$sundy];
                $d1 = new DateTime($assigned_time);
                $d2 = new DateTime($completed_time);
                $interval = $d2->diff($d1);
                $Sunday_in->total_hour = $interval->format('%H');
                $Sunday_in->save();
            }
            
            $sundy++;
        }
        return redirect()->route('facility.index')->with('success','Facility Updated Successfully!.');

    }

    public function destroy($id){
        $monday = FacilityManagment::find($id);
        $monday->delete();
        return redirect()->back()->with('error','Facility session Deleted Successfully!.');;
    } 
    
    public function facility_delete($id){
        FacilityManagment::where('facity_id',$id)->delete();
        FacilityModel::find($id)->delete();
        return redirect()->route('facility.index')->with('error','Facility Deleted Successfully!.');
    }
}
