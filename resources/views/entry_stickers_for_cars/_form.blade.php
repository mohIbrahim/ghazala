<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">
	@include('errors.list')

	<div class="form-group">
		{!! Form::label('code', 'كود الملصق الخاص بالسيارة') !!}<span style="color: red"> *</span>
		{!! Form::text('code', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل كود الملصق الخاص بالسيارة']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('owner_id', 'اسم مالك الوحدة') !!}<span style="color: red"> *</span>
		{!! Form::select('owner_id', $ownersIDs, null, [ 'class'=>'form-control', 'placeholder'=>'أختار اسم مالك الوحدة']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('car_owner', 'اسم المالك الفعلي للسيارة') !!}<span style="color: red"> *</span>
		{!! Form::text('car_owner', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم المالك الفعلي للسيارة']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('release_date', 'تاريخ الإصدار') !!}<span style="color: red"> *</span>
		<p>(تنسيق التاريخ   (سنة/ يوم / شهر </p>
		{!! Form::text('release_date',
		 				isset($membershipCard->release_date)? $membershipCard->release_date->format('m/d/Y'):null,
		 ['id'=>'datepicker', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ الإصدار']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('plate_number', 'رقم لوحة السيارة') !!}<span style="color: red"> *</span>
		{!! Form::text('plate_number', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم لوحة السيارة']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('the_manufacture_company', 'اسم الشركة المصنعة للسيارة') !!}<span style="color: red"> *</span>
		{!! Form::text('the_manufacture_company', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم الشركة المصنعة للسيارة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('type', 'تصنيف السيارة') !!}
		{!! Form::select('type',[	
									'2 doors hatchback'=>'2 doors hatchback',
									'2 doors sedan'=> '2 doors sedan',
									'4 doors hatchback'=> '4 doors hatchback',
									'4 doors sedan'=> '4 doors sedan',
								] , null, [ 'class'=>'form-control', 'placeholder'=>'أختار تصنيف السيارة']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('model', 'موديل السيارة') !!}
		{!! Form::text('model', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل موديل السيارة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('color', 'لون السيارة') !!}
		{!! Form::text('color', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل لون السيارة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('status', 'السماح بدخول السيارة') !!}<span style="color: red"> *</span>
		{!! Form::select('status',[1=>'مسموح', 0=> 'غير مسموح'] , null, [ 'class'=>'form-control', 'placeholder'=>'أختار السماح او عدم السماح دخول السيارة']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('comments', 'التعليقات') !!}
		{!! Form::textarea('comments', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل تعليقاً']) !!}
	</div>
	

	
	<button type="submit" class="btn btn-primary">حفظ</button>
</div>