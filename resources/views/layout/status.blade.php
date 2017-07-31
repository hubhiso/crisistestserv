<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
	<meta charset="UTF-8">
	<title>CRISIS RESPONSE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link href="{{ asset('css/base.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>

<body>

	<section class="hero is-primary wall3">
		<div class="hero-body">
			<div class="container">
				<div class="columns is-vcentered">
					<div class="column">
						<p class="title"> Crisis Response </p>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="section">
		<div class="container">

			<nav class="breadcrumb">
				<ul>
					<li><a href="{{ 'index.php' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
					</li>
					<li class="is-active"><a><span class="icon is-small"><i class="fa fa-search"></i></span><span> ตรวจสอบสถานะ </span></a>
					</li>
				</ul>
			</nav>
			


			<h1 class="title"> ตรวจสอบสถานะ </h1>
			

			<nav class="level">
				<div class="level-left">
					<div class="level-item">
						<p class="subtitle is-5">
							ใส่รหัสเพื่อตรวจสอบ
						</p>
					</div>
					<div class="level-item">
						<div class="field has-addons">
							<p class="control">
								<input class="input" type="text" >
							</p>
							<p class="control">
								<button class="button">
            ค้นหา
          </button>
							

							</p>
						</div>
					</div>
				</div>
			</nav>

			<hr>
			<!-- Timeline begin here -->
		<div id="timeline">
			<div class="timeline-item">
				<div class="timeline-icon">
					<img src="images/markx40.png" alt="">
				</div>
				<div class="timeline-content">
					<h2> 1 มกราคม 2560 เวลา 13.00 น. </h2>
					<p>
						รับเรื่อง
					</p>
					
				</div>
			</div>

			<div class="timeline-item">
				<div class="timeline-icon">
					<img src="images/markx40.png" alt="">
				</div>
				<div class="timeline-content right">
					<h2> 25 มกราคม 2560 เวลา 17.00 น. </h2>
					<p>
						ดำเนินการอยู่
					</p>
				</div>
			</div>

			<div class="timeline-item">
				<div class="timeline-icon">
					<img src="images/minusx40.png" alt="">
				</div>
				<div class="timeline-content">
					<h2> - </h2>
					<p>
						การดำเนินการเสร็จสิ้น
					</p>
				</div>
			</div>
		</div>
		<!-- Timeline ends here -->
		</div>
	</section>


	@extends('footer')

</body>

</html>