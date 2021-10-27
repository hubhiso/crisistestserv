<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

    <meta http-equiv=”content-type” content=”text/html; charset=UTF-8″ />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv=”content-language” content=”th” />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name=”description” content=”ปกป้อง ระบบผู้ช่วยออนไลน์ที่บริการรับเรื่องร้องเรียนและคุ้มครองการละเมิดสิทธิ” />
    <meta name=”keywords” content=”ปกป้อง,ปกป้อง thai” />

    <meta name="theme-color" content="#d45c9c" />

    <link rel="shortcut icon" href="../public/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">

    <link media="all" type="text/css" rel="stylesheet"
        href="../public/bootstrap-datepicker/css/bootstrap-datepicker.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="report.css" rel="stylesheet">

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

    <title> ปกป้อง (CRS) </title>

    <?php
		
		require("phpsql_dbinfo.php");

		$conn = mysqli_connect($hostname, $username, $password, $database);
		if (mysqli_connect_errno()) 
		{ 
			echo "Database connection failed."; 
		}
		// Change character set to utf8
		mysqli_set_charset($conn,"utf8");

		$pr = $_POST["pr"];
	    $date_start = $_POST["date_start"];
	    $date_end = $_POST["date_end"];

	    $se1 = $_POST["problem_case"];
	    $se2 = $_POST["sub_problem"];
	    $se3 = $_POST["group_code"];
	   //echo $se1,' ',$se2," ",$se3," ";
	
	   if($date_end==''){
		$date_end = date("m/d/Y");
	   }
	
	   if($pr != 0){
			$pr_q = " and c.prov_id= '".$pr."' ";
		}

		$sql1 = "SELECT r.code,r.name,c.status,count(c.id) as n_status 
		FROM r_status r left join case_inputs  c 
		on r.code = c.status
		where created_at >= '".date("Y/m/d", strtotime($date_start))."' and created_at <= '".date("Y/m/d", strtotime($date_end))."'
		$pr_q
		group by r.code";
		
		$result1 = mysqli_query($conn, $sql1); 
		$i = 0;
		while($row1 = $result1->fetch_assoc()) {
			$i++;
				$status[$i] = $row1["code"];
				$name[$i] = $row1["name"];
				$n_status[$i] = $row1["n_status"];
				$sum =  $sum+$n_status[$i];
		}
	?>

</head>

