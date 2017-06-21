<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2 ">

	@include('errors.list')

	<div class="form-group">
		{!! Form::label('unit_id', 'كود الوحدة') !!}<span style="color: red"> *</span>
		{!! Form::select('unit_id', $unitsCodes, null, ['class'=>'form-control selectpicker','data-live-search'=>'true', 'placeholder'=>'أختار كود الوحدة']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('renter_id', 'اسم المستأجر') !!}<span style="color: red"> *</span>
		{!! Form::select('renter_id', $rentersNames, null, ['class'=>'form-control selectpicker','data-live-search'=>'true', 'placeholder'=>'أختار اسم المستأجر']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('from', 'تاريخ بداية العقد') !!}
		<p>(تنسيق التاريخ   (سنة/ يوم / شهر </p>
		{!! Form::text('from',
		 				isset($rentingContract->from)? $rentingContract->from->format('m/d/Y'):null,
		 ['id'=>'datepicker', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ بداية العقد']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('to', 'تاريخ نهاية العقد') !!}
		<p>(تنسيق التاريخ   (سنة/ يوم / شهر </p>
		{!! Form::text('to',
		 				isset($rentingContract->to)? $rentingContract->to->format('m/d/Y'):null,
		 ['id'=>'datepicker2', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تاريخ نهاية العقد']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('soft_copy', 'صورة من عقد إيجار الوحدة') !!}
		<p class="text-right">.pdf إدخل صورة من عقد الإيجار بالامتداد</p>
		{!! Form::file('soft_copy', ['class'=>'form-control text-right', 'placeholder'=>' إدخل صورة من عقد الإيجار بالامتداد PDF']) !!}
	</div>

	@if(isset($rentingContract->soft_copy))
		<div class="form-group">
			<div class="row">
				
				<div class="col-md-2">
					<div class="checkbox">
						<h3>
							<a href="{{asset('images/renting_contracts_images/'.$rentingContract->soft_copy)}}"> العقد</a>
						</h3>	
							<input name="contractToDelete" type="checkbox" value="{{$rentingContract->soft_copy}}">
							قم بوضع علامة لحــذف العقد
					</div>
				</div>
				
			</div>
		</div>
	@endif

	<div class="form-group">
		{!! Form::label('comments', 'التعليقات') !!}
		{!! Form::textarea('comments', null, ['id'=>'datepicker2', 'class'=>'form-control text-right', 'placeholder'=>' إدخل تعليقاً']) !!}
	</div>

	
	<button type="submit" class="btn btn-primary">حفظ</button>
</div>
