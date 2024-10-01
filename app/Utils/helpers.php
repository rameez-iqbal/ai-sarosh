<?php

use App\Models\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
    //200 => ok
    //201 => Created
    //400 => Bad Request
    //401 => Unauthorized
    //403 => Forbidden
    //404 => Not Found
    //408 => Timeout Error
    //500 => Internal Server Error

    if (!function_exists('apiResponse')) {
        function apiResponse($status, $code, $data = null)
        {
            return response()->json([
                'status'    => $status,
                'code'      => $code,
                'data'      => $data,
            ]);
        }
    }

    if (! function_exists('updatePassword')) {
        function updatePassword($user, $data)
        {
            if (Hash::check($data['password'], $user->password)) {
                $user->password = Hash::make($data['new_password']);
                $user->save();
                return true;
            } else {
                return false;
            }
        }
    }

    if (!function_exists('editDateColumn')) {

        function editDateColumn($date)
        {
            $date = new Carbon($date);
            return $date->format('h:i A d/M/Y');
        }
    }
    
    if (!function_exists('editDate')) {

        function editDate($date)
        {
            $date = new Carbon($date);
            return $date->format('d/M/Y');
        }
    }

    if( ! function_exists('generateSlug') )
    {
        function generateSlug( object $model , $title, $column='name' )
        {
            $slug = Str::slug($title);
            $count = 1;
            while($model::where($column,$slug)->exists())
            {
                $slug = Str::slug($title).'-'.$count;
                $count++;
            }
            return $slug;
        }
    }

?>