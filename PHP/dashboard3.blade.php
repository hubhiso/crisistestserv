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

	<?php
		
		require("phpsql_dbinfo.php");

		$conn = mysqli_connect($hostname, $username, $password, $database);
		if (mysqli_connect_errno()) 
		{ 
			echo "Database connection failed."; 
		}
		// Change character set to utf8
		mysqli_set_charset($conn,"utf8");

		
		$sql_of = "SELECT subtype_offender, count(subtype_offender) as suboff FROM add_details group by subtype_offender";
		$result_of = mysqli_query($conn, $sql_of); 
		$i = 0;
		while($rowco = $result_of->fetch_assoc()) {
			$i++;
			
			$no_suboff[$i] = $rowco["subtype_offender"];
			$suboff[$i] = $rowco["suboff"];
			$loop_suboff = $i;
		}
		$suboff_all = $suboff[2]+$suboff[3];
		
		$sql_c1 = "SELECT problem_case, r_problem_case.name,count(problem_case) as case1 
		FROM case_inputs ,r_problem_case
		WHERE r_problem_case.code = case_inputs.problem_case
		group by problem_case";
		$result_c1 = mysqli_query($conn, $sql_c1); 
		$i = 0;
		while($rowc1 = $result_c1->fetch_assoc()) {
			$i++;
			
			$no_c1[$i] = $rowc1["problem_case"];
			$name_c1[$i] = $rowc1["name"];
			$sum_c1[$i] = $rowc1["case1"];
			$loop_c1 = $i;
		}

		$sql_c2 = "SELECT sum(cause_type1) as cause1, sum(cause_type2) as cause2, sum(cause_type3) as cause3, sum(cause_type4) as cause4, sum(etc) as cause5, sum(cause_type1 or cause_type2 or cause_type3 or cause_type4 or etc) as alls
		FROM add_details ";
		$result_c2 = mysqli_query($conn, $sql_c2); 
		$i = 0;
		while($rowc2 = $result_c2->fetch_assoc()) {
			$i++;
			
			$sumcase2_c1 = $rowc2["cause1"];
			$sumcase2_c2 = $rowc2["cause2"];
			$sumcase2_c3 = $rowc2["cause3"];
			$sumcase2_c4 = $rowc2["cause4"];
			$sumcase2_c5 = $rowc2["cause5"];
			$loop_c2 = $i;
		}

		$sql_c3 = "SELECT case_inputs.group_code, r_group_code.name, count(group_code) as c3 
		FROM case_inputs, r_group_code
		WHERE  case_inputs.group_code = r_group_code.code
		group by group_code";
		//echo $sql_c3;
		$result_c3 = mysqli_query($conn, $sql_c3); 
		$i = 0;
		while($rowc3 = $result_c3->fetch_assoc()) {
			$i++;
		
			for($j = 1;$j<=6;$j++){
				if($rowc3["group_code"] == $j){
					$i_c3[$j] = $rowc3["group_code"];
					$namec3[$j] = $rowc3["name"];
					$sumc3[$j] = $rowc3["c3"];
				}
				//echo $i_c3[$j]," ",$sumc3[$j];
			}

			$loop_c3 = $i;
		}

		$sql_c4 = "SELECT sub_problem, r_sub_problem.name,count(problem_case) as c4 
		FROM case_inputs ,r_sub_problem
		WHERE r_sub_problem.code = case_inputs.sub_problem
		group by sub_problem";
		//echo $sql_c4;
		$result_c4 = mysqli_query($conn, $sql_c4); 
		$i = 0;
		while($rowc4 = $result_c4->fetch_assoc()) {
			$i++;
		
			for($j = 1;$j<=6;$j++){
				if($rowc4["sub_problem"] == $j){
					$i_c4[$j] = $rowc4["sub_problem"];
					$namec4[$j] = $rowc4["name"];
					$sumc4[$j] = $rowc4["c4"];
					
				}
				//echo $i_c4[$j]," ",$sumc4[$j];
			}

			$loop_c4 = $i;
		}
	?>

    <script type="text/javascript">
		/*  Chart1 */
		FusionCharts.ready( function () {

			var salesChart = new FusionCharts( {
					type: 'bar2d',
					renderAt: 'chart-container-1',
					width: '100%',
					height: '500',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "จำนวนการละเมิดสิทธิ",
							"subCaption": "จำแนกตามประเภท ปี 2562",
							"placeValuesInside": "0",
                            "yAxisName": "จำนวน",
                            "palettecolors": "#E14455",
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

						"data":[ 

						<?php
							for($i=1;$i<=$loop_c1;$i++){
								echo "{";
								echo "'label': '$name_c1[$i]',";
								echo "'value': '$sum_c1[$i]'";
								echo "}";
								if($i <> $loop_c1){
									echo ",";
								}
							}
						?>
						
						]
					}
				} )
				.render();
        } );

		/*  pie Chart2 */



		FusionCharts.ready( function () {

		var salesChart = new FusionCharts( {
				type: 'doughnut2d',
				renderAt: 'chart-container-2',
				width: '100%',
				height: '500',
				dataFormat: 'json',
				dataSource: {
					"chart": {

						"caption": "สาเหตุการละเมิดสิทธิ",
						"subcaption": "ปี 2562",
						"showpercentvalues": "1",
						"defaultcenterlabel": "2562",
						"aligncaptionwithcanvas": "0",
						"captionpadding": "0",
						"decimals": "1",
						"showlegend": "1",
						"plottooltext": "<b>$percentValue $label</b>",
						"centerlabel": "$value เคส",
						"theme": "hulk-light",
						"palettecolors": "#E14455,#2B1615,#7F7F7F,#CFCFCF,#E87C87",
						"exportEnabled": "1"
					},
					"data":[ {
						"label": "ไม่รู้กฎหมาย",
						<?php echo "'value': '$sumcase2_c1'"; ?>
					}, {
						"label": "ขาดความเข้าใจเรื่องเอดส์",
						<?php echo "'value': '$sumcase2_c2'"; ?>
					}, {
						"label": "ทัศนคติ",
						<?php echo "'value': '$sumcase2_c3'"; ?>
					}, {
						"label": "นโยบายองค์กร",
						<?php echo "'value': '$sumcase2_c4'"; ?>
					}, {
						"label": "อื่นๆ",
						<?php echo "'value': '$sumcase2_c5'"; ?>
					} ]
				}
				
			} )
			.render();
		} );

		/*  pie Chart3 */
		FusionCharts.ready( function () {

		var salesChart = new FusionCharts( {
				type: 'doughnut2d',
				renderAt: 'chart-container-3',
				width: '100%',
				height: '400',
				dataFormat: 'json',
				dataSource: {
					"chart": {
						"caption": "กลุ่มเปราะบางที่ถูกกีดกันหรือถูกเลือกปฎิบัติ",
						"subcaption": "2562",
						"showpercentvalues": "1",
						"defaultcenterlabel": "2562",
						"aligncaptionwithcanvas": "1",
						"captionpadding": "1",
						"showlegend": "1",
						"decimals": "1",
						"plottooltext": "<b>$percentValue $label</b>",
						"centerlabel": "$value เคส",
						"theme": "hulk-light",
						"palettecolors": "#E14455,#2B1615,#7F7F7F,#F2F2F2,#E87C87",
						"exportEnabled": "1"
					},

					"data":[ {
						"label": "<?php echo $namec3[1]; ?>",
						"value": "<?php echo $sumc3[1]; ?>"
					}, {
						"label": "<?php echo $namec3[2]; ?>",
						"value": "<?php echo $sumc3[2]; ?>"
					}, {
						"label": "<?php echo $namec3[3]; ?>",
						"value": "<?php echo $sumc3[3]; ?>"
					}, {
						"label": "<?php echo $namec3[4]; ?>",
						"value": "<?php echo $sumc3[4]; ?>"
					}, {
						"label": "<?php echo $namec3[5]; ?>",
						"value": "<?php echo $sumc3[5]; ?>"
					}, {
						"label": "<?php echo $namec3[6]; ?>",
						"value": "<?php echo $sumc3[6]; ?>"
					} ]
				}
				
			} )
			.render();
		} );
        

		/*  Tab 2 Chart */
		FusionCharts.ready( function () {

			var salesChart = new FusionCharts( {
					type: 'column2d',
					renderAt: 'chart-container-b1',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "ผู้ถูกบังคับตรวจเอชไอวี",
							"subCaption": "จำแนกตามประเภท ปี 2562",
							"placeValuesInside": "0",
							"palettecolors": "#713132",
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
						"label": "<?php echo $namec4[1]; ?>",
						"value": "<?php echo $sumc4[1]; ?>"
					}, {
						"label": "<?php echo $namec4[2]; ?>",
						"value": "<?php echo $sumc4[2]; ?>"
					}, {
						"label": "<?php echo $namec4[3]; ?>",
						"value": "<?php echo $sumc4[3]; ?>"
					}, {
						"label": "<?php echo $namec4[4]; ?>",
						"value": "<?php echo $sumc4[4]; ?>"
					}]
					}
				} )
				.render();
        } );
        
	</script>
	<?php
							$sql1 = "SELECT status,count(id) as n_status FROM case_inputs group by status";
							//echo $sql2;
							$result1 = mysqli_query($conn, $sql1); 
							$i = 0;
							while($row1 = $result1->fetch_assoc()) {
								$i++;
								if($row1["status"] == $i){
									$status[$i] = $row1["status"];
									$n_status[$i] = $row1["n_status"];
								}
							}
						?>

