@extends('layouts.app')
@section('title')
	الوظيفة  {{$job->name}}
@endsection
@section('content')
	<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  col-lg-6 col-lg-offset-3">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$job->name}} :الوظيفة</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive ">
					<table class="table table-striped  table-condensed text-center">
						
						
						<tbody>

								<tr>
									<td>{{ $job->name }}</td>
									<th>:اسم الوظيفة</th>
								</tr>

								<tr>
									<td>{{ $job->department }}</td>
									<th>:اسم القسم</th>
								</tr>

								

								<tr>
									<td>{{ $job->descriptions }}</td>
									<th>:وصف الوظيفة</th>
								</tr>

								<tr>
									<td>{{ $job->comments }}</td>
									<th>:التعليقات</th>
								</tr>
								

								<tr>
									<td>{{ $job->created_at }}</td>
									<th>:تاريخ و وقت الإنشاء</th>
								</tr>	

								<tr>
									<td>{{ $job->updated_at }}</td>
									<th>:تاريخ و وقت التعديل</th>
								</tr>					
								
								@if(in_array('update_jobs', $permissions))
									<tr>
										<td><a href="{{action('JobsController@edit',['id'=>$job->id])  }}">تعديل</a></td>
										<th>:تعديل</th>
									</tr>
								@endif
								@if(in_array('delete_jobs', $permissions))
									<tr>
										<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف الوظيفة</button></td>
										<th>:حذف</th>
									</tr>
								@endif
							
						</tbody>
					</table>
				</div>
						
			</div>
		</div>
		
	</div>


@include('partial.deleteConfirm',['name'=>$job->name,
										'id'=>$job->id,
										'message'=>'هل انت متأكد تريد حذف الوظيفة',
										'route'=>'JobsController@destroy'])
	 
@endsection
