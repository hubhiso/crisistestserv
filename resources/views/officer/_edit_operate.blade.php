@foreach($operate_datas as $operate_data)

    <div class="field is-horizontal">
    <div class="field-label">
        <!-- Left empty for spacing -->
    </div>
</div>
<div class="notification">
    <div class="field is-normal">
        <p class="subtitle is-5">แก้ไขการดำเนินการ</p>
    </div>




    <div class="field is-horizontal">
        <div class="field-label">
            <label class="label"> วิธีการดำเนินการ </label>
        </div>
        <div class="field-body">
            <div class="field is-grouped">
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox" name="edit_advice" id="edit_advice{{$operate_data->id}}" @if($operate_data->advice == 1 ) checked @endif >
                        ให้คำปรึกษา
                    </label>
                </div>
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox" name="edit_negotiate_individual" id="edit_negotiate_individual{{$operate_data->id}}" @if($operate_data->negotiate_individual == 1 ) checked @endif>
                        เจรจาเป็นรายบุคคล
                    </label>
                </div>
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox" name="edit_negotiate_policy" id="edit_negotiate_policy{{$operate_data->id}}" @if($operate_data->negotiate_policy == 1 ) checked @endif>
                        เจรจาระดับนโยบายขององค์กร
                    </label>
                </div>
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox" name="edit_prosecution" id="edit_prosecution{{$operate_data->id}}" @if($operate_data->prosecution == 1 ) checked @endif>
                        ดำเนินคดี
                    </label>
                </div>
            </div>
        </div>
    </div>




    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">รายละเอียดการดำเนินการ</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <textarea class="textarea" name="edit_operate_detail" id="edit_operate_detail{{$operate_data->id}}" placeholder="กรอกรายละเอียด">{{$operate_data->operate_detail}}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">ผลการดำเนินการ</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <textarea class="textarea" name="edit_operate_result" id="edit_operate_result{{$operate_data->id}}" placeholder="กรอกรายละเอียด">{{$operate_data->operate_result}}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label"></label>
        </div>
        <div class="field-body">
            <div class="field is-grouped">
                <div class="control">
                    <p class="control"> <a class="button is-primary" id="edit_operate_send"  onclick="update_operate({{$operate_data->id}})"> ยืนยัน </a> </p>
                </div>
                <div class="control">
                    <p class="control"> <a class="button" onclick="clear_edit({{$operate_data->id}})" > ยกเลิก </a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<?php
/**
 * Created by PhpStorm.
 * User: tonglar
 * Date: 9/8/2017 AD
 * Time: 12:44 PM
 */