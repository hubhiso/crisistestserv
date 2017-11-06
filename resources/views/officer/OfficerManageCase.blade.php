<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="{{ asset('css/jquery.min.js') }}"></script>

	{{ Html::style('bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}
	{{ Html::style('bootstrap/css/bootstrap.css') }}

	{{ Html::script('js/jquery.min.js') }}
	{{ Html::script('bootstrap/js/bootstrap.min.js') }}
	{{ Html::script('bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}

	<title> CRS </title>
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
	
	<meta name="theme-color" content="#cc99cc"/>

</head>

<body class="layout-default" onload="load_case()">
	<section class="hero is-medium has-text-centered">
		<div class="hero-head">
			<div class="container">
				@component('component.login_bar')
				@endcomponent
				</div>
			</div>
		<input type="hidden" id="token" value="{{ csrf_token() }}">
		<input type="hidden" id="p_id" value="{{ Auth::user()->prov_id }}">
		<div class="container">
			
				<nav class="breadcrumb">
					<ul>
						<li><a href="{{ route('officer.main') }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						</li>
						<li class="is-active"><a><span class="icon is-small"><i class="fa fa-address-card"></i></span><span> รายการข้อมูลการแจ้งเหตุ </span></a>
						</li>
					</ul>
				</nav>
			
			
				<!--h1 id="title" class="title"> Monitoring Case Alert!! </h1-->
				<!--h1 id="modern-framework" class="subtitle is-3"> รายการข้อมูลการแจ้งเหตุ </h1-->
				


				<nav class="level">
					<!-- Left side -->
					<div class="level-left">
						
					</div>

					<!-- Right side -->
					<div class="level-right">
						<div class="level-item">
							<p class="subtitle is-6">
								<strong> เลือกวันที่ </strong>
							</p>
						</div>
						<div class="level-item">
							<div class="field has-addons">
								<p class="control has-icons-left" >
								<div class="input-group input-daterange" style="width: 300px">
									<input type="text" class="form-control" id="date_start">
									<div class="input-group-addon">ถึง</div>
									<input type="text" class="form-control" id="date_end">
								</div>
								</p>
							</div>
						</div>
						<div class="level-item">
							<p class="subtitle is-6">
								<strong>  </strong>
							</p>
						</div>
						<div class="level-item">
							<div class="field has-addons">
								<p>

								</p>
							</div>
						</div>
						
					</div>
				</nav>

				<nav class="level">
					<!-- Left side -->
					<div class="level-left">
						<div class="level-item">
							<p class="subtitle is-6">
								<strong>สืบค้น</strong>
							</p>
						</div>
						<div class="level-item">
							<div class="field has-addons">
								<p class="control">
									<input class="input" type="text" id="text_search" placeholder="">
								</p>
								<p>
									<span class="select">
        							<select id="type_search">
          								<option value="1"> ชื่อ </option>
          								<option value="2"> ผู้รับเรื่อง </option>
          								<option value="3"> เบอร์ติดต่อ </option>
										<option value="4"> รหัส </option>
       								</select>
       								</span>
								</p>
								<p class="control"> <button class="button is-primary" onclick="load_case()"> ตกลง </button> </p>
							</div>
						</div>
					</div>

					<!-- Right side -->
					<div class="level-right">
						<div class="level-item">
							<p class="subtitle is-6">
								<strong> กรอง </strong>
							</p>
						</div>
						<div class="level-item">
							<div class="field has-addons">
								<p>
									<span class="select">
        							<select id="filter_search">
										<option value="1"> ทั้งหมด </option>
          								<option value="2"> ประเภท </option>
          								<option value="3"> สถานะ </option>
          								<option value="4"> ประเภทของผู้แจ้ง </option>
          								
       								</select>
       								</span>
								</p>
								<p>
									<span class="select">
        							<select id="sub_filter_search" disabled="disabled" onchange="load_case()">

       								</select>
       								</span>
								</p>
								<!--p class="control"> <button class="button is-primary"> ตกลง </button> </p-->
							</div>
						</div>
						<div class="level-item has-text-centered">
							<div>
							  <p class="heading is-4"> จำนวนเรื่อง </p>
							  <p class="title is-4"><label id="case_number"></label></p>
							</div>
						  </div>
					</div>
				</nav>
			</div>
			<br>
			<br>
			<div class="body container">
				{{--<nav class="pagination is-centered"> <a class="pagination-previous">Previous</a> <a class="pagination-next">Next page</a>--}}
					{{--<ul class="pagination-list">--}}
						{{--<li><a class="pagination-link is-current">1</a>--}}
						{{--</li>--}}
						{{--<li><a class="pagination-link">2</a>--}}
						{{--</li>--}}
						{{--<li><a class="pagination-link">3</a>--}}
						{{--</li>--}}
						{{--<li><span class="pagination-ellipsis">&hellip;</span>--}}
						{{--</li>--}}
						{{--<li><a class="pagination-link">20</a>--}}
						{{--</li>--}}
					{{--</ul>--}}
				{{--</nav>--}}
				<br/>
				<div class="table-case_container">

				</div>
				{{--<nav class="pagination is-centered"> <a class="pagination-previous">Previous</a> <a class="pagination-next">Next page</a>--}}
					{{--<ul class="pagination-list">--}}
						{{--<li><a class="pagination-link">1</a>--}}
						{{--</li>--}}
						{{--<li><span class="pagination-ellipsis">&hellip;</span>--}}
						{{--</li>--}}
						{{--<li><a class="pagination-link">5</a>--}}
						{{--</li>--}}
						{{--<li><a class="pagination-link is-current">6</a>--}}
						{{--</li>--}}
						{{--<li><a class="pagination-link">7</a>--}}
						{{--</li>--}}
						{{--<li><span class="pagination-ellipsis">&hellip;</span>--}}
						{{--</li>--}}
						{{--<li><a class="pagination-link">20</a>--}}
						{{--</li>--}}
					{{--</ul>--}}
				{{--</nav>--}}
			</div>
	</section>
	<br>
	@extends('footer')
	<script src="{{ asset('bulma/clipboard-1.7.1.min.jss') }}"></script>
	<script src="{{ asset('bulma/main.js') }}"></script>

	<script>
        $('.input-daterange input').each(function() {
			$(this).datepicker('clearDates');
            $('#date_end').datepicker("setDate", new Date());
        }).on('changeDate', function(e) {
            load_case()
        });


        function load_case () {
            var token = $('#token').val();
            var p_id = $('#p_id').val();
            var text_search = $('#text_search').val();
            var type_Search = $('#type_search').val();
            var Date_start = $('#date_start').val();
            var Date_end = $('#date_end').val();
            var Filter = $('#filter_search').val();
            var Sub_Filter = $('#sub_filter_search').val();


            var $container = $('.table-case_container');


            $.ajax({
                type: 'POST',
                url: '{!!  route('officer.load_case') !!}',
                data: {
                    _token: token,
                    pid: p_id,
                    Search_text: text_search,
                    Type_search: type_Search,
					Date_start : Date_start,
					Date_end : Date_end,
                    Filter: Filter,
                    Sub_Filter: Sub_Filter
                },
                success: function( data ) {
                    console.log(data);
                    $container.html(data.html);
                    var rows = $('#table_show tbody tr').length
                    document.getElementById('case_number').innerHTML = rows;

                }
            })


        }

        $('#filter_search').on('change',function (e) {
            var search_type = e.target.value;
            if(search_type==1){
                $('#sub_filter_search').empty();
                $('#sub_filter_search').attr('disabled', 'disabled');
			}else if(search_type==2){
                $('#sub_filter_search').empty();
                $('#sub_filter_search').removeAttr('disabled');
                $('#sub_filter_search').append('<option value="1" style="width:250px">บังคับตรวจเอชไอวี</option>');
                $('#sub_filter_search').append('<option value="2" style="width:250px">เปิดเผยสถานะการติดเชื้อเอชไอวี</option>');
                $('#sub_filter_search').append('<option value="3" style="width:250px">ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>');
                $('#sub_filter_search').append('<option value="4" style="width:250px">ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง</option>');
			}else if(search_type==3){
                $('#sub_filter_search').empty();
                $('#sub_filter_search').removeAttr('disabled');
                $('#sub_filter_search').append('<option value="1" style="width:250px">ยังไม่ได้รับเรื่อง</option>');
                $('#sub_filter_search').append('<option value="2" style="width:250px">รับเรื่องแล้ว </option>');
                $('#sub_filter_search').append('<option value="3" style="width:250px">บันทึกข้อมูลเพิ่มเติมแล้ว</option>');
                $('#sub_filter_search').append('<option value="4" style="width:250px">อยู่ระหว่างดำเนินการ</option>');
                $('#sub_filter_search').append('<option value="5" style="width:250px">ดำเนินการเสร็จสิ้น</option>');
                $('#sub_filter_search').append('<option value="6" style="width:250px">ดำเนินการแล้วส่งต่อ</option>');
            }else if(search_type==4){
                $('#sub_filter_search').empty();
                $('#sub_filter_search').removeAttr('disabled');
                $('#sub_filter_search').append('<option value="1" style="width:250px">แจ้งด้วยตนเอง</option>');
                $('#sub_filter_search').append('<option value="2" style="width:250px">มีผู้แจ้งแทน</option>');
                $('#sub_filter_search').append('<option value="3" style="width:250px">เจ้าหน้าที่แจ้ง</option>');
            }
            load_case ()
        });

	</script>
    </body>

</html>