<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> CRS </title>
	{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}
	{{ Html::style('bootstrap/css/bootstrap.css') }}
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">

	{{ Html::script('js/jquery.min.js') }}
	{{ Html::script('bootstrap/js/bootstrap.min.js') }}
	{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<meta name="theme-color" content="#cc99cc"/>
</head>

<body class="layout-default">
	<section class="hero is-medium has-text-centered">
		<div class="hero-head">
			<div class="container">
				@component('component.login_bar')
				@endcomponent
			</div>
		</div>

			<div class="container">
				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
					</div>
				</div>
				<nav class="breadcrumb">
					<ul>
						<li><a><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						</li>
						<li class="is-active"><a><span class="icon is-small"><i class="fa fa-cog"></i></span><span>  การดำเนินการ </span></a>
						</li>
					</ul>
				</nav>
				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
					</div>
				</div>
			</div>


			<section>
				<div class="container">
					<div class="tabs is-centered is-toggle">
						<ul>
							<li>
								<a>
								<span class="icon is-small"><i class="fa fa-image"></i></span>
								<span> ข้อมูลเพิ่มเติม </span>
							  </a>
							
							</li>
							<li class="is-active">
								<a>
									<span class="icon is-small"><i class="fa fa-cog"></i></span>
									<span> การดำเนินการ </span>
								  </a>
							
							</li>

						</ul>
					</div>
				</div>
			</section>
			<br>

			<h1 id="title" class="title"> การดำเนินการ </h1>
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
							<label class="label">ชื่อผู้ถูกกระทำ</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded has-icons-left ">
									<input class="input" type="text" placeholder="ชื่อผู้ถูกกระทำ" value="{{ $show_data->name }}" disabled>
								</p>
							</div>
							<div class="field-label is-normal">
								<label class="label">ID-Code</label>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
									<input class="input" type="text" placeholder="ID-CODE" value="{{ $show_data->case_id }}" disabled>
									{!! Form::text('case_id',$show_data->case_id,['class'=>'text', 'hidden']) !!}
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

				<div class="field is-normal">
					<p class="subtitle is-5">การดำเนินการที่ผ่านมา</p>
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
							<label class="label">วันที่ดำเนินการ</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left ">
									<input class="input" type="text" placeholder="" value="26/06/2560" disabled>
								 </p>
							</div>
						</div>
						<div class="field is-grouped">
							<p><a> </a>
							</p>
							<p class="control"> <a class="button is-primary"> แก้ไข </a> </p>
						</div>
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
							<label class="label">วันที่ดำเนินการ</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left ">
									<input class="input" type="text" placeholder="" value="28/06/2560" disabled>
								 </p>
							</div>
						</div>
						<div class="field is-grouped">
							<p><a> </a>
							</p>
							<p class="control"> <a class="button is-primary"> แก้ไข </a> </p>
						</div>
					</div>
				</div>



				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
					</div>
				</div>
				<div class="notification">
					<div class="field is-normal">
						<p class="subtitle is-5">การดำเนินการในครั้งนี้</p>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> วันที่ดำเนินการ </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left">
								<div class="input-group date" data-provide="datepicker">
									<input type="text" name="operate_date" class="form-control">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>
									</p>
							</div>
						</div>
					</div>

					
					
					<div class="field is-horizontal">
					  <div class="field-label">
						<label class="label"> วิธีการดำเนินการ </label>
					  </div>
					  <div class="field-body">
						<div class="field is-grouped">
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox">
							  ให้คำปรึกษา
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox">
							  เจรจาเป็นรายบุคคล
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox">
							  เจรจาระดับนโยบายขององค์กร
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox">
							  ดำเนินคดี
							</label>
						  </div>
						</div>
					  </div>
					</div>
					
				


					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">รายละเอียดการดำเนินการ</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" placeholder="กรอกรายละเอียด"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">ผลการดำเนินการ</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" placeholder="กรอกรายละเอียด"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"></label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<div class="control">
									<p class="control"> <a class="button is-primary"> ยืนยัน </a> </p>
								</div>
								<div class="control">
									<p class="control"> <a class="button"> ยกเลิก </a> </p>
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

				<div class="notification">
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> สถานะการดำเนินการ </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded  ">
									<span class="select">
									<select>
										<option> อยู่ระหว่างการดำเนินการ </option>
										<option> ดำเนินการเสร็จสิ้น </option>
										<option> ดำเนินการแล้วส่งต่อ </option>
									   </select> </span>
								</p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> ผลการดำเนินการ </label>
							</div>
							<div class="field">
								<p class="control is-expanded  has-icons-right">
									<span class="select"> <select>
									<option> สำเร็จ </option>
									<option> ไม่สำเร็จ </option>
									<option> ตาย </option>
									<option> ย้ายที่อยู่ </option>
								  </select> </span>
								</p>
								<div class="control">
							<label class="checkbox">
							  <input type="checkbox">
							    บุคคลได้รับการชดเชย
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox">
							  องค์กรเปลี่ยนนโยบาย
							</label>
						  </div>
							</div>
						</div>
					</div>
					
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ส่งต่อไปยัง </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control   ">
									<span class="select">
									<select>
										<option> หน่วยงานในเครือข่าย </option>
										<option> หน่วยงานนอกเครือข่าย </option>
									   </select> </span>
								</p>
								<p class="control   ">
									<span class="select">
									<select>
										<option> จังหวัด List </option>
									   </select> </span>
								</p>
								<p class="control  has-icons-left">
									<input class="input" type="text"  value="ชื่อหน่วยงาน">
								</p>
							</div>
						</div>
					</div>
					
					
					
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"></label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<div class="control">
									<p class="control"> <a class="button is-primary"> ยืนยัน </a> </p>
								</div>
								<div class="control">
									<p class="control"> <a class="button"> ยกเลิก </a> </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="box">
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ผลการดำเนินการที่ส่งต่อ </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  ">
									<input class="input" type="text" placeholder="" value="ยังไม่ได้รับเรื่อง" disabled>
									 </p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> ดำเนินการเสร็จสิ้น </label>
							</div>
							<div class="field">
								<p class="control  has-icons-left ">
									<input class="input" type="text" placeholder="" value="" disabled>
									 </p>
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
		</div>
	</section>
	<br>
	<script>
        $('.datepicker').datepicker();

        //# sourceURL=pen.js
	</script>
	@extends('footer')
</body>

</html>