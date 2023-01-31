<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TowerModel;
use App\Models\SettingModel;

class SettingDataController extends Controller
{
    public function index(){
        $data = SettingModel::get();
        return view('admin.SettingData.index',compact('data'));
    }

    public function create(){
        return view('admin.SettingData.create');
    }

    public function store(Request $request){
       $data = new SettingModel;
       $en_uploaded = '';

       if ($request->hasFile('image')){
            $image = $request->file('image');
            $en_uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $en_uploaded);
        }
        $data->_key = $request->key;
        $data->title = $request->title;
        $data->details = $request->details;
        $data->image = $en_uploaded;
        $data->save();
        return redirect()->route('setting.index')->with('message','Data inserted successfully.');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $data  = SettingModel::find($id);
        return view('admin.SettingData.edit',compact('data'));
    }

    public function update(Request $request, $id){

        $data  = SettingModel::find($id);
        $en_uploaded = $data->image;
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $en_uploaded = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/all_image');
            $image->move($destinationPath, $en_uploaded);
        }
        $data->title = $request->title;
        $data->details = $request->details;
        $data->image = $en_uploaded;
        $data->save();
        return redirect()->route('setting.index')->with('message','Data Updated successfully.');
        
    }

    public function setting_delete($id){
        $data  = SettingModel::find($id);
        $data->delete();
        return redirect()->back()->with('error','Data deleted successfully.');
    }

    public function destroy($id){
        //
    }
}
