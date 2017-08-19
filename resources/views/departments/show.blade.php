@extends('layouts.app')
@section('title')
	القسم  {{$department->name}}
@endsection
@section('content')
	<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  col-lg-6 col-lg-offset-3">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$department->name}} :القسم</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive ">
					<table class="table table-striped  table-condensed text-center">
						
						
						<tbody>

								<tr>
									<td>{{ $department->name }}</td>
									<th>:اسم القسم</th>
								</tr>

								<tr>
									<td>{{ $department->comments }}</td>
									<th>:التعليقات</th>
								</tr>
								

								<tr>
									<td>{{ $department->created_at }}</td>
									<th>:تاريخ و وقت الإنشاء</th>
								</tr>	

								<tr>
									<td>{{ $department->updated_at }}</td>
									<th>:تاريخ و وقت التعديل</th>
								</tr>					
								
								@if(in_array('update_departments', $permissions))
									<tr>
										<td><a href="{{action('DepartmentsController@edit',['id'=>$department->id])  }}">تعديل</a></td>
										<th>:تعديل</th>
									</tr>
								@endif
								@if(in_array('delete_departments', $permissions))
									<tr>
										<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف القسم</button></td>
										<th>:حذف</th>
									</tr>
								@endif
							
						</tbody>
					</table>
				</div>
						
			</div>
		</div>
		
	</div>


@include('partial.deleteConfirm',['name'=>$department->name,
										'id'=>$department->id,
										'message'=>'هل انت متأكد تريد حذف القسم',
										'route'=>'DepartmentsController@destroy'])
	 
@endsection
