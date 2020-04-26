<nav class="navbar ">
    <div class="navbar-brand">

        <a class="navbar-item" href="{{ route('officer.show',['mode_id' => "1"]) }}" style="text-decoration:none">
            <div class=" tags  ">
                <span class="tag is-light is-rounded"><b>ไม่ได้รับ</b></span>
                <span id="i-receive" class="tag is-danger is-rounded"><b>0</b></span>
            </div>
        </a>

        <a class="navbar-item" href="{{ route('officer.show',['mode_id' => "2"]) }}" style="text-decoration:none">
            <div class=" tags ">
                <span class="tag is-light is-rounded"><b>ไม่บันทึก</b></span>
                <span id="i-additional" class="tag is-warning is-rounded"><b>0</b></span>
            </div>
        </a>
        <a class="navbar-item" href="{{ route('officer.show',['mode_id' => "3"]) }}" style="text-decoration:none">
            <div class=" tags ">
                <span class="tag is-light is-rounded"><b>ไม่ดำเนินการ</b></span>
                <span id="i-process" class="tag is-rounded is-primary"><b>0</b></span>
            </div>
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
            data-target="navMenuDocumentation">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navMenuDocumentation" class="navbar-menu">
        <div class="navbar-end">
            <a class="navbar-item "> <i class="fas fa-user-circle"></i>&nbsp{{ Auth::user()->name }} </a>

            <div class="navbar-item">
                <a class="button navbar-item is-danger" href="{{ route('officer.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('officer.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    </div>
    <input type="hidden" id="p_id" value="{{ Auth::user()->prov_id }}">
    <input type="hidden" id="user_name" value="{{ Auth::user()->name }}">
    <input type="hidden" id="p_position" value="{{ Auth::user()->position }}">
    <input type="hidden" id="p_area" value="{{ Auth::user()->area_id }}">