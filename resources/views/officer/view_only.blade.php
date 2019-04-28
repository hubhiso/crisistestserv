<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> CRS </title>
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link href="{{ asset('css/step.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet"> 
	{{ Html::script('js/jquery.min.js') }}
	<meta name="theme-color" content="#cc99cc"/>

</head>
@php
	$thaimonth = ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
@endphp
<body class="layout-default">
	<section class="hero is-medium ">
		<div class="hero-head">
			<div class="container">
				@component('component.login_bar') 
				@endcomponent
			</div>
		</div>

		<br>
		<form class="form-horizontal" role="form" method="POST" action="{{ route('officer.accept_c') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="container">
				<nav class="breadcrumb">
					<ul>
						<li><a href="{{ route('officer.show',['mode_id' => " 0 "]) }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						</li>
						<li class="is-active"><a><span class="icon is-small"><i class="fa fa-id-card"></i></span><span> ข้อมูลเบื้องต้น </span></a>
						</li>
					</ul>
				</nav>
			</div>

			<h1 id="title" class="title has-text-centered"> ข้อมูลเบื้องต้น </h1>

			<div class="container">
				<section class="section">
					<div class="box">
						 @php
						 $date1 = null;
						 $date2 = null;
						 $date3 = null;
						 $date4 = null;
						 $date5 = null;
						 $step = 1;

						 @endphp
					    @foreach($timelines as $timeline)
							@if($timeline->operate_status == 1)  @php $date1 = Carbon\Carbon::parse($timeline->operate_time);@endphp  @endif
							@if($timeline->operate_status == 2)  @php $date2 = Carbon\Carbon::parse($timeline->operate_time);$step=2 @endphp  @endif
							@if($timeline->operate_status == 3)  @php $date3 = Carbon\Carbon::parse($timeline->operate_time);$step=3 @endphp  @endif
							@if($timeline->operate_status == 4)  @php $date4 = Carbon\Carbon::parse($timeline->operate_time);$step=4 @endphp  @endif
							@if($timeline->operate_status >= 5)  @php $date5 = Carbon\Carbon::parse($timeline->operate_time);$step=5 @endphp  @endif
						@endforeach
						<div class="step-state step{{$step}}">
							<ul>
								<li>
									<p> แจ้งเหตุ <span>@if($date1 != null) {{$date1->format('Y-m-d')  }}  @endif</span>
									</p>
								</li>
								<li>
									<p> รับเรื่อง <span>@if($date2 != null) {{$date2->format('Y-m-d')  }} @endif</span>
									</p>
									<a class="day">@if($date2 != null) {{$date2->diffInDays($date1) }} วัน @endif</a>
								</li>
								<li>
									<p> บันทึกข้อมูล <span>@if($date3 != null) {{$date3->format('Y-m-d')  }} @endif</span>
									</p>
									<a class="day">@if($date3 != null) {{$date3->diffInDays($date2) }} วัน @endif</a>
								</li>
								<li>
									<p> ดำเนินการ <span>@if($date4 != null) {{$date4->format('Y-m-d')  }} @endif</span>
									</p>
									<p class="day">@if($date4 != null) {{$date4->diffInDays($date3) }} วัน @endif</p>
								</li>
								<li>
									<p> เสร็จสิ้น <span> @if($date5 != null) {{$date5->format('Y-m-d')  }} @endif</span>
									</p>
									<p class="day">@if($date5 != null) {{$date5->diffInDays($date4) }} วัน @endif</p>
								</li>
							</ul>
						</div>

					</div>

					<div class="notification">
						<!--This container is <strong>centered</strong> on desktop. -->
						<div class="field is-horizontal">
							<div class="field-label">
								<!-- Left empty for spacing -->
							</div>
						</div>
						<div class="field is-horizontal">
							<div class="field-label is-normal">
								<label class="label"> วันที่</label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<p class="control is-expanded has-icons-left">
										<input class="input" type="text" value="{{date('d',strtotime(str_replace('-','/', $show_data->created_at)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $show_data->created_at)))]}}{{date("Y",strtotime(str_replace('-','/', $show_data->created_at)))+543}}" disabled>
										<span class="icon is-small is-left"> <i class="far fa-calendar"></i> </span>
									</p>
								</div>
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
										<input class="input" type="text" value="{{ $show_data->case_id }}" disabled> {!! Form::text('case_id',$show_data->case_id,['class'=>'text', 'hidden']) !!}

								</div>
							</div>
						</div>
						<div class="field is-horizontal">
							<div class="field-label is-normal">
								<label class="label"> เบอร์มือถือ </label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<p class="control is-expanded has-icons-left">

										<input class="input" type="text" value="{{ $show_data->victim_tel }}" disabled>
										<span class="icon  is-left"> <i class="fa fa-mobile-alt"></i> </span>
									</p>
								</div>
							</div>
						</div>
						<div class="field is-horizontal">
							<div class="field-label is-normal">
								<label class="label"> เพศ </label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<p class="control is-expanded has-icons-left">
										@if($show_data->sex == 1 )
										<input class="input" type="text" placeholder="ประเภท1" value="ชาย" disabled> @elseif($show_data->sex == 2)
										<input class="input" type="text" placeholder="ประเภท2" value="หญิง" disabled> @elseif($show_data->sex == 3)
										<input class="input" type="text" placeholder="ประเภท3" value="สาวประเภทสอง" disabled> @elseif($show_data->sex == 4)
										<input class="input" type="text" placeholder="ประเภท4" value="อื่นๆ" disabled> @endif

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
								<label class="label"> ปัญหาที่แจ้ง</label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<p class="control is-expanded has-icons-left">
										@if($show_data->problem_case == 1 )
										<input class="input" type="text" placeholder="ประเภท1" value="บังคับตรวจเอชไอวี" disabled> @elseif($show_data->problem_case == 2)
										<input class="input" type="text" placeholder="ประเภท2" value="เปิดเผยสถานะการติดเชื้อเอชไอวี" disabled> @elseif($show_data->problem_case == 3)
										<input class="input" type="text" placeholder="ประเภท3" value="ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี" disabled> @elseif($show_data->problem_case == 4)
										<input class="input" type="text" placeholder="ประเภท4" value="ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง" disabled> @endif

									</p>
								</div>

							</div>
						</div>

						<div class="field is-horizontal">
							<div class="field-label is-normal">
								<label class="label"> ประเภทกลุ่ม </label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<p class="control is-expanded has-icons-left ">
										@if($show_data->sub_problem == 1 )
										<input class="input" type="text" placeholder="ประเภท1" value="ผู้ติดเชื้อเอชไอวี" disabled> @elseif($show_data->sub_problem == 2)
										<input class="input" type="text" placeholder="ประเภท2" value="กลุ่มเปราะบาง" disabled> @elseif($show_data->sub_problem == 3)
										<input class="input" type="text" placeholder="ประเภท3" value="ประชาชนทั่วไป" disabled> @elseif($show_data->sub_problem == 4)
										<input class="input" type="text" placeholder="ประเภท4" value="ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี" disabled> @endif
									</p>
								</div>
								<div class="field-label is-normal">
									<label class="label"> ประเภทกลุ่มย่อย </label>
								</div>
								<div class="field">
									<p class="control is-expanded has-icons-left has-icons-right">
										@if($show_data->group_code == 1 )
										<input class="input" type="text" placeholder="ประเภท1" value="กลุ่มหลากหลายทางเพศ" disabled> @elseif($show_data->group_code == 2)
										<input class="input" type="text" placeholder="ประเภท2" value="พนักงานบริการ" disabled> @elseif($show_data->group_code == 3)
										<input class="input" type="text" placeholder="ประเภท3" value="ผู้ใช้สารเสพติด" disabled> @elseif($show_data->group_code == 4)
										<input class="input" type="text" placeholder="ประเภท4" value="แรงงานข้ามชาติ" disabled> @else
										<input class="input" type="text" placeholder="ไม่ระบุ" value="" disabled> @endif
									</p>
								</div>
							</div>
						</div>


						<div class="field is-horizontal">
							<div class="field-label is-normal">
								<label class="label">ผู้แจ้งเรื่อง</label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<p class="control is-expanded has-icons-left ">
										<input class="input" type="text" value="{{ $show_data->sender }}" disabled>
									</p>
								</div>
								<div class="field-label is-normal">
									<label class="label">เบอร์มือถือ</label>
								</div>
								<div class="field">
									<p class="control is-expanded has-icons-left has-icons-right">
										<input class="input" value="{{ $show_data->agent_tel }}" disabled>
									</p>
								</div>
							</div>
						</div>
						<div class="field is-horizontal">
							<div class="field-label is-normal">
								<label class="label"> ผู้รับเรื่อง </label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<p class="control is-expanded has-icons-left ">
										<input class="input" type="text" value="{{ $show_data->receiver }}" disabled>
										<input id="receive" name="receiver" type="text" value="{{ $show_data->receiver_id }}" hidden>

									</p>
								</div>
							</div>
						</div>

						<div class="field is-horizontal">
							<div class="field-label is-normal">
								<label class="label"> รายละเอียดของปัญหา </label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<div class="control is-expanded has-icons-left">
										<textarea class="textarea" placeholder="กรอกรายละเอียด" disabled>{{ $show_data->detail }}</textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="field is-horizontal">
							<div class="field-label is-normal">
								<label class="label"> ข้อมูลเพิ่มเติม </label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<div class="control is-expanded has-icons-left" >
										@if ($show_data->file1 == '')
										@else
											<a class="button is-primary " href="{{asset('/uploads/'.$show_data->case_id.'/'.$show_data->file1)}}" download>Download ข้อมูลเพิ่มเติม 1</a>
										@endif
										@if ($show_data->file2 == '')
										@else
											<a class="button is-primary " href="{{asset('/uploads/'.$show_data->case_id.'/'.$show_data->file2)}}" download>Download ข้อมูลเพิ่มเติม 2</a>
										@endif
										@if ($show_data->file3 == '')
										@else
											<a class="button is-primary " href="{{asset('/uploads/'.$show_data->case_id.'/'.$show_data->file3)}}" download>Download ข้อมูลเพิ่มเติม 3</a>
										@endif
									</div>
								</div>
							</div>
						</div>

						@if( $show_data->status  == 99)
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> เหตุผลที่ปฏิเสธการรับเรื่อง </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" placeholder="กรอกรายละเอียด"  disabled>{{ $show_data->reject_reason }}</textarea>
								</div>
							</div>
						</div>
					</div>
					@endif
					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
					</div>
				</div>

				<div class="field is-grouped">
					<div class="control">
						{{--{!! Form::submit('ยืนยันการรับเรื่อง',['class'=>'button is-primary']) !!}--}}
						@if( $show_data->status  != 99 &&   Auth::user()->position  == "manager")
					</div>
					<div class="control">
						<a class="button is-info is-focused" href="{{ route('manager.transfer_frm',['case_id' => $show_data->case_id]) }}">เปลี่ยนผู้รับผิดชอบ</a>
					</div>
					<div class="control">
						<a class="button is-danger is-focused" href="{{ route('manager.reject_frm',['case_id' => $show_data->case_id]) }}"> ปฎิเสธการรับเคส</a>
					@endif
					</div>
					<p class="control">
						<a class="button" href="{{ route('officer.show',['mode_id' => "0"]) }}" > กลับ </a>
					</p>
				</div>

				</div>

			</div>
	</section>

	</from>


	<br> @extends('footer')
</body>

<script>
	var p_id = $( '#p_id' ).val();
	//alert(p_id);
	var status_url = "{{route('officer.load_status',['prov_id' => ':p_id']) }}";
	status_url = status_url.replace( ':p_id', p_id );
	console.log( status_url );
	$.ajax( {
		type: 'GET',
		url: status_url,
		success: function ( data ) {
			//console.log(data);
			$( '#i-receive' ).text( " ไม่ได้รับเรื่อง " + data.NotAcp );
			$( '#i-additional' ).text( " ไม่บันทึก " + data.NotKeyIn );
			$( '#i-process' ).text( " ไม่ดำเนินการ " + data.NotOp );
		}
	} );
</script>

<script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
<script src="{{ asset('bulma/main.js') }}"></script>

</html>