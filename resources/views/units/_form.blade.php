<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">
	@include('errors.list')
	<div class="form-group">
		{!! Form::label('code', ' كود الوحدة ') !!}
		{!! Form::text('code', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل كود الوحدة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('model_id', 'نوع النموذج') !!}
		{!! Form::select('model_id', $modelsNames , null, ['class'=>'form-control selectpicker', 'placeholder'=>'أختر نوع النموذج','data-live-search'=>'true']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('unit_account_code', 'كود حساب الوحدة') !!}
		{!! Form::text('unit_account_code', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل كود حساب الوحدة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('address', 'عنوان الوحدة') !!}
		{!! Form::textarea('address', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل عنوان الوحدة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('direction', 'إتجاة الوحدة') !!}
		{!! Form::select('direction', [
			"قبلي" =>'قبلي',
			"بحري" =>'بحري']
			, null, ['class'=>'form-control ', 'placeholder'=>'أختار إتجاة الوحدة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('floor_number', 'رقم الدور') !!}
		{!! Form::text('floor_number', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم الدور للوحدة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('electricity_meter_number', 'رقم عداد الكهرباء') !!}
		{!! Form::text('electricity_meter_number', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم عداد الكهرباء للوحدة']) !!}
	</div>

	<div class="input_fields_wrap">
		<div class="form-group">
	    	<button class="add_field_button btn btn-xs btn-success">أضف صورة اخرى</button>
			{!! Form::label('images', 'صورة للوحدة') !!}
			{!! Form::file('images[]', ['class'=>'form-control']) !!}
		</div>
	</div>

	@if(isset($unit->images))
		<div class="form-group">
			<div class="row">
				@foreach($unit->images as $image)
					<div class="col-md-2">
						<div class="checkbox">
							<label>
								<img src="{{asset('images/unit_images/'.$image->unit_image)}}" class="img-responsive" alt="Image">
								<input name="imageToDelete[]" type="checkbox" value="{{$image->unit_image}}">
								قم بوضع علامة لحــذف الصورة
							</label>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	@endif
	
	<div class="jumbotron">
		<div class="container">
			<h3 class="text-center">عرض الوحدة للبيع</h3>
			<span style="color: red">.فى حالة عرض الوحدة للبيع قم بملء هذة الحقول
			</span>
			<div class="form-group">
				{!! Form::label('for_sale', 'هل الوحدة للبيع؟') !!}
				{!! Form::select('for_sale', [
					1 =>'نعم',
					0 =>'لا']
					, null, ['class'=>'form-control ', 'placeholder'=>'أختار نعم أو لا']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('sale_details', ' تفاصيل البيع ') !!}
				{!! Form::textarea('sale_details', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل تفاصيل البيع']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('sale_price', ' سعر البيع ') !!}
				{!! Form::text('sale_price', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل سعر البيع']) !!}
			</div>
			
		</div>
	</div>

	<div class="jumbotron">
		<div class="container">
			<h3 class="text-center"> عرض الوحدة للإيجار أو مستأجرة بالفعل</h3>
			<span style="color:red">.فى حالة عرض الوحدة للإيجار أو تكون مستأجرة بالفعل قم بملء هذة الحقول</span>
			<div class="form-group">
				{!! Form::label('for_rent', 'هل الوحدة معروضة للإيجار؟') !!}
				{!! Form::select('for_rent', [
					1 =>'نعم',
					0 =>'لا']
					, null, ['class'=>'form-control ', 'placeholder'=>'أختار نعم أو لا']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('renter_id', 'اسم المستأجر الحالى') !!}
				{!! Form::select('renter_id', $rentersIDs , null, ['class'=>'form-control selectpicker', 'placeholder'=>'أختر اسم المستأجر', 'data-live-search'=>'true']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('rent_from', 'بداية المدة المحددة للإيجار') !!}
				{!! Form::text('rent_from', 
					isset($unit->rent_from)? $unit->rent_from->format('m/d/Y'):null,
					['id'=>'datepicker', 'class'=>'form-control text-right', 'placeholder'=>'إدخل تاريخ بدء تأجير الوحدة']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('rent_to', 'نهاية المدة المحددة للإيجار') !!}
				{!! Form::text('rent_to', 
						isset($unit->rent_to)? $unit->rent_to->format('m/d/Y'):null,
				 ['id'=>'datepicker2', 'class'=>'form-control text-right', 'placeholder'=>'إدخل تاريخ نهاية تأجير الوحدة']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('rent_price', 'سعر الإيجار') !!}
				{!! Form::text('rent_price', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل سعر الإيجار']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('rent_details', 'تفاصيل الإيجار') !!}
				{!! Form::textarea('rent_details', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل تفاصيل الإيجار']) !!}
			</div>

		</div>
	</div>

	@if(in_array('create_finance', $permissions) || in_array('update_finance', $permissions) )
		<div class="form-group">
			{!! Form::label('the_current_unit_debt', 'مديونية الوحدة الحالية') !!}
			{!! Form::text('the_current_unit_debt', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل مديونية الوحدة الحالية']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('date_of_indebtedness', 'تاريخ المديونية') !!}
			<p>(تنسيق التاريخ   (سنة/ يوم / شهر </p>
			{!! Form::text('date_of_indebtedness',
			 				isset($unit->date_of_indebtedness)? $unit->date_of_indebtedness->format('m/d/Y'):null,
			 ['id'=>'datepicker3', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ المديونية']) !!}
		</div>
	@endif

	<div class="form-group">
		{!! Form::label('comments', 'التعليقات') !!}
		{!! Form::textarea('comments', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل تعليقاً']) !!}
	</div>

	<button type="submit" class="btn btn-primary">حفظ</button>
</div>