</head>

<body class="layout-default">
	<br>

	<section class="hero is-medium has-text-centered">
		<div class="hero-head">

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
						<li class="is-active">
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
						<li >
							<a href="report_perfomance.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>การให้บริการ</span>
                            </a>
						</li>
					</ul>
				</div>
				
				<div class="tabs is-centered is-toggle is-toggle-rounded">
                    <ul>
                        <li class="is-active">
                        <a href="dashboard3.blade.php">
                            <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                            <span>สถานการณ์การละเมิดสิทธิ</span>
                        </a>
                        </li>
                        <li>
                        <a href="dashboard1.blade.php">
                            <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                            <span>ข้อมูลแยกตามขั้นตอน</span>
                        </a>
                        </li>
                        <li >
                        <a href="dashboard2.blade.php">
                            <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                            <span>ข้อมูลแยกตามปัญหา</span>
                        </a>
                        </li>
                    </ul>
                </div>
			
			<br>

			<div class="columns is-variable is-1-mobile is-0-tablet is-3-desktop is-2-widescreen is-2-fullhd">
				<div class="column">
					<table class="table is-fullwidth  is-bordered">
						<tbody>
							<tr class="is-selected is-danger">
								<td class="is-danger"><p class='has-text-centered '>ยังไม่ได้รับเรื่อง</p></td>
							</tr>
							<tr class=" ">
								<td><p class='has-text-centered'><?php echo $n_status[1];if($status[1] ==''){echo '0';} ?></p></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="column">
					<table class="table is-fullwidth  is-bordered">
						<tbody>
							<tr class="is-selected ">
								<td  class="is-danger"><p class='has-text-centered'>รับเรื่องแล้ว</p></td>
							</tr>
							<tr class=" ">
								<td><p class='has-text-centered'><?php echo $n_status[2];if($status[2] ==''){echo '0';} ?></p></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="column">
				<table class="table is-fullwidth  is-bordered">
						<tbody>
							<tr class="is-selected ">
								<td  class="is-danger"><p class='has-text-centered'>บันทึกข้อมูลเพิ่มแล้ว</p></td>
							</tr>
							<tr class=" ">
								<td><p class='has-text-centered'><?php echo $n_status[3];if($status[3] ==''){echo '0';} ?></p></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="column">
				<table class="table is-fullwidth  is-bordered">
						<tbody>
							<tr class="is-selected ">
								<td  class="is-danger"><p class='has-text-centered'>อยู่ระหว่างดำเนินการ</p></td>
							</tr>
							<tr class=" ">
								<td><p class='has-text-centered'><?php echo $n_status[4];if($status[4] ==''){echo '0';} ?></p></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="column">
				<table class="table is-fullwidth  is-bordered">
						<tbody>
							<tr class="is-selected ">
								<td  class="is-danger"><p class='has-text-centered'>ดำเนินการเสร็จสิ้น</p></td>
							</tr>
							<tr class=" ">
								<td><p class='has-text-centered'><?php echo $n_status[5];if($status[5] ==''){echo '0';} ?></p></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="column">
				<table class="table is-fullwidth  is-bordered">
						<tbody>
							<tr class="is-selected ">
								<td  class="is-danger"><p class='has-text-centered'>ดำเนินการแล้วส่งต่อ</p></td>
							</tr>
							<tr class=" ">
								<td><p class='has-text-centered'><?php echo $n_status[6];if($status[6] ==''){echo '0';} ?></p></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="columns ">
				<div class="column  is-offset-8">
					<table class="table is-fullwidth  is-bordered">
					<tbody>
						<tr >
							<td class="is-danger " rowspan="2" style="vertical-align : middle;text-align:center;"><p class='has-text-centered'>ละเมิดโดย</p></td>
							<td><p class='has-text-centered'>บุคคล</p></td>
							<td><p class='has-text-centered'><?php echo number_format(($suboff[2]/$suboff_all)*100 , 2, '.', '')?> %</p></td>
						</tr>
						<tr >
							
							<td><p class='has-text-centered'>องค์กร</p></td>
							<td><p class='has-text-centered'><?php echo number_format(($suboff[3]/$suboff_all)*100 , 2, '.', '') ?> %</p></td>
						</tr>
					</tbody>
					</table>
				</div>
			</div>
			<br>

            <div class="columns is-gapless">
                <div class="column">
                    <div id="chart-container-1">FusionCharts XT will load here!</div>
                </div>
                <div class="column">
                    <div id="chart-container-2">FusionCharts XT will load here!</div>
                </div>
            </div>
            <div class="columns is-gapless">
                <div class="column">
                    <div id="chart-container-3">FusionCharts XT will load here!</div>
                </div>
                <div class="column">
                    <div id="chart-container-b1">FusionCharts XT will load here!</div>
                </div>
            </div>
 

				
		</div>

		<br>

		</div>
	</section>

	<footer class="footer "style="background-color: #EEE;">
  <div class="container  ">
    <div class="content has-text-centered  ">
      <p>Crisis Response System (CRS)
	  </p>
	  <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>.  </small> </p>
    </div>
  </div>
</footer>
</body>

</html>