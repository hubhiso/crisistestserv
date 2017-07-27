<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Crisis Response</title>
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	
	

	<meta name="theme-color" content="#cc99cc"/>
	<script src="http://bulma.io/javascript/jquery-2.2.0.min.js"></script>
	<script src="http://bulma.io/javascript/clipboard.min.js"></script>
	<script src="http://bulma.io/javascript/bulma.js"></script>
	<script type="text/javascript" src="http://bulma.io/javascript/index.js"></script>
</head>

<body class="layout-default">
	<section class="hero is-medium has-text-centered">
		<div class="hero-head">
			<div class="container">
				<nav class="nav">
					<div class="nav-left"> <a class="nav-item is-active" href="#"> Crisis Response </a>
						<div class="nav-item">
							<div class="field is-grouped">
								<!--p class="control"> <a id="i-" class="button" href="#"> <span>100 case</span> </a> </p-->
							</div>
						</div>
						<div class="nav-center"> <a class="nav-item" href="#"> <span class="icon"> <i class="fa fa-github"></i> </span> </a> <a class="nav-item" href="#"> <span class="icon"> <i class="fa fa-twitter"></i> </span> </a> </div>
						<span id="nav-toggle" class="nav-toggle"> <span></span> <span></span> <span></span> </span>
						<div id="nav-menu" class="nav-right nav-menu"> <a class="nav-item is-active" href="#"> Username : </a>
							<div class="nav-item">
								<p class="control"> <a class="button is-primary" href="#"> <span>Logout</span> </a> </p>
							</div>
						</div>
				</nav>
				</div>
			</div>
			<div class="column is-one-third ">
				<p> <a href="Home.php">Home</a> >> <a>รายการข้อมูลการแจ้งเหตุ</a> </p>
			</div>
			<br/>
			<div class="container">
				<!--h1 id="title" class="title"> Monitoring Case Alert!! </h1-->
				<!--h1 id="modern-framework" class="subtitle is-3"> รายการข้อมูลการแจ้งเหตุ </h1-->
				
				<br>


				<!-- -->

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
          								<option>ชื่อ</option>
          								<option>ผู้รับเรื่อง</option>
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
          								<option> ดำเนินการ </option>
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
					</div>
				</nav>
				
				
			</div>
			<br>
			<div class="body container">
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
				<br/>
				<div class="container">
					<table class="table">
						<thead>
							<tr>
								<th><abbr title="Date">วันที่</abbr>
								</th>
								<th><abbr title="ID">ไอดี</abbr>
								</th>
								<th><abbr title="Name">ชื่อ</abbr>
								</th>
								<th><abbr title="PR">จังหวัด</abbr>
								</th>
								<th><abbr title="Type">ประเภท</abbr>
								</th>
								<th><abbr title="Status">สถานะ</abbr>
								</th>
								<th><abbr title="Activities">ดำเนินการ</abbr>
								</th>
								<th><abbr title="Username">ประเภทของผู้แจ้ง</abbr>
								</th>
								<th><abbr title="Username">ผู้รับเรื่อง</abbr>
								</th>
							</tr>
						</thead>
						<tbody>
							<? for($i = 1; $i <=20; $i++){
			 echo "<tr>";
			 echo "<th>26/06/2560</th>";
			 echo "<th>XXX123</th>";
			 echo "<td><a href='#' title='ID'>Name</a> </td>";
			 echo "<td>กรุงเทพ</td>";
			 echo "<td>บังคับตรวจ HIV</td>";
			 echo "<td>ยังไม่ได้รับเรื่อง</td>";
			 echo "<td><a class='button is-primary' href='#'> <span>รับเรื่อง</span> </a> </td> ";
			 echo "<td><a href='#' title='Username'>-</a></td>";
			 echo "<td><a href='#' title='Username'>Name Surname</a></td>";
		  }
		  ?>
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
	
</body>

</html>