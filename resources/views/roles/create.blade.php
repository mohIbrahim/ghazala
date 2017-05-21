@extends('layouts/app')
@section('title')
	Create Role
@endsection
@section('content')

	
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Add New Role</h3>
			</div>
				<div class="panel-body ">

				<!-- validation errors -->
				@include('errors.list')

				{!! Form::open( ['action'=>'RoleController@store', 'moethod'=>'post'] ) !!}

					@include('roles._form')
					

				{!!  Form::close() !!}


				</div>
			</div>

		</div>
	

@stop