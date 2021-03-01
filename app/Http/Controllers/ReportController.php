<?php

namespace App\Http\Controllers;

use App\Http\Requests\reportRequest;
use App\Mail\reportMail;
use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use DateTime;


class ReportController extends Controller
{

    public function index(Request $request)
     {

$sessionData = $request->session()->get('report');
$Cc = ""; 

if(is_null($sessionData)){
$tex = 'です。
本日のグループワークの内容をご報告いたします。

【本日の内容】
・(%完了)
・(%完了)
【次回の予定】
・
・
以上です。ご確認お願いいたします。';
}else{
    $tex = \old('report.text');
}

        $weeks =array('日', '月', '火', '水','木','金','土');
        $datetime = new DateTime('now');
        $week = $weeks[$datetime->format('w')];
        $date = $datetime->format('n/d');            
        return view('index',compact('date','week','Cc','tex'));
    }


    public function postreport(reportRequest $request)
    {   $validated = $request->validated();
        $request->session()->put('report',$validated);
        return redirect(route('confirm'));
    }

    public function showConfirm(Request $request)
    {   $sessionData = $request->session()->get('report');

        if(is_null($sessionData)){
            return redirect(route('index'));
        }
        $message = view('emails.report',$sessionData);
        return view('confirm',['message' => $message]);
    }

    public function postConfirm(Request $request)
    {   
        $sessionData = $request->session()->get('report');
        if(is_null($sessionData)){
            return redirect(route('index'));
        }

        $request->session()->forget('report');
        
     $Cc = explode(',',$sessionData['Cc']);

        Mail::to($sessionData['email'])
        ->cc($Cc)
        ->send(new reportMail($sessionData));
        
        return redirect(route('sent'))->with('sent_report',true);
    }

    public function showSentMessage(Request $request)
    {
        $request->session()->keep('sent_report');
        $sessionData = $request->session()->get('sent_report');
        if(is_null($sessionData)){
            return redirect(route('index'));
        }
        return view('sent');
    }
}
