<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Send;

class SendController extends Controller
{
    public function showForm()
    {
        $schedules = Schedule::all();
        $sends = Send::all();
        return view('welcome', compact('schedules', 'sends'));
    }

    public function sendSms(Request $request){

        dd($request);

        $data = $request->validate([
            'schedule_id' => 'required',
            'message' => 'required|string',
            'params' => 'nullable'
        ]);

        Send::create($data);

        return redirect(route('sms.form'));

    }
}
