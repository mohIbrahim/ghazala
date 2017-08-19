@extends('layouts.app')
@section('title')
	عرض كل الوظائف
@endsection
@section('content')
	<div class="">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong>عرض كل الوظائف</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>								
							
								<th>تاريخ و وقت التعديل</th>
								<th>تاريخ و وقت الإنشاء</th>
								<th>إنشاء من قبل المستخدم</th>
								
								<th>التعليقات</th>								
								<th>اسم القسم</th>
							</tr>
							
						</thead>
						<tbody>
							@foreach($departments as $department)
								<tr>
									
									<td>{{ $department->updated_at }}</td>
									<td>{{ $department->created_at }}</td>
									<td>
										@if($department->creator)
											{{ $department->creator->name }}
										@endif
									</td>									
									
									<td>{{ $department->comments }}</td>							
									<td>
										<a href="{{ action('DepartmentsController@show', ['id'=>$department->id]) }}" target="_blank">
											{{ $department->name }}
										</a>
									</td>
									
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
						{{ $departments->links() }}
			</div>
		</div>
		
	</div>

	 
@endsection