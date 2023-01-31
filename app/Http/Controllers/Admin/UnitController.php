<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TowerModel;
use App\Models\Floar;
use App\Models\UnitModel;


class UnitController extends Controller
{
    public function index(){
        $data = UnitModel::
        join('towers','units.tower_id','towers.id')
        ->join('floars','units.floar_id','floars.id')
        ->select('units.*','towers.tower_name','floars.floar_name')->get();
        return view('admin.unit.index',compact('data'));
    }

    public function create(){
        $data = TowerModel::get();
        return view('admin.unit.create',compact('data'));
    }

    public function store(Request $request){

        $request->validate([
            'select_tower' => 'required',
            'select_flor' => 'required',
            'unit_name' => 'required',
        ],[
            'select_tower.required'     =>  'Please Select Tower Required',
            'select_flor.required'     =>  'Please Select Floar Required',
            'unit_name.required'        =>  'Unit name is  Required'                 
        ]);
        $data  = new UnitModel();
        $data->tower_id   = $request->select_tower;
        $data->floar_id   = $request->select_flor;
        $data->unit_name   = $request->unit_name;
        $data->save();
        return redirect()->route('unit.index')->with('message','Data Updated successfully.');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $unit_data = UnitModel::find($id);
        $data = TowerModel::get();
        return view('admin.unit.edit',compact('unit_data','data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'select_tower' => 'required',
            'select_flor' => 'required',
            'unit_name' => 'required',
        ],[
            'select_tower.required'     =>  'Please Select Tower Required',
            'select_flor.required'     =>  'Please Select Floar Required',
            'unit_name.required'        =>  'Unit name is  Required'                 
        ]);
        $data  = UnitModel::find($id);
        $data->tower_id   = $request->select_tower;
        $data->floar_id   = $request->select_flor;
        $data->unit_name   = $request->unit_name;
        $data->save();
        return redirect()->route('unit.index')->with('message','Data Updated successfully.');
    }

    public function destroy($id){
        $data  = UnitModel::find($id);
        $data->delete();
        return redirect()->back()->with('error','Data deleted successfully.');
    }

    public function get_flor($id){
        $flor = Floar::where('tower_id',$id)->get();
        return response()->json($flor);
    }

    public function get_unit($id){
        $unitData  = UnitModel::where('floar_id',$id)->get();
        return response()->json($unitData);
    }
}
