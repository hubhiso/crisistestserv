<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>CRS</title>
    <link href="{{ asset('bulma-0.8.0/css/bulma.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mystyles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300&display=swap" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}" rel="stylesheet">

    <meta name="theme-color" content="#cc99cc" />


    <style>
    .hideextra {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    </style>

</head>


<body class="layout-default has-background-light">

    @component('component.input_head') @endcomponent

    <div class="container">

        <section class="section">

            <nav class="breadcrumb">
                <ul>
                    <li><a href="{{ 'index.php' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span>
                                หน้าหลัก </span></a>
                    </li>
                    <li class="is-active"><a><span class="icon is-small"><i class="fas fa-thumbtack"></i></span><span>
                                พิกัดหน่วยงาน </span></a>
                    </li>
                </ul>
            </nav>
            <iframe src="../PHP/crisisclusterorgmap/cluster.php" height="100%" width="100%"
                style="height:700px;"></iframe>
        </section>
    </div>

</body>



<footer class="footer " style="background-color: #EEE;">
    <div class="container  ">
        <div class="content has-text-centered  ">
            <p>Crisis Response System (CRS)
            </p>
            <p id="tsp"> <small> Source code licensed <a href="http://www.hiso.or.th">HISO</a>. </small> </p>
        </div>
    </div>
</footer>

</html>