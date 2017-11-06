<div class="hero-head">
    <div class="container">
        <nav class="navbar ">
            <div class="navbar-brand">
                <!--a class="nav-item is-active" href="#">Crisis Response</a-->

                <div class="nav-item">
                    <div class="field is-grouped">
                        <p class="control"> <a id="i-receive" class="button" href="#"> <span>ไม่รับเรื่อง 100</span> </a> </p>
                        <p class="control"> <a id="i-additional" class="button" href="#"> <span>ไม่บันทึก 20</span> </a> </p>
                        <p class="control"> <a id="i-process" class="button" href="#"> <span>ไม่ดำเนินการ 30</span> </a> </p>
                    </div>
                </div>

                <div class="navbar-burger burger" data-target="navMenuDocumentation">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div id="navMenuDocumentation" class="navbar-menu">
                <div class="navbar-end">
                    <a class="nav-item is-active" href="#"> Username : {{ Auth::user()->name }}  </a>
                    <div class="nav-item">
                        <p class="control"> <a class="button is-primary" href="{{ route('officer.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <span>Logout</span> </a> </p>
                        <form id="logout-form" action="{{ route('officer.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </nav>

    </div>
</div>