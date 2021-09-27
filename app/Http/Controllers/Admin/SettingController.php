<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function save(Request $req)
    {
        // dd($req->all());
        foreach ($req->except('_token') as $key => $value) {
            $setting = Setting::whereName($key)->first() ?? new Setting();
            if ($req->hasFile($key)) {
                $image_path =  uploadFile($req->$key, 'uploads/cms',);
                $setting->name = $key;
                $setting->value = $image_path;
                $setting->save();
            } else{
                $setting->name = $key;
                $setting->value = $value;
                $setting->save();
            }
        }
        $msg = 'Settings Updated Successfully';
        return redirect()->back()->with('success', $msg);
    }

    public function general()
    {

        // dd($list);
        return view('admin.setting.general', get_defined_vars());
    }
    public function home()
    {
        // dd($list);
        return view('admin.setting.home', get_defined_vars());
    }
    public function social()
    {
        // dd($list);
        return view('admin.setting.social', get_defined_vars());
    }
    public function about_us()
    {
        // dd($list);
        return view('admin.setting.about_us', get_defined_vars());
    }
    public function terms()
    {
        return view('admin.setting.terms', get_defined_vars());
    }
    public function privacy()
    {
        return view('admin.setting.privacy', get_defined_vars());
    }
}
