<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">
	@include('errors.list')
	<div class="form-group">
		{!! Form::label('name', ' اسم النموذج ') !!}
		{!! Form::text('name', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم النموذج']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('type', 'نوع النموذج') !!}
		{!! Form::select('type', ['شقة'=>'شقة',
			'شقة دوبليكس'=>'شقة دوبليكس',
			'فيلا'=>'فيلا',
			'آخر'=>'آخر']
			, null, ['class'=>'form-control', 'placeholder'=>'أختر نوع النموذج']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('total_area', ' المساحة الكلية للنموذج ') !!}
		{!! Form::text('total_area', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل المساحة الكلية للنموذج بدون علامة الوحدات متر مربع']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('net_area', ' المساحة الصافية للنموذج ') !!}
		{!! Form::text('net_area', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل المساحة الصافية للنموذج بدون علامة الوحدات متر مربع']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('number_of_rooms', ' عدد الغرف بالنموذج ') !!}
		{!! Form::text('number_of_rooms', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل عدد الغرف بالنموذج']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('number_of_floors', ' عدد الطوابق بالنموذج ') !!}
		{!! Form::text('number_of_floors', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل عدد الطوابق بالنموذج']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('number_of_kitchens', ' عدد المطابخ بالنموذج ') !!}
		{!! Form::text('number_of_kitchens', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل عدد المطابخ بالنموذج']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('number_of_toilets', ' عدد دورات المياة بالنموذج ') !!}
		{!! Form::text('number_of_toilets', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل عدد دورات المياة بالنموذج']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('number_of_balconies', ' عدد شُرُفات بالنموذج ') !!}
		{!! Form::text('number_of_balconies', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل عدد شُرُفات بالنموذج']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('finishing_type', 'نوع التشطيب للنموذج') !!}
		{!! Form::select('finishing_type', ['بدون تشطيب'=>'بدون تشطيب',
			'نصف تشطيب'=>'نصف تشطيب',
			'تشطيب كامل'=>'تشطيب كامل',
			'لوكس'=>'لوكس',
			'سوبر لوكس'=>'سوبر لوكس',
			'هاى سوبر لوكس'=>'هاى سوبر لوكس',
			'الترا لوكس'=>'الترا لوكس',
			'سوبر ديلوكس'=>'سوبر ديلوكس']
			, null, ['class'=>'form-control ', 'placeholder'=>'أختر نوع التشطيب']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('garden', 'وجود حدائق بالنموذج') !!}
		{!! Form::select('garden', [
			1=>'يوجد',
			0=>'لا يوجد']
			, null, ['class'=>'form-control ', 'placeholder'=>'أختر وجود او عدم وجود حدائق بالنموذج']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('garden_area', ' مساحة الحديقة ') !!}
		{!! Form::text('garden_area', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل مساحة الحديقة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('pool', 'وجود حمام سباحة بالنموذج') !!}
		{!! Form::select('pool', [
			1 =>'يوجد',
			0 =>'لا يوجد']
			, null, ['class'=>'form-control ', 'placeholder'=>'أختر وجود او عدم وجود حمام سباحة بالنموذج']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('pool_area', ' مساحة حمام سباحة ') !!}
		{!! Form::text('pool_area', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل مساحة حمام سباحة']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('comments', ' التعليقات ') !!}
		{!! Form::textarea('comments', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل تعليقاً']) !!}
	</div>

	<button type="submit" class="btn btn-primary">حفظ</button>

</div>