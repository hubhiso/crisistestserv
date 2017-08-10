<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> CRS </title>
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<meta name="theme-color" content="#cc99cc"/>

</head>

<body class="layout-default">
	<section class="hero is-medium has-text-centered">
		<div class="hero-head">
			<div class="container">
				@component('component.login_bar')
				@endcomponent
				</div>
			</div>
			
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
								<p>
									<input class="input" type="text" placeholder="วว/ดด/ปปปป">
								</p>
							</div>
						</div>
						<div class="level-item">
							<p class="subtitle is-6">
								<strong> ถึงวันที่ </strong>
							</p>
						</div>
						<div class="level-item">
							<div class="field has-addons">
								<p>
									<input class="input" type="text" placeholder="วว/ดด/ปปปป">
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
									<input class="input" type="text" placeholder="">
								</p>
								<p>
									<span class="select">
        							<select>
          								<option> ชื่อ </option>
          								<option> ผู้รับเรื่อง </option>
          								<option> เบอร์ติดต่อ </option>
       								</select>
       								</span>
								</p>
								<p class="control"> <button class="button is-primary"> ตกลง </button> </p>
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
        							<select>
          								<option> ประเภท </option>
          								<option> สถานะ </option>
          								<option> ประเภทของผู้แจ้ง </option>
          								
       								</select>
       								</span>
								</p>
								<p>
									<span class="select">
        							<select>
          								<option> บังคับตรวจ HIV </option>
          								<option> เปิดเผยสถานะ </option>
          								<option> เลือกปฏิบัติ </option>
          								<option> ไม่ได้รับความเป็นธรรม </option>
       								</select>
       								</span>
								</p>
								<!--p class="control"> <button class="button is-primary"> ตกลง </button> </p-->
							</div>
						</div>
						<div class="level-item has-text-centered">
							<div>
							  <p class="heading is-4"> จำนวนเรื่อง </p>
							  <p class="title is-4">3,456</p>
							</div>
						  </div>
					</div>
				</nav>
			</div>
			<br>
			<br>
			<div class="body container">
				<nav class="pagination is-centered"> <a class="pagination-previous">Previous</a> <a class="pagination-next">Next page</a>
					<ul class="pagination-list">
						<li><a class="pagination-link is-current">1</a>
						</li>
						<li><a class="pagination-link">2</a>
						</li>
						<li><a class="pagination-link">3</a>
						</li>
						<li><span class="pagination-ellipsis">&hellip;</span>
						</li>
						<li><a class="pagination-link">20</a>
						</li>
					</ul>
				</nav>
				<br/>
				<div class="container">
					<table class="table">
						<thead>
							<tr>
								<th><abbr title="Date"> วันที่ </abbr>
								</th>
								<th><abbr title="ID"> รหัส </abbr>
								</th>
								<th><abbr title="Name"> ชื่อ </abbr>
								</th>
								<th><abbr title="PR"> จังหวัด </abbr>
								</th>
								<th><abbr title="Type"> ประเภท </abbr>
								</th>
								<th><abbr title="Status"> สถานะ </abbr>
								</th>
								<th><abbr title="Activities"> ดำเนินการ </abbr>
								</th>
								<th><abbr title="Username"> ประเภทของผู้แจ้ง </abbr>
								</th>
								<th><abbr title="Username"> ผู้รับเรื่อง </abbr>
								</th>
							</tr>
						</thead>
						<tbody>

						@foreach($cases as $case)
							<tr>
								<!--th>{{ $case->created_at }}</th-->
								<th> 27 ก.ค. 60 </th>
								<th>{{ $case->case_id }}</th>
								<td><a href='#' title='ID'>{{ $case->name }}</a> </td>
								<td>{{$case->Provinces->PROVINCE_NAME}}</td>
								@if($case->problem_case == 1 )
									<td>บังคับตรวจเอชไอวี</td>
								@elseif($case->problem_case == 2)
									<td>เปิดเผยสถานะการติดเชื้อเอชไอวี</td>
								@elseif($case->problem_case == 3)
									<td>เลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</td>
								@elseif($case->problem_case == 4)
									<td>ไม่ได้รับความเป็นธรรมเนื่องมาจากเป็นกลุ่มเปราะบาง</td>
								@endif
								@if( $case->status  == 1)
									<td>ยังไม่ได้รับเรื่อง</td>
									<td><a class='button is-primary' href="{{ route('officer.open_cfm', $case->case_id) }}"> <span>รับเรื่อง</span> </a> </td>
								@elseif( $case->status  == 2)
									<td> รับเรื่องแล้ว </td>
									<td><a class='button is-primary' href="{{ route('officer.add_detail' , $case->case_id) }}"> <span> บันทึกข้อมูล </span> </a> </td>
								@elseif( $case->status  == 3)
									<td> บันทึกข้อมูลเพิ่มเติมแล้ว </td>
									<td><a class='button is-primary' href="{{ route('officer.add_activities' , $case->case_id) }}"> <span> ดำเนินการ </span> </a> </td>
								@else
									<td> รับเรื่องแล้ว </td>
									<td><a class='button is-primary' href="{{ route('data.detail2') }}"> <span> บันทึกข้อมูล </span> </a> </td>
								@endif

									@if($case->sender_case == 1 )
										<td>แจ้งด้วยตนเอง</td>
									@elseif($case->sender_case == 2)
										<td>มีผู้แจ้งแทน</td>
									@elseif($case->sender_case == 3)
										<td>เจ้าหน้าที่แจ้ง</td>
									@endif
								<td><a href='#' title='Receiver'>{{ $case->receiver }}</a></td>
							</tr>
							@endforeach


						</tbody>
					</table>
					
					
					
					
				</div>
				<nav class="pagination is-centered"> <a class="pagination-previous">Previous</a> <a class="pagination-next">Next page</a>
					<ul class="pagination-list">
						<li><a class="pagination-link">1</a>
						</li>
						<li><span class="pagination-ellipsis">&hellip;</span>
						</li>
						<li><a class="pagination-link">5</a>
						</li>
						<li><a class="pagination-link is-current">6</a>
						</li>
						<li><a class="pagination-link">7</a>
						</li>
						<li><span class="pagination-ellipsis">&hellip;</span>
						</li>
						<li><a class="pagination-link">20</a>
						</li>
					</ul>
				</nav>
			</div>
	</section>
	<br>
	
	
	@extends('footer')
	<script src="http://bulma.io/vendor/clipboard-1.7.1.min.js"></script>
	<script src="http://bulma.io/lib/main.js"></script>
	
</body>

</html>