<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class SettingController extends Controller
{
    public function toggle()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create([
                'voting_open' => true,
            ]);
        } else {
            $setting->voting_open = !$setting->voting_open;
            $setting->save();
        }

        return redirect()->back()->with('success', 'Status voting berhasil diubah.');
    }
}