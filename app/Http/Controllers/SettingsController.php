<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;
class SettingsController extends Controller
{
    //
    
    public function __contruct(){
        $this->middleware('admin');
    }
    
    public function index(){
        
        $settings = Setting::first();
        return view('admin.settings.index', compact('settings'));
    }
    
    public function update(){
        
       //dd(request()->all());
        $this->validate(request(),[
            'SettingInputName' => 'required',
            'SettingInputEmail'=> 'required | email',
            'SettingInputAddress' => 'required',
            'SettingInputNumber' => 'required '
        ]);
        
        $settings = Setting::first();
        $settings->site_name = request()->SettingInputName;
        $settings->address = request()->SettingInputAddress;
        $settings->contact_email = request()->SettingInputEmail;
        $settings->contact_number = request()->SettingInputNumber;
        $settings->save();
        
        Session::flash('success', 'Settings updated successfully.');
        
        return redirect()->back();
        
    }
}
