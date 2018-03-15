<?php

namespace App\Http\Controllers;

use App\Http\Requests\case_inputRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\case_input;
use App\timeline;
use App\officer;
use App\province;


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
        $officers = officer::where('prov_id','=',$show_data->prov_id)->get();
        return view('Manager.transfer_frm',compact('show_data','officers'));
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
        $officer_id = $request->input('officer');
        $officer = $officers = officer::where('id','=',$officer_id)->first();
        case_input::where('case_id','=',$case_id)->update(['receiver_id' => "$officer_id" , 'receiver' => $officer->name]);

        return redirect('officer/show/0');
    }

    function  load_register(){
        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();
        return view('Manager.create_officer',compact('provinces'));
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'tel' => 'required|numeric|digits:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    protected function create(array $data)
    {

        return officer::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'password' => bcrypt($data['password']),
            'prov_id' => $data['prov_id'],
            'position' => $data['position'],

        ]);
    }
     function create_officer(Request $request)
    {
        $this->validator($request->all())->validate();
        $this->create($request->all());
        return redirect('officer/show/0');
    }


}
