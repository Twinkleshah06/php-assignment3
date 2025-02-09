<?php
namespace App\Http\Controllers;

use App\Services\SmsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function sendSms(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'message' => 'required',
        ]);

        $response = $this->smsService->sendSms($request->phone_number, $request->message);

        return back()->with('status', $response);
    }

    public function showForm()
    {
        return view('sms.form');
    }
}

