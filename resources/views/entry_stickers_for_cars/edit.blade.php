@extends('layouts.app')
@section('title')
 تعديل ملصق دخول السيارة  {{$entrySticker->code}}
@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">		
		<div class="panel panel-info text-right">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>  {{$entrySticker->code}} :تعديل ملصق دخول السيارة</strong></h3>
			</div>
			<div class="panel-body">				
				{!! Form::model($entrySticker,['method'=>'PATCH', 'action'=>['EntryStickersForCarsController@update', 'id'=>$entrySticker->id]]) !!}
					@include('entry_stickers_for_cars._form')
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection