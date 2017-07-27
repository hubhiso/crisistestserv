@if(Auth::guard('officer')->check())
<div class="field is-grouped">
    <p class="control is-expanded has-icons-left ">
        กรุณาระบุสถาณะของท่าน
        <label class="radio">
            {{ Form::radio('sender_case', '3' , true) }}  <a >เจ้าหน้าที่แจ้ง</a>
        </label>
    </p>
</div>

<hr>
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">ชื่อผู้แจ้ง</label>
    </div>
    <div class="field-body">
        <div class="field is-grouped">
            <p class="control is-expanded has-icons-left ">
                {!! Form::text('sender',null,['class'=>'input','placeholder'=>'ชื่อเรียก']) !!}
                <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
        <div class="field-label is-normal">
            <label class="label">เบอร์มือถือผู้แจ้ง</label>
        </div>
        <div class="field">
            <p class="control is-expanded has-icons-left">
                {!! Form::text('agent_tel',null,['class'=>'input','placeholder'=>'เลขหมาย 10 หลัก']) !!}
                <span class="icon  is-left"> <i class="fa fa-mobile"></i> </span>
            </p>
        </div>
    </div>
</div>

@else
<div class="field is-grouped">
    <p class="control is-expanded has-icons-left ">
        กรุณาระบุสถาณะของท่าน
        <label class="radio">
            {{ Form::radio('sender_case', '1' , true) }}  <a >ผู้ถูกกระทำ</a>
        </label>
        <label class="radio">
            {{ Form::radio('sender_case', '2' , false) }} <a >ผู้แจ้งแทน</a>
        </label>
    </p>
</div>

<hr>
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">ชื่อผู้แจ้ง</label>
    </div>
    <div class="field-body">
        <div class="field is-grouped">
            <p class="control is-expanded has-icons-left ">
                {!! Form::text('sender',null,['class'=>'input','placeholder'=>'ชื่อเรียก']) !!}
                <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
        <div class="field-label is-normal">
            <label class="label">เบอร์มือถือผู้แจ้ง</label>
        </div>
        <div class="field">
            <p class="control is-expanded has-icons-left">
                {!! Form::text('agent_tel',null,['class'=>'input','placeholder'=>'เลขหมาย 10 หลัก']) !!}
                <span class="icon  is-left"> <i class="fa fa-mobile"></i> </span>
            </p>
        </div>
    </div>
</div>

@endif