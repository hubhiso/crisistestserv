<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bulma/css/bulma-doc.css') }}" rel="stylesheet">
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
                    <li class="is-active"> <a href="{{ url('/') }}">หน้าหลัก</a> </li>
                </ul>
            </nav>
        </div>
    </div>

</section>
<section class="section">
    <div class="box">
        <div class="container">
            <h2 class="subtitle">กรุณาบันทึกข้อมูลเบื้องต้น เพื่อให้เจ้าหน้าที่รับเรื่องสามารถติดต่อไปภายหลัง</h2>
            <hr>

            @if($errors->any())
                <ul class="notification is-warning">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="field body">
                <label class="label">ผู้แจ้ง</label>
                <p class="control">
                    {!! Form::text('name',null,['class'=>'input']) !!}
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <label class="radio">
                        {{ Form::radio('sex', '1' , true) }}
                        ชาย </label>
                    <label class="radio">
                        {{ Form::radio('sex', '2' , false) }}
                        หญิง </label>
                    <label class="radio">
                        {{ Form::radio('sex', '3' , false) }}
                        สาวประเภทสอง </label>
                </p>
            </div>
            <div class="field">
                <label class="label">จังหวัด</label>
                <p class="control"> <span class="select">
        <select style='width:200px' name="prov_id" id="prov_id">
            @foreach($provinces as $province)
                <option value="{{ $province->PROVINCE_ID }}" style="width:250px">{{ $province->PROVINCE_NAME }}</option>
            @endforeach
        </select>


        </span> </p>
            </div>
            <div class="field">
                <label class="label">อำเภอ</label>
                <p class="control"> <span class="select">
        <select style='width:200px' name="amphur_id" id="amphur_id">
          @foreach($amphurs as $amphur)
                <option value="{{ $amphur->AMPHUR_CODE }}" style="width:250px">{{ $amphur->AMPHUR_NAME }}</option>
          @endforeach
        </select>

        </span> </p>
            </div>
            <div class="field">
                <label class="label">เบอร์โทรศัพท์</label>
            {!! Form::text('tel',null,['class'=>'input']) !!}
            <!-- <p class="help is-success">เบอร์โทรศัพท์ถูกต้อง</p> -->
            </div>
            <div class="field">
                <label class="label">ปัญหาที่พบ</label>
                <p class="control"> <span class="select">
        <select id ="problem_case" name="problem_case">
     <option value="0"  >โปรดเลือกประเภทปัญหาของท่าน</option>
     <option value="1"  >บังคับตรวจเอชไอวี</option>
     <option value="2"  >เปิดเผยสถานะการติดเชื้อเอชไอวี</option>
     <option value="3" >เลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>
     <option value="4" >ไม่ได้รับความเป็นธรรมเนื่องมาจากเป็นกลุ่มเปราะบาง</option>
        </select>
        {{--Form::select('problem_case', array(
                        'บังคับตรวจการติดเชื้อเอชไอวี' => array('110' =>'ผู้ติดชื้อ HIV',
                                                          '120' =>'กลุ่มเปราะบาง',
                                                          '130' =>'ประชาชนทั่วไป'),
                        'เปิดเผยสถานะการติดเชื้อเชื้อเอชไอวี' => array('210' => 'เป็นผู้ติดเชื้อ HIV'),
                        'เลือกปฏิบัติอัน' => array('310' => 'ผู้ติดเชื้อ HIV',
                                              '320' => 'กลุ่มเปราะบาง'),
        ))--}}
        </span> </p>
            </div>
            <div class="field body">
                <div class="field">
                <label class="label">ประเภทกลุ่ม</label>
                <p class="control"> <span class="select">
                <select id ="sub_problem" name="sub_problem" disabled="true">
                </select>

        {{--Form::select('sub_problem', array(
                        '001' => 'กลุ่มหลากหลายทางเพศ',
                        '002' => 'พนักงานบริการ',
                        '003' => 'ผู้ใช้สารเสพติด',
                        '004' => 'แรงงานข้ามชาติ',
        )) --}}
                </span> </p>
                </div>
                <div class="field">
                <label class="label"> </label>
                <p class="control"> <span class="select">
                <select id ="group_code" name="group_code" disabled="true">
                </select>
                </span> </p></div>
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
    </div>
    <hr>
    <p class="theme1">
        <b>มูลนิธิศูนย์คุ้มครองสิทธิด้านเอดส์ (Aidsrightsthailand)</b>
    </p>
    <p class="theme1">
        133/235 หมู่บ้านรื่นฤดี3 ถนนหทัยราษฎร์ แขวงมีนบุรี เขตมีนบุรี กทม 10510 โทรศัพท์ 02-171-5135-6 โทรสาร 02-1715124
    </p>
</section>
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
                $('#sub_problem').append('<option value="1" style="width:250px">เป็นผู้ติดเชื้อ HIV</option>');
                $('#sub_problem').append('<option value="2" style="width:250px">เป็นกลุ่มเปราะบาง</option>');
                $('#sub_problem').append('<option value="3" style="width:250px">เป็นประชาชนทั่วไป</option>');
            }else if(prob_id==2){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" style="width:250px">เป็นผู้ติดเชื้อ HIV</option>');
            }else if(prob_id==3){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" style="width:250px">เป็นผู้ติดเชื้อ HIV</option>');
            }else if(prob_id==4){
                $('#sub_problem').empty();
                $('#sub_problem').removeAttr('disabled');
                $('#sub_problem').append('<option value="1" style="width:250px">เป็นกลุ่มเปราะบาง</option>');
                $('#group_code').empty();
                $('#group_code').removeAttr('disabled');
                $('#group_code').append('<option value="1" style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
                $('#group_code').append('<option value="2" style="width:250px">พนักงานบริการ HIV</option>');
                $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด111333</option>');
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
</body>
</html>