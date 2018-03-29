<? $step=1;
    $thaimonth = ["","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."];
?>
@foreach($data as $Semidata)
    <input type="hidden" id="fcase" value="{{$Semidata->case_id}}">
    @if ($step==1)
<div class="timeline-item">

        @if($Semidata->status = 1 )

        <div class="timeline-icon">
        <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}}{{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}}  </h2>
            <p>
                เจ้าหน้าที่รับเรื่องแล้ว
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
            <? $step++; ?>

</div>
    @endif
    @if ($step==2)
<div class="timeline-item">
        @if($Semidata->status = 2 )
            <div class="timeline-icon">
            <img src="images/markx40.png" alt="">
            </div>
                <div class="timeline-content right">
                    <h2> {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}}{{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}} </h2>
                    <p>
                        เจ้าหน้าที่กำลังดำเนินการอยู่
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
            <? $step++; ?>
</div>
    @endif
    @if ($step==3)
<div class="timeline-item">
        @if($Semidata->status > 3 )
        <div class="timeline-icon">
        <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> {{date('d',strtotime(str_replace('-','/', $Semidata->operate_time)))}}-{{$thaimonth[date('n',strtotime(str_replace('-','/', $Semidata->operate_time)))]}}{{date("Y",strtotime(str_replace('-','/', $Semidata->operate_time)))+543}} </h2>
            <p>
                การดำเนินการเสร็จสิ้น
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
            <? $step++; ?>
</div>
    @endif
@endforeach