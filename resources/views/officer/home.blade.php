<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CRS </title>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">

    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    {{ Html::script('js/jquery.min.js') }}


    <meta name="theme-color" content="#cc99cc" />
    <!--script src="http://bulma.io/javascript/jquery-2.2.0.min.js"></script>
    <script src="http://bulma.io/javascript/clipboard.min.js"></script>
    <script src="http://bulma.io/javascript/bulma.js"></script>
    <script type="text/javascript" src="http://bulma.io/javascript/index.js"></script-->

</head>

<body class="layout-default">

    <section class="hero is-medium has-text-centered">
        <div class="hero-head">
            <div class="container">
                @component('component.login_bar2')
                @endcomponent
            </div>
        </div>
        <div class="columns is-mobile">
            <div class="column is-5 is-offset-8">
                @if( Auth::user()->position == "manager" or Auth::user()->position == "admin" )
                <a class="button is-primary is-rounded is-small" href="{{ route('manager.register') }}">
                    <i class="fas fa-user-plus"></i>&nbsp
                    ลงทะเบียนผู้ดูแลเพิ่มเติม </a>
                @endif
            </div>
        </div>


        <div class="hero-body">
            <div class="container">
                <h1 id="bulma" class="title"> Crisis Response System (CRS) </h1>
                <h2 id="modern-framework" class="subtitle"> ระบบรับเรื่องร้องเรียนและคุ้มครองการละเมิดสิทธิด้านเอดส์<br>
                    เพศภาวะ และความเป็นกลุ่มประชากรเปราะบางต่อการถูกเลือกปฏิบัติ </h2>
                <a id="btn_new1" class="button ft1 i-margin" href="{{ 'officer/input_case' }}">แจ้งเหตุ</a>
                <a id="btn_new1" class="button ft1 i-margin"
                    href="{{ route('officer.show',['mode_id' => "0"]) }}">จัดการเหตุ</a>
                <a id="btn_new1" class="button ft1 i-margin" href="../php/dashboard3.blade.php">รายงาน</a>

            </div>
        </div>
    </section>
    <br>

    <footer class="footer " style="background-color: #EEE;">
        <div class="container  ">
            <div class="content has-text-centered  ">
                <p>Crisis Response System (CRS)
                </p>
                <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
            </div>
        </div>
    </footer>


    <script src="{{ asset('bulma/clipboard-1.7.1.min.js') }}"></script>
    <script src="{{ asset('bulma/main.js') }}"></script>
    {{--<script src="{{ asset('js/prov_list.js') }}"></script>--}}
    <script>
    var p_id = $('#p_id').val();
    var p_po = $('#p_position').val();
    var p_ar = $('#p_area').val();

    var status_url = "{{route('officer.load_status',['prov_id' => ':p_id']) }}";
    status_url = status_url.replace(':p_id', p_id + ' ' + p_po + ' ' + p_ar);
    console.log(status_url);
    $.ajax({
        type: 'GET',
        url: status_url,
        success: function(data) {
            //console.log(data);
            $('#i-receive').text(data.NotAcp);
            $('#i-additional').text(data.NotKeyIn);
            $('#i-process').text(data.NotOp);
        }
    });
    </script>
</body>

</html>