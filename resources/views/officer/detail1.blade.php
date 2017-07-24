<!DOCTYPE html>
<html lang="en" class="route-index">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--meta name="description" content="Bulma is an open source CSS framework based on Flexbox and built with Sass. It's 100% responsive, fully modular, and available for free."-->
<title>Crisis Response</title>
<link rel="stylesheet" href="bulma/css/bulma.css">

<!--meta name="msapplication-config" content="http://bulma.io/favicons/browserconfig.xml?v=201701041855"-->
<meta name="theme-color" content="#cc99cc" />
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
  <div class="nav-left"> <a class="nav-item is-active" href="#"> Crisis Response </a>
    <div class="nav-item">
      <div class="field is-grouped">
        <p class="control"> <a id="i-" class="button" href="#"> <span>100 case</span> </a> </p>
      </div>
    </div>
    <div class="nav-center"> <a class="nav-item" href="#"> <span class="icon"> <i class="fa fa-github"></i> </span> </a> <a class="nav-item" href="#"> <span class="icon"> <i class="fa fa-twitter"></i> </span> </a> </div>
    <span id="nav-toggle" class="nav-toggle"> <span></span> <span></span> <span></span> </span>
    <div id="nav-menu" class="nav-right nav-menu"> <a class="nav-item is-active" href="#"> Username : </a>
      <div class="nav-item">
        <p class="control"> <a class="button is-primary" href="#"> <span>Logout</span> </a> </p>
      </div>
    </div>
    </nav>
  </div>
</div>
<div class="column is-one-third ">
  <p > <a href="Home.php">Home</a> >> <a>ข้อมูลเบื้องต้น</a> </p>