<body class="bg-light">

    <nav class="navbar navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../public/images/favicon.ico" alt="" height="30">
                <span class="text-secondary">ปกป้อง (CRS)</span>
            </a>
        </div>
    </nav>

    <div class="container-fluid p-4">

        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="../public/"><span class="icon is-small">
                            <i class="fas fa-home" aria-hidden="true"></i>
                        </span>หน้าหลัก</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="../public/officer"><span class="icon is-small">
                            <i class="fas fa-lock" aria-hidden="true"></i>
                        </span>ส่วนเจ้าหน้าที่</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>&nbsp;รายงาน
                </li>
            </ol>
        </nav>

        <div class="text-center ">

        <div class="btn-group flex-wrap">
                <a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex "
                    href="dashboard3_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="fas fa-chart-bar" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right ">
                        <h6>Dashboard</h6>
                        <span>สรุปสถานการณ์</span>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="mapcrisis_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-map" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right ">
                        <h6>พิกัดการ</h6>
                        <span>ละเมิดสิทธิ์</span>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="table.blade.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>สรุปข้อมูล</h6>
                        <span>ภาพรวม</span>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border" href="report_c1_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>สรุปกรณี</h6>
                        <span>ละเมิดสิทธิ์</span>
                    </div>
                </a>


                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="report_c2_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>ตารางสรุป</h6>
                        <span>การละเมิดสิทธิ์</span>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="report_performance_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>ระยะเวลา</h6>
                        <span>ดำเนินการ</span>
                    </div>
                </a>

            </div>

        </div>

        <br>

        <div class="text-center ">

            <div class="btn-group flex-wrap">
                <a class="btn btn-white  btn-rounded border" href="dashboard3_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์การละเมิดสิทธิ์</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard5_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายปี</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard6_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายเดือน</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard7_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สถานการณ์รายจังหวัด</span>
                </a>
                <a class="btn btn-primary btn-white btn-rounded border" href="dashboard1_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ข้อมูลแยกตามขั้นตอน</span>
                </a>
                <a class="btn btn-white  btn-rounded border" href="dashboard2_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ข้อมูลแยกตามปัญหา</span>
                </a>
            </div>

        </div>

        <br>
        <div class="container p-3">

            <form name="form_menu" method="post" action="dashboard1_new.php">


                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label class="col-form-label">ปัญหาที่พบ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <div class="col-auto">
                        <select id="problem_case" name="problem_case" class="form-select">
                            <option value="0">โปรดเลือกประเภทปัญหาของท่าน</option>
                            <option value="1">บังคับตรวจเอชไอวี</option>
                            <option value="2" <?php if($se1 == '2' ){echo "selected";} ?>>เปิดเผยสถานะการติดเชื้อเอชไอวี
                            </option>
                            <option value="3">ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</option>
                            <option value="4">ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง</option>
                            <option value="5">อื่นๆ ที่เกี่ยวข้องกับ HIV</option>
                            <option value="6">อื่นๆ </option>

                        </select>
                    </div>
                </div>

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label class="col-form-label"> ประเภทกลุ่ม &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    </div>
                    <div class="col-auto">
                        <select id="sub_problem" name="sub_problem" class="form-select" disabled="true">
                        </select>
                    </div>
                </div>

                <div class="row g-3 align-items-center mb-3">

                    <div class="col-auto">
                        <label class="col-form-label"> ประเภทกลุ่มย่อย &nbsp;</label>
                    </div>
                    <div class="col-auto">
                        <select id="group_code" name="group_code" class="form-select" disabled="true">
                        </select>
                    </div>
                </div>

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <strong class="col-form-label">จังหวัด</strong>
                    </div>
                    <div class="col-auto">
                        <div class="select">
                            <select class="form-select" id="pr" name="pr">
                                <?php
                                if ($pr == '0') { $pr_v = "selected";}
                                echo "<option value='0' $pr_v> ทุกจังหวัด </option>";
                                $pr_v = '';
                                $sql_p = "SELECT *
                                FROM prov_geo";
                                $result_p = mysqli_query($conn, $sql_p); 
                                $i = 0;
                                while($rowp = $result_p->fetch_assoc()) {
                                    $i++;
                                    $pcode[$i] = $rowp["code"];
                                    $pname[$i] = $rowp["name"];
                                    $loop_p = $i;
                                    if ($pr == $pcode[$i]) { $pr_v = "selected";} 
                                    echo "<option value='$pcode[$i]' $pr_v> $pname[$i] </option>";
                                    $pr_v = '';
                                }
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-auto">
                        <strong> เลือกวันที่ </strong>

                    </div>

                    <div class="col-auto input-daterange">
                        <input type="text" class="form-control" id="date_start" name="date_start"
                            value='<?php echo $date_start; ?>'>
                    </div>

                    <div class="col-auto">
                        ถึง
                    </div>

                    <div class="col-auto input-daterange">
                        <input type="text" class="form-control" id="date_end" name="date_end"
                            value='<?php echo $date_end; ?>'>
                    </div>

                    <div class="col-auto ">
                        <input type="submit" class="btn bgcolor1" id="submit" name="submit" value="ตกลง">

                    </div>

                </div>

                <br>

                <p class="subtitle ">
                    <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>

                    <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
                </p>

            </form>


            <br>

            <div class="row text-right p-2">
            &nbsp;&nbsp;
                
                <div class="col-auto">
                    <a id="update-chart12" class="btn btn-outline-danger ">
                        <span>จำนวน</span>
                    </a>
                </div>
                <div class="col-auto">
                    <a id="update-chart11" class="btn btn-outline-danger ">
                        <span>เปอร์เซ็นต์</span>
                    </a>
                </div>
            </div>


            <div name="chart" class="">
                <div id="chart-container-b1" class="bg-white  text-center p-2 chart-rounded">
                    FusionCharts XT will load here!
                </div>

            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-light text-muted">

        <!-- Copyright -->
        <div class="text-center p-5" style="background-color: #dddddd;">
            Crisis Response System (CRS)
            <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
        </div>
        <!-- Copyright -->
    </footer>

    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="../public/NewFusionChart/js/fusioncharts.js"></script>
    <script type="text/javascript" src="../public/NewFusionChart/js/themes/fusioncharts.theme.hulk-light.js"></script>

    <script>
    $('.input-daterange input').each(function() {

        $(this).datepicker('');
        //$('#date_end').datepicker("setDate", new Date());
    }).on('changeDate', function(e) {
        //load_case()
    });

    $('#problem_case').on('change', function(e) {
        var prob_id = e.target.value;
        //console.log(prob_id);
        $('#group_code').empty();
        $('#group_code').attr('disabled', 'disabled');
        if ((prob_id == 1) || (prob_id == 5)|| (prob_id == 6)) {
            $('#sub_problem').empty();
            $('#sub_problem').removeAttr('disabled');
            $('#sub_problem').append(
                '<option value="1" <?php if($se2 == '1' ){echo "selected";} ?> style="width:250px">ผู้ติดเชื้อเอชไอวี</option>'
            );
            $('#sub_problem').append(
                '<option value="2" <?php if($se2 == '2' ){echo "selected";} ?> style="width:250px">กลุ่มเปราะบาง</option>'
            );
            $('#sub_problem').append(
                '<option value="4" style="width:250px">ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
            $('#sub_problem').append('<option value="3" style="width:250px">ประชาชนทั่วไป</option>');
        } else if (prob_id == 2) {
            $('#sub_problem').empty();
            $('#sub_problem').removeAttr('disabled');
            $('#sub_problem').append(
                '<option value="1" <?php if($se2 == '1' ){echo "selected";} ?>>ผู้ติดเชื้อเอชไอวี</option>');
        } else if (prob_id == 3) {
            $('#sub_problem').empty();
            $('#sub_problem').removeAttr('disabled');
            $('#sub_problem').append('<option value="1" >ผู้ติดเชื้อเอชไอวี</option>');
            $('#sub_problem').append('<option value="4" >ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</option>');
        } else if (prob_id == 4) {
            $('#sub_problem').empty();
            $('#sub_problem').removeAttr('disabled');
            $('#sub_problem').append('<option value="2" style="width:250px">กลุ่มเปราะบาง</option>');
            $('#group_code').empty();
            $('#group_code').removeAttr('disabled');
            $('#group_code').append('<option value="1" style="width:250px">กลุ่มหลากหลายทางเพศ</option>');
            $('#group_code').append('<option value="2" style="width:250px">พนักงานบริการ </option>');
            $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด</option>');
            $('#group_code').append('<option value="4" style="width:250px">ประชากรข้ามชาติ</option>');
            $('#group_code').append('<option value="5" style="width:250px">ผู้ถูกคุมขัง</option>');
            $('#group_code').append('<option value="6" style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');
            $('#group_code').append('<option value="7" style="width:250px">ผู้พิการ</option>');



        } else {
            $('#sub_problem').empty();
            $('#sub_problem').attr('disabled', 'disabled');
        }
    });
    $('#sub_problem').on('change', function(e) {
        var sub_id = e.target.value;
        if (sub_id == 2) {
            $('#group_code').empty();
            $('#group_code').removeAttr('disabled');
            $('#group_code').append(
                '<option value="1" <?php if($se3 == '1' ){echo "selected";} ?> style="width:250px">กลุ่มหลากหลายทางเพศ</option>'
            );
            $('#group_code').append(
                '<option value="2" <?php if($se3 == '2' ){echo "selected";} ?>style="width:250px">พนักงานบริการ</option>'
            );
            $('#group_code').append('<option value="3" style="width:250px">ผู้ใช้สารเสพติด</option>');
            $('#group_code').append('<option value="4" style="width:250px">ประชากรข้ามชาติ</option>');
            $('#group_code').append('<option value="5" style="width:250px">ผู้ถูกคุมขัง</option>');
            $('#group_code').append('<option value="6" style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');
            $('#group_code').append('<option value="7" style="width:250px">ผู้พิการ</option>');



        } else {
            $('#group_code').empty();
            $('#group_code').attr('disabled', 'disabled');
        }
    });
    </script>

    <script type="text/javascript">
    /*  Tab 2 Chart */

    FusionCharts.ready(function() {

        var updateBtn11 = document.getElementById('update-chart11');
        var updateBtn12 = document.getElementById('update-chart12');

        updateBtn11.addEventListener('click', function(e) {
            this.disabled = true;
            updateBtn12.disabled = false;
            salesChart.setJSONData({
                "chart": {
                    "caption": "ข้อมูลแยกตามขั้นตอน",
                    "subCaption": "",
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
                    "palettecolors": "#de0867",
                    "exportEnabled": "1"
                },

                "data": [
                    <?php
						for($i=1;$i<=6;$i++){
							echo '{';
							echo '"label": "'.$name[$i].'",';
							echo '"value": "'.$n_status[$i]*100/$sum.'",';
							echo '}';
							if($i<>6){
								echo ",";
							}
						}
					?>
                ]
            });
        });


        updateBtn12.addEventListener('click', function(e) {
            this.disabled = true;
            updateBtn11.disabled = false;
            salesChart.setJSONData({
                "chart": {
                    "caption": "ข้อมูลแยกตามขั้นตอน",
                    "subCaption": "",
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
                    "palettecolors": "#de0867",
                    "exportEnabled": "1"

                },

                "data": [<?php
						for($i=1;$i<=6;$i++){
							echo '{';
							echo '"label": "'.$name[$i].'",';
							echo '"value": "'.$n_status[$i].'",';
							echo '}';
							if($i<>6){
								echo ",";
							}
						}
					?>]
            });
        });

        var salesChart = new FusionCharts({
                type: 'column2d',
                renderAt: 'chart-container-b1',
                width: '100%',
                height: '400',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "ข้อมูลแยกตามขั้นตอน",
                        "subCaption": "",
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
                        "palettecolors": "#de0867",
                        "exportEnabled": "1"

                    },

                    "data": [<?php
						for($i=1;$i<=6;$i++){
							echo '{';
							echo '"label": "'.$name[$i].'",';
							echo '"value": "'.$n_status[$i].'",';
							echo '}';
							if($i<>6){
								echo ",";
							}
						}
					?>]
                },
                events: {
                    "dataUpdated": function(evtObj, argObj) {
                        var header = document.getElementById('header');
                        header.style.display = 'block';

                        var tempDiv = document.createElement('div');
                        var attrsTable = document.getElementById('attrs-table');
                        var titleDiv, valueDiv;
                        for (var prop in argObj) {
                            titleDiv = document.createElement('div');
                            titleDiv.className = 'title';
                            titleDiv.innerHTML = prop;

                            valueDiv = document.createElement('div');
                            valueDiv.className = 'value';
                            valueDiv.innerHTML = argObj[prop];
                            console.log(argObj[prop]);

                            tempDiv.appendChild(titleDiv);
                            tempDiv.appendChild(valueDiv);
                        }
                        attrsTable.innerHTML = '';
                        attrsTable.appendChild(tempDiv);
                    }
                }
            })
            .render();
    });
    </script>

</body>

</html>