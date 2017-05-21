@extends('layouts/app')
@section('title')
	Create Permission
@endsection
@section('content')

	

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Add New Permission</h3>
		</div>
			<div class="panel-body ">

				@include('errors.list')

				{!! Form::open(['action'=>'PermissionController@store', 'method'=>'POST']) !!}

					@include('permissions._form')

				{!! Form::close() !!}

			


			</div>
		</div>

	</div>
</div>

@stop()