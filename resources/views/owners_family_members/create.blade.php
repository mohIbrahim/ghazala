@extends('layouts.app')
@section('title')
 إنشاء عضو عائلة جديد
@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">		
		<div class="panel panel-info text-right">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong>إنشاء عضو عائلة جديد</strong></h3>
			</div>
			<div class="panel-body">				
				{!! Form::open(['method'=>'POST', 'action'=>'OwnersFamilyMembersController@store', 'files'=>true]) !!}
					@include('Owners_family_members._form')
				{!! Form::close() !!}				
			</div>
		</div>
	</div>
@endsection