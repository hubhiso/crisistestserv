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
	@component('component.login_bar')
	@endcomponent
    <div class="hero-body">
				<div class="container">
					<h1 id="bulma" class="title"> Crisis Response </h1>
					<h2 id="modern-framework" class="subtitle"> ระบบรับเรื่องร้องเรียนและการให้คำปรึกษาข้อมูลสิทธิด้านเอดส์ </h2>
					<a id="btn_new1" class="button ft1 i-margin" href="{{ 'officer/input_case' }}">แจ้งเหตุ</a>
					<a id="btn_new1" class="button ft1 i-margin" href="#">จัดการเหตุ</a>
					<a id="btn_new1" class="button ft1 i-margin" href="#">รายงาน</a>
				</div>
			</div>
</section>

@extends('footer')

<script src="http://bulma.io/vendor/clipboard-1.7.1.min.js"></script>
	<script src="http://bulma.io/lib/main.js"></script>
</body>
</html>
