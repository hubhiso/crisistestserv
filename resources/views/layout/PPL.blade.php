
<section class="hero is-primary is-medium wall2">
  
  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <div class="container">
					<h1 id="bulma" class="title"> Crisis Response System (CRS) </h1>
					<h2 id="modern-framework" class="subtitle"> ระบบรับเรื่องร้องเรียนและคุ้มครองการละเมิดสิทธิด้านเอดส์ </h2>
					<a id="btn_new1" class="button" href="{{ 'case_inputs' }}"> แจ้งเรื่อง </a>
				</div>
				<br>	
				<div  class="container">
					<p> สามารถตรวจสอบสถานะดำเนินการ ได้ทางปุ่มด้านล่างนี้ </p><br>
					<a class="button is-primary is-inverted is-outlined " href="{{ 'status' }}"> สถานะการดำเนินงาน </a>
				</div>
    </div>
  </div>

</section>

<!-- popup box -->
<div id="boxes">
		<!--div style="top: 199.5px; left: 400px; display: none;" id="dialog" class="window"-->
		<div style="top: 199.5px;  display: none;" id="dialog" class="window">
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

							<div class="css-slider-wrapper">
								<input type="radio" name="slider" class="slide-radio1" checked id="slider_1">
								<input type="radio" name="slider" class="slide-radio2" id="slider_2">
								<div class="slider-pagination">
									<label for="slider_1" class="page1"></label>
									<label for="slider_2" class="page2"></label>
								</div>
								<div class="next control">
									<label for="slider_1" class="numb1"><i class="fa fa-arrow-circle-right"></i></label>
									<label for="slider_2" class="numb2"><i class="fa fa-arrow-circle-right"></i></label>
								</div>
								<div class="previous control">
									<label for="slider_1" class="numb1"><i class="fa fa-arrow-circle-left"></i></label>
									<label for="slider_2" class="numb2"><i class="fa fa-arrow-circle-left"></i></label>
								</div>
								<div class="slider slide1">
									<div class="columns">
										<div class="column">
										<img src="images/question.png" class="img-circle" alt="Cinque Terre" width="200" height="200">
										</div>
										<div class="column is-two-thirds">
											<h2>CRS คืออะไร</h2><br>
											<p class="message-body">
													พัฒนามาเพื่อเป็นช่องทางรับทราบข้อมูล ปัญหาการละเมิดสิทธิ
													โดยมีระบบการจัดเก็บและรวบรวมข้อมูลที่เป็นระบบ
													มีมาตรฐานกลไกการดูแลช่วยเหลือระหว่างภาคีเครือข่าย
													นำไปสู่การช่วยเหลืออย่างเป็นระบบ
													และยังสามารถนำข้อมูลที่ได้รับไปผลักดันให้เกิดการเปลี่ยนแปลงเชิงนโยบาย
													หรือทางกฎหมาย รวมทั้งให้ความรู้ต่อสาธารณะ
											</p>
										</div>
									</div>							
								</div>
								<div class="slider slide2">
									<div class="columns">
									<div class="column">
										<img src="images/help.png" class="img-circle" alt="Cinque Terre" width="200" height="200">
										</div>
											<div class="column is-two-thirds is-medium">
                        <h2>กรณีใดบ้างที่ท่านสามารถร้องเรียนในระบบ </h2><br>
                        <p class="message-body is-medium" style="text-align:left;">  
												1. ถูกบังคับตรวจเอชไอวี <br>
												2. ถูกเปิดเผยสถานะการติดเชื้อเอชไอวี <br>
												3. ถูกกีดกันหรือเลือกปฏิบัติเนื่องมาจากการติดเชื้อเอชไอวี <br>
												4. ถูกกีดกันหรือเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง
                        </p>
                        
										</div>
									</div>
								</div>
							</div>
			<p class="has-text-centered">
				 <a class="button is-medium  is-outlined is-danger close">คลิกเพื่อปิดหน้าต่าง</a>
			</p>
		
		</div>
		<!--div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.8;" id="mask"></div-->
	</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
	<script src="css/modal/modal.js"></script>

@extends('footer')
