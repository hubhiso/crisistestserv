<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
use App\Http\Requests\case_inputRequest;
use Illuminate\Support\Str;
use App\province;
use App\amphur;
use App\case_input;
use App\timeline;
use Request;
use Auth;


class case_controller extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

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
        $provinces = province::orderBy('PROVINCE_NAME', 'asc')->get();
        $amphurs= amphur::where('PROVINCE_ID', '=', 1)->get();
        $new_id = $this->gen_id();
        return view('input',compact('provinces','amphurs','new_id'));    }

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
        $case_id = Request::input('case_id');
        case_input::where('case_id','=',$case_id)->update([ 'status' => 1]);
        timeline::create(['case_id'=>$case_id,
            'operate_status'=>1,
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
    public function show($case_id)
    {
        //
        //var_dump($case_id);
        try {
            // Validate the value...
            $data = case_input::where('case_id','=',$case_id)->orWhere('victim_tel','=',$case_id)->first();
            //var_dump($data);
            if ($data!=[]) {
                $html = view('layout._status', compact('data'))->render();
                return response()->json(compact('html'));
            }else{
                 $html = view('layout._statusError')->render();
                 return response()->json(compact('html'));

            }
        } catch (Exception $e) {
           // $html = view('layout._statusError')->render();
           // return response()->json(compact('html'));
        }

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

    }
    public function up_evaluate(Request $request){
        $case_id = Request::input('case_id');
        $eval_1 =  Request::input('eval_1');
        $eval_2 = Request::input('eval_2');
        case_input::where('case_id','=',$case_id)->update([
            'evaluate1'=>$eval_1,
            'evaluate2'=>$eval_2
        ]);
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
