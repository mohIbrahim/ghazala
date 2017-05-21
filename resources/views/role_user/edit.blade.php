@extends('layouts.app')
@section('title')
	Assign Role
@endsection
@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Assign Role</h3>
		</div>
			<div class="panel-body ">
				@include('errors.list')
					
					{!! Form::open(['method'=>'PATCH', 'action'=>['RoleUserController@update',$user->id]])!!}
						@include('role_user._form')
					{!! Form::close() !!}
			</div>
		</div>

	</div>
@stop
