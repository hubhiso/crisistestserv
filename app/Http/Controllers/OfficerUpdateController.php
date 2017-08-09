<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\case_input;
use App\add_detail;

class OfficerUpdateController extends Controller
{
    //

    public function accept_case(Request $request)
    {

        $case_id = $request->input('case_id');
        $receiver_name = $request->input('receiver');
        case_input::where('case_id','=',$case_id)->update(['receiver' => $receiver_name , 'status' => 2]);
        return redirect('officer/show');

    }
    public function add_detail(Request $request)
    {
        //var_dump($request->input('birthdate'));
        foreach ($request->input() as $key => $value) {
            if (empty($value)) {
                $request->request->set($key, null);
            }
        }
        $case_id = $request->input('case_id');
        $birth_date = date('Y-m-d',strtotime(str_replace('-','/', $request->input('birthdate'))));
        $temp_chk1 = $request->input('law');
        $temp_chk2 = $request->input('aids');
        $temp_chk3 = $request->input('attitude');
        $temp_chk4 = $request->input('policy');
        $temp_chk5 = $request->input('etc');
        $chk1=1;
        $chk2=1;
        $chk3=1;
        $chk4=1;
        $chk5=1;
        if(!isset($temp_chk1)){
            $chk1 = 0;
        }
        if(!isset($temp_chk2)){
            $chk2 = 0;
        }
        if(!isset($temp_chk3)){
            $chk3 = 0;
        }
        if(!isset($temp_chk4)){
            $chk4 = 0;
        }
        if(!isset($temp_chk5)){
            $chk5 = 0;
        }

        case_input::where('case_id','=',$case_id)->update([ 'status' => 3,
                                                            'name' => $request->input('name'),
                                                            'tel' => $request->input('tel'),
                                                            'sex' => $request->input('sex'),
                                                            'detail' => $request->input('detail')]);
        add_detail::create(
            ['case_id'=>$case_id,
            'birth_date'=>$birth_date,
            'age'=>$request->input('age'),
            'current_status'=>$request->input('marital-status'),
            'occupation'=>$request->input('occupation'),
            'occupation_detail'=>$request->input('occupation_detail'),
            'address'=>$request->input('address'),
            'card_type'=>$request->input('card_type'),
            'card_number'=>$request->input('card_num'),
            'type_offender'=>$request->input('offender_type'),
            'subtype_offender'=>$request->input('offender_subtype'),
            'violator_name'=>$request->input('violator_name'),
            'violator_organization'=>$request->input('violator_organization'),
            'offender_organization'=>$request->input('offender_organization'),
            'accident_location'=>$request->input('accident_location'),
            'accident_time'=>$request->input('accident_time'),
            'violation_characteristics'=>$request->input('violation_characteristics'),
            'effect'=>$request->input('effect'),
            'cause_type1'=>$chk1,
            'cause_type2'=>$chk2,
            'cause_type3'=>$chk3,
            'cause_type4'=>$chk4,
            'etc'=>$chk5,
            'etc_detail'=>$request->input('etc_detail')]
        );
        return redirect('officer/show');
    }
}
