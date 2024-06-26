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

        return view('welcome', compact('schedules'));
    }

    public function sendSms(Request $request){

        $data = $request->validate([
            'schedule_id' => 'required',
            'message' => 'required|string',
            'params' => 'nullable'
        ]);

        Send::create($data);

        dd($data);

    }
}
