<!DOCTYPE html>
<html dir="ltr" lang="en-US">
   <head>
      <meta charset="UTF-8" />
      <title>Crisis Response System (CRS)</title>
      <link rel="shortcut icon" href="favicon.ico" />
      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" media="all" href="daterangepicker.css" />
      <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="moment.js"></script>
      <script type="text/javascript" src="daterangepicker.js"></script>
      <link rel="stylesheet" type="text/css" href="css_table.css">
    
      
      <?
      // $class = $_POST["class1"];
	   $class = "1";
	   $date1 = $_POST["date1"];
	   $status = $_POST["status"];
	   $region = $_POST["region"];
	   $province = $_POST["province"];
	   $gender = $_POST["gender"];
	   $age = $_POST["age"];
	   $occ = $_POST["occ"];
	   $office = $_POST["office"];
	   
	   if ($gender != "00"){
	   	$fillter .= " and (sex = '$gender')";
	   }
	   
	   if ($office != "00"){
	   	$fillter .= " and (type_offender = '$office')";
	   }
	   
	   $mm_start = substr($date1,0,2);
	   $dd_start = substr($date1,3,2);
	   $yy_start = substr($date1,6,4);
	   
	   
	   //echo $date1;
	   $mm_stop = substr($date1,13,2);
	   $dd_stop = substr($date1,16,2);
	   $yy_stop = substr($date1,19,4);
	   
	   $date_start = $yy_start."-".$mm_start."-".$dd_start;
	   //echo $date_start."<br>";
	   $date_stop = $yy_stop."-".$mm_stop."-".$dd_stop;
	   //echo $date_stop;
	   $fillter .= " and (date(c.created_at) between '$date_start' and '$date_stop')";
	   
	   require("phpsql_dbinfo.php");
      ?>
      <script type="text/javascript">
		function Listselect(SelectValue)

		{
			
			if(SelectValue==1){
			document.form_menu.status.disabled=true; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=false;
			}
			else if ((SelectValue==2) || (SelectValue==3)){
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=true;
			document.form_menu.province.disabled=true; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=false;
			}
			else if (SelectValue==4) {
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=true;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=false;
			}
			else if (SelectValue==5) {
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=true;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=false;
			}
			else if (SelectValue==6) {
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=true;
			document.form_menu.office.disabled=false;
			}
			else if (SelectValue==7) {
			document.form_menu.status.disabled=false; 
			document.form_menu.region.disabled=false;
			document.form_menu.province.disabled=false; 
			document.form_menu.gender.disabled=false;
			document.form_menu.age.disabled=false;
			document.form_menu.occ.disabled=false;
			document.form_menu.office.disabled=true;
			}


			else{
				
				
				/*
				initListGroup('subgroupmenu', document.selectfrm.select4, document.selectfrm.sg,'savestate1');
				initListGroup('groupngo', document.selectfrm.selectngo, document.selectfrm.selectsubngo,'savestatengo');
				*/
				}
		
		} 
        </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <!--link rel="stylesheet" type="text/css" href="DataTables/media/css/jquery.dataTables.css"-->
   </head>
   <!--body style="margin: 20px 0" onload ="Listselect(<? if ($class== ""){ echo "1";}else{ echo $class;}?>)"-->
   <body style="margin: 20px 0">

      <div class="container">

        <h3 style="margin: 0 0 20px 0">รายงาน Crisis Response System (CRS) </h3>

        <!--div class="well configurator">
           
          <form>
          <div class="row">
          
          
          </div>
          </form>

        </div-->
		 <form name="form_menu" method="post">
        <div class="row">
        
        
        <div class="col-md-2 pull-right">
            <h4>เลือกวันที่</h4>
            <div class="form-group">
            	<input type="text" id="date1" name="date1" class="form-control" value="<? if ($date1 != "") echo $date1;?>">
                <? //echo "date1=".$date1;?>
            	<!--i class="glyphicon glyphicon-calendar fa fa-calendar"></i-->
            </div>
          <!--/div-->
          
          

          <!--div class="col-md-4"-->
            <h4>จำแนกตาม</h4>
				<div class="form-group">
                <select id="class1" name="class1" onchange = "Listselect(this.value);" class="form-control" disabled>
                  <option value=1 <? if ($class == "1") { echo "selected";} ?>>สถานะ</option>
                  <option value=2 <? if ($class == "2") { echo "selected";} ?>>ภาค</option>
                  <option value=3 <? if ($class == "3") { echo "selected";} ?>>จังหวัด</option>
                  <option value=4 <? if ($class == "4") { echo "selected";} ?>>เพศ</option>
                  <option value=5 <? if ($class == "5") { echo "selected";} ?>>อายุ</option>
                  <option value=6 <? if ($class == "6") { echo "selected";} ?>>อาชีพ</option>
                  <option value=7 <? if ($class == "7") { echo "selected";} ?>>หน่วยงานผู้ละเมิด</option>
                  
                </select>
              </div>
         <!--/div-->
           
              
          <!--div class="col-sm-3"-->  
          	<h4>ตัวกรอง</h4> 
              <div class="form-group">
                <select id="status" name="status" class="form-control" disabled>
                  <option value="0" <? if ($status == "00") { echo "selected";} ?>>สถานะ</option>
                  <option value="1" <? if ($status == "1") { echo "selected";} ?>>ยังไม่ได้รับเรื่อง</option>
                  <option value="2" <? if ($status == "2") { echo "selected";} ?>>รับเรื่องแล้ว</option>
                  <option value="3" <? if ($status == "3") { echo "selected";} ?>>บันทึกข้อมูลเพิ่มเติมแล้ว</option>
                  <option value="4" <? if ($status == "4") { echo "selected";} ?>>อยู่ระหว่างดำเนินการ</option>
                  <option value="5" <? if ($status == "5") { echo "selected";} ?>>ดำเนินการเสร็จสิ้น</option>
                  <option value="6" <? if ($status == "6") { echo "selected";} ?>>ดำเนินการแล้วส่งต่อ</option>
                 
                  
                </select>
              </div>
              
               <div class="form-group">
                <select id="region" name="region" class="form-control" disabled>
                  <option value="0" <? if ($region == "00") { echo "selected";} ?>>ภาค</option>
                  <option value="1" <? if ($region == "1") { echo "selected";} ?>>กลาง</option>
                  <option value="2" <? if ($region == "2") { echo "selected";} ?>>ตะวันออกเฉียงเหนือ</option>
                  <option value="3" <? if ($region == "3") { echo "selected";} ?>>เหนือ</option>
                  <option value="4" <? if ($region == "4") { echo "selected";} ?>>ใต้</option>
                  <option value="5" <? if ($region == "5") { echo "selected";} ?>>กรุงเทพมหานคร</option>
                </select>
              </div>
              
                <div class="form-group">
                <select id="province" name="province" class="form-control" disabled>				  
                  <option value="00" <? if ($province == "00") { echo "selected";} ?>>จังหวัด</option>
                  <option value="10" <? if ($province == "10") { echo "selected";} ?>>กรุงเทพมหานคร</option>
                  <option value="20" <? if ($province == "20") { echo "selected";} ?>>ชลบุรี</option>
                  <option value="50" <? if ($province == "50") { echo "selected";} ?>>เชียงใหม่</option>
                  <option value="63" <? if ($province == "63") { echo "selected";} ?>>ตาก</option>
                  <option value="21" <? if ($province == "21") { echo "selected";} ?>>ระยอง</option>       
                  <option value="90" <? if ($province == "90") { echo "selected";} ?>>สงขลา</option>                  
                </select>
          		</div>
                
                <div class="form-group">
                <select id="gender" name="gender" class="form-control">				  
                  <option value="00" <? if ($gender == "00") { echo "selected";} ?>>เพศ</option>
                  <option value="1" <? if ($gender == "1") { echo "selected";} ?>>ชาย</option>
                  <option value="2" <? if ($gender == "2") { echo "selected";} ?>>หญิง</option>       
                  <option value="3" <? if ($gender == "3") { echo "selected";} ?>>สาวประเภทสอง</option>     
                  <option value="4" <? if ($gender == "4") { echo "selected";} ?>>อื่น ๆ</option>                
                </select>
          		</div>
                
                <div class="form-group">
                <select id="age" name="age" class="form-control" disabled>				  
                  <option value="00" <? if ($age == "00") { echo "selected";} ?>>อายุ</option>
                  <option value="01" <? if ($age == "01") { echo "selected";} ?>>0-4</option>
                  <option value="02" <? if ($age == "02") { echo "selected";} ?>>5-14</option>
                  <option value="03" <? if ($age == "03") { echo "selected";} ?>>15-19</option>    
                  <option value="04" <? if ($age == "04") { echo "selected";} ?>>20-24</option> 
                  <option value="05" <? if ($age == "05") { echo "selected";} ?>>25-34</option>  
                  <option value="06" <? if ($age == "06") { echo "selected";} ?>>35-44</option>
                  <option value="07" <? if ($age == "07") { echo "selected";} ?>>45-59</option>   
                  <option value="08" <? if ($age == "08") { echo "selected";} ?>>60 ขึ้นไป</option>                          
                </select>
          		</div>


				<div class="form-group">
                <select id="occ" name="occ" class="form-control" disabled>				  
                  <option value="00" <? if ($occ == "00") { echo "selected";} ?>>อาชีพ</option>
                  <option value="01" <? if ($occ == "01") { echo "selected";} ?>>ทำงานในหน่วยงานราชการ</option>
                  <option value="02" <? if ($occ == "02") { echo "selected";} ?>>ทำงานในบริษัทเอกชน</option>
                  <option value="03" <? if ($occ == "03") { echo "selected";} ?>>ทำงานในองค์กรพัฒนาเอกชน (NGO) </option>    
                  <option value="04" <? if ($occ == "04") { echo "selected";} ?>>ธุรกิจส่วนตัว</option> 
                  <option value="05" <? if ($occ == "05") { echo "selected";} ?>>รับจ้างทั่วไป</option>  
                  <option value="06" <? if ($occ == "06") { echo "selected";} ?>>เกษตรกร</option>
                  <option value="07" <? if ($occ == "07") { echo "selected";} ?>>นักเรียน/นักศึกษา</option>   
                  <option value="08" <? if ($occ == "08") { echo "selected";} ?>>ว่างงาน</option>  
                  <option value="09" <? if ($occ == "09") { echo "selected";} ?>>อื่นๆ</option>                          
                </select>
          		</div>
                
               
                <div class="form-group">
                <select id="office" name="office" class="form-control">				  
                  <option value="00" <? if ($office == "00") { echo "selected";} ?>>หน่วยงานผู้ละเมิด</option>
                  <option value="01" <? if ($office == "01") { echo "selected";} ?>>สถานพยาบาล</option>
                  <option value="02" <? if ($office == "02") { echo "selected";} ?>>สถานที่ทำงาน</option>
                  <option value="03" <? if ($office == "03") { echo "selected";} ?>>สถานศึกษา</option>    
                  <option value="04" <? if ($office == "04") { echo "selected";} ?>>หน่วยงานที่บังคับใช้กฎหมาย</option>  
                  <option value="06" <? if ($office == "06") { echo "selected";} ?>>องค์กรปกครองส่วนท้องถิ่น</option>
                  <option value="07" <? if ($office == "07") { echo "selected";} ?>>หน่วยงานอื่นๆ</option>                           
                </select>
          		</div>
                <input type="submit"  name = "submit" class="btn-success" value="ตกลง">

        	</div>
        
        
        
        <?
         if ($class == "1"){	  
	  		/*
			$th ="<th>ยังไม่ได้รับเรื่อง</th>
				<th>รับเรื่องแล้ว</th>
				<th>บันทึกข้อมูลเพิ่มเติมแล้ว</th>
				<th>อยู่ระหว่างดำเนินการ</th>
				<th>ดำเนินการเสร็จสิ้น</th>
				<th>ดำเนินการแล้วส่งต่อ</th>";   
				*/;
			$th ="<td>ยังไม่ได้รับเรื่อง</td>
				<td>รับเรื่องแล้ว</td>
				<td>บันทึกข้อมูลเพิ่มเติมแล้ว</td>
				<td>อยู่ระหว่างดำเนินการ</td>
				<td>ดำเนินการเสร็จสิ้น</td>
				<td>ดำเนินการแล้วส่งต่อ</td>";   
				       
				
			$td ="<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>";   
			
			$dt_target = "1,2,3,4,5,6";
	}
		
		
		?>
        
        <?
        if (isset($_POST["submit"])){
		
		    $strSQLstatus[] = "";
			
			$strSQLstatus[] = "";
			$strSQLstatus[] = " and sub_problem = '1'";
			$strSQLstatus[] = " and sub_problem = '2'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '1'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '2'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '3'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '4'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '5'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '7'";
			$strSQLstatus[] = " and sub_problem = '4'";
			$strSQLstatus[] = " and sub_problem = '3'";
			
			
			
			for($i = 1;$i < 12 ;$i++){
				
					for ($j=1;$j<7;$j++){
						$td_val[$i][$j] = "0";
						$code_val[$i][$j] = "0";
					}
			
			}
			
			
			for($i = 1;$i < 12 ;$i++){
			
				$strSQL = "SELECT count(c.case_id) as total,r.code,r.name";
				$strSQL.=" From  r_status r left join case_inputs c on r.code = c.status";
				if ($office != ""){
					$strSQL.=" left join add_details a on c.case_id = a.case_id ";
				}
				$strSQL.=" where problem_case = '1'".$strSQLstatus[$i]." ".$fillter;
				$strSQL.=" GROUP BY status order by r.code asc;";
				
				//echo $strSQL."<br>";
				
				$result = mysql_query($strSQL) or die(mysql_error());
				while($row = mysql_fetch_array($result))
				
				{
					
											if (($row["code"]) == "1"){
											
												$td_val[$i][1] = $row["total"];
												$code_val[$i][1] = $row["code"];
												$name_val[$i][1] = $row["name"];
											}else if (($row["code"]) == "2"){
											
												$td_val[$i][2] = $row["total"];
												$code_val[$i][2] = $row["code"];
												$name_val[$i][2] = $row["name"];
											}else if (($row["code"]) == "3"){
											
												$td_val[$i][3] = $row["total"];
												$code_val[$i][3] = $row["code"];
												$name_val[$i][3] = $row["name"];
											}else if (($row["code"]) == "4"){
											
												$td_val[$i][4] = $row["total"];
												$code_val[$i][4] = $row["code"];
												$name_val[$i][4] = $row["name"];
											}else if (($row["code"]) == "5"){
											
												$td_val[$i][5] = $row["total"];
												$code_val[$i][5] = $row["code"];
												$name_val[$i][5] = $row["name"];
											}else if (($row["code"]) == "6"){
											
												$td_val[$i][6] = $row["total"];
												$code_val[$i][6] = $row["code"];
												$name_val[$i][6] = $row["name"];
											}
											
				}
				
		
			}
			
				for($i = 1;$i < 12 ;$i++){
				
					for ($j=1;$j<7;$j++){
						$td1 .= "<td align='center'>".$td_val[$i][$j]."</td>"; 
						
					}
					$td1 .= "'newline".$i."'";
				}

	
     //echo $td1."<br>";
     $n1 = strpos($td1,"'newline1'");
     $n2 = strpos($td1,"'newline2'");
     $n3 = strpos($td1,"'newline3'");
     $n4 = strpos($td1,"'newline4'");
     $n5 = strpos($td1,"'newline5'");
     $n6 = strpos($td1,"'newline6'");
     $n7 = strpos($td1,"'newline7'");
     $n8 = strpos($td1,"'newline8'");
     $n9 = strpos($td1,"'newline9'");
     $n10 = strpos($td1,"'newline10'");
     $n11 = strpos($td1,"'newline11'");
	 
	 //echo "break";
   
    /*
      echo $n1;
      echo $n2;
      echo $n3;
      echo $n4;
      echo $n5;
      echo $n6;
      echo $n7;
      echo $n8;
      echo $n9;
      echo $n10;
      echo $n11;
		*/

      $td1_head = substr($td1,0,$n1);
      //echo $td1_head."<br>";

      $td1_1 = substr($td1,$n1+10,$n2-$n1-10);
      //echo $td1_1."<br>";

      $td1_2 = substr($td1,$n2+10,$n3-$n2-10);
      //echo $td1_2."<br>";

      $td1_2_1 = substr($td1,$n3+10,$n4-$n3-10);
      //echo $td1_2_1."<br>";

      $td1_2_2 = substr($td1,$n4+10,$n5-$n4-10);
      //echo $td1_2_2."<br>";

      $td1_2_3 = substr($td1,$n5+10,$n6-$n5-10);
      //echo $td1_2_3."<br>";

      $td1_2_4 = substr($td1,$n6+10,$n7-$n6-10);
      //echo $td1_2_4."<br>";

      $td1_2_5 = substr($td1,$n7+10,$n8-$n7-10);
      //echo $td1_2_5."<br>";

      $td1_2_7 = substr($td1,$n8+10,$n9-$n8-10);
      //echo $td1_2_7."<br>";

      $td1_4 = substr($td1,$n9+10,$n10-$n9-11);
      //echo $td1_4."<br>";

      $td1_3 = substr($td1,$n10+11,$n11-$n10-11);
      //echo $td1_3."<br>";
	  


      //2,3
      //echo "2,3<br>";
      unset($strSQLstatus);
      unset($td_val);
      unset($code_val);
      unset($name_val);
      $td1 = "";
	  
	  
	  for($i = 1;$i < 5 ;$i++){
				
					for ($j=1;$j<7;$j++){
						$td_val[$i][$j] = "0";
						$code_val[$i][$j] = "0";
					}
			
	 }
			
      
      $strSQLstatus[] = "";
			$strSQLstatus[] = " problem_case = '2'  ";
			$strSQLstatus[] = " problem_case = '3'  ";
			$strSQLstatus[] = " problem_case = '3'  and sub_problem = '1'";
			$strSQLstatus[] = " problem_case = '3'  and sub_problem = '4'";
			
			for($i = 1;$i < 5 ;$i++){
			
				$strSQL = "SELECT count(c.case_id) as total,r.code,r.name";
				$strSQL.=" From  r_status r left join case_inputs c on r.code = c.status";
				if ($office != ""){
					$strSQL.=" left join add_details a on c.case_id = a.case_id ";
				}
				$strSQL.=" where ".$strSQLstatus[$i]." ".$fillter;
				$strSQL.=" GROUP BY status order by r.code asc;";
				
				//echo $strSQL."<br>";
				
				$result = mysql_query($strSQL) or die(mysql_error());
				while($row = mysql_fetch_array($result))
				{
											if (($row["code"]) == "1"){
											
												$td_val[$i][1] = $row["total"];
												$code_val[$i][1] = $row["code"];
												$name_val[$i][1] = $row["name"];
											}else if (($row["code"]) == "2"){
											
												$td_val[$i][2] = $row["total"];
												$code_val[$i][2] = $row["code"];
												$name_val[$i][2] = $row["name"];
											}else if (($row["code"]) == "3"){
											
												$td_val[$i][3] = $row["total"];
												$code_val[$i][3] = $row["code"];
												$name_val[$i][3] = $row["name"];
											}else if (($row["code"]) == "4"){
											
												$td_val[$i][4] = $row["total"];
												$code_val[$i][4] = $row["code"];
												$name_val[$i][4] = $row["name"];
											}else if (($row["code"]) == "5"){
											
												$td_val[$i][5] = $row["total"];
												$code_val[$i][5] = $row["code"];
												$name_val[$i][5] = $row["name"];
											}else if (($row["code"]) == "6"){
											
												$td_val[$i][6] = $row["total"];
												$code_val[$i][6] = $row["code"];
												$name_val[$i][6] = $row["name"];
											}
				}
				
		
			}
			
			
		for($i = 1;$i < 5 ;$i++){
				
					for ($j=1;$j<7;$j++){
						 $td1 .= "<td align='center'>".$td_val[$i][$j]."</td>"; 
						
					}
					$td1 .= "'newline".$i."'";
				}	
			
     //echo $td1."<br>";
     $n1 = strpos($td1,"'newline1'")."<br>";
     $n2 = strpos($td1,"'newline2'")."<br>";
     $n3 = strpos($td1,"'newline3'")."<br>";
     $n4 = strpos($td1,"'newline4'")."<br>";
     

      $td2_head = substr($td1,0,$n1);
     // echo $td2_head."<br>";

      $td3_head = substr($td1,$n1+10,$n2-$n1-10);
      //echo $td3_head."<br>";

      $td3_1 = substr($td1,$n2+10,$n3-$n2-10);
      //echo $td3_1."<br>";

      $td3_2 = substr($td1,$n3+10,$n4-$n3-10);
      //echo $td3_2."<br>";

      

      //4

      //echo "4<br>";
      unset($strSQLstatus);
      unset($td_val);
      unset($code_val);
      unset($name_val);
      $td1 = "";

		for($i = 1;$i < 8 ;$i++){
				
					for ($j=1;$j<7;$j++){
						$td_val[$i][$j] = "0";
						$code_val[$i][$j] = "0";
					}
			
			}
			
			
			$strSQLstatus[] = "";
			$strSQLstatus[] = " problem_case = '4'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '1'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '2'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '3'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '4'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '5'";
      $strSQLstatus[] = " problem_case = '4' and sub_problem = '2' and group_code = '7'";
		
			
			for($i = 1;$i < 8 ;$i++){
			
				$strSQL = "SELECT count(c.case_id) as total,r.code,r.name";
				$strSQL.=" From  r_status r left join case_inputs c on r.code = c.status";
				if ($office != ""){
					$strSQL.=" left join add_details a on c.case_id = a.case_id ";
				}
				$strSQL.=" where ".$strSQLstatus[$i]." ".$fillter;
				$strSQL.=" GROUP BY status order by r.code asc;";
				
				//echo $strSQL."<br>";
				
				$result = mysql_query($strSQL) or die(mysql_error());
				while($row = mysql_fetch_array($result))
				{
											if (($row["code"]) == "1"){
											
												$td_val[$i][1] = $row["total"];
												$code_val[$i][1] = $row["code"];
												$name_val[$i][1] = $row["name"];
											}else if (($row["code"]) == "2"){
											
												$td_val[$i][2] = $row["total"];
												$code_val[$i][2] = $row["code"];
												$name_val[$i][2] = $row["name"];
											}else if (($row["code"]) == "3"){
											
												$td_val[$i][3] = $row["total"];
												$code_val[$i][3] = $row["code"];
												$name_val[$i][3] = $row["name"];
											}else if (($row["code"]) == "4"){
											
												$td_val[$i][4] = $row["total"];
												$code_val[$i][4] = $row["code"];
												$name_val[$i][4] = $row["name"];
											}else if (($row["code"]) == "5"){
											
												$td_val[$i][5] = $row["total"];
												$code_val[$i][5] = $row["code"];
												$name_val[$i][5] = $row["name"];
											}else if (($row["code"]) == "6"){
											
												$td_val[$i][6] = $row["total"];
												$code_val[$i][6] = $row["code"];
												$name_val[$i][6] = $row["name"];
											}


				}
				
		
			}
			
			
			
			
             for($i = 1;$i < 8 ;$i++){
				
					for ($j=1;$j<7;$j++){
						 $td1 .= "<td align='center'>".$td_val[$i][$j]."</td>"; 
						
					}
					$td1 .= "'newline".$i."'";
			}

    //echo $td1."<br>";
     $n1 = strpos($td1,"'newline1'")."<br>";
     $n2 = strpos($td1,"'newline2'")."<br>";
     $n3 = strpos($td1,"'newline3'")."<br>";
     $n4 = strpos($td1,"'newline4'")."<br>";
     $n5 = strpos($td1,"'newline5'")."<br>";
     $n6 = strpos($td1,"'newline6'")."<br>";
     $n7 = strpos($td1,"'newline7'")."<br>";
     $n8 = strpos($td1,"'newline8'")."<br>";
     



      $td4_head = substr($td1,0,$n1);
      //echo $td4_head."<br>";

      $td4_1 = substr($td1,$n1+10,$n2-$n1-10);
      //echo $td4_1."<br>";

      $td4_2 = substr($td1,$n2+10,$n3-$n2-10);
      //echo $td4_2."<br>";

      $td4_3 = substr($td1,$n3+10,$n4-$n3-10);
      //echo $td4_3."<br>";

      $td4_4 = substr($td1,$n4+10,$n5-$n4-10);
     // echo $td4_4."<br>";

      $td4_5 = substr($td1,$n5+10,$n6-$n5-10);
      //echo $td4_5."<br>";

      $td4_6 = substr($td1,$n6+10,$n7-$n6-10);
      //echo $td4_6."<br>";

      $td4_7 = substr($td1,$n7+10,$n8-$n7-10);
      //echo $td4_7."<br>";

 


      //5
      //echo "5<br>";
      unset($strSQLstatus);
      unset($td_val);
      unset($code_val);
      unset($name_val);
      $td1 = "";
	  
	  for($i = 1;$i < 12 ;$i++){
				
					for ($j=1;$j<7;$j++){
						$td_val[$i][$j] = "0";
						$code_val[$i][$j] = "0";
					}
			
	  }

      
      $strSQLstatus[] = "";

			$strSQLstatus[] = "";
			$strSQLstatus[] = " and sub_problem = '1'";
			$strSQLstatus[] = " and sub_problem = '2'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '1'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '2'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '3'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '4'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '5'";
			$strSQLstatus[] = " and sub_problem = '2' and group_code = '7'";
			$strSQLstatus[] = " and sub_problem = '4'";
			$strSQLstatus[] = " and sub_problem = '3'";
			
			for($i = 1;$i < 12 ;$i++){
			
				
        $strSQL = "SELECT count(c.case_id) as total,r.code,r.name";
				$strSQL.=" From  r_status r left join case_inputs c on r.code = c.status";
				if ($office != ""){
					$strSQL.=" left join add_details a on c.case_id = a.case_id ";
				}
				$strSQL.=" where problem_case = '5'".$strSQLstatus[$i]." ".$fillter;
				$strSQL.=" GROUP BY status order by r.code asc;";
				
				//echo $strSQL."<br>";
				
				$result = mysql_query($strSQL) or die(mysql_error());
				while($row = mysql_fetch_array($result))
				{
											if (($row["code"]) == "1"){
											
												$td_val[$i][1] = $row["total"];
												$code_val[$i][1] = $row["code"];
												$name_val[$i][1] = $row["name"];
											}else if (($row["code"]) == "2"){
											
												$td_val[$i][2] = $row["total"];
												$code_val[$i][2] = $row["code"];
												$name_val[$i][2] = $row["name"];
											}else if (($row["code"]) == "3"){
											
												$td_val[$i][3] = $row["total"];
												$code_val[$i][3] = $row["code"];
												$name_val[$i][3] = $row["name"];
											}else if (($row["code"]) == "4"){
											
												$td_val[$i][4] = $row["total"];
												$code_val[$i][4] = $row["code"];
												$name_val[$i][4] = $row["name"];
											}else if (($row["code"]) == "5"){
											
												$td_val[$i][5] = $row["total"];
												$code_val[$i][5] = $row["code"];
												$name_val[$i][5] = $row["name"];
											}else if (($row["code"]) == "6"){
											
												$td_val[$i][6] = $row["total"];
												$code_val[$i][6] = $row["code"];
												$name_val[$i][6] = $row["name"];
											}

				}
				
		
			}
			
			
		for($i = 1;$i < 12 ;$i++){
				
					for ($j=1;$j<7;$j++){
						 $td1 .= "<td align='center'>".$td_val[$i][$j]."</td>"; 
						
					}
					$td1 .= "'newline".$i."'";
				}
					
				
     //echo $td1."<br>";
     $n1 = strpos($td1,"'newline1'")."<br>";
     $n2 = strpos($td1,"'newline2'")."<br>";
     $n3 = strpos($td1,"'newline3'")."<br>";
     $n4 = strpos($td1,"'newline4'")."<br>";
     $n5 = strpos($td1,"'newline5'")."<br>";
     $n6 = strpos($td1,"'newline6'")."<br>";
     $n7 = strpos($td1,"'newline7'")."<br>";
     $n8 = strpos($td1,"'newline8'")."<br>";
     $n9 = strpos($td1,"'newline9'")."<br>";
     $n10 = strpos($td1,"'newline10'")."<br>";
     $n11 = strpos($td1,"'newline11'")."<br>";


      $td5_head = substr($td1,0,$n1);
      //echo $td5_head."<br>";

      $td5_1 = substr($td1,$n1+10,$n2-$n1-10);
      //echo $td5_1."<br>";

      $td5_2 = substr($td1,$n2+10,$n3-$n2-10);
      //echo $td5_2."<br>";

      $td5_2_1 = substr($td1,$n3+10,$n4-$n3-10);
      //echo $td5_2_1."<br>";

      $td5_2_2 = substr($td1,$n4+10,$n5-$n4-10);
      //echo $td5_2_2."<br>";

      $td5_2_3 = substr($td1,$n5+10,$n6-$n5-10);
      //echo $td5_2_3."<br>";

      $td5_2_4 = substr($td1,$n6+10,$n7-$n6-10);
      //echo $td5_2_4."<br>";

      $td5_2_5 = substr($td1,$n7+10,$n8-$n7-10);
      //echo $td5_2_5."<br>";

      $td5_2_7 = substr($td1,$n8+10,$n9-$n8-10);
      //echo $td5_2_7."<br>";

      $td5_4 = substr($td1,$n9+10,$n10-$n9-11);
      //echo $td5_4."<br>";

      $td5_3 = substr($td1,$n10+11,$n11-$n10-11);
      //echo $td5_3."<br>";

		}
		
		$td1="";
		?>
        
		<div class="col-md-10 pull-left">
        <?
      
	 
	   
	  
	  
	  
	 
	  
	  ?>
      
