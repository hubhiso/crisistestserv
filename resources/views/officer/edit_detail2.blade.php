<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}
	{{ Html::style('bootstrap/css/bootstrap.css') }}
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">

	{{ Html::script('js/jquery.min.js') }}
	{{ Html::script('bootstrap/js/bootstrap.min.js') }}
	{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<meta name="theme-color" content="#cc99cc"/>


	<title> CRS </title>
</head>

<form class="layout-default">
	<section class="hero is-medium has-text-centered">
		<div class="hero-head">
			<div class="container">
				@component('component.login_bar')
				@endcomponent
			</div>
		</div>
			<br>
		<form class="form-horizontal" role="form" method="POST" action="{{ route('officer.update_detail') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input id="case_id" name="case_id"  type="text" value="{{  $show_data->case_id }}" hidden >

			<div class="container">
				<nav class="breadcrumb">
					<ul>
						<li><a href="{{ route('officer.show') }}" ><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						</li>
						<li class="is-active"><a><span class="icon is-small"><i class="fa fa-address-card"></i></span><span> ข้อมูลเพิ่มเติม </span></a>
						</li>
					</ul>
				</nav>
			</div>

			<section>
				<div class="container">
					<div class="tabs is-centered is-toggle">
						<ul>
							<li class="is-active">
								<a>
									<span class="icon is-small"><i class="fa fa-image"></i></span>
									<span> ข้อมูลเพิ่มเติม </span>
								</a>

							</li>
							<li >
								<a href="{{ route('officer.add_activities' , $show_data->case_id) }}">
									<span class="icon is-small"><i class="fa fa-cog"></i></span>
									<span> การดำเนินการ </span>
								</a>

							</li>

						</ul>
					</div>
				</div>
			</section>
			<br>

			<h1 id="title" class="title"> ข้อมูลเพิ่มเติม </h1>
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
							<label class="label">ผู้แจ้งเรื่อง</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded has-icons-left ">
									<input class="input" type="text"  value="{{ $show_data->sender }}" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> เบอร์มือถือผู้แจ้ง </label>
							</div>
							<div class="field">
								<p class="control  has-icons-left has-icons-right">
									<input class="input" type="text" value="{{ $show_data->agent_tel }}" disabled>
									<span class="icon  is-left"> <i class="fa fa-mobile"></i> </span> </p>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">ผู้รับเรื่อง</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control has-icons-left">
									<input class="input" type="text"  value="{{ $show_data->receiver }}" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">ชื่อผู้ถูกกระทำ</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded has-icons-left ">
									<input class="input" type="text"  name="name" value="{{ $show_data->name }}">
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
							<div class="field-label is-normal">
								<label class="label">ID-Code</label>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
									<input class="input" type="text"  value="{{ $show_data->case_id }}" disabled>
								</p>
							</div>
						</div>
					</div>
					
				

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> เบอร์มือถือผู้ถูกกระทำ </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control has-icons-left">
									<input class="input" type="text" name="tel" value="{{ $show_data->victim_tel }}">
									<span class="icon  is-left"> <i class="fa fa-mobile"></i> </span> </p>
							</div>
						</div>
					</div>




					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label"> เพศ </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="field is-grouped">
									<p class="control is-expanded has-icons-left ">
										<label class="radio">
											@if( $show_data->sex == 1 )
      											{{ Form::radio('sex', '1' , true) }}
											@else
												{{ Form::radio('sex', '1' , false) }}
											@endif
      							ชาย
    						</label>
									

										<label class="radio">
											@if( $show_data->sex == 2 )
												{{ Form::radio('sex', '2' , true) }}
											@else
												{{ Form::radio('sex', '2' , false) }}
											@endif หญิง
    						</label>
									

										<label class="radio">
											@if( $show_data->sex == 3 )
												{{ Form::radio('sex', '3' , true) }}
											@else
												{{ Form::radio('sex', '3' , false) }}
											@endif สาวประเภทสอง
    						</label>
									

									</p>
								</div>
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
									<input class="input" type="text" placeholder="จังหวัด" value="{{ $show_data->Provinces->PROVINCE_NAME }}" disabled>
								</p>
							</div>
							<div class="field-label is-normal">
								<label class="label">อำเภอ</label>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
									<input class="input"  placeholder="ID-CODE" value="{{ $show_data->Amphurs->AMPHUR_NAME }}" disabled>
								</p>
							</div>
						</div>
					</div>
					
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> รายละเอียดของปัญหา </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="detail"  >{{ $show_data->detail }}</textarea>
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
					<!--This container is <strong>centered</strong> on desktop. -->
					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
					</div>


					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> วันเกิด </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left ">
								<div class="input-group date" data-provide="datepicker">
									<input type="text" id="dateInput" name="birthdate" class="form-control" value="{{date('m/d/Y',strtotime(str_replace('-','/', $show_detail->birth_date)))}}">
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>
								</p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> อายุ </label>
							</div>
							<div class="field">
								<p class="control ">
									<input class="input" name="age" id="age" value="{{$show_detail->age}}"  disabled>
								</p>
							</div>
						</div>
					</div>


					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label"> สถานะภาพสมรส </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="field is-grouped">
									<p class="control is-expanded has-icons-left ">
										<label class="radio">
											@if( $show_detail->current_status == 1 )
												{{ Form::radio('marital-status', '1' , true) }}
											@else
												{{ Form::radio('marital-status', '1' , false) }}
											@endif
      							โสด
    						</label>
									

										<label class="radio">
											@if( $show_detail->current_status == 2 )
												{{ Form::radio('marital-status', '2' , true) }}
											@else
												{{ Form::radio('marital-status', '2' , false) }}
											@endif
     							 สมรส
    						</label>
									

										<label class="radio">
											@if( $show_detail->current_status == 3 )
												{{ Form::radio('marital-status', '3' , true) }}
											@else
												{{ Form::radio('marital-status', '3' , false) }}
											@endif
     							 หม้าย / หย่า / แยก
    						</label>
									

										<label class="radio">
											@if( $show_detail->current_status == 4 )
												{{ Form::radio('marital-status', '4' , true) }}
											@else
												{{ Form::radio('marital-status', '4' , false) }}
											@endif
     							 สมณะ
    						</label>
									

									</p>
								</div>
							</div>
						</div>
					</div>


					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label">อาชีพ</label>
						</div>
						<div class="field-body">
							<div class="field is-narrow">
								<div class="control"> <span class="select">
									<select id ="occupation" name="occupation">
									  <option value="0" @if($show_detail->occupation == 0){ selected } @endif> โปรดเลือก </option>
									  <option value="1" @if($show_detail->occupation == 1){ selected } @endif> รับราชการ </option>
									  <option value="2" @if($show_detail->occupation == 2){ selected } @endif> พนักงานบริษัทเอกชน </option>
									  <option value="3" @if($show_detail->occupation == 3){ selected } @endif> องค์กรพัฒนาเอกชน (NGO) </option>
									  <option value="4" @if($show_detail->occupation == 4){ selected } @endif> พนักงานมหาวิทยาลัย </option>
									  <option value="5" @if($show_detail->occupation == 5){ selected } @endif> นักเรียน/นักศึกษา </option>
									  <option value="6" @if($show_detail->occupation == 6){ selected } @endif> พนักงานบริการทั่วไป </option>
									  <option value="7" @if($show_detail->occupation == 7){ selected } @endif> รับจ้างทั่วไป </option>
									  <option value="8" @if($show_detail->occupation == 8){ selected } @endif> เกษตรกร </option>
									  <option value="9" @if($show_detail->occupation == 9){ selected } @endif> ธุรกิจส่วนตัว </option>
									  <option value="10" @if($show_detail->occupation == 10){ selected } @endif> อื่นๆ โปรดระบุ </option>
									</select>
									</span>
									<input id="occupation_detail" name="occupation_detail"  type="text" value="{{$show_detail->occupation_detail}}" hidden >
								</div>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ที่อยู่</label>
						</div>
						<div class="field-body">
							<div class="field  is-grouped">
								<p class="control  is-expanded">
									<textarea class="textarea" name="address" placeholder="บ้านเลขที่ ซอย ถนน หมู่บ้าน ตำบล อำเภอ จังหวัด รหัสไปรษณีย์">{{$show_detail->address}}</textarea>
								</p>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label">ประเภทบัตร</label>
						</div>
						<div class="field-body is-expanded">
							<div class="field is-narrow ">
								<div class="control"> <span class="select">
									<select id ="card_type" name="card_type">
									  <option value="1"  @if($show_detail->card_type == 1){ selected } @endif> บัตรประชาชน </option>
									  <option value="2"  @if($show_detail->card_type == 2){ selected } @endif> บัตรต่างด้าว </option>
									  <option value="3"  @if($show_detail->card_type == 3){ selected } @endif> บัตรคนไทยไร้สถานะ </option>
									  <option value="4"  @if($show_detail->card_type == 4){ selected } @endif> พาสปอร์ต </option>
									</select>
									</span>
								</div>
							</div>
							<div class="field-label is-normal">
								<label class="label">เลขที่บัตร</label>
							</div>
							<div class="field">
								<p class="control  has-icons-left has-icons-right">
									<input class="input" type="TEXT" name="card_num" placeholder="ID-CODE" value="{{$show_detail->card_number}}">
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

				<div class="notification">
					<!--This container is <strong>centered</strong> on desktop. -->

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> หน่วยงานผู้ละเมิด </label>
						</div>
						<div class="field-body">
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
									<select id ="offender_type" name="offender_type">
									  <option value="0" @if($show_detail->type_offender == 0){ selected } @endif> โปรดเลือก </option>
									  <option value="1" @if($show_detail->type_offender == 1){ selected } @endif> สถานพยาบาล </option>
									  <option value="2" @if($show_detail->type_offender == 2){ selected } @endif> สถานที่ทำงาน </option>
									  <option value="3" @if($show_detail->type_offender == 3){ selected } @endif> สถานศึกษา </option>
									  <option value="4" @if($show_detail->type_offender == 4){ selected } @endif> ตำรวจ </option>
									  <option value="5" @if($show_detail->type_offender == 5){ selected } @endif> ทหาร </option>
									  <option value="6" @if($show_detail->type_offender == 6){ selected } @endif> ท้องถิ่น </option>
									  <option value="7" @if($show_detail->type_offender == 7){ selected } @endif> หน่วยงานอื่นๆ </option>
									</select>
									</span>
								
								</div>
							</div>
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
									<select id ="offender_subtype" name="offender_subtype" 	@if($show_detail->type_offender == 4||$show_detail->type_offender == 5) disabled @endif>
									  <option value="1" @if($show_detail->subtype_offender == 1){ selected } @endif> ของรัฐบาล </option>
									  <option value="2" @if($show_detail->subtype_offender == 2){ selected } @endif> ของเอกชน </option>

									</select>
									</span>
								
								</div>
							</div>
						</div>
					</div>




					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label"> ผู้ละเมิด </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<div class="control">
									<label class="radio">
										<input type="radio" name="type-violator" onclick="handleClick(this);" value="1" @if($show_detail->violator_name != ''){ checked } @endif >
										บุคคล
									</label>
								</div>
								<div class="control">
									<label class="text">
										ชื่อ
									</label>
								</div>
								<div class="control">
									<p>
										<input class="input" type="text" id="violator_name" name="violator_name"
											   @if($show_detail->violator_name != '')  value="{{$show_detail->violator_name}}" @else disabled @endif>
									</p>
								</div>
								<div class="control">
									<label class="text">
										หน่วยงาน
									</label>
								</div>
								<div class="control">
									<p>
										<input class="input" type="text" id="violator_organization" name="violator_organization"
											   @if($show_detail->violator_name != '')  value="{{$show_detail->violator_organization}}" @else disabled @endif>
									</p>
								</div>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label"> </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<div class="control">
									<label class="radio">
										<input type="radio" name="type-violator" onclick="handleClick(this);" value="2" @if($show_detail->violator_name == ''){ checked } @endif>
										องค์กร
									</label>
								</div>
								<div class="control">
									<label class="text">
										ชื่อ
									</label>
								</div>
								<div class="control">
									<p>
										<input class="input" type="text" id="offender_organization" name="offender_organization"
											   @if($show_detail->violator_name == '')  value="{{$show_detail->offender_organization}}" @else disabled @endif>
									</p>
								</div>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> สถานที่เกิดเหตุ </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="accident_location" placeholder="กรอกรายละเอียด">{{$show_detail->accident_location}}</textarea>
								</div>
							</div>
						</div>
					</div>
					
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> วันเวลาที่เกิดเหตุ </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="accident_time" placeholder="กรอกรายละเอียด">{{$show_detail->accident_time}}</textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ปัญหาที่แจ้ง</label>
						</div>
						<div class="field-body">
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
									<select id ="problem_case" name="problem_case">
									<option value="0"  >โปรดเลือกประเภทปัญหาของท่าน</option>
									<option value="1"  @if($show_data->problem_case == 1){ selected } @endif>บังคับตรวจเอชไอวี</option>
									<option value="2"  @if($show_data->problem_case == 2){ selected } @endif>เปิดเผยสถานะการติดเชื้อเอชไอวี</option>
									<option value="3"  @if($show_data->problem_case == 3){ selected } @endif>เลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>
									<option value="4"  @if($show_data->problem_case == 4){ selected } @endif>ไม่ได้รับความเป็นธรรมเนื่องมาจากเป็นกลุ่มเปราะบาง</option>
								</select>
									</span>
								</div>
							</div>
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
									  <select id ="sub_problem" name="sub_problem" @if($show_data->sub_problem == null){ disabled } @endif>
										  @if($show_data->problem_case == 1)
											  <option value="1" style="width:250px" @if($show_data->sub_problem == 1){ selected } @endif>ผู้ติดเชื้อเอชไอวี</option>
											  <option value="2" style="width:250px" @if($show_data->sub_problem == 2){ selected } @endif>กลุ่มเปราะบาง</option>
											  <option value="3" style="width:250px" @if($show_data->sub_problem == 3){ selected } @endif>ประชาชนทั่วไป</option>
										  @elseif($show_data->problem_case == 2 || $show_data->problem_case == 3)
											  <option value="1" style="width:250px">ผู้ติดเชื้อเอชไอวี</option>
										  @elseif($show_data->problem_case == 4)
											  <option value="1" style="width:250px">ผู้ติดเชื้อเอชไอวี</option>
										  @endif
									  </select>
									</span>
								</div>
							</div>
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
									<select id ="group_code" name="group_code" @if($show_data->group_code == null){ disabled } @endif>
										@if($show_data->sub_problem == 2)
											<option value="1" style="width:250px" @if($show_data->group_code == 1){ selected } @endif>กลุ่มหลากหลายทางเพศ</option>
											<option value="2" style="width:250px" @if($show_data->group_code == 2){ selected } @endif>พนักงานบริการ HIV</option>
											<option value="3" style="width:250px" @if($show_data->group_code == 3){ selected } @endif>ผู้ใช้สารเสพติด</option>
											<option value="4" style="width:250px" @if($show_data->group_code == 4){ selected } @endif>ประชากรข้ามชาติ</option>
											<option value="5" style="width:250px" @if($show_data->group_code == 5){ selected } @endif>ผู้ต้องขัง</option>
											<option value="6" style="width:250px" @if($show_data->group_code == 6){ selected } @endif>เยาวชนในสถานพินิจ</option>
										@endif
									</select>
									</span>
								</div>
							</div>

						</div>
					</div>
					
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ลักษณะการละเมิด </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="violation_characteristics" placeholder="กรอกรายละเอียด">{{$show_detail->violation_characteristics}}</textarea>
								</div>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ผลกระทบ </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="effect" placeholder="กรอกรายละเอียด">{{$show_detail->effect}}</textarea>
								</div>
							</div>
						</div>
					</div>
					
					<div class="field is-horizontal">
					  <div class="field-label">
						<label class="label"> สาเหตุ </label>
					  </div>
					  <div class="field-body">
						<div class="field is-grouped">
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox" name="law" @if($show_detail->cause_type1 == 1){ checked } @endif>
							  ไม่รู้กฎหมาย
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox" name="aids" @if($show_detail->cause_type2 == 1){ checked } @endif>
							  ขาดความเข้าใจที่ถูกต้องเรื่องเอดส์
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox" name="attitude" @if($show_detail->cause_type3 == 1){ checked } @endif>
							  ทัศนคติ
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox" name="policy" @if($show_detail->cause_type4 == 1){ checked } @endif>
							  นโยบายองค์กร
							</label>
						  </div>
						</div>
					  </div>
					</div>
					
					<div class="field is-horizontal">
					  <div class="field-label">
						<label class="label">  </label>
					  </div>
					  <div class="field-body">
						<div class="field is-grouped">
								<div class="control">
									<label class="checkbox">
							  <input type="checkbox" name="etc" @if($show_detail->etc == 1){ checked } @endif>
							  อื่นๆ
							</label>
								</div>
								<div class="control">
									<label class="text" name="etc_detail">
							  ระบุ
							</label>
								</div>
								<div class="control">
									<p>
										<input class="input" type="text" placeholder="" value="{{$show_detail->etc_detail}}">
									</p>
								</div>
							</div>
					  </div>
					</div>
					
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> </label>
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
					<p class="control"> {!! Form::submit('ยืนยัน',['class'=>'button is-primary']) !!}</p>

					<p class="control"> <a class="button" href="{{ route('officer.show') }}" > ยกเลิก </a> </p>
				</div>
			</div>
		</form>
	</section>
</form>
	<script>
        $('.datepicker').datepicker({
            onSelect: function(){
               // alert("test");
            }
        });
        $('#dateInput').change(function(){
            //alert("test");
            var dob = $('#dateInput').val();
            dob = new Date(dob);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $("#age").val(age);
            console.log(age);

        });
        $('#problem_case').on('change',function (e) {
            var prob_id = e.target.value;
            //console.log(prob_id);
            $('#group_code').empty();
            $('#group_code').attr('disabled', 'disabled');
            if(prob_id==1){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" style="width:250px">ผู้ติดเชื้อเอชไอวี</option>');
                $('#sub_problem').append('<option value="2" style="width:250px">กลุ่มเปราะบาง</option>');
                $('#sub_problem').append('<option value="3" style="width:250px">ประชาชนทั่วไป</option>');
            }else if(prob_id==2){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
            }else if(prob_id==3){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
            }else if(prob_id==4){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" style="width:250px">กลุ่มเปราะบาง</option>');
                $('#group_code').empty();
                $('#group_code').removeAttr('disabled');
                $('#group_code').append('<option value="1" style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
                $('#group_code').append('<option value="2" style="width:250px">พนักงานบริการ </option>');
                $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด</option>');
                $('#group_code').append('<option value="4" style="width:250px">ประชากรข้ามชาติ</option>');
                $('#group_code').append('<option value="5" style="width:250px">ผู้ต้องขัง</option>');
                $('#group_code').append('<option value="6" style="width:250px">เยาวชนในสถานพินิจ</option>');
            }else{
                $('#sub_problem').empty();
                $('#sub_problem').attr('disabled', 'disabled');
            }
        });
        $('#sub_problem').on('change',function (e) {
            var sub_id = e.target.value;
            if(sub_id==2){
                $('#group_code').empty();
                $('#group_code').removeAttr('disabled');
                $('#group_code').append('<option value="1" style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
                $('#group_code').append('<option value="2" style="width:250px">พนักงานบริการ HIV</option>');
                $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด</option>');
                $('#group_code').append('<option value="4" style="width:250px">ประชากรข้ามชาติ</option>');
                $('#group_code').append('<option value="5" style="width:250px">ผู้ต้องขัง</option>');
                $('#group_code').append('<option value="6" style="width:250px">เยาวชนในสถานพินิจ</option>');

            }else{
                $('#group_code').empty();
                $('#group_code').attr('disabled', 'disabled');
            }
        });
        $('#offender_type').on('change',function (e) {

            var sel_value = e.target.value;
            //alert(sel_value);

            if((sel_value == 4)||(sel_value == 5)) {
                document.getElementById("offender_subtype").disabled = true;
            }else {
                document.getElementById("offender_subtype").disabled = false;
            }
        });
		/*
		 $('#type-violator').on('click change',function (e) {
		 var type_id = e.target.value;
		 console.log(e.type);
		 });*/
        function handleClick(myRadio) {
            if(myRadio.value == 1)
            {
                document.getElementById("offender_organization").disabled = true;
                document.getElementById("violator_name").disabled = false;
                document.getElementById("violator_organization").disabled = false;
            }else if(myRadio.value == 2){
                document.getElementById("offender_organization").disabled = false;
                document.getElementById("violator_name").disabled = true;
                document.getElementById("violator_organization").disabled = true;

            }

            //alert('New value: ' + myRadio.value);
            //currentValue = myRadio.value;
        }

    </script>

	<br> @extends('footer')

</body>

</html>