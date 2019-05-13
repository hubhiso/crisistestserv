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
      
    
      
      <?
       $class = $_POST["class1"];
	   $date1 = $_POST["date1"];
	   $status = $_POST["status"];
	   $region = $_POST["region"];
	   $province = $_POST["province"];
	   $gender = $_POST["gender"];
	   $age = $_POST["age"];
	   $occ = $_POST["occ"];
	   $office = $_POST["office"];
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
   <body style="margin: 20px 0" onload ="Listselect(<? if ($class== ""){ echo "1";}else{ echo $class;}?>)">

      <div class="container">

        <h1 style="margin: 0 0 20px 0">รายงาน</h1>

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
            	<input type="text" id="date1" name="date1" class="form-control">
                <? //echo "date1=".$date1;?>
            	<!--i class="glyphicon glyphicon-calendar fa fa-calendar"></i-->
            </div>
          <!--/div-->
          
          

          <!--div class="col-md-4"-->
            <h4>จำแนกตาม</h4>
				<div class="form-group">
                <select id="class1" name="class1" onchange = "Listselect(this.value);" class="form-control">
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
                <select id="status" name="status" class="form-control">
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
                <select id="region" name="region" class="form-control">
                  <option value="0" <? if ($region == "00") { echo "selected";} ?>>ภาค</option>
                  <option value="1" <? if ($region == "1") { echo "selected";} ?>>กลาง</option>
                  <option value="2" <? if ($region == "2") { echo "selected";} ?>>ตะวันออกเฉียงเหนือ</option>
                  <option value="3" <? if ($region == "3") { echo "selected";} ?>>เหนือ</option>
                  <option value="4" <? if ($region == "4") { echo "selected";} ?>>ใต้</option>
                  <option value="5" <? if ($region == "5") { echo "selected";} ?>>กรุงเทพมหานคร</option>
                </select>
              </div>
              
                <div class="form-group">
                <select id="province" name="province" class="form-control">				  
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
                <select id="age" name="age" class="form-control">				  
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
                <select id="occ" name="occ" class="form-control">				  
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
                <input type="submit"  class="btn-success" value="ตกลง">

        	</div>
        
		<div class="col-md-10 pull-left">
        <?
      
	 
	  //$class = "1";
	  
	  if ($class == "1"){	  
	  		$th ="<th>ยังไม่ได้รับเรื่อง</th>
				<th>รับเรื่องแล้ว</th>
				<th>บันทึกข้อมูลเพิ่มเติมแล้ว</th>
				<th>อยู่ระหว่างดำเนินการ</th>
				<th>ดำเนินการเสร็จสิ้น</th>
				<th>ดำเนินการแล้วส่งต่อ</th>";          
				
			$td ="<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>";   
			
			$dt_target = "1,2,3,4,5,6";
				        
	  }else if ($class == "2"){	  
	  		$th ="<th>กลาง</th>
				<th>ตะวันออกเฉียงเหนือ</th>
				<th>เหนือ</th>
				<th>ใต้</th>
				<th>กรุงเทพมหานคร</th>";     
				
				$td ="<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>"; 
				
			$dt_target = "1,2,3,4,5";
				  
	 }else if ($class == "3"){	  
	  		$th ="<th>กรุงเทพมหานคร</th>
				<th>ชลบุรี</th>
				<th>เชียงใหม่</th>
				<th>ตาก</th>
				<th>สงขลา</th>";  
				
				
				$td ="<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>"; 
				
				$dt_target = "1,2,3,4,5";
				     
				 
	  }else if ($class == "4"){	  
	  		$th ="<th>ชาย</th>
				<th>หญิง</th>
				<th>สาวประเภทสอง</th>
				<th>อื่นๆ</th>";   
				
				
				$td ="<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>";
				     
				
				$dt_target = "1,2,3,4";
				 
	  }else if ($class == "5"){	  
	  		$th ="<th>0-4</th>
				<th>5-14</th>
				<th>15-19</th>
				<th>20-24</th>
				<th>25-34</th>
				<th>35-44</th>
				<th>45-59</th>
				<th>60 ขึ้นไป</th>";   
				
			$td ="<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>";   
				
				$dt_target = "1,2,3,4,5,6,7,8";
				    		 
				
	  }else if ($class == "6"){	  
	  		$th ="<th>ทำงานในหน่วยงานราชการ</th>
				<th>ทำงานในบริษัทเอกชน</th>
				<th>ทำงานในองค์กรพัฒนาเอกชน (NGO) </th>
				<th>ธุรกิจส่วนตัว</th>
				<th>รับจ้างทั่วไป</th>
				<th>เกษตรกร</th>
				<th>นักเรียน/นักศึกษา</th>
				<th>ว่างงาน</th>
				<th>อื่นๆ</th>";    
				
				$td ="<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>";  
				  
				  
				$dt_target = "1,2,3,4,5,6,7,8,9";  
				
				
	  }else if ($class == "7"){	  
	  		$th ="<th>สถานพยาบาล</th>
				<th>สถานที่ทำงาน</th>
				<th>สถานศึกษา</th>
				<th>หน่วยงานที่บังคับใช้กฎหมาย</th>
				<th>องค์กรปกครองส่วนท้องถิ่น</th>
				<th>หน่วยงานอื่นๆ</th>";        
				
				$td ="<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>
				<td>0</td>";   
				
				$dt_target = "1,2,3,4,5,6";
	  }
	  
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

      <table id="crisis" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ปัญหา</th>
                <? echo $th;?>
            </tr>
        </thead>
        <tfoot>
            <tr>
            	 <th>ปัญหา</th>
                <? echo $th;?>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td><b>บังคับตรวจเอชไอวี</b></td>
                <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td;?>
            </tr>
            <tr>
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
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธู์และชนเผ่า</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประชาชนทั่วไป</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td><b>เปิดเผยสถานะการติดเชื้อเอชไอวี</b> (ผู้ติดเชื้อเอชไอวี)</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td><b>ถูกกีดกันหรือถูกเลือกปฏิบัติ<br>เนื่องมาจากกการติดเชื้อเอชไอวี</b></td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิตผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td;?>
            </tr>
            <tr>
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
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-กลุ่มชาติพันธุ์และชนเผ่า</td>
                 <? echo $td;?>
            </tr>
             <tr>
                <td><b>อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</b></td>
                 <? echo $td;?>
            </tr>
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td;?>
            </tr>
             <tr>
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
            <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ครอบครัวและผู้ใกล้ชิดผู้ติดเชื้อเอชไอวี</td>
                 <? echo $td;?>
            </tr>
             <tr>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประชาชนทั่วไป</td>
                 <? echo $td;?>
            </tr>
            
    </tbody>
</table>
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
              'Today': [moment(), moment()],
              'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days': [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month': [moment().startOf('month'), moment().endOf('month')],
              'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
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
