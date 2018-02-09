<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="{{ asset('css/jquery.min.js') }}"></script>

	<title> CRS </title>
	{{--{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}--}}
	{{--{{ Html::style('bootstrap/css/bootstrap.css') }}--}}
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">

	{{ Html::script('js/jquery.min.js') }}
	{{--{{ Html::script('bootstrap/js/bootstrap.min.js') }}--}}
	{{--{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}--}}
	<link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
	<meta name="theme-color" content="#cc99cc"/>
</head>

<body class="layout-default" onload="renderTable()">
	<section class="hero is-medium has-text-centered">
		<div class="hero-head">
			<div class="container">
				@component('component.login_bar')
				@endcomponent
			</div>
		</div>

		<input type="hidden" id="token" value="{{ csrf_token() }}">

		<div class="container">
				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
					</div>
				</div>
				<nav class="breadcrumb">
					<ul>
						<li><a href="{{ route('officer.show') }}" ><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
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
								<a href="{{ route('officer.edit_detail2' , $show_data->case_id) }}">
								<span class="icon is-small"><i class="fa fa-image"></i></span>
								<span > ข้อมูลเพิ่มเติม </span>
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
									<input class="input" id="case_id" type="text" placeholder="ID-CODE" value="{{ $show_data->case_id }}" disabled>
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

					<!--This container is <strong>centered</strong> on desktop. -->
				<div class="table-container">
				</div>






				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
						<p class="control">
						<button class="button is-primary" id="btn_add" onclick="open_add_form()"> เพิ่มการดำเนินการ </button>
						</p>
					</div>
				</div>
				<div class="notification" id="current_operate">
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
									วันที่ : <input type="number" min="01" max="31" maxlength = "2" id="Dayoperate" name="DayAct" class="form-control" placeholder="วว" onchange="createoperate();">
									เดือน : <input type="number" min="01" max="12" maxlength = "2" id="Monthoperate" name="MonthAct" class="form-control" placeholder="ดด" onchange="createoperate();">
									ปี พ.ศ. : <input type="number" min="2400" max="2570" maxlength = "4" id="Yearoperate" name="YearAct" class="form-control" placeholder="ปปปป" onchange="createoperate();">
									<input type="hidden" name="operate_date" id="operate_date" class="form-control">
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
								<label >
									<input type="checkbox" name="investigate" id="investigate">
									สืบหาข้อเท๊จจริง
								</label>
							</div>
						  <div class="control">
							<label >
							  <input type="checkbox" name="advice" id="advice">
							  ให้คำปรึกษา
							</label>
						  </div>
						  <div class="control">
							<label >
							  <input type="checkbox" name="negotiate_individual" id="negotiate_individual">
							  เจรจาเป็นรายบุคคล
							</label>
						  </div>
						  <div class="control">
							<label >
							  <input type="checkbox" name="negotiate_policy" id="negotiate_policy">
							  เจรจาระดับนโยบายขององค์กร
							</label>
						  </div>
						  <div class="control">
							<label >
							  <input type="checkbox" name="prosecution" id="prosecution">
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
									<textarea class="textarea" name="operate_detail" id="operate_detail" placeholder="กรอกรายละเอียด"></textarea>
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
									<textarea class="textarea" name="operate_result" id="operate_result" placeholder="กรอกรายละเอียด"></textarea>
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
									<p class="control"> <a class="button is-primary" id="operate_send" > ยืนยัน </a> </p>
								</div>
								<div class="control">
									<p class="control"> <a class="button" onclick="clear_input()"> ยกเลิก </a> </p>
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
									<select name="status" id="status_operate">
										<option value="4" @if($show_data->status == 4 ) selected @endif> อยู่ระหว่างการดำเนินการ </option>
										<option value="5" @if($show_data->status == 5 ) selected @endif> ดำเนินการเสร็จสิ้น </option>
										<option value="6" @if($show_data->status == 6 ) selected @endif> ดำเนินการแล้วส่งต่อ </option>
									   </select> </span>
								</p>
							</div>

						</div>
					</div>
					<div class="field is-horizontal"  id="result_form" @if($show_data->status != 5 ) style="display: none" @endif>
						<div class="field-label is-normal">
							<label class="label"> ผลการดำเนินการ </label>
						</div>
						<div class="field-body" >
							<div class="columns">
							<p class="column">
									<span class="select">
									<select name="operate_result_status" id="operate_result_status">
									<option value="1" @if($show_data->operate_result_status == 1 ) selected @endif> สำเร็จ </option>
									<option value="2" @if($show_data->operate_result_status == 2 ) selected @endif> ไม่สำเร็จ </option>
									<option value="3" @if($show_data->operate_result_status == 3 ) selected @endif> ตาย </option>
									<option value="4" @if($show_data->operate_result_status == 4 ) selected @endif> ย้ายที่อยู่ </option>
								  	</select>
									</span>
							</p>



								<p class="column " id="chk_result" @if($show_data->operate_result_status != 1 ) style="display: none" @endif>
								<label class="checkbox">
										<input type="checkbox" name="problemfix" id="problemfix" @if($show_data->problemfix == 1 ) checked @endif>
										ปัญหาได้รับการแก้ไข
								</label>
								<label class="checkbox">
									<input type="checkbox" name="compensation" id="compensation" @if($show_data->compensation == 1 ) checked @endif>
									บุคคลได้รับการเยียวยา
								</label>
								<label class="checkbox">
									<input type="checkbox" name="change_policy" id="change_policy" @if($show_data->change_policy == 1 ) checked @endif>
									องค์กรเปลี่ยนนโยบาย
								</label>
								</p>
							</div>
						</div>
					</div><!--- resulte group !-->
					
					<div class="field is-horizontal" id="refer_form" @if($show_data->status != 6 ) style="display: none" @endif >
						<div class="field-label is-normal">
							<label class="label"> ส่งต่อไปยัง </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control   ">
									<span class="select">
									<select name="refer_type" id="refer_type">
										<option value="1" @if($show_data->refer_type == 1 ) selected @endif> หน่วยงานในเครือข่าย </option>
										<option value="2" @if($show_data->refer_type == 2 ) selected @endif> หน่วยงานนอกเครือข่าย </option>
									</select> </span>
								</p>
								<p class="control">
									<span class="select">
									<select id="prov_refer">
										@foreach($provinces as $province)
											<option @if($show_data->prov_refer == $province->PROVINCE_CODE ) selected @endif value="{{ $province->PROVINCE_CODE }}" style="width:250px">{{ $province->PROVINCE_NAME }}</option>
										@endforeach
									   </select> </span>
								</p>
								<p class="control  has-icons-left">
									<input class="input" type="text"  name="refer_name" id="refer_name" placeholder="ชื่อหน่วยงาน"
										   value="{{$show_data->refer_name}}">
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
									<p class="control"> <a class="button is-primary" onclick="update_operate_case()"> ยืนยัน </a> </p>
								</div>
								<div class="control">
									<p class="control"> <a class="button" href="{{ route('officer.show') }}"> ยกเลิก </a> </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				{{--<div class="box">--}}
					{{--<div class="field is-horizontal">--}}
						{{--<div class="field-label is-normal">--}}
							{{--<label class="label"> ผลการดำเนินการที่ส่งต่อ </label>--}}
						{{--</div>--}}
						{{--<div class="field-body">--}}
							{{--<div class="field is-grouped">--}}
								{{--<p class="control  ">--}}
									{{--<input class="input" type="text" placeholder="" value="ยังไม่ได้รับเรื่อง" disabled>--}}
									 {{--</p>--}}
							{{--</div>--}}
							{{--<div class="field-label is-normal">--}}
								{{--<label class="label"> ดำเนินการเสร็จสิ้น </label>--}}
							{{--</div>--}}
							{{--<div class="field">--}}
								{{--<p class="control  has-icons-left ">--}}
									{{--<input class="input" type="text" placeholder="" value="" disabled>--}}
									 {{--</p>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</div>--}}
				{{--</div>--}}

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
		////////////////////////////// operate control /////////////////////////
		function edit_operate(operate_id) {
            var url = "{{route('officer.edit_operate',['operate_id' => ":operate_id"]) }}";
            url = url.replace(':operate_id', operate_id);
            var $request = $.get(url); // make request
            var $container = $('#edit_area'+operate_id);
            $request.done(function(data) { // success
                $container.html(data.html);
            });
        }
        function clear_edit(operate_id) {
            $('#edit_area'+operate_id).empty();
        }
        function createoperate() {
            $('#operate_date').val($('#Dayoperate').val()+"/"+ $('#Monthoperate').val()+"/"+ ($('#Yearoperate').val()-543));
        }
        function update_operate(operate_id) {
            var advice_s = 0;
            var investigate_s = 0;
            var negotiate_individual_s = 0;
            var negotiate_policy_s = 0;
            var prosecution_s = 0;
            if ($('#edit_advice'+operate_id).is(':checked') == true) {
                advice_s = 1;
            }
            if ($('#edit_investigate'+operate_id).is(':checked') == true) {
                investigate_s = 1;
            }
            if ($('#edit_negotiate_individual'+operate_id).is(':checked') == true) {
                negotiate_individual_s = 1;
            }
            if ($('#edit_negotiate_policy'+operate_id).is(':checked') == true) {
                negotiate_policy_s = 1;
            }
            if ($('#edit_prosecution'+operate_id).is(':checked') == true) {
                prosecution_s = 1;
            }
            var operate_detail_s = $('#edit_operate_detail'+operate_id).val();
            var operate_result_s = $('#edit_operate_result'+operate_id).val();
            var token = $('#token').val();
            $.ajax({
                type: 'POST',
                url: '{!!  route('officer.update_operate') !!}',
                data: {
                    _token: token,
                    id: operate_id,
                    advice: advice_s,
                    investigate: investigate_s,
                    negotiate_individual: negotiate_individual_s,
                    negotiate_policy: negotiate_policy_s,
                    prosecution: prosecution_s,
                    operate_detail: operate_detail_s,
                    operate_result: operate_result_s
                },
                success: function( data ) {
                    //console.log(data);
                    clear_edit(operate_id)
                }
            })
        }
        function renderTable() {
            var case_id = $('#case_id').val();
			var url = "{{route('officer.load_activities',['case_id' => ":case_id"]) }}";
            url = url.replace(':case_id', case_id);

            console.log(url);
            var $request = $.get(url); // make request
            var $container = $('.table-container');

            $container.addClass('loading'); // add loading class (optional)

            $request.done(function(data) { // success
				if(data.html != ""){
				    //alert(data.html)
                    $('#current_operate').hide();
				}else{
                    $('#btn_add').hide();
				}
                $container.html(data.html);
            });
            $request.always(function() {
                $container.removeClass('loading');
            });

        }
        function open_add_form() {
            $('#current_operate').show();
            $('#btn_add').hide();
        }
		function  clear_input() {
		    //alert("test");
            $('#operate_date').val("");
            $('#operate_detail').val("");
            $('#operate_result').val("");
            $('#advice').prop('checked', false);
            $('#negotiate_individual').prop('checked', false);
            $('#negotiate_policy').prop('checked', false);
            $('#prosecution').prop('checked', false);
            $('#current_operate').hide();
            $('#btn_add').show();
        }
