<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CRS </title>
    <link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}
    <meta name="theme-color" content="#cc99cc"/>

</head>
<body>
<div class="hero is-medium has-text-centered">
    <div class="hero-head">
        <div class="container">
            @component('component.login_bar2')
            @endcomponent
        </div>
    </div>

    <br>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('manager.transfer_cfm') }}">
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

        <h1 id="title" class="title"> เปลี่ยนเจ้าหน้าที่ผู้รับผิดชอบ </h1>
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
                        <label class="label"> เปลี่ยนผู้รับเรื่อง </label>
                    </div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <p class="control is-expanded has-icons-left ">
                                <input class="input" type="text" value="{{ $show_data->receiver }}" disabled>
                                <input id="receive" name="receiver" type="text" value="{{ $show_data->receiver_id }}" hidden>

                            </p>
                            <label class="label"> เป็น </label>
                            <p class="control is-expanded has-icons-left ">
                                <select style='width:200px' name="officer" id="officer">
                                @foreach($officers as $officer)
                                    <option value="{{ $officer->id }}" style="width:250px">{{ $officer->name }}</option>
                                @endforeach
                                </select>
                            </p>
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
