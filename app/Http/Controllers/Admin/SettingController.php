<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Setting;
use App\Trait\Image;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use Image;
    public function settingForm()
    {
        $settings = Setting::first();
        return view('admin-panel.setting.create',compact('settings'));
    }

    public function store( Request $request )
    {
        $data = $request->all();
        if(array_key_exists('setting_id',$data))
            $setting = Setting::find($data['setting_id']);
        else
            $setting = new Setting();
        if( $setting->logo !=  $request->file('logo')->getClientOriginalName())
            $this->deleteImage( $setting->logo,Setting::PATH );
        $setting->logo = ($setting->logo !=  $request->file('logo')->getClientOriginalName()) ? $this->storeImage($data['logo'], 'setting') : $setting->logo;
        $setting->social_url = json_encode([
            'fb_url' => $data['fb_url'],
            'insta_url' => $data['insta_url'],
            'youtube_url' => $data['youtube_url'],
            'linkedin_url' => $data['linkedin_url'],
        ]);
        $setting->save();
        return apiResponse(200,true,"Settings ");
    }
}
