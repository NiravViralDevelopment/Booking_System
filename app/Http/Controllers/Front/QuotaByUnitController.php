<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuotaByUnit;


class QuotaByUnitController extends Controller
{
    public function index(){
        $data = QuotaByUnit::first();
        return view('front.QuotaByUnit.index',compact('data'));
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $data = QuotaByUnit::find($request->quota_by_Unit_id);
        $data->facility_enrollment_quota_per_day = $request->facility_enrollment_quota_per_day;
        $data->session_enrollment_quota_per_day = $request->session_enrollment_quota_per_day;
        $data->save();
        return redirect()->back()->with('success','Quota by Unit Updated Successfully!.');;
        
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
