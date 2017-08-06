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
								<th>وصف الوظيفة</th>
								<th>اسم القسم</th>
								<th>اسم الوظيفة</th>
							</tr>
							
						</thead>
						<tbody>
							@foreach($jobs as $job)
								<tr>
									
									<td>{{ $job->updated_at }}</td>
									<td>{{ $job->created_at }}</td>
									<td>
										@if($job->creator)
											{{ $job->creator->name }}
										@endif
									</td>									
									
									<td>{{ $job->comments }}</td>								
									<td>{{ $job->descriptions }}</td>
									<td>{{ $job->department }}</td>								
									<td>
										<a href="{{ action('JobsController@show', ['id'=>$job->id]) }}" target="_blank">{{ $job->name }}</a>
									</td>
									
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
						{{ $jobs->links() }}
			</div>
		</div>
		
	</div>

	 
@endsection