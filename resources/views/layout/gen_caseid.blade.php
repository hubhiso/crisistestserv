<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

</head>

<body >
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
    <div class="hero-foot">
        <div class="container">
            <nav class="tabs is-boxed">
                <ul>
                    <li class="is-active"> <a href="{{ url('/') }}">หน้าหลัก</a> </li>
                </ul>
            </nav>
        </div>
    </div>

</section>
<div class="tile is-ancestor">
    <div class="tile is-parent">
        <div class="tile is-child box">
            <div class="notification has-text-centered is-large">
                <h1>
                    รหัสที่ใช้ติดตามข้อมูลของท่านคือ </br>
                    <p class="title">{{ $case_id }}</p>
                    <?php

                        if($emergency == 1){
                            $emer_tx = '❗เคสเร่งด่วน❗';
                        }else{
                            $emer_tx = '';
                        }
                    
                        if ($case_id != ""){
                            //echo "text";

                            define("LINE_API","https://notify-api.line.me/api/notify");

                        $token = "3N3EEuytfaZLmNTljLXbkf8teUon5SeCZ9HViYROFgf"; //ใส่Token ที่ copy เอาไว้
                        $message = " $case_id $emer_tx เกิดเหตุร้องเรียน จังหวัด $provname->PROVINCE_NAME  🌐 https://crs.ddc.moph.go.th"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

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
                </h1>
            </div>
            @if(Auth::guard('officer')->check())
                <a class="button is-success" href="{{ route('officer.main') }}">กลับสู้หน้าหลัก</a>
            @else
            <a class="button is-success" href="{{ route('guest_home') }}">กลับสู้หน้าหลัก</a>
            @endif
        </div>
    </div>
</div>
</body>
</html>
