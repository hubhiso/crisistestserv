<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}"
		  rel="stylesheet"> {{ Html::script('js/jquery.min.js') }}
	<link rel="stylesheet" type="text/css" href="css/uploadicon/new3.css" />
	<title> CRS </title>

</head>

<body onload="load()">

	{!! Form::open(['url' =>'case_inputs','files' => true]) !!} @component('component.input_head') @endcomponent


	<div class="container">

		<section class="section">

			<nav class="breadcrumb">
				<ul>
					<li><a href="{{ 'index.php' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
					</li>
					<li class="is-active"><a><span class="icon is-small"><i class="fa fa-bullhorn"></i></span><span> แจ้งเรื่อง </span></a>
					</li>
				</ul>
			</nav>

			<h2 id="modern-framework" class="subtitle"> กรุณาบันทึกข้อมูลเบื้องต้น เพื่อให้เจ้าหน้าที่รับเรื่องสามารถติดต่อไปภายหลัง </h2>

			<!-- input class="button is-primary" type="button" value="คลิกเพื่อระบุว่าเป็นผู้แจ้งแทน" onClick="showHideDiv('data-agent')"/><br><br-->
			<!--input class="button is-primary" type="button" value="คลิกเพื่อระบุว่าเป็นผู้แจ้งแทน" /><br><br-->
			{!! Form::button('คลิกเพื่อระบุว่าเป็นผู้แจ้งแทน', ['class' => 'button is-primary', 'onclick' => "showHideDiv('data-agent')"]) !!}<br><br>

			<div class="box" id="data-agent">
				<div class="field is-horizontal">
					<div class="field-label ">
						<!-- Left empty for spacing -->
					</div>
				</div>

				@component('component.informer_detail') @endcomponent


				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
					</div>
				</div>
			</div>
			<input id="case_id" name="case_id" type="text" value="{{  $new_id }}" hidden>
			<div class="box" id="data-person">
				<div class="field is-horizontal">
					<div class="field-label ">
						<!-- Left empty for spacing -->
					</div>
				</div>
				<label>ข้อมูลผู้ถูกกระทำ</label>

				<hr> @if($errors->any())

				<ul class="notification is-warning">
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
				@endif
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">ชื่อผู้ถูกกระทำ</label>
					</div>
					<div class="field-body">
						<div class="field is-grouped">
							<p class="control is-expanded has-icons-left ">
								{!! Form::text('name',null,['class'=>'input','placeholder'=>'ชื่อจริง หรือนามแฝง']) !!}
								<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
						</div>
						<div class="field-label is-normal">
							<label class="label">หมายเลขโทรศัพท์</label>
						</div>
						<div class="field">
							<p class="control is-expanded has-icons-left">
								{!! Form::text('victim_tel',null,array('class'=>'input','placeholder' => 'เบอร์มือถือ 10 หลัก','maxlength' => 10 )) !!}
								<span class="icon  is-left"> <i class="fa fa-mobile-alt"></i> </span>
							</p>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label ">
						<!-- Left empty for spacing -->
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label ">
						<label class="label">เพศ</label>
					</div>
					<div class="field-body">
						<div class="field is-narrow">
							<div class="control ">

								<label class="radio">
								{{ Form::radio('sex', '1' , true) }} ชาย
							</label>
								<label class="radio">
								{{ Form::radio('sex', '2' , false) }} หญิง
							</label>
								<label class="radio">
								{{ Form::radio('sex', '3' , false) }} สาวประเภทสอง
							</label>
								<label class="radio">
								{{ Form::radio('sex', '4' , false) }} อื่นๆ ระบุ 
							</label>
								<label class="radio">
								{!! Form::text('sex_etc',null,['class'=>'input','placeholder'=>'ระบุเพศ','style'=>'display: none']) !!}
							</label>
							</div>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label ">
						<!-- Left empty for spacing -->
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label ">
						<label class="label"> สัญชาติ </label>
					</div>
					<div class="field-body">
						<div class="field is-narrow">
							<div class="control  ">
								<label class="radio">
								{{ Form::radio('nation', '1' , true) }} ไทย
							</label>
								<label class="radio">
								{{ Form::radio('nation', '2' , false) }} ลาว
							</label>
								<label class="radio">
								{{ Form::radio('nation', '3' , false) }} เวียดนาม
							</label>
								<label class="radio">
								{{ Form::radio('nation', '4' , false) }} พม่า
							</label>
								<label class="radio">
								{{ Form::radio('nation', '5' , false) }} กัมพูชา
							</label>
							</div>
							<div class="control ">
								<label class="radio">
								{{ Form::radio('nation', '6' , false) }} อื่นๆ ระบุ 
							</label>
								<label class="radio">
								{!! Form::text('nation_etc',null,['class'=>'input','placeholder'=>'ระบุสัญชาติ','style'=>'display: none']) !!}
							</label>
							
							</div>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label ">
						<!-- Left empty for spacing -->
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">จังหวัดที่เกิดเหตุ</label>
					</div>
					<div class="field-body">
						<div class="field is-grouped">
							<p class="control is-expanded  ">
								<span class="select">
							<select style='width:200px' name="prov_id" id="prov_id">
								<option value="0" style="width:250px">กรุณาเลือกจังหวัด</option>
								@foreach($provinces as $province)
               	 					<option value="{{ $province->PROVINCE_CODE }}" style="width:250px">{{ $province->PROVINCE_NAME }}</option>
           					 	@endforeach
           					</select>
					</div>
					<div class="field-label is-normal">
						<label class="label">อำเภอที่เกิดเหตุ</label>
					</div>
					<div class="field is-grouped">
						<p class="control is-expanded  ">
							<span class="select">
							<select style='width:200px' name="amphur_id" id="amphur_id">
								{{--@foreach($amphurs as $amphur)--}}
               	 					{{--<option value="{{ $amphur->AMPHUR_CODE }}" style="width:250px">{{ $amphur->AMPHUR_NAME }}</option>--}}
           					 	{{--@endforeach--}}
           					</select>
					</div>
				</div>
			</div>

           <div class="field is-horizontal">
				<div class="field-label ">
					<!-- Left empty for spacing -->
				</div>
			</div>


       		<div class="field is-horizontal">
				<div class="field-label is-normal">
					<label class="label">ปัญหาที่พบ</label>
				</div>
				<div class="field-body">
					<div class="field is-grouped">
						<p class="control is-expanded  ">
							<span class="select">
							<select id ="problem_case" name="problem_case">
								<option value="0"  >โปรดเลือกประเภทปัญหาของท่าน</option>
     							<option value="1"  >บังคับตรวจเอชไอวี</option>
     							<option value="2"  >เปิดเผยสถานะการติดเชื้อเอชไอวี</option>
    				 			<option value="3" >ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>
     							<option value="4" >ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง</option>
								<option value="5" >อื่นๆ ที่เกี่ยวข้องกับ HIV</option>
							</select>

        					</span>
							

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
							<p class="control is-expanded  ">
								<span class="select">
							<select id ="sub_problem" name="sub_problem" disabled="true">
                			</select>
							</span>
							

							</p>
						</div>

					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">ประเภทกลุ่มย่อย</label>
					</div>
					<div class="field-body">
						<div class="field is-grouped">
							<p class="control is-expanded  ">
								<span class="select">
							<span class="select">
							<select id ="group_code" name="group_code" disabled="true">
                			</select>
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
								<textarea name="detail" class="textarea" ></textarea>
								{{--<textarea class="textarea"  id ="detail" name="detail" placeholder=" กรอกรายละเอียดของปัญหา "></textarea>--}}
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
							<textarea name="need" class="textarea" ></textarea>
							{{--<textarea name="detail" class="textarea" placeholder="กรอกรายละเอียด"></textarea>--}}
						</div>
					</div>
				</div>
			</div>



			<div class="field is-horizontal">
				<div class="field-label is-normal">
				<label class="label"> อัพโหลดข้อมูลเพิ่มเติม </label>
				</div>
				<div class="field-body">
					<div class="file is-info has-name is-fullwidth">
						<label class="file-label">
							<input class="input-file" id="file1" name="file1" type="file" name="resume">
							<span class="file-cta">
								<span class="file-icon">
								<i class="fas fa-upload"></i>
								</span>
								<span class="file-label input-file-trigger1">
								กรุณาเลือกไฟล์...
								</span>
							</span>
							<span class="file-name file-return1">
								ไม่ได้เลือกไฟล์ใด
							</span>
						</label>
					</div>
				</div>
			</div>

			<div class="field is-horizontal">
				<div class="field-label is-normal">
				</div>
				<div class="field-body">
					<div class="file is-info has-name is-fullwidth">
						<label class="file-label">
							<input class="input-file" id="file2" name="file2" type="file" name="resume">
							<span class="file-cta">
								<span class="file-icon">
								<i class="fas fa-upload"></i>
								</span>
								<span class="file-label input-file-trigger2">
								กรุณาเลือกไฟล์...
								</span>
							</span>
							<span class="file-name file-return2">
								ไม่ได้เลือกไฟล์ใด
							</span>
						</label>
					</div>
				</div>
			</div>

			<div class="field is-horizontal">
				<div class="field-label is-normal">
				</div>
				<div class="field-body">
					<div class="file is-info has-name is-fullwidth">
						<label class="file-label">
							<input class="input-file" id="file3" name="file3" type="file" name="resume">
							<span class="file-cta">
								<span class="file-icon">
								<i class="fas fa-upload"></i>
								</span>
								<span class="file-label input-file-trigger3">
								กรุณาเลือกไฟล์...
								</span>
							</span>
							<span class="file-name file-return3">
								ไม่ได้เลือกไฟล์ใด
							</span>
						</label>
					</div>
				</div>
			</div>



        </div>

		<div class="field is-grouped">
        	<p class="control">
            	{!! Form::submit('ส่งข้อมูล',['class'=>'button is-primary']) !!}
            </p>
            <p class="control">
            	<a ><a href="{{ route('guest_home') }}">ยกเลิก</a></a>
            </p>
        </div>
	</div>
