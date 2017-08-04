<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\case_input;

class OfficerUpdateController extends Controller
{
    //

    public function accept_case(Request $request)
    {
        //var_dump($_POST);
       // var_dump($request->case_id);

        $case_id = $request->input('case_id');
        $receiver_name = $request->input('receiver');
        case_input::where('case_id','=',$case_id)->update(['receiver' => $receiver_name , 'status' => 2]);
        return redirect('officer/show');

    }
}
