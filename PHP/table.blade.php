<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Bulma is an open source CSS framework based on Flexbox and built with Sass. It's 100% responsive, fully modular, and available for free.">
	<title>CRS</title>

	<link href="../public/css/font-awesome5.0.6/css/fontawesome-all.css" rel="stylesheet">


	<link rel="stylesheet" href="../public/bulma/css/bulma.css">

	<meta name="msapplication-config" content="http://bulma.io/favicons/browserconfig.xml?v=201701041855">
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
				<div class="nav-left"> <a class="nav-item is-active" href="#"> Crisis Response System </a>
				</div>
			</nav>
		</div>


		<div class="container">
				
				<nav class="breadcrumb" aria-label="breadcrumbs">
					<ul>
						<li><a href=""><span class="icon is-small">
							<i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
						</li>
						<li class="is-active"><a><span class="icon is-small">
						<i class="far fa-file-alt"></i></span><span> ระบบรายงาน </span></a>
						</li>
					</ul>
				</nav>



		<div class="tabs is-centered is-boxed is-medium">
			<ul>
				<li class="is-active">
				    <a href="table.blade.php">
					    <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
						<span>ตารางสรุป</span>
					</a>
				</li>
				<li>
					<a href="dashboard1.blade.php">
						<span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>
						<span>Chart 1</span>
					</a>
				</li>
				<li>
					<a href="dashboard2.blade.php">
						<span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>
						<span>Chart 2</span>
					</a>
				</li>
			</ul>
		</div>





		</div>
	</div>

</section>
	


	<?
		include "../resources/views/footer.php";
	?>
</body>

</html>