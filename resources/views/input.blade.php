<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>

<body >

{!! Form::open(['url' =>'case_inputs']) !!}


<section class="hero is-primary">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column">
                    <p class="title"> Crisis Response </p>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-foot">
        <div class="container">
            <nav class="tabs is-boxed">
                <ul>
                    <li class="is-active"> <a href="{{ url('/') }}">แบบฟอร์มบันทึกข้อมูล</a> </li>
                </ul>
            </nav>
        </div>
    </div>
</section>

<div class="container">
	<section class="section">
  		<h2 id="modern-framework" class="subtitle"> กรุณาบันทึกข้อมูลเบื้องต้น เพื่อให้เจ้าหน้าที่รับเรื่องสามารถติดต่อไปภายหลัง </h2>
  		
   		<div class="box" id="data-agent">
			<div class="field is-horizontal">
				<div class="field-label ">
					<!-- Left empty for spacing -->
				</div>
			</div>
			<label class="checkbox ">
  				<input type="checkbox" class="is-medium"> กรุณาระบุหากท่านเป็น <a >ผู้แจ้งแทน</a></label>
			<hr>
			<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">ชื่อผู้แจ้ง</label>
					</div>
					<div class="field-body">
						<div class="field is-grouped">
							<p class="control is-expanded has-icons-left ">
								{!! Form::text('agentname',null,['class'=>'input','placeholder'=>'ชื่อเรียก']) !!}
								<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
						</div>
						<div class="field-label is-normal">
							<label class="label">เบอร์มือถือผู้แจ้ง</label>
						</div>
						<div class="field">
							<p class="control is-expanded has-icons-left">
								{!! Form::text('agentphone',null,['class'=>'input','placeholder'=>'เลขหมาย 10 หลัก']) !!}
								<span class="icon  is-left"> <i class="fa fa-mobile"></i> </span>
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
			
   		<div class="box" id="data-person">
       		<div class="field is-horizontal">
				<div class="field-label ">
					<!-- Left empty for spacing -->
				</div>
			</div>
       		<label >ข้อมูลผู้ถูกกระทำ</</label>
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
								{!! Form::text('phone',null,['class'=>'input','placeholder'=>'เลขหมาย 10 หลัก']) !!}
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
               	 					<option value="{{ $province->PROVINCE_ID }}" style="width:250px">{{ $province->PROVINCE_NAME }}</option>
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
    				 			<option value="3" >เลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>
     							<option value="4" >ไม่ได้รับความเป็นธรรมเนื่องมาจากเป็นกลุ่มเปราะบาง</option>
							</select>
							
							{{--Form::select('problem_case', array(
                        	'บังคับตรวจเอชไอวี' => array('110' =>'ผู้ติดเชื้อเอชไอวี',
                                                          '120' =>'กลุ่มเปราะบาง',
                                                          '130' =>'ประชาชนทั่วไป'),
                        	'เปิดเผยสถานะการติดเชื้อเชื้อเอชไอวี' => array('210' => 'ผู้ติดเชื้อเอชไอวี'),
                        	'เลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี' => array('310' => 'ผู้ติดเชื้อเอชไอวี'),
                        	'ไม่ได้รับความเป็นธรรมเนื่องมาจากเป็นกลุ่มเปราะบาง' => array('410' => 'กลุ่มเปราะบาง'),
        					))--}}
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
                			{{--Form::select('sub_problem', array(
                       			'001' => 'กลุ่มหลากหลายทางเพศ',
                        		'002' => 'พนักงานบริการ',
                        		'003' => 'ผู้ใช้สารเสพติด',
                        		'004' => 'ประชากรข้ามชาติ',
                        		'005' => 'ผู้ต้องขัง',
                        		'006' => 'เยาวชนในสถานพินิจ',
        					)) --}}
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
        
        
        </div>
		
		<div class="field is-grouped">
        	<p class="control">
            	{!! Form::submit('ส่งข้อมูล',['class'=>'button is-primary']) !!}
            </p>
            <p class="control">
            	<button class="button is-link"><a href="{{ '/' }}">ยกเลิก</a></button>
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
</script>

<footer class="footer">
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                <div id="about" class="content"> <strong xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/Text" property="dct:title" rel="dct:type">Crisis Response</strong> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://jgthms.com" property="cc:attributionName" rel="cc:attributionURL">Aidsrightsthailand</a>. </div>
            </div>
            <div class="column is-5">
                <div id="share" class="content"> </div>
            </div>
            <div class="column is-4">
                <div id="sister">
                    <p><small> <strong>ที่อยู่</strong> : </small></p>
                    <p><small>133/235 หมู่บ้านรื่นฤดี3 ถนนหทัยราษฎร์ แขวงมีนบุรี เขตมีนบุรี กทม 10510 โทรศัพท์ 02-171-5135-6 โทรสาร 02-1715124 </small></p>
                </div>
            </div>
        </div>
        <p id="tsp"> <small> Source code licensed <a href="http://opensource.org/licenses/mit-license.php">HISO</a>. <br>
                Website content licensed <a rel="license" href="http://www.hiso.or.th">www.hiso.or.th</a>. </small> </p>
    </div>
</footer>


</body>
</html>