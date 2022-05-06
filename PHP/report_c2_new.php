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

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.css" />


    <link media="all" type="text/css" rel="stylesheet"
        href="../public/bootstrap-datepicker/css/bootstrap-datepicker.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="report.css" rel="stylesheet">


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
	
	$date_start = $_POST["date_start"];
	$date_end = $_POST["date_end"];

    $ck_group = $_POST["group"];

    if ( $ck_group <> ''){
        $query_group = "and o.group = '".$ck_group."' ";
    }else{
        $query_group = " or o.name = 'adminfar' or o.name = 'adminhatc' ";
    }
    
 
	if($date_end==''){
	 $date_end = date("m/d/Y");
	}

    $sql = "select * from officer_groups";
    $result = mysqli_query($conn, $sql); 
    $i = 0;
    while($row1 = $result->fetch_assoc()) {
        $i++;
        $g_code[$i] = $row1[code];
        $g_name[$i] = $row1[groupname];
        $loop_group = $i;

    }

	?>
</head>

<body class="bg-light">

    <nav class="navbar navbar-light bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="../public/">
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
                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
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
                    href="automated.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right ">
                        <h6>รายงาน</h6>
                        <span>การละเมิดสิทธิ</span>
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
                        <span>ละเมิดสิทธิ</span>
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

                <a type="button" class="btn btn-white btn-rounded   align-items-stretch d-flex border"
                    href="report_c1_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>สรุปกรณี</h6>
                        <span>ละเมิดสิทธิ</span>
                    </div>
                </a>


                <a type="button" class="btn btn-primary btn-rounded align-items-stretch d-flex "
                    href="report_c2_new.php">
                    <div class=" icon-left d-flex align-items-center justify-content-center h4">
                        <i class="far fa-file-alt" aria-hidden="true"></i>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <div class="text text-right">
                        <h6>ตารางสรุป</h6>
                        <span>การละเมิดสิทธิ</span>
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
                <a class="btn btn-white btn-rounded border " href="mapreport1.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>แผนที่</span>
                </a>
                <a class="btn btn-primary btn-rounded  " href="report_c2_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>รวมทุกกรณี</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c21_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>กรณี 1 บังคับตรวจเอชไอวี</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c22_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>กรณี 3 เลือกปฎิบัติในกลุ่มผู้ติดเชื้อ</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="report_c23_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>กรณี 4 เลือกปฎิบัติในกลุ่มเปราะบาง</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard8_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>ข้อมูลกลุ่มเปราะบางรายเดือน</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard4_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สัดส่วนกลุ่มเปราะบาง</span>
                </a>
                <a class="btn btn-white btn-rounded border" href="dashboard9_new.php">
                    <span class="icon is-small"><i class="far fa-chart-bar" aria-hidden="true"></i></span>
                    <span>สัดส่วนกลุ่มเปราะบางเทียบประชากรข้ามชาติ</span>
                </a>
            </div>

        </div>


        <div class=" p-4">
            <div class="text-center p-3">
                <p class="h5">สรุปข้อมูลการร้องเรียนในระบบ CRS ข้อมูลในระบบ</p>
            </div>

            <form name="form_menu" method="post" action="report_c2_new.php">

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label class="col-form-label"><strong> กลุ่ม </strong> </label>
                    </div>
                    <div class="col-auto">
                        <select class="form-select form-control" id="group" name="group">
                            <option value=''>ทั้งหมด</option>
                            <?php
                                    for($i = 1; $i <= $loop_group ; $i++){
                                        if ($ck_group == $g_code[$i]) { $se_g = "selected";}
                                        echo "<option value='$g_code[$i]' $se_g > $g_name[$i] </option>";
                                        $se_g = "";
                                    }
                                ?>
                        </select>
                    </div>
                </div>

                <div class="row g-3 align-items-center">

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

        </div>

        <table id='crisisc1' width="100%"
            class=" dt-responsive nowrap table table-responsive table-bordered table-striped table-hover">
            <thead class="bgcolor1">
                <tr class="hideextra  ">
                    <th class="" style="vertical-align: middle; color: white;" rowspan="2">ลำดับ</th>
                    <th class="" style="vertical-align: middle; color: white;" rowspan="2">ชื่อ</th>
                    <th class="" style="vertical-align: middle; color: white;" rowspan="2">จังหวัด</th>
                    <th class=" " style="vertical-align: middle; color: white;" rowspan="2">เขต</th>

                    <th class=" text-center" style="vertical-align: middle; color: white;" colspan="6">กรณีร้องเรียน 
                    </th>

                    <th class="" style="vertical-align: middle; color: white;" rowspan="2">ทั้งหมด</th>
                </tr>
                <tr>
                    <th class="" style="vertical-align: middle; color: white;">1. บังคับตรวจเอชไอวี</th>
                    <th class="" style="vertical-align: middle; color: white;">
                        2. เปิดเผยสถานะ<br>การติดเชื้อเอชไอวี </th>
                    <th class="" style="vertical-align: middle; color: white;">
                        3. ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี</th>
                    <th class="" style="vertical-align: middle; color: white;">
                        4. ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง</th>
                    <th class="" style="vertical-align: middle; color: white;">
                        5. กรณีที่อื่นๆ<br>ที่เกี่ยวข้องกับเอชไอวี</th>
                    <th class="" style="vertical-align: middle; color: white;">
                        6. กรณีที่อื่นๆ<br>ที่ไม่เกี่ยวข้องกับเอชไอวี</th>

                </tr>
            </thead>
            <?php
                    

					$sql1 = "SELECT o.id, o.name, o.nameorg, o.prov_id, p.name as provname, nhso
					FROM officers o left join prov_geo p
					on p.code = o.prov_id 
					where
					position = 'officer' $query_group
					order by prov_id";

					$result1 = mysqli_query($conn, $sql1); 
					$row1 = mysqli_num_rows($result1); 
					$i = '0';
                    
					while($row1 = $result1->fetch_assoc()) {


						$sql2 = "SELECT receiver,
						sum(CASE WHEN problem_case = '1' THEN 1 ELSE 0 END) as case1,
						sum(CASE WHEN problem_case = '2' THEN 1 ELSE 0 END) as case2,
						sum(CASE WHEN problem_case = '3' THEN 1 ELSE 0 END) as case3,
						sum(CASE WHEN problem_case = '4' THEN 1 ELSE 0 END) as case4,
						sum(CASE WHEN problem_case = '5' THEN 1 ELSE 0 END) as case5,
                        sum(CASE WHEN problem_case = '6' THEN 1 ELSE 0 END) as case6,
						count(problem_case) as sum
						FROM case_inputs
						where receiver='".$row1['name']."'
						and created_at >= '".date("Y/m/d", strtotime($date_start))."' and created_at <= '".date("Y/m/d", strtotime($date_end))."'
						group by receiver";

						$result2 = mysqli_query($conn, $sql2); 
						$row2 = mysqli_num_rows($result2); 
						$i++;
						if ($result2->num_rows > 0) {
							
							// output data of each row
							while($row2 = $result2->fetch_assoc()) {

								$c_s1 = $c_s1 + $row2["case1"];
                                $c_s2 = $c_s2 + $row2["case2"];
                                $c_s3 = $c_s3 + $row2["case3"];
                                $c_s4 = $c_s4 + $row2["case4"];
                                $c_s5 = $c_s5 + $row2["case5"];
                                $c_s6 = $c_s6 + $row2["case6"];
                                $c_as = $c_as + $row2["sum"];
								
								//echo $row['receiver'];
								$sql3 = "SELECT username,officers.nameorg, prov_geo.code, prov_geo.name as provname, prov_geo.nhso 
								FROM officers left join prov_geo 
								on officers.prov_id = prov_geo.code
								WHERE officers.name = '".$row2['receiver']."'";
								//echo $sql2;
								$result3 = mysqli_query($conn, $sql3); 

								$row3 = mysqli_num_rows($result3);
								$row3 = $result3->fetch_assoc();

								//echo $row2["prov_id"];
								
								echo "<tr>";
								echo "<th >".$i."</th>";
                                echo "<td>".$row1["nameorg"]."</td>";
                                echo "<td>".$row3["provname"]."</td>";
                                echo "<td>".$row3["nhso"]."</td>";
                                echo "<td>".$row2["case1"]."</td>";
                                echo "<td>".$row2["case2"]."</td>";
                                echo "<td>".$row2["case3"]."</td>";
                                echo "<td>".$row2["case4"]."</td>";
                                echo "<td>".$row2["case5"]."</td>";
                                echo "<td>".$row2["case6"]."</td>";
                                echo "<td>".$row2["sum"]."</td>";
								echo "</tr>";
														
							}
						} else {
							echo "<tr>";
								echo "<th >".$i."</th>";
								echo "<td>".$row1["nameorg"]."</td>";
								echo "<td>".$row1["provname"]."</td>";
								echo "<td>".$row1["nhso"]."</td>";
								echo "<td>0</td>";
								echo "<td>0</td>";
								echo "<td>0</td>";
								echo "<td>0</td>";
								echo "<td>0</td>";
                                echo "<td>0</td>";
                                echo "<td>0</td>";
								echo "</tr>";
						}
					}

							echo "<tr>";
							echo "<td colspan='4' style='vertical-align: center; color: white; background: #de0867' >รวม</td>";
							echo "<td style='display: none;'></td>";
							echo "<td style='display: none;'></td>";
							echo "<td style='display: none;'></td>";
							echo "<td>".$c_s1."</td>";
							echo "<td>".$c_s2."</td>";
							echo "<td>".$c_s3."</td>";
							echo "<td>".$c_s4."</td>";
                            echo "<td>".$c_s5."</td>";
                            echo "<td>".$c_s6."</td>";
                            echo "<td>".$c_as."</td>";
							echo "</tr>";
							echo "</tbody>";
							echo "</table>";

						$conn->close();


					?>
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

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/b-2.0.1/b-html5-2.0.1/b-print-2.0.1/datatables.min.js">
    </script>

    <script>
    $('.input-daterange input').each(function() {

        $(this).datepicker('');
        //$('#date_end').datepicker("setDate", new Date());
    }).on('changeDate', function(e) {
        //load_case()
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#crisisc1').DataTable({
            "bFilter": true,
            "dom": 'Bfrtip',
            "scrollX": true,
            "responsive": true,
            "buttons": [
                'excel', 'copy', 'print'
            ],
            "paging": false,
            "ordering": true
        });
    });
    </script>


</body>

</html>