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
		{!! Form::label('address', 'العنوان') !!}
		{!! Form::text('address', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل العنوان']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('occupation', 'المهنة') !!}
		{!! Form::text('occupation', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل المهنة']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('comments', 'التعليقات') !!}
		{!! Form::textarea('comments', null, ['id'=>'datepicker2', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تعليقاً']) !!}
	</div>

	
	<button type="submit" class="btn btn-primary">حفظ</button>





	
</div>

@section('head')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
@section('jsFooter')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$('#select2').select2({
				placeholder: "أختار كود الوحدة",
			});
		});
		
	</script>
@endsection