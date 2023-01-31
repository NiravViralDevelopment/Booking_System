<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TowerModel;
use App\Models\Floar;

class FloarController extends Controller
{
    public function index(){
        $data=Floar::join('towers','floars.tower_id','towers.id')
        ->select('floars.*','towers.tower_name')->get();
        return view('admin.floar.index',compact('data'));
    }

    public function create(){
        $data = TowerModel::get();
        return view('admin.floar.create',compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'select_tower' => 'required',
            'flor_name' => 'required',
        ],[
            'select_tower.required'     =>  'Please Select Tower Required',
            'flor_name.required'        =>  'Flor name is  Required'                 
        ]);
        
        $data=New Floar;
        $data->tower_id = $request->select_tower;
        $data->floar_name = $request->flor_name;
        $data->save();
        return redirect()->route('floar.index')->with('message','Data inserted successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = TowerModel::get();
        $flor = Floar::find($id);
        return view('admin.floar.edit',compact('data','flor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'select_tower' => 'required',
            'flor_name' => 'required',
        ],[
            'select_tower.required'     =>  'Please Select Tower Required',
            'flor_name.required'        =>  'Flor name is  Required'                 
        ]);
        
        $data=Floar::find($id);
        $data->tower_id = $request->select_tower;
        $data->floar_name = $request->flor_name;
        $data->save();
        return redirect()->route('floar.index')->with('message','Data Updated successfully.');
    }

    public function destroy($id)
    {
        $data=Floar::find($id);
        $data->delete();
        return redirect()->back()->with('error','Data deleted successfully.');
    }
}
