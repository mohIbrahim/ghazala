@extends('layouts.app')
@section('title')
 تعديل عقد الإيجار {{$rentingContract->id}}
@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">		
		<div class="panel panel-info text-right">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>  {{$rentingContract->id}} :تعديل عقد الإيجار</strong></h3>
			</div>
			<div class="panel-body">				
				{!! Form::model($rentingContract,['method'=>'PATCH', 'action'=>['RentingContractsController@update', 'id'=>$rentingContract->id], 'files'=>true]) !!}
					@include('renting_contracts._form')
				{!! Form::close() !!}				
			</div>
		</div>
	</div>
@endsection