<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
									<input type="text" name="operate_date" id="operate_date" class="form-control">
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
							  <input type="checkbox" name="advice" id="advice">
							  ให้คำปรึกษา
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox" name="negotiate_individual" id="negotiate_individual">
							  เจรจาเป็นรายบุคคล
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox" name="negotiate_policy" id="negotiate_policy">
							  เจรจาระดับนโยบายขององค์กร
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
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
									<select name="status">
										<option value="4"> อยู่ระหว่างการดำเนินการ </option>
										<option value="5"> ดำเนินการเสร็จสิ้น </option>
										<option value="6"> ดำเนินการแล้วส่งต่อ </option>
									   </select> </span>
								</p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> ผลการดำเนินการ </label>
							</div>
							<div class="field">
								<p class="control is-expanded  has-icons-right">
									<span class="select">
									<select name="operate_result_status">
									<option value="1"> สำเร็จ </option>
									<option value="2"> ไม่สำเร็จ </option>
									<option value="3"> ตาย </option>
									<option value="4"> ย้ายที่อยู่ </option>
								  </select> </span>
								</p>
								<div class="control">
							<label class="checkbox">
							  <input type="checkbox" name="compensation">
							    บุคคลได้รับการชดเชย
							</label>
						  </div>
						  <div class="control">
							<label class="checkbox">
							  <input type="checkbox" name="change_policy">
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
									<select name="refer_type">
										<option value="1"> หน่วยงานในเครือข่าย </option>
										<option value="2"> หน่วยงานนอกเครือข่าย </option>
									   </select> </span>
								</p>
								<p class="control   ">
									<span class="select">
									<select>
										@foreach($provinces as $province)
											<option value="{{ $province->PROVINCE_CODE }}" style="width:250px">{{ $province->PROVINCE_NAME }}</option>
										@endforeach
									   </select> </span>
								</p>
								<p class="control  has-icons-left">
									<input class="input" type="text"  name="refer_name" value="ชื่อหน่วยงาน">
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
									<p class="control"> <a class="button" href="{{ route('officer.show') }}"> ยกเลิก </a> </p>
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

        function renderTable() {
            var case_id = $('#case_id').val();
			var url = "{{route('officer.load_activities',['case_id' => ":case_id"]) }}";
            url = url.replace(':case_id', case_id);

            console.log(url);
            var $request = $.get(url); // make request
            var $container = $('.table-container');

            $container.addClass('loading'); // add loading class (optional)

            $request.done(function(data) { // success
                $container.html(data.html);
            });
            $request.always(function() {
                $container.removeClass('loading');
            });
        }
		function  clear_input() {
            $('#advice').checked = false;
            $('#negotiate_individual').checked = false;
            $('#negotiate_policy').checked = false;
            $('#prosecution').checked = false;
        }
        $('.datepicker').datepicker();

        //# sourceURL=pen.js

		///////// create operate case /////////////////////
        $('#operate_send').on('click', function(e) {
            e.preventDefault();
            var case_id_s = $('#case_id').val();
            var operate_date_s = $('#operate_date').val();
            var advice_s = 0;
            var negotiate_individual_s = 0;
            var negotiate_policy_s = 0;
            var prosecution_s = 0;
            if ($('#advice').is(':checked') == true) {
                advice_s = 1;
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
                }
            })
         });
		///////////////////////////////
	</script>

	@extends('footer')
</body>

</html>