<?

require("phpsql_dbinfo.php");


$connection=mysql_connect ($hostname, $username, $password);

mysql_query("SET NAMES UTF8",$connection); 

if (!$connection) {
  die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db($database, $connection);

if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

include"class1.php";
		

?>  
<?
 if (isset($_POST["submit"])){
	 
?>	 
      <table id="crisis" class="compact table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>ปัญหา</td>
                <? echo $th;?>
            </tr>
        
		</thead>
        <tfoot>
            <tr>
            	 <td>ปัญหา</td>
                <? echo $th;?>
            </tr>
        </tfoot>
        

        <tbody>
            <tr class="head">
                <td>บังคับตรวจเอชไอวี</td>
                <? echo $td1_head;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ผู้ติดเชื้อเอชไอวี</b></td>
                 <? echo $td1_1;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>กลุ่มเปราะบาง</b></td>
                 <? echo $td1_2;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มหลากหลายทางเพศ</td>
                 <? echo $td1_2_1;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-พนักงานบริการ</td>
                 <? echo $td1_2_2;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ใช้สารเสพติด</td>
                 <? echo $td1_2_3;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ประชากรข้ามชาติ</td>
                 <? echo $td1_2_4;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ถูกคุมขัง</td>
                 <? echo $td1_2_5;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธู์และชนเผ่า</td>
                 <? echo $td1_2_7;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td1_4;?>
            </tr>
            <tr class="subhead_border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประชาชนทั่วไป</td>
                 <? echo $td1_3;?>
            </tr>
            <tr class="head_border">
                <td><b>เปิดเผยสถานะการติดเชื้อเอชไอวี</b> <br>(ผู้ติดเชื้อเอชไอวี)</td>
                 <? echo $td2_head;?>
            </tr>
            <tr class="head">
                <td><b>ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี</b></td>
                 <? echo $td3_head;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td3_1;?>
            </tr>
            <tr class="subhead_border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิตผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td3_2;?>
            </tr>
            <tr class="head">
                <td><b>ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง</b></td>
                 <? echo $td4_head;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มหลากหลายทางเพศ</td>
                 <? echo $td4_1;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-พนักงานบริการ</td>
                 <? echo $td4_2;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ใช้สารเสพติด</td>
                 <? echo $td4_3;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ประชากรข้ามชาติ</td>
                 <? echo $td4_4;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ถูกคุมขัง</td>
                 <? echo $td4_5;?>
            </tr>
            <tr class="border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธุ์และชนเผ่า</td>
                 <? echo $td4_6;?>
            </tr>
             <tr class="head">
                <td><b>อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</b></td>
                 <? echo $td5_head;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td5_1;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กลุ่มเปราะบาง</td>
                 <? echo $td5_2;?>
            </tr>
             <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มหลากหลายทางเพศ</td>
                 <? echo $td5_2_1;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-พนักงานบริการ</td>
                 <? echo $td5_2_2;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ใช้สารเสพติด</td>
                 <? echo $td5_2_3;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ประชากรข้ามชาติ</td>
                 <? echo $td5_2_4;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ถูกคุมขัง</td>
                 <? echo $td5_2_5;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธุ์และชนเผ่า</td>
                 <? echo $td5_2_7;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td5_4;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประชาชนทั่วไป</td>
                 <? echo $td5_3;?>
            </tr>
            
    </tbody>
</table>
<? }else{ ?>
 <table id="crisis" class="compact table-striped" cellspacing="0" width="100%">
        <thead>
            <tr class="border_top">
                <td>ปัญหา</th>
                
                
                <? echo $th;?>
            </tr>
        
		</thead>
        <tfoot>
            <tr>
            	 <td>ปัญหา</td>
                <? echo $th;?>
            </tr>
        </tfoot>

        <tbody>
            <tr class="head">
                <td>บังคับตรวจเอชไอวี</td>
                <? echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ผู้ติดเชื้อเอชไอวี</b></td>
               <? echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>กลุ่มเปราะบาง</b></td>
                <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มหลากหลายทางเพศ</td>
                <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-พนักงานบริการ</td>
               <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ใช้สารเสพติด</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ประชากรข้ามชาติ</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ถูกคุมขัง</td>
                <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธู์และชนเผ่า</td>
                 <? echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                <? echo $td;?>
            </tr>
            <tr class="subhead_border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประชาชนทั่วไป</td>
                <? echo $td;?>
            </tr>
            <tr class="head_border">
                <td><b>เปิดเผยสถานะการติดเชื้อเอชไอวี</b> <br>(ผู้ติดเชื้อเอชไอวี)</td>
                 <? echo $td;?>
            </tr>
            <tr class="head">
                <td><b>ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี</b></td>
                <? echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ติดเชื้อเอชไอวี</td>
                <? echo $td;?>
            </tr>
            <tr class="subhead_border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิตผู้ติดเชื้อเอชไอวี</td>
                <? echo $td;?>
            </tr>
            <tr class="head">
                <td><b>ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากเป็นกลุ่มเปราะบาง</b></td>
                <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มหลากหลายทางเพศ</td>
                <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-พนักงานบริการ</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ใช้สารเสพติด</td>
                <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ประชากรข้ามชาติ</td>
                <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ถูกคุมขัง</td>
                <? echo $td;?>
            </tr>
            <tr class="border">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธุ์และชนเผ่า</td>
                 <? echo $td;?>
            </tr>
             <tr class="head">
                <td><b>อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</b></td>
                <? echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ติดเชื้อเอชไอวี</td>
                <? echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กลุ่มเปราะบาง</td>
                <? echo $td;?>
            </tr>
             <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มหลากหลายทางเพศ</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-พนักงานบริการ</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ใช้สารเสพติด</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ประชากรข้ามชาติ</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-ผู้ถูกคุมขัง</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธุ์และชนเผ่า</td>
                 <? echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td;?>
            </tr>
            <tr class="subhead">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประชาชนทั่วไป</td>
                 <? echo $td;?>
            </tr>
            
    </tbody>
</table>
<? } ?>
        </div>        





          
            
            
            
            
        </div>
		</form>
      </div>
      
      

      <style type="text/css">
      .demo { position: relative; }
      .demo i {
        position: absolute; bottom: 10px; right: 24px; top: auto; cursor: pointer;
      }
      </style>

      <script type="text/javascript">
      $(document).ready(function() {

        $('#config-text').keyup(function() {
          eval($(this).val());
        });
        
        $('.configurator input, .configurator select').change(function() {
          updateConfig();
        });

        $('.demo i').click(function() {
          $(this).parent().find('input').click();
        });

        $('#startDate').daterangepicker({
          singleDatePicker: true,
          startDate: moment().subtract(6, 'days')
        });

        $('#endDate').daterangepicker({
          singleDatePicker: true,
          startDate: moment()
        });

        updateConfig();

        function updateConfig() {
          var options = {};


/*
          if ($('#timePickerSeconds').is(':checked'))
            options.timePickerSeconds = true;
          
          if ($('#autoApply').is(':checked'))
            options.autoApply = true;

          if ($('#dateLimit').is(':checked'))
            options.dateLimit = { days: 7 };
*/
         // if ($('#ranges').is(':checked')) {
            options.ranges = {
              'วันนี้': [moment(), moment()],
              'เมื่อวาน': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              '7 วันที่แล้ว': [moment().subtract(6, 'days'), moment()],
              '30 วันที่แล้ว': [moment().subtract(29, 'days'), moment()],
              'เดือนนี้': [moment().startOf('month'), moment().endOf('month')],
              'เดือนที่แล้ว': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            };
          //}

			/*

          if (!$('#linkedCalendars').is(':checked'))
            options.linkedCalendars = false;

          if (!$('#autoUpdateInput').is(':checked'))
            options.autoUpdateInput = false;

          if (!$('#showCustomRangeLabel').is(':checked'))
            options.showCustomRangeLabel = false;
			*/
          //if ($('#alwaysShowCalendars').is(':checked'))
            options.alwaysShowCalendars = true;


         

          $('#config-text').val("$('#demo').daterangepicker(" + JSON.stringify(options, null, '    ') + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});");

          $('#date1').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); });
          
        }

      });
      </script>
      
   </body>
     <link rel="stylesheet" type="text/css" href="DataTable/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="DataTable/buttons.dataTables.min.css" />

    <!--script type="text/javascript" language="javascript" src="DataTable/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.print.min.js"></script-->
    
<!--script type="text/javascript" language="javascript">
$(document).ready(function() {
    $('#crisis').DataTable( {
		bFilter: true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'copy', 'print'
        ],
		paging: false
       	
    } );
} );
</script-->
   
   <!--script type="text/javascript" charset="utf8" src="DataTables/media/js/jquery.dataTables.js"></script-->
   
   <!--script type="text/javascript" language="javascript" src="DataTable/jquery-3.3.1.js"></script-->
   <script type="text/javascript" language="javascript" src="DataTable/jquery.dataTables.min.js"></script>
   <script type="text/javascript" language="javascript" src="DataTable/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="DataTable/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript">
/*
 $(document).ready(function() {
    $('#crisis').DataTable( {
		dom: 'Bfrtip',
		"searching":   false,
        "paging":   false,
		buttons: [
            'excel', 'copy', 'print'
        ],
        "ordering": false,
        "info":     false,
		"columnDefs": [{"className": "dt-center", "targets": [<? echo $dt_target;?>]}]
    } );
} );
*/
$(document).ready(function() {
    $('#crisis').DataTable( {
		bFilter: true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'copy', 'print'
        ],
		paging: false,
		ordering: false
    } );
} );

  </script>
<? mysql_close($connection); ?>  

</html>
