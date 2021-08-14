
<div id="tabradio" class="field is-grouped">
    <p class="control is-expanded has-icons-left ">
        กรุณาระบุสถานะของท่าน
        <label class="radio">
            {{ Form::radio('sender_case', '1' , true) }}  <a >ผู้ถูกกระทำ</a>
        </label>
        <label class="radio">
            {{ Form::radio('sender_case', '2' , false) }} <a >ผู้แจ้งแทน</a>
        </label>
    </p>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">{{ trans('message.txt_inf_name') }}</label>
    </div>
    <div class="field-body">
        <div class="field is-grouped">
            <p class="control is-expanded has-icons-left ">
                <input name="sender" id="sender" class="input" type="text" placeholder="{{ trans('message.bt_inf_name') }}"  disabled>
                <span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
        </div>
        <div class="field-label is-normal">
            <label class="label">{{ trans('message.txt_tel') }}</label>
        </div>
        <div class="field">
            <p class="control is-expanded has-icons-left">
                <input name="agent_tel" id="agent_tel" class="input" type="text" placeholder="{{ trans('message.bt_inf_tel') }}" maxlength ="10" disabled>
                <span class="icon  is-left"> <i class="fa fa-mobile-alt"></i> </span>
            </p>
        </div>
    </div>
</div>

