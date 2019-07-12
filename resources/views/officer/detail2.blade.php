<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{--{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}--}}
	{{--{{ Html::style('bootstrap/css/bootstrap.css') }}--}}
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">

	{{ Html::script('js/jquery.min.js') }}
	{{ Html::script('js/thai_date_dropdown.js') }}
	{{--{{ Html::script('bootstrap/js/bootstrap.min.js') }}--}}
	{{--{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}--}}
	<link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
	<meta name="theme-color" content="#cc99cc"/>


	<title> CRS </title>
</head>

	<section class="hero is-medium has-text-centered">
		<div class="hero-head">
			<div class="container">
				@component('component.login_bar')
				@endcomponent
			</div>
		</div>
			<br>
		<form class="form-horizontal" role="form" method="POST" action="{{ route('officer.post_detail') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input id="case_id" name="case_id"  type="text" value="{{  $show_data->case_id }}" hidden >

			<div class="container">
				<nav class="breadcrumb">
					<ul>
						<li><a href="{{ route('officer.show',['mode_id' => "0"]) }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						</li>
						<li class="is-active"><a><span class="icon is-small"><i class="fa fa-address-card"></i></span><span> ข้อมูลเพิ่มเติม </span></a>
						</li>
					</ul>
				</nav>
			</div>


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
									<p class="control is-expanded  ">
										<label >
											@if( $show_data->sex == 1 )
      											{{ Form::radio('sex', '1' , true) }}
											@else
												{{ Form::radio('sex', '1' , false) }}
											@endif
												ชาย
    									</label>
									

										<label >
											@if( $show_data->sex == 2 )
												{{ Form::radio('sex', '2' , true) }}
											@else
												{{ Form::radio('sex', '2' , false) }}
											@endif
												หญิง
										</label>
									

										<label >
											@if( $show_data->sex == 3 )
												{{ Form::radio('sex', '3' , true) }}
											@else
												{{ Form::radio('sex', '3' , false) }}
											@endif
												สาวประเภทสอง
    										</label>
										<label >
											@if( $show_data->sex == 4 )
												{{ Form::radio('sex', '4' , true) }} อื่นๆ ระบุ
												<label class="radio">
												{!! Form::text('sex_etc',$show_data->sex_etc,['class'=>'input','placeholder'=>'ระบุเพศ']) !!}
												</label>
											@else
												{{ Form::radio('sex', '4' , false) }} อื่นๆ ระบุ
												<label class="radio">
												 {!! Form::text('sex_etc',$show_data->sex_etc,['class'=>'input','placeholder'=>'ระบุเพศ','style'=>'display: none']) !!}
												</label>
											@endif
										</label>
									</p>
								</div>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label"> สัญชาติ </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="field is-grouped">
									<p class="control is-expanded  ">
										<label >
											@if( $show_data->nation == 1 )
												{{ Form::radio('nation', '1' , true) }}
											@else
												{{ Form::radio('nation', '1' , false) }}
											@endif
											ไทย
										</label>


										<label >
											@if( $show_data->nation == 2 )
												{{ Form::radio('nation', '2' , true) }}
											@else
												{{ Form::radio('nation', '2' , false) }}
											@endif
											ลาว
										</label>


										<label >
											@if( $show_data->nation == 3 )
												{{ Form::radio('nation', '3' , true) }}
											@else
												{{ Form::radio('nation', '3' , false) }}
											@endif
											เวียดนาม
										</label>

										<label >
											@if( $show_data->nation == 4 )
												{{ Form::radio('nation', '4' , true) }}
											@else
												{{ Form::radio('nation', '4' , false) }}
											@endif
											พม่า
										</label>

										<label >
											@if( $show_data->nation == 5 )
												{{ Form::radio('nation', '5' , true) }}
											@else
												{{ Form::radio('nation', '5' , false) }}
											@endif
											กัมพูชา
										</label>

										<label >
											@if( $show_data->nation == 6 )
												{{ Form::radio('nation', '6' , true) }} อื่นๆ ระบุ
												<label class="radio">
												{!! Form::text('nation_etc',$show_data->nation_etc,['class'=>'input','placeholder'=>'ระบุสัญชาติ']) !!}
												</label>
											@else
												{{ Form::radio('nation', '6' , false) }} อื่นๆ ระบุ
												<label class="radio">
												{!! Form::text('nation_etc',$show_data->nation_etc,['class'=>'input','placeholder'=>'ระบุสัญชาติ','style'=>'display: none']) !!}
												</label>
											@endif
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
									<input class="input" type="text" placeholder="ชื่อผู้แจ้ง" value="{{ $show_data->Provinces->PROVINCE_NAME }}" disabled>
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
								<label class="label"></label>
							</div>
							<div class="field-body">
								<div class="field is-grouped">
									<p class="control is-expanded  ">
									@if($show_data->geolat <> '' )
										<a class="button is-primary" target="_blank" href="https://www.google.com/maps/?q={{ $show_data->geolat }},{{ $show_data->geolon }}">
											<span class="icon is-left">
											<i class="fas fa-map"></i>
											</span>
											<span>คลิกเพื่อแสดงพิกัดบนแผนที่</span>
										</a>
									@else
									<a class="button is-primary" target="_blank" href="" disabled>
											<span class="icon is-left">
											<i class="fas fa-map"></i>
											</span>
											<span>ไม่มีการบันทึกพิกัด</span>
										</a>
									@endif
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
						<div class="field-label is-normal">
							<label class="label"> ความต้องการความช่วยเหลือ </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="need"  >{{ $show_data->need }}</textarea>
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
									<div class="control is-expanded " >
										@if ($show_data->file1 == '')
										<a class="button is-primary" target="_blank" href="" disabled>
											<span class="icon is-left">
											<i class="fas fa-file-alt"></i>
											</span>
											<span>ไม่มีการบันทึกข้อมูลเพิ่มเติม</span>
										</a>
										@else
											<a class="button is-primary " href="{{asset('/uploads/'.$show_data->case_id.'/'.$show_data->file1)}}" download>
											<span class="icon is-left">
											<i class="fas fa-file-alt"></i>
											</span>
											<span>คลิกเพื่อดาวน์โหลดข้อมูลเพิ่มเติม 1</span>
											</a>
										@endif
										@if ($show_data->file2 == '')
										@else
											<a class="button is-primary " href="{{asset('/uploads/'.$show_data->case_id.'/'.$show_data->file2)}}" download>
											<span class="icon is-left">
											<i class="fas fa-file-alt"></i>
											</span>
											<span>คลิกเพื่อดาวน์โหลดข้อมูลเพิ่มเติม 2</span>
											</a>
										@endif
										@if ($show_data->file3 == '')
										@else
											<a class="button is-primary " href="{{asset('/uploads/'.$show_data->case_id.'/'.$show_data->file3)}}" download>
											<span class="icon is-left">
											<i class="fas fa-file-alt"></i>
											</span>
											<span>คลิกเพื่อดาวน์โหลดข้อมูลเพิ่มเติม 3</span>
											</a>
										@endif
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
							<label class="label"> วันที่สอบถามข้อมูล </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left " >
									<!--This container is birth_date input. -->
								<div class="input-group date" data-provide="datepicker">
									ปี พ.ศ. : <input type="number" min="2561" max="2570" value = {{ date("Y")+543 }}  id="YearInterview" name="YearInterview" class="form-control" placeholder="ปปปป" onchange="date_interview();createinterviewdate()">
									เดือน :  <select id ="MonthInterview" name="MonthInterview" onchange="date_interview();createinterviewdate();">
										<option value="1"> มกราคม </option>
										<option value="2"> กุมภาพันธ์ </option>
										<option value="3"> มีนาคม </option>
										<option value="4"> เมษายน </option>
										<option value="5"> พฤษภาคม </option>
										<option value="6"> มิถุนายน </option>
										<option value="7"> กรกฎาคม </option>
										<option value="8"> สิงหาคม </option>
										<option value="9"> กันยายน </option>
										<option value="10"> ตุลาคม </option>
										<option value="11"> พฤศจิกายน </option>
										<option value="12"> ธันวาคม </option>
									</select>
									วันที่ : <select id ="DayInterview" name="DayInterview" onchange="createinterviewdate();">
										@for ($i = 1; $i <= 31; $i++)
											<option value="{{$i}}">{{$i}}</option>
										@endfor
									      </select>

									<input type="hidden" id="DateInterview" name="DateInterview" class="form-control" >
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>
								<!-- interview input -->
								</p>
							</div>

						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> วันเกิด </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left " >
									<!--This container is birth_date input. -->
								<div class="input-group date" data-provide="datepicker">
									ปี พ.ศ. : <input type="number" min="2400" max="2570" maxlength = "4"  id="yearInput" name="yearInput" class="form-control" placeholder="ปปปป" onchange="date_birth();createbirthdate();">
									เดือน : 	<select id ="monthInput" name="monthdate" onchange="date_birth();createbirthdate();">
										<option value="1"> มกราคม </option>
										<option value="2"> กุมภาพันธ์ </option>
										<option value="3"> มีนาคม </option>
										<option value="4"> เมษายน </option>
										<option value="5"> พฤษภาคม </option>
										<option value="6"> มิถุนายน </option>
										<option value="7"> กรกฎาคม </option>
										<option value="8"> สิงหาคม </option>
										<option value="9"> กันยายน </option>
										<option value="10"> ตุลาคม </option>
										<option value="11"> พฤศจิกายน </option>
										<option value="12"> ธันวาคม </option>
									</select>
									วันที่ : <select id ="dayInput" name="birthdate" onchange="createbirthdate();">
										@for ($i = 1; $i <= 31; $i++)
											<option value="{{$i}}">{{$i}}</option>
										@endfor
										</select>

									<input type="hidden" id="dateInput" name="birthdate" class="form-control" >
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>
								   <!-- birth_date input -->
								</p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> อายุ </label>
							</div>
							<div class="field">
								<p class="control  ">
									<input class="input" type="text" name="age"  id="age" readonly>
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
							<label >
      							{{ Form::radio('marital-status', '1' , true) }} 
      							โสด
    						</label>
							<label >
     							{{ Form::radio('marital-status', '2' , false) }}
								สมรส
    						</label>
							<label >
     							{{ Form::radio('marital-status', '3' , false) }}
								หม้าย / หย่า / แยก
    						</label>
							<label >
     							{{ Form::radio('marital-status', '4' , false) }}
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
									  <option value="0"> โปรดเลือก </option>
									  <option value="1"> ทำงานในหน่วยงานราชการ </option>
									  <option value="2"> ทำงานในบริษัทเอกชน </option>
									  <option value="3"> ทำงานในองค์กรพัฒนาเอกชน (NGO) </option>
									  <option value="4"> ธุรกิจส่วนตัว </option>
									  <option value="5"> รับจ้างทั่วไป </option>
									  <option value="6"> เกษตรกร </option>
									  <option value="7"> นักเรียน/นักศึกษา </option>
									  <option value="8"> ว่างงาน </option>
									  <option value="9"> อื่นๆ โปรดระบุ </option>
									</select>
									</span>
									<input class="input" id="occupation_detail" name="occupation_detail"   type="text" value="" style="display: none" >
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
									<textarea class="textarea" name="address" placeholder="บ้านเลขที่ ซอย ถนน หมู่บ้าน ตำบล อำเภอ จังหวัด รหัสไปรษณีย์"></textarea>
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
									  <option value="1"> บัตรประชาชน </option>
									  <option value="2"> บัตรต่างด้าว </option>
									  <option value="3"> บัตรคนไทยไร้สถานะ </option>
									  <option value="4"> พาสปอร์ต </option>
									</select>
									</span>
								</div>
							</div>
							<div class="field-label is-normal">
								<label class="label">เลขที่บัตร</label>
							</div>
							<div class="field">
								<p class="control  has-icons-left has-icons-right">
									{!! Form::text('card_num',null,['class'=>'input','placeholder' => 'ID-CODE','maxlength' => 13 ])!!}
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
									<select id ="offender_type" name="offender_type"  >
									  <option value="0"> โปรดเลือก </option>
									  <option value="1"> สถานพยาบาล </option>
									  <option value="2"> สถานที่ทำงาน </option>
									  <option value="3"> สถานศึกษา </option>
									  <option value="4"> หน่วยงานที่บังคับใช้กฎหมาย</option>
									  <option value="5"> องค์กรปกครองส่วนท้องถิ่น </option>
									  <option value="6"> หน่วยงานอื่นๆ </option>
									</select>
									</span>
								
								</div>
							</div>
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
									<select id ="offender_subtype" name="offender_subtype" disabled>
									  <option value="1"> ของรัฐบาล </option>
									  <option value="2"> ของเอกชน </option>
									  <option value="3"> อื่นๆ </option>
									</select>
									</span>
								
								</div>
							</div>
						</div>
					</div>



					<!-- Violent group -->
					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label"> ผู้ละเมิด </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<div class="control">
									<label class="radio">
										<input type="radio" name="type-violator" onclick="handleClick(this);" value="1" checked>
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
										<input class="input" type="text" id="violator_name" name="violator_name">
									</p>
								</div>
								<div class="control">
									<label class="text">
										หน่วยงาน
									</label>
								</div>
								<div class="control">
									<p>
										<input class="input" type="text" id="violator_organization" name="violator_organization">
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
							  <input type="radio" name="type-violator" onclick="handleClick(this);" value="2" >
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
										<input class="input" type="text" id="offender_organization" name="offender_organization" disabled>
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- Violent group -->
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> สถานที่เกิดเหตุ </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="accident_location" placeholder="กรอกรายละเอียด"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> วันที่เกิดเหตุ </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left " >
									<!--This container is birth_date input. -->
								<div class="input-group date" data-provide="datepicker">
									ปี พ.ศ. : <input type="number" min="2561" max="2570" value = {{ date("Y")+543 }} id="YearAct" name="YearAct" class="form-control" placeholder="ปปปป" onchange="date_acc();createaccidentdate();">
									เดือน : <select id ="MonthAct" name="MonthAct" onchange="date_acc();createaccidentdate();">
										<option value="1"> มกราคม </option>
										<option value="2"> กุมภาพันธ์ </option>
										<option value="3"> มีนาคม </option>
										<option value="4"> เมษายน </option>
										<option value="5"> พฤษภาคม </option>
										<option value="6"> มิถุนายน </option>
										<option value="7"> กรกฎาคม </option>
										<option value="8"> สิงหาคม </option>
										<option value="9"> กันยายน </option>
										<option value="10"> ตุลาคม </option>
										<option value="11"> พฤศจิกายน </option>
										<option value="12"> ธันวาคม </option>
									</select>
									วันที่ : <select id ="DayAct" name="DayAct" onchange="createaccidentdate();">
											@for ($i = 1; $i <= 31; $i++)
											<option value="{{$i}}">{{$i}}</option>
											@endfor
											</select>

									<input  type="hidden" id="DateAct" name="DateAct" class="form-control" >
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-th"></span>
									</div>
								</div>
								<!-- interview input -->
								</p>
							</div>

						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> รายละเอียดวันเวลาที่เกิดเหตุ </label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" name="accident_time" placeholder="กรอกรายละเอียด"></textarea>
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
									<option value="3"  @if($show_data->problem_case == 3){ selected } @endif>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>
									<option value="4"  @if($show_data->problem_case == 4){ selected } @endif>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง</option>
									<option value="5"  @if($show_data->problem_case == 5){ selected } @endif>อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</option>
								</select>
									</span>
								</div>
							</div>
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
									  <select id ="sub_problem" name="sub_problem" @if($show_data->sub_problem == null){ disabled } @endif>
										  @if(($show_data->problem_case == 1)||($show_data->problem_case == 5))
											  <option value="1" style="width:250px" @if($show_data->sub_problem == 1){ selected } @endif>ผู้ติดเชื้อเอชไอวี</option>
											  <option value="2" style="width:250px" @if($show_data->sub_problem == 2){ selected } @endif>กลุ่มเปราะบาง</option>
											  <option value="4" style="width:250px" @if($show_data->sub_problem == 4){ selected } @endif>ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>
											  <option value="3" style="width:250px" @if($show_data->sub_problem == 3){ selected } @endif>ประชาชนทั่วไป</option>
										  @elseif($show_data->problem_case == 2 || $show_data->problem_case == 3)
											  <option value="1" style="width:250px">ผู้ติดเชื้อเอชไอวี</option>
										  @elseif($show_data->problem_case == 3)
											  <option value="1" style="width:250px" @if($show_data->sub_problem == 1){ selected } @endif>ผู้ติดเชื้อเอชไอวี</option>
											  <option value="4" style="width:250px" @if($show_data->sub_problem == 4){ selected } @endif>ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>
										  @elseif($show_data->problem_case == 4)
											  <option value="2" style="width:250px">กลุ่มเปราะบาง</option>
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
											<option value="2" style="width:250px" @if($show_data->group_code == 2){ selected } @endif>พนักงานบริการ</option>
											<option value="3" style="width:250px" @if($show_data->group_code == 3){ selected } @endif>ผู้ใช้สารเสพติด</option>
											<option value="4" style="width:250px" @if($show_data->group_code == 4){ selected } @endif>ประชากรข้ามชาติ</option>
											<option value="5" style="width:250px" @if($show_data->group_code == 5){ selected } @endif>ผู้ต้องขัง</option>
											<option value="6" style="width:250px" @if($show_data->group_code == 6){ selected } @endif>เยาวชนในสถานพินิจ</option>
											<option value="7" style="width:250px" @if($show_data->group_code == 7){ selected } @endif>กลุ่มชนเผ่า</option>
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
									<textarea class="textarea" name="violation_characteristics" placeholder="กรอกรายละเอียด"></textarea>
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
									<textarea class="textarea" name="effect" placeholder="กรอกรายละเอียด"></textarea>
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
							<label >
							  <input type="checkbox" name="law">
							  ไม่รู้กฎหมาย
							</label>
						  </div>
						  <div class="control">
							<label >
							  <input type="checkbox" name="aids">
							  ขาดความเข้าใจที่ถูกต้องเรื่องเอดส์
							</label>
						  </div>
						  <div class="control">
							<label >
							  <input type="checkbox" name="attitude">
							  ทัศนคติ
							</label>
						  </div>
						  <div class="control">
							<label >
							  <input type="checkbox" name="policy">
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
							  <input type="checkbox" name="etc">
							  อื่นๆ
							</label>
								</div>
								<div class="control">
									<label class="text" >
							  ระบุ
							</label>
								</div>
								<div class="control">
									<p>
										<input name="etc_detail" class="input" type="text" placeholder="" style="display: none">
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
					@if (Auth::user()->p_receive == 'no')
								@elseif (Auth::user()->p_receive == 'yes')
								<p class="control"> {!! Form::submit('ยืนยัน',['class'=>'button is-primary']) !!}</p>
								@endif

					<p class="control"> <a class="button" href="{{ route('officer.show',['mode_id' => "0"]) }}" > ยกเลิก </a> </p>
				</div>
			</div>
	</section>