</section>
</div>


{!!   Form::close() !!}
{{ Html::script('js/select_list.js') }}

<script>
        $('#prov_id').on('change', function (e) {
           // console.log(e);
            var prov_id = e.target.value;

            $.get('ajax-amphur/' + prov_id, function (data) {
                //success data
                $('#amphur_id').empty();

                $.each(data, function ($index, subcatObj) {
                    $('#amphur_id').append('<option value="' + subcatObj.AMPHUR_CODE + '"style="width:250px">' + subcatObj.AMPHUR_NAME + '</option>');

                });
               // console.log(data);
            });
        });

		/*
        $('input[name="sender_case"]').click(function(){
            //do stuff
			var val = $(this).val();
            loadinput(val)
        });

        function load() {

            $('input[name="sender_case"][value="1"]').attr('checked', 'checked');
          //  loadinput(val);
        }

        function loadinput(val) {
            console.log("chk : "+ val);
            if(val==1){
                $('input[name="sender"]').prop('disabled', true);
                $('input[name="agent_tel"]').prop('disabled', true);

            }else if(val==2){
                $('input[name="sender"]').prop('disabled', false);
                $('input[name="agent_tel"]').prop('disabled', false);
            }
        }*/

		function load() {

		$('input[name="sender_case"][value="1"]').attr('checked', true);
		//  loadinput(val);
		document.getElementById("data-agent").style.display = 'none';
		var x = document.getElementById("tabradio");
		x.style.display = "none";
		}

		var val = $('input[name="sender_case"]').val();

		

		function showHideDiv(ele) {

			var srcElement = document.getElementById(ele);
			
			console.log("chk : "+ val);

				if (val == 2) {
					srcElement.style.display = 'none';
					$('input[name="sender_case"][value=2]').attr('checked', false);
					
					$('input[name="sender"]').prop('disabled', true);
					$('input[name="agent_tel"]').prop('disabled', true);
					val = 1;
					console.log("chk-val-loop1 : "+ val);
				}
				else {
					srcElement.style.display = 'block';
					$('input[name="sender_case"][value=2]').attr('checked', true);

					$('input[name="sender"]').prop('disabled', false);
					$('input[name="agent_tel"]').prop('disabled', false);
					val = 2;
					console.log("chk-val-loop2 : "+ val);
				}
				return false;
			
			//loadinput(val)
		}

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


