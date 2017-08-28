<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Http\Requests\case_inputRequest;
use App\operate_detail;
use Illuminate\Support\HtmlString;

use Illuminate\Support\Str;
use App\province;
use App\amphur;
use App\case_input;
use App\add_detail;
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
        $prov_code    = $prov_id;
        $new_prov_id = province::where('PROVINCE_CODE', '=', $prov_code)->first();
        $category = amphur::where('PROVINCE_ID', '=', $new_prov_id->PROVINCE_ID)->get();
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
        $new_id = $this->gen_id();
        return view('officer.input_case',compact('provinces','amphurs', 'new_id'));
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

        case_input::create($request->all());
        $case_id = Request::input('case_id');
        case_input::where('case_id','=',$case_id)->update([ 'status' => 1]);
        return view('layout.gen_caseid',compact('case_id'));

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
        $cases = case_input::all();
        return view('officer.OfficerManageCase',compact('cases'));
    }

    public function open_confirm($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
         return view('officer.detail1',compact('show_data'));
    }
    public function add_detail($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        return view('officer.detail2',compact('show_data'));
    }
    public function edit_detail($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $show_detail = add_detail::where('case_id','=',$case_id)->first();
        return view('officer.detail2',compact('show_data', 'show_detail'));
    }
    public function add_activities($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $provinces = province::all();
        $activities = operate_detail::all();
        return view('officer.activities',compact('show_data', 'provinces',$activities));
    }


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
