<div class="hero-head">
    <div class="container">
    <br>
        <nav class="navbar ">
            <div class="navbar-brand">
                <!--a class="nav-item is-active" href="#">Crisis Response</a-->

                <div class="nav-item">
                    <div class="field is-grouped">
                        <p class="control"> <a id="i-receive" class="button is-small" href="{{ route('officer.show',['mode_id' => "1"]) }}" > <span >ไม่รับเรื่อง</span> </a> </p>
                        <p class="control"> <a id="i-additional" class="button is-small" href="{{ route('officer.show',['mode_id' => "2"]) }}" > <span>ไม่บันทึก</span> </a> </p>
                        <p class="control"> <a id="i-process" class="button is-small" href="{{ route('officer.show',['mode_id' => "3"]) }}" > <span>ไม่ดำเนินการ</span> </a> </p>
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
                        <p class="control">&nbsp;&nbsp; <a class="button is-small is-primary" href="{{ route('officer.logout') }}" onclick="event.preventDefault();
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
<input type="hidden" id="p_id" value="{{ Auth::user()->prov_id }}">
<input type="hidden" id="user_name" value="{{ Auth::user()->name }}">
<input type="hidden" id="p_position" value="{{ Auth::user()->position }}">
<input type="hidden" id="p_area" value="{{ Auth::user()->area_id }}">
