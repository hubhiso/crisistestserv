<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}
    <link href="{{ asset('/css/uploadicon/new3.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/nicelabel/css/jquery-nicelabel.css') }}" rel="stylesheet">

    {{--{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}--}}
    {{--{{ Html::style('bootstrap/css/bootstrap.css') }}--}}
    {{ Html::script('js/jquery.min.js') }}
    {{--{{ Html::script('js/thai_date_dropdown.js') }}--}}

    {{--{{ Html::script('js/select_list.js') }}--}}
    {{--{{ Html::script('bootstrap/js/bootstrap.min.js') }}--}}
    {{--{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}--}}

    <!--modal popup -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

    <script src="css/modal/modal.js"></script>
    <link href="{{ asset('css/modal/modal.css') }}" rel="stylesheet">

    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"> </script>

    <title> CRS </title>


</head>

<body onload="load() " class="has-background-light	">

    <form name="RegForm" class="form-horizontal" enctype="multipart/form-data" role="form" method="POST"
        onsubmit="return vali_case();" action="{{ route('store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">


        @component('component.input_head') @endcomponent

        <div class="container">

            <section class="section">

                <nav class="breadcrumb">
                    <ul>
                        <li><a href="{{ 'index.php' }}"><span class="icon is-small"><i
                                        class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
                        </li>
                        <li class="is-active"><a><span class="icon is-small"><i class="fa fa-bullhorn"></i></span><span>
                                    แจ้งเรื่อง </span></a>
                        </li>
                    </ul>
                </nav>

                <h2 id="modern-framework" class="subtitle"> กรุณาบันทึกข้อมูลเบื้องต้น
                    เพื่อให้เจ้าหน้าที่รับเรื่องสามารถติดต่อไปภายหลัง </h2>

                <div id="text-checkbox" class="columns is-multiline is-mobile">
                    &nbsp &nbsp
                    <button id="chk_agent" id="chk_agent" type="button" class="button is-info" value="1"
                        onclick="showHideDiv('data-agent')">คลิกเพื่อระบุว่าเป็นผู้แจ้งแทน</button>
                    &nbsp &nbsp
                    <input class="text-nicelabel" id="emergency" name="emergency" value="1"
                        data-nicelabel='{"position_class": "text_checkbox", "checked_text": "ขอความช่วยเหลือเร่งด่วน", "unchecked_text": "ขอความช่วยเหลือเร่งด่วน"}'
                        type="checkbox" />
                </div>
                <div class="box " id="data-agent">
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
                    <label><b>ข้อมูลผู้ถูกกระทำ</b> ( กรุณาบันทึกข้อมูลที่มีเครื่องหมาย * ให้ครบถ้วน )</label>

                    <hr> @if($errors->any())

                    <ul class="notification is-warning">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label">ชื่อผู้ถูกกระทำ *</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-grouped">
                                <p class="control is-expanded has-icons-left ">
                                    <input name="name" id="name" class="input" type="text"
                                        placeholder="ชื่อจริง หรือนามแฝง">
                                    <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
                            </div>
                            <div class="field-label is-normal">
                                <label class="label">หมายเลขโทรศัพท์ *</label>
                            </div>
                            <div class="field">
                                <p class="control is-expanded has-icons-left">
                                    <input name="victim_tel" id="victim_tel" class="input" type="text"
                                        placeholder="หมายเลข 9-10 หลัก" maxlength="10">

                                    <span class="icon is-left"> <i class="fa fa-mobile-alt"></i> </span>
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
                            <label class="label">เพศกำเนิด *</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-narrow">
                                <div class="control ">

                                    {{ Form::radio('biosex', '1' , true) }} ชาย
                                    &nbsp
                                    {{ Form::radio('biosex', '2' , false) }} หญิง
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
                            <label class="label"> สัญชาติ *</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-narrow">
                                <div class="control  ">
                                    {{ Form::radio('nation', '1' , true) }} ไทย
                                    &nbsp
                                    {{ Form::radio('nation', '2' , false) }} ลาว
                                    &nbsp
                                    {{ Form::radio('nation', '3' , false) }} เวียดนาม
                                    &nbsp
                                    {{ Form::radio('nation', '4' , false) }} พม่า
                                </div>
                                <div class="control ">
                                    {{ Form::radio('nation', '5' , false) }} กัมพูชา
                                    &nbsp
                                    {{ Form::radio('nation', '6' , false) }} อื่นๆ ระบุ
                                    &nbsp
                                    {!!
                                    Form::text('nation_etc',null,['class'=>'input','placeholder'=>'ระบุสัญชาติ','style'=>'display:
                                    none']) !!}
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
                            <label class="label"> วันที่เกิดเหตุ *</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-narrow is-grouped ">
                                <div class="input-group date control" data-provide="datepicker">
                                    ปี พ.ศ. <input style="width: 100px;" type="number" min="2400" max="2570"
                                        maxlength="4" id="YearAct" name="YearAct" class="form-control input"
                                        placeholder="ปปปป" value="{{date('Y')+543}}" onchange="date_acc();">
                                    เดือน <div class="select"><select id="MonthAct" name="MonthAct"
                                            onchange="date_acc();">
                                            <option value="1" @if(date('m')==1){ selected } @endif> มกราคม </option>
                                            <option value="2" @if(date('m')==2){ selected } @endif> กุมภาพันธ์ </option>
                                            <option value="3" @if(date('m')==3){ selected } @endif> มีนาคม </option>
                                            <option value="4" @if(date('m')==4){ selected } @endif> เมษายน </option>
                                            <option value="5" @if(date('m')==5){ selected } @endif> พฤษภาคม </option>
                                            <option value="6" @if(date('m')==6){ selected } @endif> มิถุนายน </option>
                                            <option value="7" @if(date('m')==7){ selected } @endif> กรกฎาคม </option>
                                            <option value="8" @if(date('m')==8){ selected } @endif> สิงหาคม </option>
                                            <option value="9" @if(date('m')==9){ selected } @endif> กันยายน </option>
                                            <option value="10" @if(date('m')==10){ selected } @endif> ตุลาคม </option>
                                            <option value="11" @if(date('m')==11){ selected } @endif> พฤศจิกายน
                                            </option>
                                            <option value="12" @if(date('m')==12){ selected } @endif> ธันวาคม </option>
                                        </select></div>
                                    วันที่ <div class="select"><select class="input" id="DayAct" name="DayAct"
                                            onchange="">
                                            @for ($i = 1; $i <= 31; $i++) <option value="{{$i}}" @if(date('d')==$i){
                                                selected } @endif>{{$i}}</option>
                                                @endfor
                                        </select></div>

                                    <input type="hidden" id="DateAct" name="DateAct" class="form-control"
                                        value="{{date('m/d/Y')}}">


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
                            <label class="label">จังหวัดที่เกิดเหตุ *</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-grouped">
                                <p class="control is-expanded  ">
                                    <span class="select">
                                        <select style='width:200px' name="prov_id" id="prov_id">
                                            <option value="0" style="width:250px">กรุณาเลือกจังหวัด</option>
                                            @foreach($provinces as $province)
                                            <option value="{{ $province->PROVINCE_CODE }}" style="width:250px">
                                                {{ $province->PROVINCE_NAME }}</option>
                                            @endforeach
                                        </select>
                            </div>
                            <div class="field-label is-normal">
                                <label class="label">อำเภอที่เกิดเหตุ *</label>
                            </div>
                            <div class="field is-grouped">
                                <p class="control is-expanded  ">
                                    <span class="select">
                                        <select style='width:200px' name="amphur_id" id="amphur_id">
                                            {{--@foreach($amphurs as $amphur)--}}
                                            {{--<option value="{{ $amphur->AMPHUR_CODE }}"
                                            style="width:250px">{{ $amphur->AMPHUR_NAME }}</option>--}}
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
                            <label class="label"> </label>
                        </div>
                        <div class="field-body">
                            <div class="field  is-grouped">
                                <div class="control  ">
                                    <!--p>คลิกเพื่อระบุตำแหน่งในปัจจุบัน </p-->
                                    <a class="button is-primary" onclick="getLocation()">
                                        <span class="icon is-left">
                                            <i class="fas fa-location-arrow"></i>
                                        </span>
                                        <span>คลิกเพื่อระบุตำแหน่งในปัจจุบัน</span>
                                    </a>
                                    {{ Form::hidden('geolat', null, array('id' => 'glat')) }}
                                    {{ Form::hidden('geolon', null, array('id' => 'glon')) }}
                                </div>
                                <div class="control">
                                    <p class=" is-primary is-medium has-text-info" id="getsuccess"></p>
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
                            <label class="label">ปัญหาที่พบ *</label>
                        </div>
                        <div class="field-body">
                            <div class="field is-grouped">
                                <p class="control is-expanded  ">
                                    <span class="select">
                                        <select id="problem_case" name="problem_case">
                                            <option value="0">โปรดเลือกประเภทปัญหาของท่าน</option>
                                            <option value="1">บังคับตรวจเอชไอวี</option>
                                            <option value="2">เปิดเผยสถานะการติดเชื้อเอชไอวี</option>
                                            <option value="3">ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี
                                            </option>
                                            <option value="4">ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง
                                            </option>
                                            <option value="5">อื่นๆ ที่เกี่ยวข้องกับ HIV</option>
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
                                        <select id="sub_problem" name="sub_problem" disabled="true">
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
                                            <select id="group_code" name="group_code" disabled="true">
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
                                    <textarea name="detail" class="textarea"></textarea>
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
                                    <textarea name="need" class="textarea"></textarea>
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
                            <div class="file is-primary has-name is-fullwidth">
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
                            <div class="file is-primary has-name is-fullwidth">
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
                            <div class="file is-primary has-name is-fullwidth">
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
                        <!--{!! Form::submit('ส่งข้อมูล',['class'=>'button is-primary']) !!}-->
                        <input type="submit" class="button is-primary" value="ส่งข้อมูล"
                            onsubmit="return validateForm();">
                        <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal"
                            data-target="#confirm-submit" class="btn btn-default" style="display:none" />


                    </p>
                    <p class="control">
                        <a><a href="{{ route('guest_home') }}">ยกเลิก</a></a>
                    </p>
                </div>
        </div>
        </section>

        </div>


    </form>
    {{ Html::script('js/select_list.js') }}

    {{ Html::script('js/validation_case.js') }}

    <script>
    $('#prov_id').on('change', function(e) {
        // console.log(e);
        var prov_id = e.target.value;

        $.get('ajax-amphur/' + prov_id, function(data) {
            //success data
            $('#amphur_id').empty();

            $.each(data, function($index, subcatObj) {
                $('#amphur_id').append('<option value="' + subcatObj.AMPHUR_CODE +
                    '"style="width:250px">' + subcatObj.AMPHUR_NAME + '</option>');

            });
            // console.log(data);
        });
    });

    function load() {

        $('input[name="sender_case"][value="1"]').attr('checked', true);
        //  loadinput(val);
        document.getElementById("data-agent").style.display = 'none';
        document.getElementById("tabradio").style.display = 'none';

        document.getElementById("form_sender").style.display = 'none';

    }

    var val = $('input[name="sender_case"]').val();



    function showHideDiv(ele) {

        var srcElement = document.getElementById(ele);

        console.log("chk : " + val);

        if (val == 2) {
            srcElement.style.display = 'none';
            document.getElementById("form_sender").style.display = 'none';
            $('input[name="sender_case"][value=2]').attr('checked', false);

            $('input[name="sender"]').prop('disabled', true);
            $('input[name="agent_tel"]').prop('disabled', true);
            val = 1;
            console.log("chk-val-loop1 : " + val);
        } else {
            srcElement.style.display = 'block';
            document.getElementById("form_sender").style.display = 'block';
            $('input[name="sender_case"][value=2]').attr('checked', true);

            $('input[name="sender"]').prop('disabled', false);
            $('input[name="agent_tel"]').prop('disabled', false);
            $('input[name="test12"]').prop('disabled', false);
            val = 2;
            console.log("chk-val-loop2 : " + val);
        }
        return false;

        //loadinput(val)
    }

    $("input[name='nation']").on('change', function(e) {

        var sel_value = e.target.value;
        //alert(sel_value);

        if (sel_value == 6) {
            $("input[name='nation_etc']").show();
        } else {
            $("input[name='nation_etc']").hide();
        }
    });


    //<!-- upload -->

    document.querySelector("html").classList.add('js');

    var fileInput1 = document.getElementById("file1"),
        fileInput2 = document.getElementById("file2"),
        fileInput3 = document.getElementById("file3"),
        button1 = document.querySelector(".input-file-trigger1"),
        button2 = document.querySelector(".input-file-trigger2"),
        button3 = document.querySelector(".input-file-trigger3"),
        the_return1 = document.querySelector(".file-return1");
    the_return2 = document.querySelector(".file-return2");
    the_return3 = document.querySelector(".file-return3");

    button1.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput1.focus();
        }
    });
    button2.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput2.focus();
        }
    });
    button3.addEventListener("keydown", function(event) {
        if (event.keyCode == 13 || event.keyCode == 32) {
            fileInput3.focus();
        }
    });
    button1.addEventListener("click", function(event) {
        fileInput1.focus();
        return false;
    });
    button2.addEventListener("click", function(event) {
        fileInput2.focus();
        return false;
    });
    button3.addEventListener("click", function(event) {
        fileInput3.focus();
        return false;
    });
    fileInput1.addEventListener("change", function(event) {
        the_return1.innerHTML = this.files[0].name;
    });
    fileInput2.addEventListener("change", function(event) {
        the_return2.innerHTML = this.files[0].name;
    });
    fileInput3.addEventListener("change", function(event) {
        the_return3.innerHTML = this.files[0].name;
    });

    // Lcation Lat Long //
    var getsuccess = document.getElementById("getsuccess");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
            getsuccess.innerHTML = "กรุณารอสักครู่...";
        } else {
            latlon.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {

        getsuccess.innerHTML = "บันทึกตำแหน่งในปัจจุบันสำเร็จ";

        document.getElementById('glat').value = position.coords.latitude;
        document.getElementById('glon').value = position.coords.longitude;

    }


    $(document).ready(function() {

        $('#submitBtn').click(function() {

            $('#txt_agent_tel').text($('#agent_tel').val());
            $('#txt_sender_name').text($('#sender').val());

            $('#txt_tel').text($('#victim_tel').val());
            $('#txt_name').text($('#name').val());

            var radioValue = $("input[name='biosex']:checked").val();

            if (radioValue == '1') {
                var label_sex = "ชาย";
            }

            $('#biosex').text(label_sex);

            var province = $("#sub_problem option:selected").text();

        });

        $('#submit').click(function() {
            document.RegForm.submit();
        });

    });
    </script>

    @extends('footer')

    <!-- popup box -->
    <div id="boxes">
        <div style="top: 199.5px; left: 551.5px; display: none; width: 400px;" id="dialog" class="window">
            <b>ข้อมูลที่บันทึกจะถูกเก็บเป็นความลับ และโปรดตรวจสอบเบอร์โทรศัพท์ให้ถูกต้อง
                เพื่อให้เจ้าหน้าที่ติดต่อกลับ</b>
            <br><br>
            <p class="has-text-centered">
                <a class="button is-medium  is-outlined is-danger close">ทราบ</a>
            </p>
        </div>
        <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask">
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    <script src="css/modal/modal.js"></script>


    <!--  test form comfirm   -->

    <div id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">
        <div class="modal-dialog">
            <div class="modal-header">
                <b>ยืนยันการยื่นคำร้อง</b>
            </div>
            <div class="modal-body">
                กรุณาตรวจสอบชื่อและหมายเลขโทรศัพท์ก่อนส่งข้อมูลเข้าสู่ระบบ
                <br>เพื่อความถูกต้องในการสื่อสารกับเจ้าหน้าที่

                <table class="table " id="form_sender">
                    <tr>
                        <th>ชื่อผู้แจ้งแทน</th>
                        <td id="txt_sender_name"></td>
                    </tr>
                    <tr>
                        <th>หมายเลขโทรศัพท์ผู้แจ้ง</th>
                        <td id="txt_agent_tel"></td>
                    </tr>
                </table>
                <table class="table ">
                    <tr>
                        <th>ชื่อผู้ถูกกระทำ</th>
                        <td id="txt_name"></td>
                    </tr>
                    <tr>
                        <th>หมายเลขโทรศัพท์</th>
                        <td id="txt_tel"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <br>
                <a href="#" id="submit" class="button is-medium   is-primary ">ยืนยัน</a>
                <button type="button" class="button is-medium  is-outlined is-danger "
                    data-dismiss="modal">ยกเลิก</button>
            </div>
        </div>
    </div>



    <!--  test form comfirm   -->

</body>

{{ Html::script('css/nicelabel/js/jquery.nicelabel.js') }}
<script>
$(function() {
    $('#text-checkbox  > input').nicelabel();

});
</script>

</html>