//<!-- upload -->

		document.querySelector("html").classList.add('js');

		var fileInput1  = document.getElementById( "file1" ),
			fileInput2  = document.getElementById( "file2" ), 
			fileInput3  = document.getElementById( "file3" ), 
			button1     = document.querySelector( ".input-file-trigger1" ),
			button2     = document.querySelector( ".input-file-trigger2" ),
			button3     = document.querySelector( ".input-file-trigger3" ),
			the_return1 = document.querySelector(".file-return1");
			the_return2 = document.querySelector(".file-return2");
			the_return3 = document.querySelector(".file-return3");
			
		button1.addEventListener( "keydown", function( event ) {  
			if ( event.keyCode == 13 || event.keyCode == 32 ) {  
				fileInput1.focus();  
			}  
		});
		button2.addEventListener( "keydown", function( event ) {  
			if ( event.keyCode == 13 || event.keyCode == 32 ) {  
				fileInput2.focus();  
			}  
		});
		button3.addEventListener( "keydown", function( event ) {  
			if ( event.keyCode == 13 || event.keyCode == 32 ) {  
				fileInput3.focus();  
			}  
		});
		button1.addEventListener( "click", function( event ) {
		fileInput1.focus();
		return false;
		});
		button2.addEventListener( "click", function( event ) {
		fileInput2.focus();
		return false;
		});
		button3.addEventListener( "click", function( event ) {
		fileInput3.focus();
		return false;
		});  
		fileInput1.addEventListener( "change", function( event ) {  
			the_return1.innerHTML = this.files[0].name;  
		});
		fileInput2.addEventListener( "change", function( event ) {  
			the_return2.innerHTML = this.files[0].name;  
		}); 
		fileInput3.addEventListener( "change", function( event ) {  
			the_return3.innerHTML = this.files[0].name;  
		});   
</script>

@extends('footer')


</body>
</html>