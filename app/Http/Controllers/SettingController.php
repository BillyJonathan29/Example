<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function profile()
    {
        return view('setting.profile', 
        [
            'title' => 'Profile',
            'breadcrumbs' => [
                [
                    'title' => 'Setting',
                    'link' => 'javascript:void(0)'
                ],
                [
                    'title' => 'Profile',
                    'link' => route('setting.profile')
                ]
            ]
        ]);
    }
}
