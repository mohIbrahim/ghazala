@extends('layouts.app')
@section('title')
	الوحدة {{$unit->code}}
@endsection
@section('content')
	<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  col-lg-6 col-lg-offset-3">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$unit->code}} :الوحدة</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive text-center">
					<table class="table table-hover ">
						
						<tbody>
								<tr>
									<td>{{ $unit->code }}</td>
									<th>كود الوحدة</th>
								</tr>

								<tr>
									<td>{{ $unit->model->name }}</td>
									<th>اسم النموذج</th>
								</tr>

								
								
								@if(in_array('update_units', $permissions))
									<tr>
										<td><a href="{{action('UnitsController@edit',['id'=>$unit->id])  }}">تعديل</a></td>
										<th>تعديل</th>
									</tr>
								@endif
								@if(in_array('delete_units', $permissions))
									<tr>
										<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف الوحدة</button></td>
										<th>حذف</th>
									</tr>
								@endif
							
						</tbody>
					</table>
				</div>
						
			</div>
		</div>
		
	</div>


@include('partial.deleteConfirm',['name'=>$unit->code,
										'id'=>$unit->id,
										'message'=>'هل انت متأكد تريد حذف الوحدة',
										'route'=>'UnitsController@destroy'])
	 
@endsection
