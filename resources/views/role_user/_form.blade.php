@if(isset($permissions) && in_array('create_roles', $permissions))
	<div class="form-group">
		{!! Form::label('name', 'Username: '.$user->name) !!}
	</div>
	<div class="form-group">
		{!! Form::label('role','Chose user Role', ['class'=>'label label-success']) !!}
		{!! Form::select('role', $rolesArray, $user->role, ['class'=>'form-control', 'placeholder'=> 'Select Role']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
	</div>
@endif



