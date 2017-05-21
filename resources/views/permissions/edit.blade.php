@extends('layouts.app')
@section('title')
	Edit Permission
@endsection
@section('content')
	<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Update Permission</h3>
		</div>
			<div class="panel-body ">

				@include('errors.list')

				{{ Form::model($permission,['method'=>'PATCH','action'=>['PermissionController@update', 'id'=>$permission->id]]) }}
					@include('permissions._form')
				{{ Form::close()}}

						


			</div>
		</div>

	</div>
</div>
@stop