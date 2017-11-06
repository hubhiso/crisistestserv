
<div class="timeline-item">

        @if($data->status > 1 )
        <div class="timeline-icon">
        <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2>  </h2>
            <p>
                เจ้าหน้าที่รับเรื่องแล้ว
            </p>

        </div>
        @else
        <div class="timeline-icon">
        <img src="images/minusx40.png" alt="">
            <div class="timeline-content">
                <h2>  </h2>
                <p>
                    ยังไม่ได้รับเรื่อง
                </p>

            </div>
        </div>

    @endif

</div>

<div class="timeline-item">
        @if($data->status > 2 )
            <div class="timeline-icon">
            <img src="images/markx40.png" alt="">
            </div>
                <div class="timeline-content right">
                    <h2>  </h2>
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


</div>

<div class="timeline-item">
        @if($data->status > 3 )
        <div class="timeline-icon">
        <img src="images/markx40.png" alt="">
        </div>
        <div class="timeline-content">
            <h2> - </h2>
            <p>
                การดำเนินการเสร็จสิ้น
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

</div>
