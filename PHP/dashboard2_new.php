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
		
	   require("phpsqli_dbinfo.php");
		

        $pr = $_POST["pr"];
        $nhso = $_POST["nhso"];

        if($nhso != 0){

            if($pr != 0){
                $pr_q = " and nhso = $nhso and c.prov_id= '".$pr."' ";
            }else{
                $pr_q = " and nhso = $nhso ";
            }
        }else{
            if($pr != 0){
                $pr_q = " and c.prov_id= '".$pr."' ";
            }
        }

	   $date_start = $_POST["date_start"];
	   $date_end = $_POST["date_end"];
	
	   $se_time = $_POST["se_time"];
       $se_year = $_POST["se_year"];
       $se_quarter = $_POST["se_quarter"];
       $se_month = $_POST["se_month"];

       $year_now =  date("Y");

        if(date("m")>9){
            $year_now++;
        }

        if($years == ''){$years = $year_now;}
       
       if($se_year == ''){
           $se_year = $year_now;
       }

       if($se_time == ''){
           $se_time = 1;

           $date_start = "10/1/".($se_year-1);
           $date_end = "9/30/".$se_year;
       }

       if($se_time== 1){

           if($se_quarter== 0){
               $date_start = "10/1/".($se_year-1);
               $date_end = "9/30/".$se_year;
           }else if($se_quarter== 1){
               $date_start = "10/1/".($se_year-1);
               $date_end = "12/31/".($se_year-1);
           }else if($se_quarter== 2){
               $date_start = "1/1/".$se_year;
               $date_end = "3/31/".$se_year;
           }else if($se_quarter== 3){
               $date_start = "4/1/".$se_year;
               $date_end = "6/30/".$se_year;
           }else if($se_quarter== 4){
               $date_start = "7/1/".$se_year;
               $date_end = "9/30/".$se_year;
           }else if($se_quarter== 12){
               $date_start = "10/1/".($se_year-1);
               $date_end = "3/31/".$se_year;
           }else if($se_quarter== 13){
               $date_start = "10/1/".($se_year-1);
               $date_end = "6/30/".$se_year;
           }else if($se_quarter== 99){
               if($se_month== 10){
                   $date_start = "10/1/".($se_year-1);
                   $date_end = "10/31/".($se_year-1);
               }else if($se_month== 11){
                   $date_start = "11/1/".($se_year-1);
                   $date_end = "11/30/".($se_year-1);
               }else if($se_month== 12){
                   $date_start = "12/1/".($se_year-1);
                   $date_end = "12/31/".($se_year-1);
               }else if($se_month== 1){
                   $date_start = "1/1/".$se_year;
                   $date_end = "1/31/".$se_year;
               }else if($se_month== 2){
                   $date_start = "2/1/".$se_year;
                   $date_end = strtotime("3/31/".$se_year)-1;
               }else if($se_month== 3){
                   $date_start = "3/1/".$se_year;
                   $date_end = "3/31/".$se_year;
               }else if($se_month== 4){
                   $date_start = "4/1/".$se_year;
                   $date_end = "4/30/".$se_year;
               }else if($se_month== 5){
                   $date_start = "5/1/".$se_year;
                   $date_end = "5/31/".$se_year;
               }else if($se_month== 6){
                   $date_start = "6/1/".$se_year;
                   $date_end = "6/30/".$se_year;
               }else if($se_month== 7){
                   $date_start = "7/1/".$se_year;
                   $date_end = "7/31/".$se_year;
               }else if($se_month== 8){
                   $date_start = "8/1/".$se_year;
                   $date_end = "8/31/".$se_year;
               }else if($se_month== 9){
                   $date_start = "9/1/".$se_year;
                   $date_end = "9/30/".$se_year;
               }
           }

       }else if($se_time== 2){

           $date_start = $_POST["date_start"];
           $date_end = $_POST["date_end"];
           
           if($date_end==''){
               $date_end = date("m/d/Y");
           }

       }
	
        $p_case = $_POST["pcase"];

        if($p_case > '0'){
            $sub_q = " and  status = '".$p_case."' ";
        }
		   

		$sql1 = "SELECT 
		sum(CASE WHEN problem_case = '1' THEN 1 ELSE 0 END) as case1,
		sum(CASE WHEN problem_case = '2' THEN 1 ELSE 0 END) as case2,
		sum(CASE WHEN problem_case = '3' THEN 1 ELSE 0 END) as case3,
		sum(CASE WHEN problem_case = '4' THEN 1 ELSE 0 END) as case4,
		sum(CASE WHEN problem_case = '5' THEN 1 ELSE 0 END) as case5,
		count(problem_case) as sum
		FROM case_inputs c left join prov_geo on prov_geo.code = c.prov_id where 
		created_at >= '".date("Y/m/d", strtotime($date_start))."' and created_at <= '".date("Y/m/d", strtotime($date_end))."'
		$sub_q $pr_q
		";

		$result1 = mysqli_query($conn, $sql1); 
		$i = 0;
		while($row1 = $result1->fetch_assoc()) {
				$i++;
				$case1 = $row1["case1"];
				$case2 = $row1["case2"];
				$case3 = $row1["case3"];
				$case4 = $row1["case4"];
				$case5 = $row1["case5"];
				$sum = $row1["sum"];
		}

        $sql = "SELECT * from prov_geo order by name";
        $result1 = mysqli_query($conn, $sql); 
        
        $i = 0;

        while($row = $result1->fetch_assoc()) {
            $i++;

            $pr_name[$i] = $row["name"];
            $pr_code[$i] = $row["code"];
            $nhso_code[$i] = $row["nhso"];
            
            $prloop = $i;
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
                    <div class="text text-right ">
                        <h6><i class="fas fa-chart-bar fs-4 " aria-hidden="true"></i> Dashboard สรุปสถานการณ์</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="automated.php">
                    <div class="text text-right ">
                        <h6><i class="far fa-file-alt fs-4 " aria-hidden="true"></i> รายงานการละเมิดสิทธิ</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="mapcrisis_new.php">
                    <div class="text text-right ">
                        <h6><i class="far fa-map fs-4 " aria-hidden="true"></i> พิกัดจุดเกิดเหตุ</h6>
                    </div>
                </a>

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="table.blade.php">
                    <div class="text text-right">
                        <h6><i class="fa fa-table fs-4 " aria-hidden="true"></i> สรุปข้อมูลภาพรวม</h6>
                    </div>
                </a>

            </div>
        </div>

        <br>

        <div class="text-center ">

            <div class="btn-group flex-wrap">
                <a class="btn btn-white btn-rounded border" href="dashboard3_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ภาพรวม</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard5_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ช่วงเวลา (รายปี/รายเดือน)</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard7_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>รายพื้นที่ (เขต/จังหวัด)</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard1_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>จำแนกสถานะการดำเนินงาน</span>
                </a>
                <a class="btn btn-primary btn-white btn-rounded border" href="dashboard2_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>จำแนกปัญหา</span>
                </a>

            </div>

        </div>

        <br>
        <div class="container p-3">

            <form name="form_menu" method="post" action="dashboard2_new.php">


                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label class="col-form-label"><strong> สถานะ </strong> </label>
                    </div>
                    <div class="col-auto">
                        <select id="p_case" name="pcase" class="form-select">
                            <option value="0" <?php if ($p_case == "0") { echo "selected";} ?>> ทั้งหมด </option>
                            <option value="1" <?php if ($p_case == "1") { echo "selected";} ?>> ยังไม่ได้รับเรื่อง
                            </option>
                            <option value="2" <?php if ($p_case == "2") { echo "selected";} ?>> รับเรื่องแล้ว </option>
                            <option value="3" <?php if ($p_case == "3") { echo "selected";} ?>>
                                บันทึกข้อมูลเพิ่มเติมแล้ว </option>
                            <option value="4" <?php if ($p_case == "4") { echo "selected";} ?>> อยู่ระหว่างดำเนินการ
                            </option>
                            <option value="5" <?php if ($p_case == "5") { echo "selected";} ?>> ดำเนินการเสร็จสิ้น
                            </option>
                            <option value="6" <?php if ($p_case == "6") { echo "selected";} ?>>
                                ดำเนินการเสร็จสิ้นแล้วส่งต่อ </option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col-auto">
                        <label class="col-form-label tx1">เลือกเขต</label>
                    </div>

                    <div class="col-auto ">
                        <div class="">
                            <div class="input-group">
                                <select name="nhso" id="nhso" class="form-select rounded"
                                    onchange="setprov(nhso.value);">
                                    <option value="0" <?php if ($nhso == "0"){ echo "selected";} ?>> ทุกเขต </option>
                                    <option value="1" <?php if ($nhso == "1"){ echo "selected";} ?>>
                                        เขต 1
                                    </option>
                                    <option value="2" <?php if ($nhso == "2"){ echo "selected";} ?>>
                                        เขต 2
                                    </option>
                                    <option value="3" <?php if ($nhso == "3"){ echo "selected";} ?>>
                                        เขต 3
                                    </option>
                                    <option value="4" <?php if ($nhso == "4"){ echo "selected";} ?>>
                                        เขต 4
                                    </option>
                                    <option value="5" <?php if ($nhso == "5"){ echo "selected";} ?>>
                                        เขต 5
                                    </option>
                                    <option value="6" <?php if ($nhso == "6"){ echo "selected";} ?>>
                                        เขต 6
                                    </option>
                                    <option value="7" <?php if ($nhso == "7"){ echo "selected";} ?>>
                                        เขต 7
                                    </option>
                                    <option value="8" <?php if ($nhso == "8"){ echo "selected";} ?>>
                                        เขต 8
                                    </option>
                                    <option value="9" <?php if ($nhso == "9"){ echo "selected";} ?>>
                                        เขต 9
                                    </option>
                                    <option value="10" <?php if ($nhso == "10"){ echo "selected";} ?>>
                                        เขต 10
                                    </option>
                                    <option value="11" <?php if ($nhso == "11"){ echo "selected";} ?>>
                                        เขต 11
                                    </option>
                                    <option value="12" <?php if ($nhso == "12"){ echo "selected";} ?>>
                                        เขต 12
                                    </option>
                                    <option value="13" <?php if ($nhso == "13"){ echo "selected";} ?>>
                                        เขต 13
                                    </option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <label class="col-form-label tx1">จังหวัด</label>
                    </div>


                    <div class="col-auto">
                        <div class="">
                            <div class="input-group">
                                <select name="pr" id="pr" class="form-select rounded">

                                    <option value='0' <?php if ($pr == '0') { echo "selected";} ?>> ทุกจังหวัด </option>

                                    <?php
                                        for($i = 1; $i <= $prloop; $i++){
                                    ?>
                                    <option value='<?php echo $pr_code[$i]; ?>'
                                        <?php if ($pr == $pr_code[$i]) { echo "selected";} ?>>
                                        <?php echo $pr_name[$i]; ?> </option>

                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row g-3 align-items-center">

                    <div class="col-auto">
                        <label class="col-form-label">ช่วงเวลา</label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select form-control" id="se_time" name="se_time">
                            <option value='1' <?php if($se_time == 1){ echo "selected"; } ?>> ตามตัวเลือก </option>
                            <option value='2' <?php if($se_time == 2){ echo "selected"; } ?>> ระบุวันที่ </option>
                        </select>
                    </div>

                    <div class="col-auto se_time_g1">
                        <label class="col-form-label">ปีงบประมาณ</label>
                    </div>
                    <div class="col-auto se_time_g1">
                        <select class="form-select form-control" id="se_year" name="se_year">
                        <?php
                                for($y = 2019; $y <= $year_now; $y++){
                                    if ($se_year == $y) { $se =  "selected";}
                                    echo "<option value='$y' $se> ".($y+543)." </option>";
                                    $se = '';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-auto se_time_g1">
                        <select class="form-select form-control" id="se_quarter" name="se_quarter">
                            <option value='0'  <?php if($se_quarter == 0){ echo "selected"; } ?>> ทั้งปีงบประมาณ </option>
                            <option value='1' <?php if($se_quarter == 1){ echo "selected"; } ?>> ไตรมาส 1 </option>
                            <option value='2' <?php if($se_quarter == 2){ echo "selected"; } ?>> ไตรมาส 2 </option>
                            <option value='3' <?php if($se_quarter == 3){ echo "selected"; } ?>> ไตรมาส 3 </option>
                            <option value='4' <?php if($se_quarter == 4){ echo "selected"; } ?>> ไตรมาส 4 </option>
                            <option value='12' <?php if($se_quarter == 12){ echo "selected"; } ?>> สะสมไตรมาส 1-2 </option>
                            <option value='13' <?php if($se_quarter == 13){ echo "selected"; } ?>> สะสมไตรมาส 1-3 </option>
                            <option value='99' <?php if($se_quarter == 99){ echo "selected"; } ?>> เลือกเดือน </option>
                        </select>
                    </div>
                    <div class="col-auto se_time_g11">
                        <select class="form-select form-control" id="se_month" name="se_month">
                            <option value='1' <?php if($se_month == 1){ echo "selected"; } ?>> มกราคม </option>
                            <option value='2' <?php if($se_month == 2){ echo "selected"; } ?>> กุมภาพันธ์ </option>
                            <option value='3' <?php if($se_month == 3){ echo "selected"; } ?>> มีนาคม </option>
                            <option value='4' <?php if($se_month == 4){ echo "selected"; } ?>> เมษายน </option>
                            <option value='5' <?php if($se_month == 5){ echo "selected"; } ?>> พฤษภาคม </option>
                            <option value='6' <?php if($se_month == 6){ echo "selected"; } ?>> มิถุนายน </option>
                            <option value='7' <?php if($se_month == 7){ echo "selected"; } ?>> กรกฎาคม </option>
                            <option value='8' <?php if($se_month == 8){ echo "selected"; } ?>> สิงหาคม </option>
                            <option value='9' <?php if($se_month == 9){ echo "selected"; } ?>> กันยายน </option>
                            <option value='10' <?php if($se_month == 10){ echo "selected"; } ?>> ตุลาคม </option>
                            <option value='11' <?php if($se_month == 11){ echo "selected"; } ?>> พฤศจิกายน </option>
                            <option value='12' <?php if($se_month == 12){ echo "selected"; } ?>> ธันวาคม </option>
                        </select>
                    </div>

                    <div class="col-auto se_time_g2">
                        <strong> วันที่ </strong>

                    </div>

                    <div class="col-auto se_time_g2 input-daterange">
                        <input type="text" class="form-control" id="date_start" name="date_start"
                            value='<?php echo $date_start; ?>'>
                    </div>

                    <div class="col-auto se_time_g2">
                        ถึง
                    </div>

                    <div class="col-auto se_time_g2 input-daterange">
                        <input type="text" class="form-control" id="date_end" name="date_end"
                            value='<?php echo $date_end; ?>'>
                    </div>

                    <div class="col-auto ">
                        <input type="submit" class="btn bgcolor1" id="submit" name="submit" value="ตกลง">

                    </div>

                    <br>

                    <p class="subtitle ">
                        <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>

                        <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
                    </p>


                </div>

            </form>


            <br>

            <div class="row text-right p-2">
                &nbsp;&nbsp;

                <div class="col-auto">
                    <a id="update-chart12" class="btn btn-outline-primary ">
                        <span>จำนวน</span>
                    </a>
                </div>
                <div class="col-auto">
                    <a id="update-chart11" class="btn btn-outline-primary ">
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
    $(document).ready(function() {

        var set_nhso = $('#nhso').val();

        setprov(set_nhso);  

        $('.se_time_g11').hide();
        $('.se_time_g2').hide();

        <?php 
        if($se_time == 1){
            echo "$('.se_time_g1').show();";
            echo "$('.se_time_g11').hide();";
            echo "$('.se_time_g2').hide();";
            if($se_quarter == 99){
                echo "$('.se_time_g11').show();";
            }
        }else if($se_time == 2){
            echo "$('.se_time_g1').hide();";
            echo "$('.se_time_g11').hide();";
            echo "$('.se_time_g2').show();";
        }else{
            echo "$('.se_time_g1').show();";
            echo "$('.se_time_g11').hide();";
            echo "$('.se_time_g2').hide();";
        }
        ?>
    });

    $('#se_quarter').on('change', function(e) {

        var se_quarter = $('#se_quarter').val();

        if (se_quarter == '99') {
            $('.se_time_g11').show();
        } else {
            $('.se_time_g11').hide();
        }
    });

    $('#se_time').on('change', function(e) {

        if ($('#se_time').val() == '1') {
            $('.se_time_g1').show();
            $('.se_time_g2').hide();
            $('.se_time_g11').hide();
        } else {
            $('.se_time_g1').hide();
            $('.se_time_g2').show();
            $('.se_time_g11').hide();
        }
    });
    </script>
    
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
        if ((prob_id == 1) || (prob_id == 5)) {
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
            $('#group_code').append('<option value="7" style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');


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
            $('#group_code').append('<option value="7" style="width:250px">กลุ่มชาติพันธุ์และชนเผ่า</option>');


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
                    "caption": "กราฟแสดงข้อมูลแยกตามปัญหา",
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

                "data": [{
                    "label": "บังคับตรวจเอชไอวี",
                    "value": "<?php echo $case1*100/$sum; ?>"
                }, {
                    "label": "เปิดเผยสถานะ<br>ฃการติดเชื้อเอชไอวี",
                    "value": "<?php echo $case2*100/$sum; ?>"
                }, {
                    "label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี",
                    "value": "<?php echo $case3*100/$sum; ?>"
                }, {
                    "label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง",
                    "value": "<?php echo $case4*100/$sum; ?>"
                }, {
                    "label": "กรณีที่อื่นๆ<br>ที่เกี่ยวข้องกับเอชไอวี",
                    "value": "<?php echo $case5*100/$sum; ?>"
                }]
            });
        });


        updateBtn12.addEventListener('click', function(e) {
            this.disabled = true;
            updateBtn11.disabled = false;
            salesChart.setJSONData({
                "chart": {
                    "caption": "ข้อมูลแยกตามปัญหา",
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

                "data": [{
                    "label": "บังคับตรวจเอชไอวี",
                    "value": "<?php echo $case1; ?>"
                }, {
                    "label": "เปิดเผยสถานะ<br>ฃการติดเชื้อเอชไอวี",
                    "value": "<?php echo $case2; ?>"
                }, {
                    "label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี",
                    "value": "<?php echo $case3; ?>"
                }, {
                    "label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง",
                    "value": "<?php echo $case4; ?>"
                }, {
                    "label": "กรณีที่อื่นๆ<br>ที่เกี่ยวข้องกับเอชไอวี",
                    "value": "<?php echo $case5; ?>"
                }]
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
                        "caption": "กราฟแสดงข้อมูลแยกตามปัญหา",
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

                    "data": [{
                        "label": "บังคับตรวจเอชไอวี",
                        "value": "<?php echo $case1; ?>"
                    }, {
                        "label": "เปิดเผยสถานะ<br>ฃการติดเชื้อเอชไอวี",
                        "value": "<?php echo $case2; ?>"
                    }, {
                        "label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี",
                        "value": "<?php echo $case3; ?>"
                    }, {
                        "label": "ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง",
                        "value": "<?php echo $case4; ?>"
                    }, {
                        "label": "กรณีที่อื่นๆ<br>ที่เกี่ยวข้องกับเอชไอวี",
                        "value": "<?php echo $case5; ?>"
                    }]
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

<script>
    function setprov(se) {

        var pr_code = <?php echo json_encode($pr_code); ?>;
        var pr_name = <?php echo json_encode($pr_name); ?>;
        var nhso_code = <?php echo json_encode($nhso_code); ?>;

        if (se == 0) {
            //alert("test"); 

            //$('#prov11').prop('disabled', 'disabled');
            //$('#prov11').val(0);

            $("#pr").empty();
            $("#pr").append($("<option></option>").attr("value", '0').text('ทุกจังหวัด'));

            for (let i = 1; i <= <?php echo $prloop; ?>; i++) {

                $("#pr").append($("<option></option>").attr("value", pr_code[i]).text(pr_name[i]));

                if ('<?php echo $pr; ?>' == pr_code[i]) {
                    $("#pr option[value='" + pr_code[i] + "']").attr("selected", "selected");
                }

            }

        } else {


            $("#pr").empty();
            $("#pr").append($("<option></option>").attr("value", '0').text("ทุกจังหวัด"));

            for (let i = 1; i <= <?php echo $prloop; ?>; i++) {

                if (nhso_code[i] == se) {
                    $("#pr").append($("<option></option>")
                        .attr("value", pr_code[i]).text(pr_name[i]));
                }

                if ('<?php echo $pr; ?>' == pr_code[i]) {

                    $("#pr option[value='" + pr_code[i] + "']").attr("selected", "selected");
                }
            }

        }
    }
    </script>

</body>

</html>