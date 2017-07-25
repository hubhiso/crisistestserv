<!DOCTYPE html>
<html lang="en" class="route-index">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--meta name="description" content="Bulma is an open source CSS framework based on Flexbox and built with Sass. It's 100% responsive, fully modular, and available for free."-->
	<title>Crisis Response</title>
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

	<!--meta name="msapplication-config" content="http://bulma.io/favicons/browserconfig.xml?v=201701041855"-->
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
								<p class="control"> <a id="i-" class="button" href="#"> <span>100 case</span> </a> </p>
							</div>
						</div>

						<span id="nav-toggle" class="nav-toggle"> <span></span> <span></span> <span></span> </span>
						<div id="nav-menu" class="nav-right nav-menu"> <a class="nav-item is-active" href="#"> Username : </a>
							<div class="nav-item">
								<p class="control"> <a class="button is-primary" href="#"> <span>Logout</span> </a> </p>
							</div>
						</div>
				</nav>
				</div>
			</div>



			<div class="container">
				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
					</div>
				</div>
				<nav class="breadcrumb">
					<ul>
						<li><a><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						</li>
						<li class="is-active"><a><span class="icon is-small"><i class="fa fa-search"></i></span><span>  การดำเนินการ </span></a>
						</li>
					</ul>
				</nav>
				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
					</div>
				</div>
			</div>


			<div class="tabs is-centered is-boxed">
				<ul>
					<li >
						<a>
        					<span class="icon is-small"><i class="fa fa-image"></i></span>
        					<span> ข้อมูลเพิ่มเติม </span>
      					</a>
					
					</li>
					<li class="is-active">
						<a>
        					<span class="icon is-small"><i class="fa fa-music"></i></span>
       						<span> การดำเนินงาน </span>
      					</a>
					
					</li>
				</ul>
				<hr>
			</div>

			<h1 id="title" class="title"> การดำเนินงาน </h1>
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
							<label class="label">ชื่อผู้ถูกกระทำ</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded has-icons-left ">
									<input class="input" type="text" placeholder="ชื่อผู้แจ้ง" value="สมชาย" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
							<div class="field-label is-normal">
								<label class="label">ID-Code</label>
							</div>
							<div class="field">
								<p class="control is-expanded has-icons-left has-icons-right">
									<input class="input" type="email" placeholder="ID-CODE" value="XX12345" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-envelope"></i> </span> <span class="icon is-small is-right"> <i class="fa fa-check"></i> </span> </p>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
					</div>
				</div>

				<div class="field is-normal">
					<p class="subtitle is-5">การดำเนินการที่ผ่านมา</p>
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
							<label class="label">วันที่ดำเนินการ</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left ">
									<input class="input" type="text" placeholder="" value="26/06/2560" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
						</div>
						<div class="field is-grouped">
							<p><a> </a>
							</p>
							<p class="control"> <a class="button is-primary"> แก้ไข </a> </p>
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
							<label class="label">วันที่ดำเนินการ</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left ">
									<input class="input" type="text" placeholder="" value="26/06/2560" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
						</div>
						<div class="field is-grouped">
							<p><a> </a>
							</p>
							<p class="control"> <a class="button is-primary"> แก้ไข </a> </p>
						</div>
					</div>
				</div>



				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
					</div>
				</div>
				<div class="notification">
					<div class="field is-normal">
						<p class="subtitle is-5">การดำเนินการในครั้งนี้</p>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> วันที่</label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left">
									<input class="input" type="text" placeholder="Ex : 01/01/2560" value="26/06/2560">
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
						</div>
					</div>

					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> วิธีการดำเนินการ </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left is-medium">
									<label class="checkbox">
  				<input type="checkbox" class="is-medium" >
 				ให้คำปรึกษา
			</label>
								


									<label class="checkbox">
  				<input type="checkbox" >
 				เจรจาเป็นรายบุคคล
			</label>
								



							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">  </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  has-icons-left is-medium">

									<label class="checkbox">
  				<input type="checkbox" >
 				เจรจาระดับนโยบายขององค์กร
			</label>
								


									<label class="checkbox">
  				<input type="checkbox" >
 				ดำเนินคดี
			</label>
								


							</div>
						</div>
					</div>


					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">รายละเอียดการดำเนินการ</label>
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
							<label class="label">ผลการดำเนินการ</label>
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
							<label class="label"></label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<div class="control">
									<p class="control"> <a class="button is-primary"> ยืนยัน </a> </p>
								</div>
								<div class="control">
									<p class="control"> <a class="button"> ยกเลิก </a> </p>
								</div>
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
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> สรุปผลการดำเนินการ </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control is-expanded  ">
									<span class="select">
            <select>
                <option> อยู่ระหว่างการดำเนินการ </option>
                <option> ดำเนินการเสร็จสิ้น </option>
                <option> ดำเนินการแล้วส่งต่อ </option>
			   </select> </span>
								

								</p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> ดำเนินการเสร็จสิ้น </label>
							</div>
							<div class="field">
								<p class="control is-expanded  has-icons-right">
									<span class="select"> <select>
                <option> สำเร็จ </option>
                <option> ไม่สำเร็จ </option>
                <option> ตาย </option>
              </select> </span>
								

								</p>
							</div>
						</div>
					</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"></label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<div class="control">
									<p class="control"> <a class="button is-primary"> ยืนยัน </a> </p>
								</div>
								<div class="control">
									<p class="control"> <a class="button"> ยกเลิก </a> </p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="box">
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label"> ผลการดำเนินการที่ส่งต่อ </label>
						</div>
						<div class="field-body">
							<div class="field is-grouped">
								<p class="control  ">
									<input class="input" type="text" placeholder="" value="ยังไม่ได้รับเรื่อง" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
							<div class="field-label is-normal">
								<label class="label"> ดำเนินการเสร็จสิ้น </label>
							</div>
							<div class="field">
								<p class="control  has-icons-left ">
									<input class="input" type="text" placeholder="" value="" disabled>
									<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
							</div>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label">
						<!-- Left empty for spacing -->
					</div>
				</div>

			</div>
		</div>
	</section>
	<br>

	<footer class="footer">
		<div class="container">
			<div class="columns">
				<div class="column is-3">
					<div id="about" class="content"> <strong xmlns:dct="#" href="#" property="dct:title" rel="dct:type">Crisis Response</strong> by <a xmlns:cc="#" href="#" property="cc:attributionName" rel="cc:attributionURL">Aidsrightsthailand</a>. </div>
				</div>
				<div class="column is-5">
					<div id="share" class="content"> </div>
				</div>
				<div class="column is-4">
					<div id="sister">
						<p><small> <strong>ที่อยู่</strong> : </small>
						</p>
						<p><small>133/235 หมู่บ้านรื่นฤดี3 ถนนหทัยราษฎร์ แขวงมีนบุรี เขตมีนบุรี กทม 10510 โทรศัพท์ 02-171-5135-6 โทรสาร 02-1715124 </small>
						</p>
					</div>
				</div>
			</div>
			<p id="tsp"> <small> Source code licensed <a href="#">HISO</a>. <br>
      Website content licensed <a rel="license" href="http://www.hiso.or.th">www.hiso.or.th</a>. </small> </p>
		</div>
	</footer>
</body>

</html>