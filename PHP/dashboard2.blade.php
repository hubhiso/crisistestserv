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

	<script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
	<script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>


	<script type="text/javascript">
		/*  Tab 2 Chart */

		FusionCharts.ready( function () {

			var updateBtn11 = document.getElementById( 'update-chart11' );
			var updateBtn12 = document.getElementById( 'update-chart12' );

			updateBtn11.addEventListener( 'click', function ( e ) {
				this.disabled = true;
				updateBtn12.disabled = false;
				salesChart.setJSONData( {
					"chart": {
						"caption": "กราฟแสดงข้อมูลแยกตามปัญหา",
						"subCaption": "ปี 2560",
						"placeValuesInside": "0",
						"yAxisName": "เปอร์เซ็นต์",
						"basefontsize": "14",
						"captionFontSize": "16",
						"subcaptionFontSize": "16",
						"showAxisLines": "1",
						"axisLineAlpha": "25",
						"alignCaptionWithCanvas": "0",
						"showAlternateVGridColor": "1",
						"numberScaleValue": "0",
						"theme": "hulk-light",
						"decimals": "2",
						"numberSuffix": "%",
						"exportEnabled": "1"

					},

					"data": [ {
						"label": "แจ้งเรื่อง",
						"value": "97"
					}, {
						"label": "รับเรื่อง",
						"value": "85"
					}, {
						"label": "บันทึกข้อมูล",
						"value": "60"
					}, {
						"label": "ดำเนินการ",
						"value": "45"
					}, {
						"label": "เสร็จสิ้น",
						"value": "35"
					}, {
						"label": "ส่งต่อ",
						"value": "20"
					} ]
				} );
			} );


			updateBtn12.addEventListener( 'click', function ( e ) {
				this.disabled = true;
				updateBtn11.disabled = false;
				salesChart.setJSONData( {
					"chart": {
						"caption": "กราฟแสดงข้อมูลแยกตามปัญหา",
						"subCaption": "ปี 2560",
						"placeValuesInside": "0",
						"yAxisName": "จำนวน",
						"basefontsize": "14",
						"captionFontSize": "16",
						"subcaptionFontSize": "16",
						"showAxisLines": "1",
						"axisLineAlpha": "25",
						"alignCaptionWithCanvas": "0",
						"showAlternateVGridColor": "1",
						"numberScaleValue": "0",
						"theme": "hulk-light",
						"exportEnabled": "1"

					},

					"data": [ {
						"label": "แจ้งเรื่อง",
						"value": "290"
					}, {
						"label": "รับเรื่อง",
						"value": "260"
					}, {
						"label": "บันทึกข้อมูล",
						"value": "180"
					}, {
						"label": "ดำเนินการ",
						"value": "140"
					}, {
						"label": "เสร็จสิ้น",
						"value": "115"
					}, {
						"label": "ส่งต่อ",
						"value": "100"
					} ]
				} );
			} );

			var salesChart = new FusionCharts( {
					type: 'column2d',
					renderAt: 'chart-container-b1',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "กราฟแสดงข้อมูลแยกตามปัญหา",
							"subCaption": "ปี 2560",
							"placeValuesInside": "0",
							"yAxisName": "จำนวน",
							"basefontsize": "14",
							"captionFontSize": "16",
							"subcaptionFontSize": "16",
							"showAxisLines": "1",
							"axisLineAlpha": "25",
							"alignCaptionWithCanvas": "0",
							"showAlternateVGridColor": "1",
							"numberScaleValue": "0",
							"theme": "hulk-light",
							"exportEnabled": "1"

						},

						"data":[ {
						"label": "บังคับตรวจเอชไอวี",
						"value": "290"
					}, {
						"label": "เปิดเผยสถานะการติดเชื้อเอชไอวี",
						"value": "260"
					}, {
						"label": "ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากการติดเชื้อเอชไอวี",
						"value": "180"
					}, {
						"label": "ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง",
						"value": "140"
					}, {
						"label": "อื่นๆ ที่เกี่ยวข้องกับ HIV",
						"value": "115"
					} ]
					},
					events: {
						"dataUpdated": function ( evtObj, argObj ) {
							var header = document.getElementById( 'header' );
							header.style.display = 'block';

							var tempDiv = document.createElement( 'div' );
							var attrsTable = document.getElementById( 'attrs-table' );
							var titleDiv, valueDiv;
							for ( var prop in argObj ) {
								titleDiv = document.createElement( 'div' );
								titleDiv.className = 'title';
								titleDiv.innerHTML = prop;

								valueDiv = document.createElement( 'div' );
								valueDiv.className = 'value';
								valueDiv.innerHTML = argObj[ prop ];
								console.log( argObj[ prop ] );

								tempDiv.appendChild( titleDiv );
								tempDiv.appendChild( valueDiv );
							}
							attrsTable.innerHTML = '';
							attrsTable.appendChild( tempDiv );
						}
					}
				} )
				.render();
		} );
	</script>


