
<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title>CRS</title>
	<link rel="shortcut icon" href="http://localhost:8888/crisis/public/images/favicon.ico">
	<link href="../public/css/font-awesome5.0.6/css/fontawesome-all.css" rel="stylesheet">
	<link rel="stylesheet" href="../public/bulma/css/bulma.css">

	<link media="all" type="text/css" rel="stylesheet" href="http://localhost:8888/crisis/public/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
	<link media="all" type="text/css" rel="stylesheet" href="http://localhost:8888/crisis/public/bootstrap/css/bootstrap.css">

	<meta name="theme-color" content="#cc99cc"/>
	
	<script src="http://localhost:8888/crisis/public/js/jquery.min.js"></script>
	<script src="http://localhost:8888/crisis/public/bootstrap/js/bootstrap.min.js"></script>
	<script src="http://localhost:8888/crisis/public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

	<link href="http://localhost:8888/crisis/public/bulma/css/bulma.css" rel="stylesheet">
	<link href="http://localhost:8888/crisis/public/css/font-awesome5.0.6/css/fontawesome-all.css" rel="stylesheet">

	
	<style>
		.hideextra { white-space: nowrap; overflow: hidden; text-overflow:ellipsis; }
		.red {
			height: 70px; 
			vertical-align: middle; 
			background-color: #E14455;
			border: 1px solid #E14455;
		}
		.red2 {
			vertical-align: middle; 
			background-color: #713132;
			border: 1px solid #713132;
			color: white;
		}
		.red3 {
			vertical-align: middle; 
			background-color: #E14455;
			color: white;
			text-align: center;
		}
	
	</style>

	<?php
		
		require("phpsql_dbinfo.php");

		$conn = mysqli_connect($hostname, $username, $password, $database);
		if (mysqli_connect_errno()) 
    { 
        echo "Database connection failed."; 
    }
		
		
	?>


</head>

<body class="layout-default">

	<section class="hero is-medium has-text-centered">
		<div class="hero-head">


			<div class="container">

			<br>

				<nav class="breadcrumb" aria-label="breadcrumbs">
					<ul>
						<li><a href="../public/officer"><span class="icon is-small">
							<i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						
						</li>
						<li class="is-active"><a><span class="icon is-small">
						<i class="far fa-file-alt"></i></span><span> ระบบรายงาน </span></a>
						
						</li>
					</ul>
				</nav>

                <div class="tabs is-centered  is-toggle is-toggle-rounded">
					<ul>
						<li >
							<a href="dashboard3.blade.php">
						        <span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>
                                <span> กราฟแสดงข้อมูล<br>แยกตามประเด็น </span>
                            </a>
						</li>
						<li >
							<a href="mapcrisis.blade.php">
								<span class="icon is-small"><i class="far fa-map" aria-hidden="true"></i></span>
								<span>พิกัด<br>การละเมิดสิทธิ์</span>
							</a>
						
						</li>
						<li >
							<a href="table.blade.php">
								<span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
								<span>ตารางสรุป<br>ในภาพรวม</span>
							</a>
						
						</li>
						<li >
							<a href="report_c1.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุปการ<br>จัดการเหตุรายหน่วย</span>
                            </a>
						</li>
						<li >
							<a href="report_c2.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>การละเมิดสิทธิ์</span>
                            </a>
						</li>
						<li  class="is-active">
							<a href="report_perfomance.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>การให้บริการ</span>
                            </a>
						</li>
					</ul>
				</div>

				<p class="title">รายงานการสรุปเวลาเฉลี่ยในการดำเนินการในแต่ละขั้นตอน<br>จำแนกรายหน่วยจัดการเหตุ</p>

			             
                <p class="subtitle is-6">คลิกที่ตารางแล้วกดปุ่ม ซ้าย-ขวา เพื่อเลื่อนดูข้อมูล</p>

                
					<div class="table-container">
					<?php require("performance2.php");?>
				
			</div>

				
        </div>
        
			
		</section>

</body>


<footer class="footer "style="background-color: #EEE;">
  <div class="container  ">
    <div class="content has-text-centered  ">
      <p>Crisis Response System (CRS)
	  </p>
	  <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>.  </small> </p>
    </div>
  </div>
</footer>



</html>
