<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">

    <meta name="theme-color" content="#cc99cc" />
    <script src="http://bulma.io/javascript/jquery-2.2.0.min.js"></script>
    <script src="http://bulma.io/javascript/clipboard.min.js"></script>
    <script src="http://bulma.io/javascript/bulma.js"></script>
    <script type="text/javascript" src="http://bulma.io/javascript/index.js"></script>
</head>

<body class="layout-default">
<section class="hero is-medium has-text-centered">
    <div class="hero-head">
        <div class="container">
				<nav class="navbar ">
					<div class="navbar-brand">
						<!--a class="nav-item is-active" href="#">Crisis Response</a-->
						<div class="nav-item">
							<div class="field is-grouped">
								<p class="control"> <a id="i-receive" class="button" href="#"> <span>ไม่รับเรื่อง 100</span> </a> </p>
								<p class="control"> <a id="i-additional" class="button" href="#"> <span>ไม่บันทึก 20</span> </a> </p>
								<p class="control"> <a id="i-process" class="button" href="#"> <span>ไม่ดำเนินการ 30</span> </a> </p>
							</div>
						</div>

						<div class="navbar-burger burger" data-target="navMenuDocumentation">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>

					<div id="navMenuDocumentation" class="navbar-menu">
						<div class="navbar-end">
							<a class="nav-item is-active" href="#"> Username : {{ Auth::user()->name }} </a>
							<div class="nav-item">
								<p class="control"> <a class="button is-primary" href="{{ route('officer.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <span>Logout</span> </a> </p>
								<form id="logout-form" action="{{ route('officer.logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</div>
						</div>
					</div>
				</nav>

			</div>
    </div>
    <div class="hero-body">
				<div class="container">
					<h1 id="bulma" class="title"> Crisis Response </h1>
					<h2 id="modern-framework" class="subtitle"> ระบบรับเรื่องร้องเรียนและการให้คำปรึกษาข้อมูลสิทธิด้านเอดส์ </h2>
					<a id="btn_new1" class="button ft1 i-margin" href="INPUT_STATE1.php">แจ้งเหตุ</a>
					<a id="btn_new1" class="button ft1 i-margin" href="managecase.php">จัดการเหตุ</a>
					<a id="btn_new1" class="button ft1 i-margin" href="#">รายงาน</a>
				</div>
			</div>
</section>

@extends('footer')

<script src="http://bulma.io/vendor/clipboard-1.7.1.min.js"></script>
	<script src="http://bulma.io/lib/main.js"></script>
</body>
</html>
