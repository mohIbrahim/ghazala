@extends('layouts.app')
@section('title')
 تعديل الموظف {{$employee->name}}
@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">		
		<div class="panel panel-info text-right">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>  {{$employee->name}} :تعديل الموظف</strong></h3>
			</div>
			<div class="panel-body">				
				{!! Form::model($employee,['method'=>'PATCH', 'action'=>['EmployeesController@update', 'id'=>$employee->id], 'files'=>true]) !!}
					@include('employees._form')
				{!! Form::close() !!}				
			</div>
		</div>
	</div>
@endsection