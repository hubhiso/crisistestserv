<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome5.0.6/css/font-awesome.css') }}" rel="stylesheet">
    <script src="{{ asset('css/jquery.min.js') }}"></script>
    <title> CRS </title>

</head>

<body >

{!! Form::open(['url' =>'officer/input_case']) !!}



<div class="container">
    <section class="section">
        <h2 id="modern-framework" class="subtitle"> กรุณาบันทึกข้อมูลเบื้องต้น เพื่อให้เจ้าหน้าที่รับเรื่องสามารถติดต่อไปภายหลัง </h2>

        <div class="box" id="data-agent">
            <div class="field is-horizontal">
                <div class="field-label ">
                    <!-- Left empty for spacing -->
                </div>
            </div>
			<input id="case_id" name="case_id"  type="text" value="{{  $new_id }}" hidden >

            <div class="field is-grouped">
                <p class="control is-expanded has-icons-left ">
                    กรุณาระบุสถาณะของท่าน
                    <label class="radio">
                        {{ Form::radio('sender_case', '3' , true) }}  <a >เจ้าหน้าที่แจ้ง</a>
                    </label>
                </p>
            </div>

            <hr>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">ชื่อผู้แจ้ง</label>
                </div>
                <div class="field-body">
                    <div class="field is-grouped">
                        <p class="control is-expanded has-icons-left ">
                            {!! Form::text('sender',Auth::user()->name,['class'=>'input','readonly']) !!}
                            <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
                    </div>
                    <div class="field-label is-normal">
                        <label class="label">เบอร์มือถือผู้แจ้ง</label>
                    </div>
                    <div class="field">
                        <p class="control is-expanded has-icons-left">
                            {!! Form::text('agent_tel',Auth::user()->tel,['class'=>'input','readonly']) !!}
                            <span class="icon  is-left"> <i class="fa fa-mobile"></i> </span>
                        </p>
                    </div>
                </div>
                <div class="field is-horizontal">
                <div class="field-label">
                    <!-- Left empty for spacing -->
                </div>
            </div>
        </div>

			<div class="box" id="data-person">
				<div class="field is-horizontal">
					<div class="field-label ">
						<!-- Left empty for spacing -->
					</div>
				</div>
				<label >ข้อมูลผู้ถูกกระทำ</label>
				<hr>
				@if($errors->any())
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
								{!! Form::text('name',null,['class'=>'input','placeholder'=>'ชื่อเรียก']) !!}
								<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
						</div>
						<div class="field-label is-normal">
							<label class="label">เบอร์มือถือ</label>
						</div>
						<div class="field">
							<p class="control is-expanded has-icons-left">
								{!! Form::text('victim_tel',null,['class'=>'input','placeholder' => 'เบอร์มือถือ 10 หลัก','maxlength' => 10 ])!!}
								<span class="icon  is-left"> <i class="fa fa-mobile"></i> </span>
							</p>
						</div>
					</div>
				</div>


				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">เพศ</label>
					</div>
					<div class="field-body">
						<div class="field is-grouped">
							<p class="control is-expanded has-icons-left ">
								<label class="radio">
									{{ Form::radio('sex', '1' , true) }}
									ชาย
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
							</p>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">สัญชาติ</label>
					</div>
					<div class="field-body">
						<div class="field is-grouped">
							<p class="control is-expanded has-icons-left ">
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
								<label class="radio">
									{{ Form::radio('nation', '6' , false) }} อื่นๆ ระบุ
								</label>
								<label class="radio">
									{!! Form::text('nation_etc',null,['class'=>'input','placeholder'=>'ระบุสัญชาติ','style'=>'display: none']) !!}
								</label>
							</p>
						</div>
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

							</p>
						</div>

					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label"> ประเภทกลุ่มย่อย </label>
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
									{{--{{ Form::textarea('detail', null , ['size' => '100x10']) }}--}}
									<textarea name="detail" class="textarea" ></textarea>
									{{--<textarea name="detail" class="textarea" placeholder="กรอกรายละเอียด"></textarea>--}}
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
								{{--{{ Form::textarea('need', null, ['size' => '100x10']) }}--}}
								<textarea name="need" class="textarea" ></textarea>
								{{--<textarea name="detail" class="textarea" placeholder="กรอกรายละเอียด"></textarea>--}}
							</div>
						</div>
					</div>
				</div>
				
			</div>

			<div class="field is-grouped">
				<p class="control">
				@if (Auth::user()->prov_id == 0)
								@else
					{!! Form::submit('ส่งข้อมูล',['class'=>'button is-primary']) !!}
					@endif
				</p>
				<p class="control">
					<a ><a href="{{ route('officer.main') }}">ยกเลิก</a></a>
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
</script>

@extends('footer')


</body>
</html>