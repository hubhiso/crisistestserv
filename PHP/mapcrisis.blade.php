<!DOCTYPE html>
<html lang="en" class="route-index">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRS</title>

    <link href="../public/css/font-awesome5.0.6/css/fontawesome-all.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://localhost:8888/crisis/public/images/favicon.ico">

    <link rel="stylesheet" href="../public/bulma-0.8.0/css/bulma.css">
    <meta name="msapplication-config" content="http://bulma.io/favicons/browserconfig.xml?v=201701041855">

    <meta name="theme-color" content="#cc99cc" />
    <script src="http://bulma.io/javascript/jquery-2.2.0.min.js"></script>
    <script src="http://bulma.io/javascript/clipboard.min.js"></script>
    <script src="http://bulma.io/javascript/bulma.js"></script>
    <script type="text/javascript" src="http://bulma.io/javascript/index.js"></script>

    <link rel="stylesheet" href="crisiscluster/leaflet_cluster.css" />
    <link rel="stylesheet" href="crisiscluster/MarkerCluster.css" />
    <link rel="stylesheet" href="crisiscluster/leaflet.css" />
    <script src="crisiscluster/leaflet.js"></script>
    <link rel="stylesheet" href="crisiscluster/MarkerCluster.css" />
    <script src="crisiscluster/leaflet.markercluster.js"></script>




</head>

<body class="layout-default">

    <section class="hero is-medium has-text-centered">
        <div class="hero-head">


            <div class="container">
                <br>

                <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                        <li><a href="../public/officer"><span class="icon is-small">
                                    <i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>

                        </li>
                        <li class="is-active"><a><span class="icon is-small">
                                    <i class="far fa-file-alt"></i></span><span> ระบบรายงาน </span></a>

                        </li>
                    </ul>
                </nav>

                <div class="tabs is-centered  is-toggle is-toggle-rounded">
                    <ul>
                        <li>
                            <a href="dashboard3.blade.php">
                                <span class="icon is-small"><i class="fas fa-chart-bar" aria-hidden="true"></i></span>
                                <span> กราฟแสดงข้อมูล<br>แยกตามประเด็น </span>
                            </a>
                        </li>
                        <li class="is-active">
                            <a href="mapcrisis.blade.php">
                                <span class="icon is-small"><i class="far fa-map" aria-hidden="true"></i></span>
                                <span>พิกัด<br>การละเมิดสิทธิ์</span>
                            </a>

                        </li>
                        <li>
                            <a href="table.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>ในภาพรวม</span>
                            </a>

                        </li>
                        <li>
                            <a href="report_c1.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุปการ<br>จัดการเหตุ</span>
                            </a>
                        </li>
                        <li>
                            <a href="report_c2.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>การละเมิดสิทธิ์</span>
                            </a>
                        </li>
                        <li>
                            <a href="report_perfomance.blade.php">
                                <span class="icon is-small"><i class="far fa-file-alt" aria-hidden="true"></i></span>
                                <span>ตารางสรุป<br>การให้บริการ</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <br>
                <p class="title">พิกัดการละเมิดสิทธิ์</p>
                <p class="subtitle is-6">คลิกที่ตัวเลขบนแผนที่เพื่อขยายแผนที่ และแสดงพิกัดในบริเวณดังกล่าว</p>


                <div class="columns is-multiline is-mobile">
                    <div class="column ">
                        <div class="level-left">
                            <div class="level-item">
                                <p class="subtitle is-6">
                                    <strong> ข้อมูล ณ วันที่ (ด/ว/ป) </strong>
                                </p>
                                <p class="subtitle is-6">
                                    <?php echo "  : ",date("m/d/Y")," เวลา : ",date("h:i:sa"); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


    </section>
    <iframe src="crisiscluster/cluster.php" height="100%" width="100%" style="height:700px;"></iframe>

    <br>

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