<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Http\Requests\case_inputRequest;
use Illuminate\Support\HtmlString;

use Illuminate\Support\Str;
use App\province;
use App\amphur;
use App\case_input;
use Request;
use Auth;


class OfficerInputController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth:officer');
    }
    public function ajax_amphur($prov_id) {
        $prov_id    = $prov_id;
        $category = amphur::where('PROVINCE_ID', '=', $prov_id)->get();
        return response()->json($category);
    }
    public function gen_id(){
        do {
            $ran_al = str_random(2);
            $ran_num = STR::lower($ran_al).mt_rand(100,999);
            $new_id = $ran_num;
            //$token_key = makeRandomTokenKey();
        } while (case_input::where("case_id", "=", $new_id)->first() instanceof case_input);
        return $new_id;
    }
    public function index()
    {
        //

        //$caseinputs = new case_input();
        $provinces = province::all();
        $amphurs= amphur::where('PROVINCE_ID', '=', 1)->get();
        return view('officer.input_case',compact('provinces','amphurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(case_inputRequest $request)
    {
        //

        //$input = Request::all();
        case_input::create($request->all());
        $case_tel = Request::input('victim_tel');
        $case_update = case_input::whereraw('victim_tel = ? AND case_id IS NULL ', [$case_tel])->first();
        $new_id = $this->gen_id();
        case_input::where('id','=',$case_update->id)->update(['case_id' => $new_id , 'status' => 1]);
        return view('layout.gen_caseid',compact('new_id'));

    //return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        //
        $cases = case_input::all();

        return view('officer.OfficerManageCase',compact('cases'));

    }

    public function open_confirm($case_id)
    {
<<<<<<< Updated upstream
        $show_data = case_input::where('case_id','=',$case_id)->first();
        return view('officer.detail1',compact('show_data'));
    }

    public function accept_case($case_id , $receiver_name )
    {

        $test = case_input::findOrfail($case_id);
        $test->update(['receiver' => $receiver_name , 'status' => 2]);
        //case_input::where('case_id','=',$case_id)->update(['receiver' => $receiver_name , 'status' => 2]);
        return $this->show();
    }



=======
        //
        //$input = Request::all();
        $show_data = case_input::where('case_id','=',$case_id)->first();
        return view('officer.detail1',compact('show_data'));

        //return redirect('/');
    }


>>>>>>> Stashed changes

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
