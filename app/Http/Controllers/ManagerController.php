<?php

namespace App\Http\Controllers;

use App\Http\Requests\case_inputRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\case_input;
use App\timeline;
use App\officer;
use App\province;
use App\amphur;
use App\casetransfer;
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

    public  function transfer($case_id){
        $show_data = case_input::where('case_id','=',$case_id)->first();

        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();
    
        $of_receiver = officer::where('name','=',$show_data->receiver)->first();
        $officers = officer::where('prov_id','=',$show_data->prov_id)->get();

        return view('Manager.transfer_frm',compact('show_data', 'of_receiver','officers', 'provinces' ));
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

    public  function transfer_cfm(Request $request){
        $case_id = $request->input('case_id');
        $prev_provid = $request->input('prev_provid');

        $prev_o_username = $request->input('prev_o_username');

        $o_username = $request->input('o_username');

        $officer_id = $request->input('officer');

        $prov_id = $request->input('province');

        $amphur_id = $request->input('amphur_id');



        if($officer_id != ""){
            $officer = $officers = officer::where('id','=',$officer_id)->first();

            case_input::where('case_id','=',$case_id)->update([
                'receiver_id' => "$officer_id" , 
                'receiver' => $officer->name
            ]);
            $officername = $officer->name;
        }else{

            case_input::where('case_id','=',$case_id)->update([
                'status' => 1 , 
                'prov_id' => $prov_id , 
                'amphur_id' => $amphur_id , 
                'receiver_id' => NULL , 
                'receiver' => ""
            ]);

            $officername = NULL;

        }

        casetransfer::create([
            'case_id'=>$case_id,
            'provid'=>$prov_id,
            'prev_provid'=>$prev_provid,
            'ousername'=>$officername,
            'prev_ousername'=>$prev_o_username
        ]);

        return redirect('officer/show/0');
    }

    public function ajax_amphur($prov_id) {
        $prov_code    = $prov_id;
        $new_prov_id = province::where('PROVINCE_CODE', '=', $prov_code)->first();
        $category = amphur::where('PROVINCE_ID', '=', $new_prov_id->PROVINCE_ID)->get();
        return response()->json($category);
    }

    


}