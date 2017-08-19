@extends('layouts.app')
@section('title')
 إنشاء قسم جديد
@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">		
		<div class="panel panel-info text-right">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong>إنشاء قسم جديد</strong></h3>
			</div>
			<div class="panel-body">				
				{!! Form::open(['method'=>'POST', 'action'=>'DepartmentsController@store']) !!}
					@include('departments._form')
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection