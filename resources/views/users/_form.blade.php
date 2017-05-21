<div class="row">
	<div class="col-lg-4 col-lg-offset-1">


		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title">Profile Image</h3>
			</div>
			<div class="panel-body">
				<div class="col-lg-offset-1 col-md-offset-1 col-xs-offset-1">
					<img src="{{ asset('images/users_images/'.$user->personal_image)}}" class="img-responsive"  alt="Image">
					@if($user->personal_image != 'no_image.png')	
						<button type="submit" name="delete_image" class="btn btn-xs btn-danger" value="delete_image">Delete the image</button>
					@endif
				</div>

				<div class="form-group">
					{!! Form::label('personal_image','Change profile image', ['class'=>'label label-success']) !!}
					{!! Form::file('personal_image', ['class'=>'form-control']) !!}
				</div>
			</div>
		</div>


	</div>

	<div class="col-lg-6">

	
		<div class="form-group">
			{!! Form::label('current_password','Current password', ['class'=>'label label-success']) !!}
			{!! Form::password('current_password', ['class'=>'form-control', 'placeholder'=>'Enter your current password']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('name','Full Name', ['class'=>'label label-success']) !!}
			{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter your full name']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email','E-Mail address', ['class'=>'label label-success']) !!}
			{!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Enter your E-Mail address']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password','New password', ['class'=>'label label-success']) !!}
			{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter new password']) !!}	
		</div>

		<div class="form-group">
			{!! Form::label('password_confirmation','New password confirmation', ['class'=>'label label-success']) !!}
			{!! Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Enter new password confirmation']) !!}	
		</div>

		<div class="form-group">
			{!! Form::submit('Save', ['class'=>'btn btn-primary form-control']) !!}
		</div>


	</div>


</div>


