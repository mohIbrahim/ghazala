@extends('layouts.app')
@section('title')
	عرض كل أعضاء عائلات المُلاّك
@endsection
@section('content')
	<div class="">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong>عرض كل أعضاء عائلات المُلاّك</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>								
								<th>تعديل</th>
								<th>تاريخ و وقت التعديل</th>
								<th>تاريخ و وقت الإنشاء</th>
								<th>إنشاء من قبل المستخدم</th>
								
								<th>سن العضو</th>
								<th>اسم المالك</th>
								<th>اسم العضو</th>
							</tr>
							
						</thead>
						<tbody>
							@foreach($members as $member)
								<tr>
									<td>
										@if(in_array('update_owners_family_members', $permissions))
											<a href="{{action('OwnersFamilyMembersController@edit',['slug'=>$member->slug])  }}">تعديل</a>
										@endif
									</td>
									<td>{{ $member->updated_at }}</td>
									<td>{{ $member->created_at }}</td>
									<td>
										@if($member->creator)
											{{ $member->creator->name }}
										@endif
									</td>									
									<td>
										@if($member->date_of_birth)
											{{ $member->date_of_birth->age }}
										@endif
									</td>
									<td>
										<a href="{{ action('OwnersController@show', ['slug'=>$member->owner->slug]) }}" target="_blank">{{ $member->owner->name }}</a>
									</td>									
									<td>
										<a href="{{ action('OwnersFamilyMembersController@show', ['slug'=>$member->slug]) }}" target="_blank">{{ $member->name }}</a>
									</td>
									
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
						{{ $members->links() }}
			</div>
		</div>
		
	</div>

	 
@endsection