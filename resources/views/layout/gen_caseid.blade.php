<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#ab3c3c" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link href="{{ asset('bulma-0.9.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <title> ปกป้อง (CRS) </title>

</head>

<body>
    <section class="hero is-primary wall3">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column">
                        <p class="title"> Crisis Response System (CRS) </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="container mt-5">
        <div class="has-text-centered mb-5">
            <p class="is-size-3">{{ trans('message.tx_thankyou') }}</p>
            <p>{{ trans('message.tx_thankyou2') }}</p>
            <p class="has-text-danger is-size-2"><i class="fas fa-exclamation-triangle">&nbsp;</i></p>
            <p class="has-text-danger is-size-4">{{ trans('message.tx_keep_id') }}</p>
        </div>
        <div class="box mb-5">
            <div class="notification is-primary has-text-centered is-light">
                <h1>{{ trans('message.tx_id') }}</h1>
                <h1 class="title has-text-danger"><b>{{ $case_id }}</b></h1>

                <?php

                        if($emergency == 1){
                            $emer_tx = '❗เคสเร่งด่วน❗';
                        }else{
                            $emer_tx = '';
                        }
                    
                        if ($case_id != ""){
                            //echo "text";

                            define("LINE_API","https://notify-api.line.me/api/notify");

                        $token = "uPdwaZeYi0GeGFqXscofeQqsw9vISFuzFfTIcSxASkk"; //ใส่Token ที่ copy เอาไว้
                        $message = " $case_id $emer_tx เกิดเหตุร้องเรียน \nจังหวัด $provname->PROVINCE_NAME \nปัญหาที่แจ้ง : $problem_case_names_ss\n🌐 https://crs.ddc.moph.go.th"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

                        $queryData = array("message" => $message);
                        $queryData = http_build_query($queryData,"","&");
                        $headerOptions = array(
                        "http"=>array(
                        "method"=>"POST",
                        "header"=> "Content-Type: application/x-www-form-urlencoded\r\n"
                        ."Authorization: Bearer ".$token."\r\n"
                        ."Content-Length: ".strlen($queryData)."\r\n",
                        "content" => $queryData
                        ),
                        );
                        $context = stream_context_create($headerOptions);
                        $result = file_get_contents(LINE_API,FALSE,$context);
                        $res = json_decode($result);
                        //return $res;
                        //}
                        }
                        
                        
                    ?>
            </div>
        </div>

    </div>

    <div class="tile is-ancestor">
        <div class="tile is-parent">
            <div class="tile is-child ">

                <div class="has-text-centered ">
                    @if(Auth::guard('officer')->check())
                    <a class="button is-danger" href="{{ route('officer.main') }}"><i class="fa fa-home">&nbsp;</i>{{ trans('message.bt_cancle') }}</a>
                    @else
                    <a class="button is-danger" href="{{ route('guest_home') }}"><i class="fa fa-home">&nbsp;</i>{{ trans('message.bt_cancle') }}</a>
                    @endif
                </div>

            </div>
        </div>
    </div>

    @extends('footer')
</body>

</html>