<div class="form-group">

	{!! Form::label('name','Name: ') !!}
	{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter Permission Name']) !!}	

</div>

<div class="form-group">

	{!! Form::label('descriptions','Descriptions: ') !!}
	{!! Form::text('descriptions', null, ['class'=>'form-control', 'placeholder'=>'Enter Permission Descriptions']) !!}	

</div>

<div class="form-group">
	{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}	
</div>



