<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bulma/css/bulma-doc.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

</head>

<body >
<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column">
                    <p class="title"> Crisis Response </p>
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
