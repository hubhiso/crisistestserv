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
use App\timeline;
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
        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();;
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
        timeline::create(['case_id'=>$case_id,
            'operate_status'=>1,
            'operate_time'=> date("Y-m-d")
        ]);
        return view('layout.gen_caseid',compact('case_id'));

    //return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($mode_id)
    {
       //  $cases = case_input::all();
        //return view('officer.OfficerManageCase',compact('cases'));
      //  return View::make('officer.OfficerManageCase', $mode_id);
       // return view('officer.OfficerManageCase')->withMode($mode_id);
        return view('officer.OfficerManageCase',compact('mode_id'));
    }

    public function open_confirm($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
         return view('officer.detail1',compact('show_data'));
    }
    public function open_detail($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $timelines = timeline::where('case_id','=',$case_id)->get();
        return view('officer.view_only',compact('show_data','timelines'));
    }
    public function add_detail($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        return view('officer.detail2',compact('show_data'));
    }

    public function edit_detail2($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $show_detail = add_detail::where('case_id','=',$case_id)->first();
        return view('officer.edit_detail2',compact('show_data', 'show_detail'));
    }
    public function add_activities($case_id)
    {
        $show_data = case_input::where('case_id','=',$case_id)->first();
        $provinces = province::all();
        return view('officer.activities',compact('show_data', 'provinces'));
    }
    public function edit_operate($operate_id)
    {
        $operate_datas = operate_detail::where('id','=',$operate_id)->get();
        $html = view('officer._edit_operate',compact('operate_datas'))->render();
        return response()->json(compact('html'));
    }
    public function load_activities_table($case_id)
    {
        $activities = operate_detail::where('case_id','=',$case_id)->orderBy('operate_date', 'asc')->get();
        $html = view('officer._activities_table',compact('activities'))->render();
        return response()->json(compact('html'));
    }
    public function load_status($pid)
    {
//        $cases = case_input::select(array(
//            case_input::raw("SUM (status) as s1"),
//            case_input::raw("SUM (status) as s2"),))
//            ->where('prov_id', '=', $pid);
        $NotAcp = case_input::Where('prov_id','=',$pid)->where('status', '=', '1')->count('status');
        $NotKeyIn = case_input::Where('prov_id','=',$pid)->where('status', '=', '2')->count('status');
        $NotOp = case_input::Where('prov_id','=',$pid)->where('status', '=', '3')->count('status');

        return response()->json(compact('NotAcp','NotKeyIn','NotOp'));
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
