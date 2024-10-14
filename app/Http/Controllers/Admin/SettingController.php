<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Setting;
use App\Models\User;
use App\Trait\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    use Image;
    public function settingForm()
    {
        $settings = Setting::first();
        return view('admin-panel.setting.create',compact('settings'));
    }
    
    public function userForm()
    {
        $user = User::first();
        return view('admin-panel.setting.change-credientials',compact('user'));

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

    public function changeCredientials(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => [
                'required',
                'exists:users,id'
            ],
            'first_name' => [
                'required',
                'string',
                'max:255'
            ],
            'last_name' => [
                'required',
                'string'
            ],
            'old_password' => 'required_with:new_password,confirm_password',
            'new_password' => 'required_with:old_password,confirm_password|min:8',
            'confirm_password' => 'required_with:old_password,new_password|same:new_password|min:8',
        ]);
        if($validator->fails()){
            return apiResponse(false,403, $validator->errors()->all());
        }
        $user = User::find($request->input('user_id'));
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        if (!is_null($request->input('old_password')) && !is_null($request->input('new_password')) && !is_null($request->input('confirm_password')) && Hash::check($request->input('old_password'), $user->password))
            $user->password = Hash::make($request->input('new_password'));
        $user->save();
        return apiResponse(true,200);
    }
}
