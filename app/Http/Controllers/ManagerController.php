<?php

namespace App\Http\Controllers;

use App\Http\Requests\case_inputRequest;
use Illuminate\Http\Request;

use App\case_input;
use App\timeline;

use Auth;



class ManagerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:officer');
    }
    public  function reject($case_id){
        $show_data = case_input::where('case_id','=',$case_id)->first();
        return view('Manager.reject_frm',compact('show_data'));
    }

    public  function reject_cfm(Request $request){
        $case_id = $request->input('case_id');
        $reason = $request->input('reason');
        case_input::where('case_id','=',$case_id)->update(['reject_reason' => "$reason" , 'status' => 99]);
        timeline::create(['case_id'=>$case_id,
            'operate_status'=>99,
        ]);
        return redirect('officer/show/0');
    }
}