</div>
<h1 id="title" class="title"> ข้อมูลเบื้องต้น </h1>
<div class="container">
  <div class="notification"> <!--This container is <strong>centered</strong> on desktop. -->
    <div class="field is-horizontal">
      <div class="field-label"> 
        <!-- Left empty for spacing --> 
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label"> วันที่</label>
      </div>
      <div class="field-body">
        <div class="field is-grouped">
          <p class="control is-expanded has-icons-left">
            <input class="input" type="text" placeholder="Ex : 01/01/2560" value="26/06/2560" disabled>
            <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">ผู้ถูกกระทำ</label>
      </div>
      <div class="field-body">
        <div class="field is-grouped">
          <p class="control is-expanded has-icons-left ">
            <input class="input" type="text" placeholder="ชื่อผู้แจ้ง"  value="สมชาย" disabled> 
            <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
        <div class="field-label is-normal">
          <label class="label">ID-Code</label>
        </div>
        <div class="field">
          <p class="control is-expanded has-icons-left has-icons-right" >
            <input class="input" type="email" placeholder="ID-CODE"  value="XX12345" disabled>
            <span class="icon is-small is-left"> <i class="fa fa-envelope"></i> </span> <span class="icon is-small is-right"> <i class="fa fa-check"></i> </span> </p>
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label"> เบอร์มือถือ </label>
      </div>
      <div class="field-body">
        <div class="field is-grouped">
          <p class="control is-expanded has-icons-left">
            <input class="input" type="text" value="0123456789" disabled>
            <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label"> เพศ </label>
      </div>
      <div class="field-body">
        <div class="field is-grouped">
          <p class="control is-expanded has-icons-left">
            <input class="input" type="text"  value="ชาย" disabled>
            <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">พื้นที่ จังหวัด</label>
      </div>
      <div class="field-body">
        <div class="field is-grouped">
          <p class="control is-expanded has-icons-left ">
            <input class="input" type="text" placeholder="ชื่อผู้แจ้ง"  value="กรุงเทพมหานคร" disabled> 
            <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
        <div class="field-label is-normal">
          <label class="label">อำเภอ</label>
        </div>
        <div class="field">
          <p class="control is-expanded has-icons-left has-icons-right" >
            <input class="input" type="email" placeholder="ID-CODE"  value="บางกะปิ" disabled>
            <span class="icon is-small is-left"> <i class="fa fa-envelope"></i> </span> <span class="icon is-small is-right"> <i class="fa fa-check"></i> </span> </p>
        </div>
      </div>
    </div>
    
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label"> ปัญหาที่แจ้ง</label>
      </div>
      <div class="field-body">
        <div class="field is-grouped">
          <p class="control is-expanded has-icons-left">
            <input class="input" type="text" placeholder="ประเภท1" value="บังคับตรวจเอชไอวี" disabled>
            <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
        
      </div>
    </div>
    
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label"> ประเภทกลุ่ม </label>
      </div>
      <div class="field-body">
        <div class="field is-grouped">
          <p class="control is-expanded has-icons-left ">
            <input class="input" type="text"   value="กลุ่มเปราะบาง" disabled>  
             </p>
        </div>
        <div class="field-label is-normal">
          <label class="label"> ประเภทกลุ่มย่อย </label>
        </div>
        <div class="field">
          <p class="control is-expanded has-icons-left has-icons-right" >
            <input class="input" type="email"   value="กลุ่มหลากหลายทางเพศ" disabled>
            <span class="icon is-small is-left"> <i class="fa fa-envelope"></i> </span> <span class="icon is-small is-right"> <i class="fa fa-check"></i> </span> </p>
        </div>
      </div>
    </div>
    
    
    
    
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">ผู้แจ้งเรื่อง</label>
      </div>
      <div class="field-body">
        <div class="field is-grouped">
          <p class="control is-expanded has-icons-left ">
            <input class="input" type="text" placeholder="เจ้าหน้าที่"  value="เจ้าหน้าที่ A" disabled> 
            <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
        <div class="field-label is-normal">
          <label class="label">เบอร์มือถือ</label>
        </div>
        <div class="field">
          <p class="control is-expanded has-icons-left has-icons-right" >
            <input class="input"   value="0123456789" disabled>
            <span class="icon is-small is-left"> <i class="fa fa-envelope"></i> </span> <span class="icon is-small is-right"> <i class="fa fa-check"></i> </span> </p>
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label"> ผู้รับเรื่อง </label>
      </div>
      <div class="field-body">
        <div class="field is-grouped">
          <p class="control is-expanded has-icons-left ">
            <input class="input" type="text"  value="เจ้าหน้าที่ B" disabled> 
            <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label"> 
        <!-- Left empty for spacing --> 
      </div>
    </div>
  </div>
  <div class="field is-grouped">
    <p><a> </a></p>
    <p class="control"> <a class="button is-primary"> ยืนยันการรับเรื่อง </a> </p>
    <p class="control"> <a class="button"> ยกเลิก </a> </p>
  </div>
</div>
</section>
<br>
<footer class="footer">
  <div class="container">
    <div class="columns">
      <div class="column is-3">
        <div id="about" class="content"> <strong xmlns:dct="#" href="#" property="dct:title" rel="dct:type">Crisis Response</strong> by <a xmlns:cc="#" href="#" property="cc:attributionName" rel="cc:attributionURL">Aidsrightsthailand</a>. </div>
      </div>
      <div class="column is-5">
        <div id="share" class="content"> </div>
      </div>
      <div class="column is-4">
        <div id="sister">
          <p><small> <strong>ที่อยู่</strong> : </small></p>
          <p><small>133/235 หมู่บ้านรื่นฤดี3 ถนนหทัยราษฎร์ แขวงมีนบุรี เขตมีนบุรี กทม 10510 โทรศัพท์ 02-171-5135-6 โทรสาร 02-1715124 </small></p>
        </div>
      </div>
    </div>
    <p id="tsp"> <small> Source code licensed <a href="#">HISO</a>. <br>
      Website content licensed <a rel="license" href="http://www.hiso.or.th">www.hiso.or.th</a>. </small> </p>
  </div>
</footer>
</body>
</html>