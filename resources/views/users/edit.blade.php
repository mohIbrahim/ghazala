@extends('layouts.app')
@section('title')
	Edit profile
@endsection
@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Edit profile</h3>
		</div>
			<div class="panel-body ">
				@include('errors.list')
					
					{!! Form::model($user, ['method'=>'PATCH', 'action'=>['UserController@update',$user->id], 'files'=>true])!!}
						@include('users._form')
					{!! Form::close() !!}
			</div>
		</div>

	</div>
@stop
