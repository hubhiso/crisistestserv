<table class="table paginated" id="table_show">
    <thead>
    <tr>
        <th><abbr title="Date"> วันที่ </abbr>
        </th>
        <th><abbr title="ID"> รหัส </abbr>
        </th>
        <th><abbr title="Name"> ชื่อ </abbr>
        </th>
        <th><abbr title="PR"> จังหวัด </abbr>
        </th>
        <th><abbr title="Type"> ประเภท </abbr>
        </th>
        <th><abbr title="Status"> สถานะ </abbr>
        </th>
        <th><abbr title="Activities"> ดำเนินการ </abbr>
        </th>
        <th><abbr title="Username"> ประเภทของผู้แจ้ง </abbr>
        </th>
        <th><abbr title="Username"> ผู้รับเรื่อง </abbr>
        </th>
    </tr>
    </thead>
    <tbody>




@foreach($cases as $case)

    <tr>
        <th>{{ \Carbon\Carbon::parse($case->created_at)->format('d-M-y') }}</th>
        <th>{{ $case->case_id }}</th>
        <td><a href='#' title='ID'>{{ $case->name }}</a> </td>
        <td>{{$case->Provinces->PROVINCE_NAME}}</td>
        @if($case->problem_case == 1 )
            <td>บังคับตรวจเอชไอวี</td>
        @elseif($case->problem_case == 2)
            <td>เปิดเผยสถานะการติดเชื้อเอชไอวี</td>
        @elseif($case->problem_case == 3)
            <td>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</td>
        @elseif($case->problem_case == 4)
            <td>ถูกกีดกันหรือถูกเลือกปฏิบัติเนื่องมาจากเป็นกลุ่มเปราะบาง</td>
        @elseif($case->problem_case == 5)
            <td>อื่นๆ ที่เกี่ยวข้องกับเอชไอวี</td>
        @endif
        @if( $case->status  == 1)
            <td>ยังไม่ได้รับเรื่อง</td>
            <td><a class='button is-primary' href="{{ route('officer.open_cfm', $case->case_id) }}"> <span>รับเรื่อง</span> </a> </td>
        @elseif( $case->status  == 2)
            <td> รับเรื่องแล้ว </td>
            <td><a class='button is-primary' href="{{ route('officer.add_detail' , $case->case_id) }}"> <span> บันทึกข้อมูล </span> </a> </td>
        @elseif( $case->status  >= 3)
            @if($case->status == 3)
            <td> บันทึกข้อมูลเพิ่มเติมแล้ว </td>
            @elseif($case->status == 4)
            <td> อยู่ระหว่างการดำเนินการ </td>
            @elseif($case->status == 5)
            <td> ดำเนินการเสร็จสิ้น </td>
            @elseif($case->status == 6)
            <td> ดำเนินการแล้วส่งต่อ </td>
            @endif
            <td><a class='button is-primary' href="{{ route('officer.add_activities' , $case->case_id) }}"> <span> ดำเนินการ </span> </a> </td>
        @else
            <td> รับเรื่องแล้ว </td>
            <td><a class='button is-primary' href="{{ route('data.detail2') }}"> <span> บันทึกข้อมูล </span> </a> </td>
        @endif

        @if($case->sender_case == 1 )
            <td>แจ้งด้วยตนเอง</td>
        @elseif($case->sender_case == 2)
            <td>มีผู้แจ้งแทน</td>
        @elseif($case->sender_case == 3)
            <td>เจ้าหน้าที่แจ้ง</td>
        @endif
        <td><a href='#' title='Receiver'>{{ $case->receiver }}</a></td>
    </tr>
@endforeach
    </tbody>
</table>
<script>
    $('table.paginated').each(function() {
        var currentPage = 0;
        var numPerPage = 5;
        var $table = $(this);
        $table.bind('repaginate', function() {
            $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
        });
        $table.trigger('repaginate');
        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="pagination is-centered"></div>');
        var $previous = $('<span class="pagination-previous">Previous</span>');
        var $next = $('<span class="pagination-next">Next page</span>');
        var $page_area1 = $('<ul class="pagination-list"></ul>');
        for (var page = 0; page < numPages; page++) {
            $('<span class="pagination-link"></span>').text(page + 1).bind('click', {
                newPage: page
            }, function(event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('is-current').siblings().removeClass('is-current');
            }).appendTo($page_area1).addClass('is-static');
        }

        $pager.insertBefore($table);
        $page_area1.appendTo($pager).find('span.pagination-link:first').addClass('is-current');;
        $previous.insertBefore($page_area1);
        $next.insertBefore($page_area1);

        $next.click(function (e) {
            $previous.addClass('is-static');
            $pager.find('.is-current').next('.pagination-link.is-static').click();
        });
        $previous.click(function (e) {
            $next.addClass('is-static');
            $pager.find('.is-current').prev('.pagination-link.is-static').click();
        });
        $table.on('repaginate', function () {
            $next.addClass('is-static');
            $previous.addClass('is-static');

            setTimeout(function () {
                var $active = $pager.find('.pagination-link.is-current');
                if ($active.next('.pagination-link.is-static').length === 0) {
                    $next.removeClass('is-static');
                } else if ($active.prev('.pagination-link.is-static').length === 0) {
                    $previous.removeClass('is-static');
                }
            });
        });
        $table.trigger('repaginate');
    });
//$('table.paginated').each(function() {
//var currentPage = 0;
//var numPerPage = 2;
//var $table = $(this);
//$table.bind('repaginate', function() {
//$table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
//});
//$table.trigger('repaginate');
//var numRows = $table.find('tbody tr').length;
//var numPages = Math.ceil(numRows / numPerPage);
//var $pager = $('<nav class="pagination is-centered"><ul class="pagination-list"></ul><nav>');
//for (var page = 0; page < numPages; page++) {
//$('<span class="pagination-link"></span>').text(page + 1).bind('click', {
//newPage: page
//}, function(event) {
//currentPage = event.data['newPage'];
//$table.trigger('repaginate');
//$(this).addClass('is-current').siblings().removeClass('is-current');
//}).appendTo($pager).addClass('pagination-link');
//}
//$pager.insertBefore($table).find('span.pagination-link:first').addClass('is-current');
////$pager.insertAfter($table).find('span.page-number:first').addClass('is-current');
//});
</script>
{{--{{ $cases->links('component.pagination') }}--}}
{{--{{$cases->links()}}--}}
