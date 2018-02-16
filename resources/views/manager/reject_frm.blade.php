<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CRS </title>
    <link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}
    <meta name="theme-color" content="#cc99cc"/>

</head>
<body>
<div class="hero is-medium has-text-centered">
    <div class="hero-head">
        <div class="container">
            @component('component.login_bar')
            @endcomponent
        </div>
    </div>

    <br>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('manager.reject_cfm') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="container">
            <nav class="breadcrumb">
                <ul>
                    <li><a href="{{ route('officer.show',['mode_id' => "0"]) }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
                    </li>
                    <li class="is-active"><a><span class="icon is-small"><i class="fa fa-address-card"></i></span><span> ข้อมูลเบื้องต้น </span></a>
                    </li>
                </ul>
            </nav>
        </div>

        <h1 id="title" class="title"> ปฏิเสธการรับเรื่อง </h1>
        <div class="container">
            <div class="notification">
                <!--This container is <strong>centered</strong> on desktop. -->
                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">ผู้ถูกกระทำ</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded has-icons-left ">
                                <input class="input" type="text" value="{{ $show_data->name }}" disabled>
                                <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">ID-Code</label>
                        </div>
                        <div class="field">
                            <p class="control is-expanded has-icons-left has-icons-right">
                                <input class="input" type="text" value="{{ $show_data->case_id }}" disabled>
                            {!! Form::text('case_id',$show_data->case_id,['class'=>'text', 'hidden']) !!}

                        </div>
                    </div>
                </div>


                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">พื้นที่ จังหวัด</label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded has-icons-left ">
                                <input class="input" type="text" placeholder="ชื่อผู้แจ้ง" value="{{ $show_data->Provinces->PROVINCE_NAME }}" disabled>
                            </p>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">อำเภอ</label>
                        </div>
                        <div class="field">
                            <p class="control is-expanded has-icons-left has-icons-right">
                                <input class="input" type="email" placeholder="ID-CODE" value="{{ $show_data->Amphurs->AMPHUR_NAME }}" disabled>
                            </p>
                        </div>
                    </div>
                </div>








                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"> ระบุเหตุผลที่ปฏิเสธไม่รับเรื่อง </label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                {{ Form::textarea('reason', null, ['size' => '100x10']) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label">
                        <!-- Left empty for spacing -->
                    </div>
                </div>
            </div>
            <div class="field is-grouped">
                <p><a> </a>
                </p>
                {!! Form::submit('ยืนยัน',['class'=>'button is-primary']) !!}

                <p class="control"> <a class="button" href="{{ route('officer.open_dt', $show_data->case_id) }}" > กลับ </a> </p>
            </div>
        </div>
    </form>
</div>
</body>
</html>
