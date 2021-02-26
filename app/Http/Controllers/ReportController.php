<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\reportRequest;
use DateTime;

class ReportController extends Controller
{
    public function index() {
     $weeks =array('日', '月', '火', '水','木','金','土');
     $datetime = new DateTime('now');
     $week = $weeks[$datetime->format('w')];
     $date = $datetime->format('n/d');
     
      return view('index',compact('date','week'));
    }

    public function postreport(reportRequest $request)
    {   $validated = $request->validated();
        $request->session()->put('report',$validated);
        return redirect(route('confirm'));
    }

    public function showConfirm(Request $request)
    {
        $sessionData = $request->session()->get('report');
        $message = view('emails.report',$sessionData);
        return view('comfirm',['message' => $message]);
    }
}