</head>

<body class="layout-default">

	<section class="hero is-medium has-text-centered">
		<div class="hero-head">

			<!--div class="container">
			<nav class="nav">
				<div class="nav-left"> <a class="nav-item is-active" href="#"> Crisis Response System </a>
				</div>
			</nav>
		</div-->


			<div class="container">

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
						<li>
							<a href="table.blade.php">
					    <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
						<span>ตารางสรุป</span>
					</a>
						
						</li>
						<li >
							<a href="dashboard1.blade.php">
						<span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>
						<span> กราฟแสดงข้อมูลแยกตามขั้นตอน </span>
					</a>
						
						</li>
						<li class="is-active">
							<a href="dashboard2.blade.php">
						<span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>
						<span> กราฟแสดงข้อมูลแยกตามปัญหา </span>
					</a>
						
						</li>
					</ul>
				</div>

<div class="field is-horizontal">
				<div class="field-label is-normal">
					<label class="label">ช่วงเวลา</label>
				</div>
				<div class="field-body">
					<div class="field is-grouped">
						<p class="control is-expanded  ">
							<span class="select">
							<select id ="problem_case" name="problem_case">
								<option value="0" >โปรดเลือกช่วงเวลา</option>
     							<option value="1" >มกราคม</option>
     							<option value="2" >กุมภาพันธ์</option>
    				 			<option value="3" >มีนาคม</option>
     							<option value="4" >เมษายน</option>
								<option value="4" >พฤษภาคม</option>
								<option value="4" >มิถุนายน</option>
								<option value="4" >กรกฎาคม</option>
								<option value="4" >สิงหาคม</option>
								<option value="4" >กันยายน</option>
								<option value="4" >ตุลาคม</option>
								<option value="4" >พฤศจิกายน</option>
								<option value="4" >ธันวาคม</option>
								<option value="4" >ไตรมาส 1</option>
								<option value="4" >ไตรมาส 2</option>
								<option value="4" >ไตรมาส 3</option>
								<option value="5" >ไตรมาส 4</option>
							</select>

        					</span>
							

							</p>

						</div>
					</div>
				</div>


				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label"> สถานะ </label>
					</div>
					<div class="field-body">
						<div class="field is-grouped">
							<p class="control is-expanded  ">
								<span class="select">
							<select id ="sub_problem" name="sub_problem" disabled="true">
                			</select>
							</span>
							

							</p>
						</div>

					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label"> จังหวัด </label>
					</div>
					<div class="field-body">
						<div class="field is-grouped">
							<p class="control is-expanded  ">
								<span class="select">
							<span class="select">
							<select id ="group_code" name="group_code" disabled="true">
                			</select>
						</p>
					</div>
				</div>
			</div>
			
			




				

				<div class="field has-addons">
					<p class="control">
						<a id="update-chart12" class="button is-success is-outlined">
							<span>จำนวน</span>
						</a>
					</p>
					<p class="control">
						<a id="update-chart11" class="button is-success is-outlined">
							<span>เปอร์เซ็นต์</span>
						</a>
					</p>
				</div>
				<div id="chart-container-b1">FusionCharts XT will load here!</div>
			</div>

			<br>


		</div>
		</div>

	</section>



	<?
		include "../resources/views/footer.php";
	?>
</body>

</html>