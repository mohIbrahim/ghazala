<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">
	@include('errors.list')
	<div class="form-group">
		{!! Form::label('name', 'اسم الوظيفة') !!}<span style="color: red"> *</span>
		{!! Form::text('name', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم الوظيفة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('department', 'اسم القسم الذي تتبعة هذه الوظيفة') !!}<span style="color: red"> *</span>
		{!! Form::text('department', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم القسم']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('descriptions', 'وصف الوظيفة') !!}
		{!! Form::textarea('descriptions', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل وصف الوظيفة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('comments', 'التعليقات') !!}
		{!! Form::textarea('comments', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل تعليقاً']) !!}
	</div>
	<button type="submit" class="btn btn-primary">حفظ</button>
</div>

