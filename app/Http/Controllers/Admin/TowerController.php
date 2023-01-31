<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TowerModel;
use Illuminate\Support\Facades\App;

class TowerController extends Controller
{
    public function index(){
        $data=TowerModel::get();
        return view('admin.tower.index',compact('data'));
    }

    public function create(){
        return view('admin.tower.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'en_tower_name' => 'required',
            // 'ch_tower_name' => 'required',
        ],[
            'en_tower_name.required' =>'English name is required',
            // 'ch_tower_name.required' =>'Chinese name is required',
        ]); 

        $data = New TowerModel;
        $data->tower_name  = $request->en_tower_name;
        $data->save();
        // $data
        // ->setTranslation('tower_name', 'en', $request->en_tower_name)
        // ->setTranslation('tower_name', 'ch', $request->ch_tower_name)
        // ->save();
        return redirect()->route('tower.index')->with('message','Data inserted successfully.');

    }

    public function show($id){
        //
    }

    public function edit($id){
        $data=TowerModel::find($id);
        return view('admin.tower.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'en_tower_name' => 'required',
            // 'ch_tower_name' => 'required',
          ],[
            'en_tower_name.required' =>'English name is required',
            // 'ch_tower_name.required' =>'Chinese name is required',
          ]); 
        $data=TowerModel::find($id);
        $data->tower_name  = $request->en_tower_name;
        $data->save();
        // ->setTranslation('tower_name', 'en', $request->en_tower_name)
        // ->setTranslation('tower_name', 'ch', $request->ch_tower_name)
        // ->update();
        return redirect()->route('tower.index')->with('message','Data updated successfully.');;
    }

    public function destroy($id){
        TowerModel::where('id',$id)->delete();
        return redirect()->back()->with('error','Data deleted successfully.');
    }
    
    public function lang_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }

 
    
}
