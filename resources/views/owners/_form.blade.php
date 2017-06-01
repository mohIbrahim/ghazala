<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">
	@include('errors.list')
	<div class="form-group">
		{!! Form::label('name', ' الاسم ') !!}<span style="color: red"> *</span>
		{!! Form::text('name', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم المالك']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('ssn', 'رقم البطاقة') !!}
		{!! Form::text('ssn', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم البطاقة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('date_of_birth', 'تاريخ الميلاد') !!}
		{!! Form::text('date_of_birth', null, ['id'=>'datepicker', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ الميلاد']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('mobile_1', ' رقم الموبيل 1 ') !!}<span style="color: red"> *</span>
		{!! Form::text('mobile_1', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم الموبيل 1']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('mobile_2', ' رقم الموبيل 2 ') !!}
		{!! Form::text('mobile_2', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم الموبيل 2']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('telephone', ' رقم التليفون الارضي ') !!}
		{!! Form::text('telephone', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم التليفون الارضي']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('email', ' البريد الإلكتروني الشخصي') !!}
		{!! Form::text('email', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل البريد الإلكتروني الشخصي']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('work_email', ' البريد الإلكتروني الخاص بالعمل') !!}
		{!! Form::text('work_email', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل البريد الإلكتروني الخاص بالعمل']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('contact_person_name', 'اسم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك') !!}
		{!! Form::text('contact_person_name', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('contact_person_phone', 'رقم تليفون الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك') !!}
		{!! Form::text('contact_person_phone', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم تليفون الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('address', 'العنوان') !!}
		{!! Form::text('address', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل العنوان']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('occupation', 'المهنة') !!}
		{!! Form::text('occupation', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل المهنة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('bank_account_number', 'رقم الحساب البنكي') !!}
		{!! Form::text('bank_account_number', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم الحساب البنكي']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('personal_image', 'الصورة الشخصية') !!}
		{!! Form::file('personal_image', ['class'=>'form-control text-right', 'placeholder'=>' إدخل الصورة الشخصية']) !!}
	</div>

	@if(isset($owner->personal_image) && $owner->personal_image !== "no_image.png")
		<div class="form-group">
			<div class="row">
				
				<div class="col-md-2">
					<div class="checkbox">
						<label>
							<img src="{{asset('images/owner_images/'.$owner->personal_image)}}" class="img-responsive" alt="Image">
							<input name="imageToDelete" type="checkbox" value="{{$owner->personal_image}}">
							قم بوضع علامة لحــذف الصورة
						</label>
					</div>
				</div>
				
			</div>
		</div>
	@endif


	<div class="form-group">
		{!! Form::label('contract_image', 'صورة من عقد بيع الوحدة') !!}
		<p class="text-right">.pdf إدخل صورة من عقد البيع بالامتداد</p>
		{!! Form::file('contract_image', ['class'=>'form-control text-right', 'placeholder'=>' إدخل صورة من عقد البيع بالامتداد PDF']) !!}
	</div>

	@if(isset($owner->contract_image))
		<div class="form-group">
			<div class="row">
				
				<div class="col-md-2">
					<div class="checkbox">
						<h3>
							<a href="{{asset('images/owner_contracts_images/'.$owner->contract_image)}}"> العقد</a>
						</h3>	
							<input name="contractToDelete" type="checkbox" value="{{$owner->personal_image}}">
							قم بوضع علامة لحــذف العقد
					</div>
				</div>
				
			</div>
		</div>
	@endif

	<div class="form-group">
		{!! Form::label('contract_date', 'تاريخ عقد بيع الوحدة') !!}
		{!! Form::text('contract_date', null, ['id'=>'datepicker2', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ عقد بيع الوحدة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('owner_status', 'وضع المالك') !!}
		{!! Form::select('owner_status', ['مالك حالي'=>'مالك حالي', 'مالك سابق'=>'مالك سابق'] , null, ['class'=>'form-control', 'placeholder'=>'أختر وضع المالك']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('comments', 'التعليقات') !!}
		{!! Form::textarea('comments', null, ['id'=>'datepicker2', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تعليقاً']) !!}
	</div>

	
	<button type="submit" class="btn btn-primary">حفظ</button>
</div>