@extends('layouts.app')
@section('title')
	Edit Role
@endsection
@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Role</h3>
				</div>
				<div class="panel-body ">

					<!-- validation errors -->
					@include('errors.list')

					{!! Form::model($role, ['action'=>['RoleController@update', $role->id], 'method'=>'PATCH'] )!!}

						@include('roles._form')

					{!! Form::close()!!}


				</div>
			</div>

		</div>
	</div>

@stop()