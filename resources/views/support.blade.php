<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('bulma/css/bulma.css') }}" rel="stylesheet">
	<link href="{{ asset('css/font-awesome5.0.6/css/fontawesome-all.css') }}"
		  rel="stylesheet"> {{ Html::script('js/jquery.min.js') }}

	<title> CRS - Agency Support </title>


	<link rel="stylesheet" type="text/css" href="css/uploadicon/new3.css" />

	
</head>

<body>
    <section class="hero is-primary wall3">
		<div class="hero-body">
			<div class="container">
				<div class="columns is-vcentered">
					<div class="column">
						<p class="title"> Crisis Response System (CRS) </p>
					</div>
				</div>
			</div>
		</div>
	</section>


    <section class="section">
        <div class="container has-text-centered">

        <nav class="breadcrumb">
            <ul>
                <li><a href="{{ 'index.php' }}"><span class="icon is-small"><i class="fa fa-home"></i></span><span> หน้าหลัก </span></a>
                </li>
                <li class="is-active"><a><span class="icon is-small"><i class="fa fa-handshake"></i></span><span> หน่วยงานสนับสนุน </span></a>
                </li>
            </ul>
        </nav>

            <h2 class="title"> หน่วยงานสนับสนุน </h2>

            <div class="tile is-ancestor">
                <div class="tile is-parent">
                    <article class="tile is-child box"  >
                    <a href="http://aidssti.ddc.moph.go.th">
                        <figure class="image"  >
                            <img src="images/logo/logo1-x100.png"  >
                        </figure>
                        <p class="is-size-6"  >สำนักโรคเอดส์ วัณโรค และโรคติดต่อทางเพศสัมพันธ์</p>
                        </a>
                    </article>
                </div>
                <div class="tile is-parent">
                <article class="tile is-child box">
                <a href="http://www.aidsrightsthailand.com">
                        <figure class="image">
                            <img src="images/logo/logo2-x100.png">
                        </figure>
                        <p class="is-size-6">มูลนิธิศูนย์คุ้มครองสิทธิ์ด้านเอดส์</p>
                        </a>
                    </article>
                </div>
                <div class="tile is-parent">
                <article class="tile is-child box">
                <a href="http://www.rlpd.go.th">
                        <figure class="image">
                            <img src="images/logo/logo3-x100.png">
                        </figure>
                        <p class="is-size-6">กรมคุ้มครองสิทธิและเสรีภาพ</p>
                        </a>
                    </article>
                </div>
                <div class="tile is-parent">
                <article class="tile is-child box">
                <a href="http://www.nhrc.or.th">
                        <figure class="image">
                            <img src="images/logo/logo4-x100.png">
                        </figure>
                        <p class="is-size-6">สำนักงานคณะกรรมการสิทธิมนุษยชนแห่งชาติ</p>
                        </a>
                    </article>
                </div>
                <div class="tile is-parent">
                <article class="tile is-child box">
                <a href="http://www.1300thailand.m-society.go.th">
                        <figure class="image">
                            <img src="images/logo/logo5-x100.png">
                        </figure>
                        <p class="is-size-6">ศูนย์ช่วยเหลือสังคม</p>
                        </a>
                    </article>
                </div>
            </div>

            <div class="tile is-ancestor">
                <div class="tile is-parent">
                <article class="tile is-child box">
                <a href="http://www.lawyerscouncil.or.th">
                        <figure class="image">
                            <img src="images/logo/logo6-x100.png">
                        </figure>
                        <p class="is-size-6">สภาทนายความ ในพระบรมราชูปถัมภ์</p>
                        </a>
                    </article>
                </div>
                <div class="tile is-parent">
                <article class="tile is-child box">
                <a href="http://www.aidsaccess.com">
                        <figure class="image">
                            <img src="images/logo/logo7-x100.png">
                        </figure>
                        <p class="is-size-6">สายด่วน 1663<br>มูลนิธิเข้าถึงเอดส์</p>
                        </a>
                    </article>
                </div>
                <div class="tile is-parent">
                <article class="tile is-child box">
                <a href="http://www.thaiplus.net">
                        <figure class="image">
                            <img src="images/logo/logo8-x100.png">
                        </figure>
                        <p class="is-size-6">เครือข่ายผู้ติดเชื้อ<br>เอชไอวี/เอดส์ประเทศไทย</p>
                        </a>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <a href="http://www.ddc.moph.go.th">
                            <figure class="image">
                                <img src="images/logo/logo1-x100.png">
                            </figure>
                            <p class="is-size-6">สายด่วน 1442<br>กรมควบคุมโรค</p>
                            </a>
                        </a>
                    </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box" >
                        <a href="http://www.hiso.or.th">
                            <figure class="image">
                                <img  src="images/logo/logo10-x100.png">
                            </figure>
                            <p class="is-size-6">สำนักงานพัฒนาระบบ<br>ข้อมูลข่าวสารสุขภาพ</p>
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </section>

    

    @extends('footer')

        <script src="../js/bulma.js"></script>
</body>
</html>