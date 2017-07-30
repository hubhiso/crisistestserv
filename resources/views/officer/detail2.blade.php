<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Crisis Response</title>
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
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
						
						<span id="nav-toggle" class="nav-toggle"> <span></span> <span></span> <span></span> </span>
						<div id="nav-menu" class="nav-right nav-menu"> <a class="nav-item is-active" href="#"> Username : </a>
							<div class="nav-item">
								<p class="control"> <a class="button is-primary" href="#"> <span>Logout</span> </a> </p>
							</div>
						</div>
				</nav>
			</div>
		</div>
			<br>
			<div class="container">
				<nav class="breadcrumb">
					<ul>
						<li><a href="{{ '' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						</li>
						<li class="is-active"><a><span class="icon is-small"><i class="fa fa-address-card"></i></span><span> ข้อมูลเพิ่มเติม </span></a>
						</li>
					</ul>
				</nav>
			</div>	
			
			
			<h1 id="title" class="title"> ข้อมูลเพิ่มเติม </h1>
			<div class="container">
				<div class="notification">
					<!--This container is <strong>centered</strong> on desktop. -->
					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> วันที่</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded has-icons-left">
									<input class="input" type="text" placeholder="Ex : 01/01/2560" value="26/06/2560" disabled>
								</p>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">ผู้แจ้งเรื่อง</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded has-icons-left ">
									<input class="input" type="text" placeholder="เจ้าหน้าที่" value="เจ้าหน้าที่ A" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> เบอร์มือถือผู้แจ้ง </label>
							</div>
							<div class="field">
								<p class="control  has-icons-left has-icons-right">
									<input class="input" type="text" value="0123456789" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-mobile"></i> </span> </p>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">ผู้รับเรื่อง</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control has-icons-left">
									<input class="input" type="text" placeholder="เจ้าหน้าที่" value="เจ้าหน้าที่ B" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">ชื่อผู้ถูกกระทำ</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded has-icons-left ">
									<input class="input" type="text" placeholder="ชื่อผู้แจ้ง" value="สมชาย">
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
							<div class="field-label is-normal">
								<label class="label">ID-Code</label>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
									<input class="input" type="email" placeholder="ID-CODE" value="XX12345" disabled>
								 </p>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> เบอร์มือถือผู้ถูกกระทำ </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control has-icons-left">
									<input class="input" type="text" placeholder="Ex : 0123456789" value="0123456789">
									<span class="icon is-small is-left"> <i class="fa fa-mobile"></i> </span> </p>
							</div>
						</div>
					</div>

					
					
					
					<div class="field is-horizontal">
					  <div class="field-label">
						<label class="label"> เพศ </label>
					  </div>
					  <div class="field-body">
						<div class="field">
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
					 </div>


					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">พื้นที่ จังหวัด</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded has-icons-left ">
									<input class="input" type="text" placeholder="ชื่อผู้แจ้ง" value="กรุงเทพมหานคร" disabled>
								</p>
							</div>
							<div class="field-label is-normal">
								<label class="label">อำเภอ</label>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
									<input class="input" type="email" placeholder="ID-CODE" value="บางกะปิ" disabled>
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
				<div class="notification">
					<!--This container is <strong>centered</strong> on desktop. -->
					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
					</div>


					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> วันเกิด </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left ">
									<input class="input" type="text" placeholder="ชื่อผู้แจ้ง" value="26/06/2520">
								 </p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> อายุ </label>
							</div>
							<div class="field">
								<p class="control  has-icons-left has-icons-right">
									<input class="input" type="text" placeholder="ชื่อผู้แจ้ง" value="36" disabled>
								</p>
							</div>
						</div>
					</div>
					
					
					<div class="field is-horizontal">
					  <div class="field-label">
						<label class="label"> สถานะภาพสมรส </label>
					  </div>
					  <div class="field-body">
						<div class="field">
						  <div class="field is-grouped">
								<p class="control is-expanded has-icons-left ">
									<label class="radio">
      							{{ Form::radio('marital-status', '1' , true) }} 
      							โสด
    						</label>
								
									<label class="radio">
     							{{ Form::radio('marital-status', '2' , false) }} สมรส
    						</label>
								
									<label class="radio">
     							{{ Form::radio('marital-status', '3' , false) }} หม้าย / หย่า / แยก
    						</label>
   								
    								<label class="radio">
     							{{ Form::radio('marital-status', '4' , false) }} สมณะ
    						</label>
								
								</p>
							</div>
						</div>
					  </div>
					 </div>
					
					
					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label">อาชีพ</label>
						</div>
						<div class="field-body">
							<div class="field is-narrow">
								<div class="control"> <span class="select">
            <select>
              <option> โปรดเลือก </option>
              <option> รับราชการ </option>
              <option> พนักงานบริษัทเอกชน </option>
              <option> องค์กรพัฒนาเอกชน (NGO) </option>
              <option> พนักงานมหาวิทยาลัย </option>
              <option> นักเรียน/นักศึกษา </option>
              <option> พนักงานบริการทั่วไป </option>
              <option> รับจ้างทั่วไป </option>
              <option> เกษตรกร </option>
              <option> ธุรกิจส่วนตัว </option>
              <option> อื่นๆ โปรดระบุ </option>
            </select>
            </span>
									</div>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ที่อยู่</label>
						</div>
						<div class="field-body">
							<div class="field  is-grouped">
								<p class="control  is-expanded">
									<textarea class="textarea" placeholder="บ้านเลขที่ ซอย ถนน หมู่บ้าน ตำบล อำเภอ จังหวัด รหัสไปรษณีย์"></textarea>
								 </p>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label">
							<label class="label">ประเภทบัตร</label>
						</div>
						<div class="field-body is-expanded">
							<div class="field is-narrow ">
								<div class="control"> <span class="select">
            <select>
              <option> บัตรประชาชน </option>
              <option> บัตรต่างด้าว </option>
              <option> บัตรคนไทยไร้สถานะ </option>
              <option> พาสปอร์ต </option>
            </select>
            </span>
									</div>
							</div>
							<div class="field-label is-normal">
								<label class="label">เลขที่บัตร</label>
							</div>
							<div class="field">
								<p class="control  has-icons-left has-icons-right">
									<input class="input" type="email" placeholder="ID-CODE" value="">
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

				<div class="notification">
					<!--This container is <strong>centered</strong> on desktop. -->
					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ปัญหาที่แจ้ง</label>
						</div>
						<div class="field-body">
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
            <select>
              <option>บังคับตรวจการติดเชื้อ HIV</option>
            </select>
            </span>
									</div>
							</div>
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
            <select>
              <option>กลุ่มเปราะบาง</option>
            </select>
            </span>
									</div>
							</div>
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
            <select>
              <option>ผู้ใช้สารเสพติด</option>
            </select>
            </span>
									</div>
							</div>

						</div>
					</div>


					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> สถานที่เกิดเหตุ</label>
						</div>
						<div class="field-body">
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
            <select>
              <option> โปรดเลือก </option>
              <option> สถานพยาบาล </option>
              <option> สถานที่ทำงาน </option>
              <option> สถานศึกษา </option>
              <option> ชุมชน </option>
            </select>
            </span>
									</div>
							</div>
							<div class="field is-narrow is-grouped">
								<div class="control"> <span class="select">
            <select>
              <!--option> ของรัฐบาล </option>
              <option> ของเอกชน </option-->
            </select>
            </span>
									</div>
							</div>

						</div>
					</div>


					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">ข้อมูลเพิ่มเติม</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<textarea class="textarea" placeholder="กรอกรายละเอียด"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> </label>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
					</div>
				</div>

				<div class="field is-grouped">
					<p><a> </a>
					</p>
					<p class="control"> <a class="button is-primary"> ยืนยัน </a> </p>
					<p class="control"> <a class="button"> ยกเลิก </a> </p>
				</div>
			</div>
	</section>
	<br>
	@extends('footer')
</body>

</html>