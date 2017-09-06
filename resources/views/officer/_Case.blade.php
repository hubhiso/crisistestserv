
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
            <td>เลือกปฏิบัติเนื่องมาจาการติดเชื้อเอชไอวี</td>
        @elseif($case->problem_case == 4)
            <td>ไม่ได้รับความเป็นธรรมเนื่องมาจากเป็นกลุ่มเปราะบาง</td>
        @endif
        @if( $case->status  == 1)
            <td>ยังไม่ได้รับเรื่อง</td>
            <td><a class='button is-primary' href="{{ route('officer.open_cfm', $case->case_id) }}"> <span>รับเรื่อง</span> </a> </td>
        @elseif( $case->status  == 2)
            <td> รับเรื่องแล้ว </td>
            <td><a class='button is-primary' href="{{ route('officer.add_detail' , $case->case_id) }}"> <span> บันทึกข้อมูล </span> </a> </td>
        @elseif( $case->status  >= 3)
            <td> บันทึกข้อมูลเพิ่มเติมแล้ว </td>
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