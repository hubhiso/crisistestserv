<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}
    <title> CRS </title>

</head>

<body  onload="load()">

{!! Form::open(['url' =>'case_inputs']) !!}


	@component('component.input_head')
	@endcomponent
	
	
<div class="container">

	<section class="section">
 		
 		<nav class="breadcrumb">
				<ul>
					<li><a href="{{ 'index.php' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
					</li>
					<li class="is-active"><a><span class="icon is-small"><i class="fa fa-volume-control-phone"></i></span><span> แจ้งเรื่อง </span></a>
					</li>
				</ul>
			</nav>
 		
  		<h2 id="modern-framework" class="subtitle"> กรุณาบันทึกข้อมูลเบื้องต้น เพื่อให้เจ้าหน้าที่รับเรื่องสามารถติดต่อไปภายหลัง </h2>
  		
   		<div class="box" id="data-agent">
			<div class="field is-horizontal">
				<div class="field-label ">
					<!-- Left empty for spacing -->
				</div>
			</div>

			@component('component.informer_detail')
			@endcomponent


			<div class="field is-horizontal">
				<div class="field-label">
					<!-- Left empty for spacing -->
				</div>
			</div>
		</div>
		<input id="case_id" name="case_id"  type="text" value="{{  $new_id }}" hidden >
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
							{!! Form::text('name',null,['class'=>'input','placeholder'=>'ชื่อจริง หรือนามแฝง']) !!}
							<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
					</div>
					<div class="field-label is-normal">
						<label class="label">หมายเลขโทรศัพท์</label>
					</div>
					<div class="field">
						<p class="control is-expanded has-icons-left">
								{!! Form::text('victim_tel',null,['class'=>'input','placeholder'=>'เบอร์ติดต่อกลับ']) !!}
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
								@foreach($amphurs as $amphur)
               	 					<option value="{{ $amphur->AMPHUR_CODE }}" style="width:250px">{{ $amphur->AMPHUR_NAME }}</option>
           					 	@endforeach
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
								<textarea class="textarea"  id ="detail" name="detail" placeholder=" กรอกรายละเอียดของปัญหา "></textarea>
							</div>
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

        $('#problem_case').on('change',function (e) {
            var prob_id = e.target.value;
            //console.log(prob_id);
            $('#group_code').empty();
            $('#group_code').attr('disabled', 'disabled');
            if((prob_id==1)||(prob_id==5)){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" style="width:250px">ผู้ติดเชื้อเอชไอวี</option>');
                $('#sub_problem').append('<option value="2" style="width:250px">กลุ่มเปราะบาง</option>');
                $('#sub_problem').append('<option value="4" style="width:250px">ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
                $('#sub_problem').append('<option value="3" style="width:250px">ประชาชนทั่วไป</option>');

            }else if(prob_id==2){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
            }else if(prob_id==3){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
                $('#sub_problem').append('<option value="4" >ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
            }else if(prob_id == 4){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="2" style="width:250px">กลุ่มเปราะบาง</option>');
                $('#group_code').empty();
                $('#group_code').removeAttr('disabled');
                $('#group_code').append('<option value="1" style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
                $('#group_code').append('<option value="2" style="width:250px">พนักงานบริการ </option>');
                $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด</option>');
                $('#group_code').append('<option value="4" style="width:250px">ประชากรข้ามชาติ</option>');
                $('#group_code').append('<option value="5" style="width:250px">ผู้ถูกคุมขัง</option>');
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
                $('#group_code').append('<option value="5" style="width:250px">ผู้ถูกคุมขัง</option>');

            }else{
                $('#group_code').empty();
                $('#group_code').attr('disabled', 'disabled');
            }
        });
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
        }
</script>

@extends('footer')


</body>
</html>