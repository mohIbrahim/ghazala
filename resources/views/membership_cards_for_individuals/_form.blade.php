<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">
	@include('errors.list')

	<div class="form-group">
		{!! Form::label('serial', 'الكود الخاص بالكارت') !!}<span style="color: red"> *</span>
		{!! Form::text('serial', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل الكود الخاص بالكارت']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('owner_id', 'اسم مالك الوحدة') !!}<span style="color: red"> *</span>
		{!! Form::select('owner_id', $ownersIDs, null, [ 'class'=>'form-control', 'placeholder'=>'أختار اسم مالك الوحدة']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('unit_id', 'كود الوحدة') !!}<span style="color: red"> *</span>
		<p>فى حالة أن المالك يمكن أن يملك أكثر من وحدة برجاء أختيار الوحدة بشكل صحيح</p>
		{!! Form::select('unit_id', $unitsIDs, null, [ 'class'=>'form-control', 'placeholder'=>'أختار كود الوحدة']) !!}
	</div>owner_id


	<div class="form-group">
		{!! Form::label('type', 'نوع الكارت') !!}<span style="color: red"> *</span>
		{!! Form::select('type',['مالك'=>'مالك', 'زائر'=> 'زائر'] , null, [ 'class'=>'form-control', 'placeholder'=>'أختار نوع الكارت']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('release_date', 'تاريخ الإصدار') !!}<span style="color: red"> *</span>
		<p>(تنسيق التاريخ   (سنة/ يوم / شهر </p>
		{!! Form::text('release_date',
		 				isset($membershipCard->release_date)? $membershipCard->release_date->format('m/d/Y'):null,
		 ['id'=>'datepicker', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ الإصدار']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('status', 'حالة الكارت') !!}<span style="color: red"> *</span>
		{!! Form::select('status',[1=>'مفعّال', 0=> 'غير مفعّال'] , null, [ 'class'=>'form-control', 'placeholder'=>'أختار حالة الكارت']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('delivered', 'هل تم تسليم الكارت؟') !!}
		{!! Form::select('delivered',[1=>'نعم', 0=> 'لا'] , null, [ 'class'=>'form-control', 'placeholder'=>'أختار نعم او لا']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('delivered_date', 'تاريخ تسليم الكارت') !!}
		<p>(تنسيق التاريخ   (سنة/ يوم / شهر </p>
		{!! Form::text('delivered_date',
		 				isset($membershipCard->delivered_date)? $membershipCard->delivered_date->format('m/d/Y'):null,
		 ['id'=>'datepicker2', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ تسليم الكارت']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('comments', 'التعليقات') !!}
		{!! Form::textarea('comments', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل تعليقاً']) !!}
	</div>

	
	<button type="submit" class="btn btn-primary">حفظ</button>
</div>