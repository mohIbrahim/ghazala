@extends('layouts.app')
@section('title')
	إضافة مالك جديد
@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">		
		<div class="panel panel-info text-right">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong>إضافة مالك جديد</strong></h3>
			</div>
			<div class="panel-body">				
				{!! Form::open(['method'=>'POST', 'action'=>'OwnersController@store', 'files'=>true]) !!}
					@include('owners._form')
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
@section('head')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
@section('jsFooter')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			$('#select2').select2({
				placeholder: "أختار كود الوحدة",
			});
		});
		
	</script>
@endsection