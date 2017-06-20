<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">
	@include('errors.list')
	<div class="form-group">
		{!! Form::label('name', 'اسم العضو') !!}<span style="color: red"> *</span>
		{!! Form::text('name', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم المالك']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('owner_id', 'اسم مالك الوحدة') !!}<span style="color: red"> *</span>
		{!! Form::select('owner_id', $ownersIDs, null, [ 'class'=>'form-control selectpicker', 'placeholder'=>'أختار اسم مالك الوحدة', 'data-live-search'=>'true']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('date_of_birth', 'تاريخ الميلاد') !!}
		<p>(تنسيق التاريخ   (سنة/ يوم / شهر </p>
		{!! Form::text('date_of_birth',
		 				isset($member->date_of_birth)? $member->date_of_birth->format('m/d/Y'):null,
		 ['id'=>'datepicker', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ الميلاد']) !!}
	</div>
	
	<button type="submit" class="btn btn-primary">حفظ</button>
</div>

