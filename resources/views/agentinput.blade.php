<div class="box" id="data-agent">
			<div class="field is-horizontal">
				<div class="field-label ">
					<!-- Left empty for spacing -->
				</div>
			</div>
			<label class="checkbox ">
  				<input type="checkbox" class="is-medium"> กรุณาระบุหากท่านเป็น <a >ผู้แจ้งแทน</a></label>
			<hr>
			<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">ชื่อ</label>
					</div>
					<div class="field-body">
						<div class="field is-grouped">
							<p class="control is-expanded has-icons-left ">
								{!! Form::text('name',null,['class'=>'input','placeholder'=>'ชื่อเรียก']) !!}
								<span class="icon is-small is-left"> <i class="fa fa-user"></i> </span> </p>
						</div>
						<div class="field-label is-normal">
							<label class="label">เบอร์ติดต่อ</label>
						</div>
						<div class="field">
							<p class="control is-expanded has-icons-left">
								{!! Form::text('phone',null,['class'=>'input','placeholder'=>'เลขหมาย 10 หลัก']) !!}
								<span class="icon  is-left"> <i class="fa fa-mobile"></i> </span>
							</p>
						</div>
					</div>
				</div>
				
				
			<div class="field is-horizontal">
				<div class="field-label">
					<!-- Left empty for spacing -->
				</div>
			</div>
		</div>