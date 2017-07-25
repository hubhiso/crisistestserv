<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>CRISIS RESPONSE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
</head>

<body>

	<section class="hero is-primary">
		<div class="hero-body">
			<div class="container">
				<div class="columns is-vcentered">
					<div class="column">
						<p class="title"> Crisis Response </p>
					</div>
				</div>
			</div>
		</div>
		<!--div class="hero-foot">
			<div class="container">
				<nav class="tabs is-boxed">
					<ul>
						<li class="is-active"> <a href="{{ url('/') }}"> ตรวจสอบสถานะ </a> </li>
					</ul>
				</nav>
			</div>
		</div-->
	</section>


	<section class="section">
		<div class="container">

			<nav class="breadcrumb">
				<ul>
					<li><a><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
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
			<nav class="level">
				<div class="level-item has-text-centered">
					<div>
						<p class="heading"> ขั้นที่ 1 </p>
						<p class="title"> รับเรื่องแล้ว </p>
					</div>
				</div>

				<div class="level-item has-text-centered">
					<div>
						<p class="title"> > </p>
					</div>
				</div>

				<div class="level-item has-text-centered">
					<div>
						<p class="heading"> ขั้นที่ 2 </p>
						<p class="title"> ดำเนินการ </p>
					</div>
				</div>

				<div class="level-item has-text-centered">
					<div>
						<p class="title"> > </p>
					</div>
				</div>

				<div class="level-item has-text-centered">
					<div>
						<p class="heading"> ขั้นที่ 3 </p>
						<p class="title"> จบเคส </p>
					</div>
				</div>
			</nav>
		</div>
	</section>


	<footer class="footer">
		<div class="container">
			<div class="columns">
				<div class="column is-3">
					<div id="about" class="content"> <strong xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/Text" property="dct:title" rel="dct:type">Crisis Response</strong> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://jgthms.com" property="cc:attributionName" rel="cc:attributionURL">Aidsrightsthailand</a>. </div>
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
			<p id="tsp"> <small> Source code licensed <a href="http://opensource.org/licenses/mit-license.php">HISO</a>. <br>
                Website content licensed <a rel="license" href="http://www.hiso.or.th">www.hiso.or.th</a>. </small> </p>
		</div>
	</footer>

</body>

</html>