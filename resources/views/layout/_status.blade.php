<? 
$step=1;

//$step=2;
//$step=3;
$thaimonth = ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];

?>
{{-- @foreach($data as $Semidata)
 {{ $Semidata }} 
@endforeach --}}

<div class="timeline-item">


@foreach($data as $Semidata)
    
    <input type="hidden" id="fcase" value="{{$Semidata->case_id}}">
    {{-- @if ($step==1) --}}
    @if ($step == 1)

        @if($Semidata->operate_status == 1 )

        <div class="timeline-icon">
        <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}}{{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}}  </h2>
            <p>
               ส่งเรื่องสำเร็จ
            </p>

        </div>
        @else
        <div class="timeline-icon">
        <img src="images/minusx40.png" alt="">
        </div>
            <div class="timeline-content">
                <h2>  </h2>
                <p>
                    ยังไม่ได้รับเรื่อง
                </p>
            </div>
        @endif
       
        <? //$step++; ?>   

</div>
    
    
    @endif

   
@if ($step == 2)
<div class="timeline-item">
        @if($Semidata->operate_status == 2 )
            <div class="timeline-icon">
            <img src="images/markx40.png" alt="">
            </div>
                <div class="timeline-content right">
                    <h2> {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}}{{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}} </h2>
                    <p>
                    เจ้าหน้าที่รับเรื่องแล้ว
                    </p>
                </div>
        @else
              <div class="timeline-icon">
              <img src="images/minusx40.png" alt="">
              </div>
                    <div class="timeline-content right">
                        <h2>  </h2>
                        <p>
                            ยังไม่ได้ดำเนินการ
                        </p>
                    </div>
                    
        @endif
        <? //$step++; ?>
</div>


  
@endif

{{-- @if ($step==3) --}}
@if ($step==3)   
<div class="timeline-item">
        @if($Semidata->operate_status == 3 )
        <div class="timeline-icon">
        <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}}{{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}} </h2>
            <p>
            เจ้าหน้าที่สอบถามข้อมูลเพิ่มเติมแล้ว
            </p>
        </div>
        @else
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                ยังไม่เสร็จสิ้น
            </p>
        </div>
       
    @endif
    <? //$step++; ?>    
</div>

@endif


@if ($step==4)   
<div class="timeline-item">
        @if($Semidata->operate_status == 4 )
        <div class="timeline-icon">
        <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}}{{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}} </h2>
            <p>
            เริ่มดำเนินการแล้ว
            </p>
        </div>
        @else
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2>   </h2>
            <p>
                ยังไม่เสร็จสิ้น
            </p>
        </div>
       
    @endif
    <? //$step++; ?>    
</div>

@endif


@if ($step==5)   
<div class="timeline-item">
        @if($Semidata->operate_status == 5 or $Semidata->operate_status == 6 )
        <div class="timeline-icon">
        <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}}{{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}} </h2>
            <p>
             ดำเนินการเสร็จสิ้น
            </p>
        </div>
        @else
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2>   </h2>
            <p>
                ยังไม่เสร็จสิ้น
            </p>
        </div>
       
    @endif
    <? //$step++; ?>    

@endif


<? $step++; ?>   
 
@endforeach
<div class="timeline-item">

@if ($step==1) 
        <div class="timeline-icon">
            <img src="images/minusx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2>  - </h2>
            <p>
                ยังไม่เสร็จสิ้น
            </p>
        </div>
@endif
</div>
<div class="timeline-item">
@if ($step==2) 
        <div class="timeline-icon">
        <img src="images/minusx40.png" alt="">
        </div>
            <div class="timeline-content">
                <h2> - </h2>
                <p>
                    เจ้าหน้าที่ยังไม่ได้รับเรื่อง
                </p>
            </div>
@endif
</div>
<div class="timeline-item">
@if ($step==3 or $step==2) 

        <div class="timeline-icon">
        <img src="images/minusx40.png" alt="">
        </div>
            <div class="timeline-content">
                <h2> - </h2>
                <p>
                 เจ้าหน้าที่ยังไม่ได้สอบถามข้อมูลเพิ่มเติม
                </p>
        
        </div>
@endif
</div>
<div class="timeline-item">
@if ($step==4 or $step==3 or $step==2) 
        <div class="timeline-icon">
        <img src="images/minusx40.png" alt="">
        </div>
            <div class="timeline-content">
                <h2> - </h2>
                <p>
                อยู่ระหว่างดำเนินการช่วยเหลือ
                </p>
        </div>
@endif
</div>
<div class="timeline-item">
@if ($step==5 or $step==4 or $step==3 or $step==2) 
        <div class="timeline-icon">
        <img src="images/minusx40.png" alt="">
        </div>
            <div class="timeline-content">
                <h2> - </h2>
                <p>
                การดำเนินการยังไม่เสร็จสิ้น
                </p>
        </div>
@endif
</div>
</div>