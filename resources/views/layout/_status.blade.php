
<div class="timeline-item">
    <div class="timeline-icon">
        @if($data->status > 1 )
        <img src="images/markx40.png" alt="">
        @else
        <img src="images/minusx40.png" alt="">
        @endif
    </div>
    <div class="timeline-content">
        <h2> 1 มกราคม 2560 เวลา 13.00 น. </h2>
        <p>
            ระบบดำเนินการรับเรื่องเรียบร้อยแล้ว
        </p>

    </div>
</div>

<div class="timeline-item">
    <div class="timeline-icon">
        @if($data->status > 2 )
            <img src="images/markx40.png" alt="">
        @else
            <img src="images/minusx40.png" alt="">
        @endif
    </div>
    <div class="timeline-content right">
        <h2> 25 มกราคม 2560 เวลา 17.00 น. </h2>
        <p>
            เจ้าหน้าที่กำลังดำเนินการอยู่
        </p>
    </div>
</div>

<div class="timeline-item">
    <div class="timeline-icon">
        @if($data->status > 3 )
            <img src="images/markx40.png" alt="">
        @else
            <img src="images/minusx40.png" alt="">
        @endif
    </div>
    <div class="timeline-content">
        <h2> - </h2>
        <p>
            การดำเนินการเสร็จสิ้น
        </p>
    </div>
</div>