</form>
{{ Html::script('js/select_list.js') }}

	<script>
//        $('.datepicker').datepicker();


        $('#offender_type').on('change',function (e) {

            var sel_value = e.target.value;
            //alert(sel_value);

			 if((sel_value == 4)||(sel_value == 5)) {
			  document.getElementById("offender_subtype").disabled = true;
			 }else {
			  document.getElementById("offender_subtype").disabled = false;
			 }
        });

///// show and hide even btn ///////
$('#occupation').on('change',function (e) {

    var sel_value = e.target.value;
    //alert(sel_value);

    if(sel_value == 9) {
        $('#occupation_detail').show();
    }else {
        $('#occupation_detail').hide();
    }
	});
	$("input[name='sex']").on('change',function (e) {

    var sel_value = e.target.value;
    //alert(sel_value);

    if(sel_value == 4) {
        $("input[name='sex_etc']").show();
    }else {
        $("input[name='sex_etc']").hide();
    }
	});
	$("input[name='nation']").on('change',function (e) {

    var sel_value = e.target.value;
    //alert(sel_value);

    if(sel_value == 6) {
        $("input[name='nation_etc']").show();
    }else {
        $("input[name='nation_etc']").hide();
    }
	});
	$("input[name='etc']").on('change',function (e) {

    var sel_value = e.target.checked;
    //alert(sel_value);
    if(sel_value) {
        $("input[name='etc_detail']").show();
    }else {
        $("input[name='etc_detail']").hide();
    }
	});
///// end show and hide even btn ///////
        /*
        $('#type-violator').on('click change',function (e) {
			var type_id = e.target.value;
            console.log(e.type);
        });*/
        function createbirthdate() {

            $('#dateInput').val($('#monthInput').val()+"/"+ $('#dayInput').val()+"/"+ ($('#yearInput').val()-543));
            var dob = $('#dateInput').val();
            dob = new Date(dob);
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $("#age").val(age);
            //console.log(age);
        }
        function createinterviewdate() {
            $('#DateInterview').val($('#MonthInterview').val()+"/"+ $('#DayInterview').val()+"/"+ ($('#YearInterview').val()-543));
        }
        function createaccidentdate() {
            $('#DateAct').val($('#MonthAct').val()+"/"+ $('#DayAct').val()+"/"+ ($('#YearAct').val()-543));
        }
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
</html>