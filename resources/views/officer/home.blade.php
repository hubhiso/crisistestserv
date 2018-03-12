<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CRS </title>
    <link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	{{ Html::script('js/jquery.min.js') }}


	<meta name="theme-color" content="#cc99cc" />
    <!--script src="http://bulma.io/javascript/jquery-2.2.0.min.js"></script>
    <script src="http://bulma.io/javascript/clipboard.min.js"></script>
    <script src="http://bulma.io/javascript/bulma.js"></script>
    <script type="text/javascript" src="http://bulma.io/javascript/index.js"></script-->
    
</head>

<body class="layout-default">
<section class="hero is-medium has-text-centered">
	@component('component.login_bar')
	@endcomponent
    <div class="container">
    	<div class="navbar-end">
			@if(    Auth::user()->position  == "manager")
        	<a id="" class="button is-text" href="{{ 'manager.register' }}"> ลงทะเบียนผู้ดูแลเพิ่มเติม </a>
				@endif
		</div>
     </div>     
    <div class="hero-body">
				<div class="container">
					<h1 id="bulma" class="title"> Crisis Response </h1>
					<h2 id="modern-framework" class="subtitle"> ระบบรับเรื่องร้องเรียนและการให้คำปรึกษาข้อมูลสิทธิด้านเอดส์ </h2>
					<a id="btn_new1" class="button ft1 i-margin" href="{{ 'officer/input_case' }}">แจ้งเหตุ</a>
					<a id="btn_new1" class="button ft1 i-margin" href="{{ route('officer.show',['mode_id' => "0"]) }}">จัดการเหตุ</a>
					<a id="btn_new1" class="button ft1 i-margin" href="#">รายงาน</a>
					
				</div>
			</div>
</section>

@extends('footer')


	<script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
	<script src="{{ asset('bulma/main.js') }}"></script>
{{--<script src="{{ asset('js/status_report.js') }}"></script>--}}
<script>

    var p_id = $('#p_id').val();

    var status_url = "{{route('officer.load_status',['prov_id' => ':p_id']) }}";
    status_url = status_url.replace(':p_id', p_id);
    console.log(status_url);
    $.ajax({
        type: 'GET',
        url: status_url,
        success: function( data ) {
            //console.log(data);
            $('#i-receive').text(" ไม่ได้รับเรื่อง "+data.NotAcp);
            $('#i-additional').text(" ไม่บันทึก "+data.NotKeyIn);
            $('#i-process').text(" ไม่ดำเนินการ "+data.NotOp);
        }
    });
</script>
</body>
</html>