//        $('.datepicker').datepicker();


		///////// create operate case /////////////////////
        $('#operate_send').on('click', function(e) {
            e.preventDefault();
            var case_id_s = $('#case_id').val();
            var operate_date_s = $('#operate_date').val();
            var advice_s = 0;
            var investigate_s = 0;
            var negotiate_individual_s = 0;
            var negotiate_policy_s = 0;
            var prosecution_s = 0;
            if ($('#advice').is(':checked') == true) {
                advice_s = 1;
            }
            if ($('#investigate').is(':checked') == true) {
                investigate_s = 1;
            }
            if ($('#negotiate_individual').is(':checked') == true) {
                negotiate_individual_s = 1;
            }
            if ($('#negotiate_policy').is(':checked') == true) {
                negotiate_policy_s = 1;
            }
            if ($('#prosecution').is(':checked') == true) {
                prosecution_s = 1;
            }
            var operate_detail_s = $('#operate_detail').val();
            var operate_result_s = $('#operate_result').val();
            var token = $('#token').val();
			//alert(token);
            $.ajax({
                type: 'POST',
                url: '{!!  route('officer.post_activities') !!}',
                data: {
                    _token: token,
                    case_id: case_id_s,
                    operate_date: operate_date_s,
                    advice: advice_s,
                    investigate: investigate_s,
                    negotiate_individual: negotiate_individual_s,
                    negotiate_policy: negotiate_policy_s,
                    prosecution: prosecution_s,
                    operate_detail: operate_detail_s,
                    operate_result: operate_result_s
                },
                success: function( data ) {
                    //console.log(data);
                    $("#ajaxResponse").append("<div>"+data.msg+"</div>");
                    renderTable();
                    clear_input();
                    $('#current_operate').hide();
                    $('#btn_add').show();
                }
            })
         });
		///////////////////////////////


		/////////// status form control///////
		$('#status_operate').change(function () {
			if(this.value==4){
                $('#result_form').hide();
                $('#refer_form').hide();
			}else if(this.value==5){
                $('#result_form').show();
                if($('#operate_result_status').val()==1){
                    $('#chk_result').show();
				}
                $('#refer_form').hide();
			}else if(this.value==6){
                $('#result_form').hide();
                $('#refer_form').show();
            }
            });
        $('#operate_result_status').change(function () {
            if(this.value==1){
                $('#chk_result').show();
            }else {
                $('#chk_result').hide();
                //alert("test")
                document.getElementById("compensation").checked = false;
                document.getElementById("change_policy").checked = false;

			}

        });

        function update_operate_case(){
            //alert("test");
            var case_id_s = $('#case_id').val();
            var status = $('#status_operate').val();
           var operate_result_status = $('#operate_result_status').val();
            var compensation = 0;
            var change_policy = 0;
            var problemfix = 0;
            if ($('#compensation').is(':checked') == true) {
                compensation = 1;
            }
            if ($('#change_policy').is(':checked') == true) {
                change_policy = 1;
            }
            if ($('#problemfix').is(':checked') == true) {
                problemfix = 1;
            }

            var prov_refer = $('#prov_refer').val();
            var refer_type = $('#refer_type').val();
            var refer_name = $('#refer_name').val();
            var token = $('#token').val();
            $.ajax({
                type: 'POST',
                url: '{!!  route('officer.update_case') !!}',
                data: {
                    _token: token,
                    case_id: case_id_s,
                    status: status,
                    operate_result_status: operate_result_status,
                    problemfix: problemfix,
                    compensation: compensation,
                    change_policy: change_policy,
                    prov_refer: prov_refer,
                    refer_type: refer_type,
                    refer_name: refer_name
                },
                success: function( data ) {
                    //console.log(data);
                    $("#ajaxResponse").append("<div>"+data.msg+"</div>");
                    //alert("อัพเดตสถาณะเสร็จสมบูรณ์");
                    window.location = "{{ route('officer.show') }}";
                }
            });
		}
		//////////////////////////////////////
	</script>

	@extends('footer')
</body>

</html>