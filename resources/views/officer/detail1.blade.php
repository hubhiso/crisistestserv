<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crisis Response</title>
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<!--meta name="msapplication-config" content="http://bulma.io/favicons/browserconfig.xml?v=201701041855"-->
	<meta name="theme-color" content="#cc99cc"/>
	<script src="http://bulma.io/javascript/jquery-2.2.0.min.js"></script>
	<script src="http://bulma.io/javascript/clipboard.min.js"></script>
	<script src="http://bulma.io/javascript/bulma.js"></script>
	<script type="text/javascript" src="http://bulma.io/javascript/index.js"></script>
</head>

<body class="layout-default">
	<section class="hero is-medium has-text-centered">
		<div class="hero-head">
			<div class="container">
				@component('component.login_bar')
				@endcomponent
			</div>
		</div>

			<br>
		{!! Form::open(['url' =>'officer/input_case']) !!}

		<div class="container">
				<nav class="breadcrumb">
					<ul>
						<li><a href="{{ '' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						</li>
						<li class="is-active"><a><span class="icon is-small"><i class="fa fa-address-card"></i></span><span> ข้อมูลเบื้องต้น </span></a>
						</li>
					</ul>
				</nav>
			</div>
				
			<h1 id="title" class="title"> ข้อมูลเบื้องต้น </h1>
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
							<label class="label"> วันที่</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded has-icons-left">
									<input class="input" type="text"  value="{{ $show_data->created_at }}" disabled>
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
									<input class="input"  type="text"  name="case_id" value="{{ $show_data->case_id }}" disabled></p>
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
									<input class="input" type="text" value="0123456789" disabled>
									<span class="icon  is-left"> <i class="fa fa-mobile"></i> </span> </p>
=======
=======
>>>>>>> Stashed changes
									<input class="input" type="text" value="{{ $show_data->victim_tel }}" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-mobile"></i> </span> </p>
>>>>>>> Stashed changes
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
									<input class="input" type="text" value="{{ $show_data->sex }}" disabled>
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
									<input class="input" type="text" placeholder="ชื่อผู้แจ้ง" value="{{ $show_data->prov_id }}" disabled>
								 </p>
							</div>
							<div class="field-label is-normal">
								<label class="label">อำเภอ</label>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
									<input class="input" type="email" placeholder="ID-CODE" value="{{ $show_data->amphur_id }}" disabled>
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
									<input class="input" type="text" placeholder="ประเภท1" value="{{ $show_data->problem_case }}" disabled>
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
									<input class="input" type="text" value="{{ $show_data->sub_problem }}" disabled>
								</p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> ประเภทกลุ่มย่อย </label>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
									<input class="input" type="email" value="{{ $show_data->group_code }}" disabled>
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
									<input class="input" type="text" placeholder="เจ้าหน้าที่" value="เจ้าหน้าที่ A" disabled>
								<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span></p>
=======
=======
>>>>>>> Stashed changes
									<input class="input" type="text"  value="{{ $show_data->group_code }}" disabled>
								</p>
>>>>>>> Stashed changes
							</div>
							<div class="field-label is-normal">
								<label class="label">เบอร์มือถือ</label>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
<<<<<<< Updated upstream
<<<<<<< Updated upstream
									<input class="input" value="0123456789" disabled>
								 <span class="icon  is-left"> <i class="fa fa-mobile"></i> </span></p>
=======
=======
>>>>>>> Stashed changes
									<input class="input" value="{{ $show_data->agent_tel }}" disabled>
								 </p>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
<<<<<<< Updated upstream
									<input class="input" type="text" value="เจ้าหน้าที่ B" disabled>
								 <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span></p>
=======
=======
>>>>>>> Stashed changes
									<input name="receiver" class="input" type="text" value="{{  Auth::user()->name }}" disabled>
								 </p>
>>>>>>> Stashed changes
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
					{!! Form::submit('ยืนยันการรับเรื่อง',['class'=>'button is-primary']) !!}
					<p class="control"> <a class="button"> ยกเลิก </a> </p>
				</div>
			</div>
	</section>
	{!!   Form::close() !!}

	<br> @extends('footer')
</body>

</html>