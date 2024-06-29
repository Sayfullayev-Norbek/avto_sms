<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\Send;
use App\Service\ModmeService;

class SendController extends Controller
{
    private ModmeService $modmeService;

    public function __construct(ModmeService $modmeService)
    {
        $this->modmeService = $modmeService;
    }

    public function sendSms(Request $request){

        $data = $request->validate([
            'message' => 'required|string',
            'schedule_id_1' => 'required',
            'send_time' => 'nullable',
            'schedule_id_3' => 'required',
            'params' => 'nullable',
            'send_day' => 'nullable'
        ]);

        $token = $request->input('token');
        $company = $this->modmeService->checkToken($token);
        $company_id = $company['data']['company']['id'];
        $data['modme_company_id']  = $company_id;

        $a = $data['schedule_id_1'];

        if($a == 1){
            Schedule::create([
                'message' => $data['message'],
                'frequency' => 'dailyAt',
                'params' => $data['send_time']
            ]);
        }elseif($a == 2){
            Schedule::create([
                'message' => $data['message'],
                'frequency' => 'monthlyOn',
                'params' =>$data['send_time'],
                'send_day' => $data['send_day']
            ]);
        }else{
            Schedule::create([
                'message' => $data['message'],
                'frequency' => 'monthlyOn',
                'params' =>$data['send_time'],
                'send_day' => $data['send_day']
            ]);
        }
        
        Send::create($data);

        return redirect(route('create'))->with('token');

    }
}
