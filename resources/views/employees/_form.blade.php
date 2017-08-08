<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">
	@include('errors.list')
	<div class="form-group">
		{!! Form::label('name', ' الاسم ') !!}<span style="color: red"> *</span>
		{!! Form::text('name', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم الموظف']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('jobs[]', ' الوظيفة ') !!}<span style="color: red"> *</span>
		{!! Form::select('jobs[]', $jobs, null, ['class'=>'form-control text-right', 'id'=>'select2', 'multiple']) !!}
	</div>
	{{(request()->name)}}

	<div class="form-group">
		{!! Form::label('phone', ' رقم التليفون') !!}<span style="color: red"> *</span>
		{!! Form::text('phone', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم التليفون']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('ssn', 'رقم البطاقة') !!}
		{!! Form::text('ssn', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم البطاقة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('city', ' المدينة ') !!}
		{!! Form::select('city', $cities, null, ['class'=>'form-control text-right selectpicker', 'placeholder'=>' أختر اسم المدينة', 'data-live-search'=>'true']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('address', 'العنوان') !!}
		{!! Form::textarea('address', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل العنوان']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('gender', ' الجنس ') !!}
		{!! Form::select('gender',  ['male'=>'ذكر', 'female'=>'أنثى'] , null , ['class'=>'form-control text-right', 'placeholder'=>' أختر الجنس']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('date_of_birth', 'تاريخ الميلاد') !!}
		<p>(تنسيق التاريخ   (سنة/ يوم / شهر </p>
		{!! Form::text('date_of_birth',
		 				isset($employee->date_of_birth)? $employee->date_of_birth->format('m/d/Y'):null,
		 ['id'=>'datepicker', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ الميلاد']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('contact_person_name', 'اسم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول الموظف') !!}
		{!! Form::text('contact_person_name', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل اسم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول الموظف']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('contact_person_phone', 'رقم تليفون الشخص الذي يمكن الاتصال به فى حالة عدم الوصول الموظف') !!}
		{!! Form::text('contact_person_phone', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل رقم تليفون الشخص الذي يمكن الاتصال به فى حالة عدم الوصول الموظف']) !!}
	</div>


	<div class="form-group">
		{!! Form::label('personal_image', 'الصورة الشخصية') !!}
		{!! Form::file('personal_image', ['class'=>'form-control text-right', 'placeholder'=>' إدخل الصورة الشخصية']) !!}
	</div>

	@if(isset($employee->personal_image) && $employee->personal_image !== "no_image.png")
		<div class="form-group">
			<div class="row">
				
				<div class="col-md-2">
					<div class="checkbox">
						<label>
							<img src="{{asset('images/employee_images/'.$employee->personal_image)}}" class="img-responsive" alt="Image">
							<input name="imageToDelete" type="checkbox" value="{{$employee->personal_image}}">
							قم بوضع علامة لحــذف الصورة
						</label>
					</div>
				</div>
				
			</div>
		</div>
	@endif

	<div class="form-group">
		{!! Form::label('date_of_hiring', 'تاريخ التعيين') !!}
		<p>(تنسيق التاريخ   (سنة/ يوم / شهر </p>
		{!! Form::text('date_of_hiring',
		 				isset($employee->date_of_hiring)? $employee->date_of_hiring->format('m/d/Y'):null,
		 ['id'=>'datepicker2', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ التعيين']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('salary', ' قيمة الراتب ') !!}
		{!! Form::text('salary', null, ['class'=>'form-control text-right', 'placeholder'=>' إدخل قيمة الراتب']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('status', ' الحالة الوظيفية ') !!}
		{!! Form::select('status',  [1=>'حالي', 0=>'سابق'] , null , ['class'=>'form-control text-right', 'placeholder'=>' أختر الحالة الوظيفية']) !!}
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
				placeholder: "أختر الوظيفة",
			});
		});
		
	</script>
@endsection