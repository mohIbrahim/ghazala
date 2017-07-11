@extends('layouts.app')
@section('title')
	العضو  {{$member->name}}
@endsection
@section('content')
	<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  col-lg-6 col-lg-offset-3">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$member->name}} :العضو</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive ">
					<table class="table table-striped  table-condensed text-center">
						
						
						<tbody>

								<tr>
									<td>{{ $member->name }}</td>
									<th>:اسم العضو</th>
								</tr>

								

								<tr>
									<td>{{ $member->date_of_birth->age }}</td>
									<th>:السن</th>
								</tr>

								<tr>
									<td><a href="{{ action('OwnersController@show', ['slug'=>$member->owner->slug]) }}" target="_blank"> {{ $member->owner->name }}</a></td>
									<th>:اسم مالك الوحدة التابع له</th>
								</tr>

								<tr>
									<td>{{ $member->creator->name }}</td>
									<th>:إنشاء من قبل المستخدم</th>
								</tr>

								<tr>
									<td>{{ $member->created_at }}</td>
									<th>:تاريخ و وقت الإنشاء</th>
								</tr>	

								<tr>
									<td>{{ $member->updated_at }}</td>
									<th>:تاريخ و وقت التعديل</th>
								</tr>					
								
								@if(in_array('update_owners_family_members', $permissions))
									<tr>
										<td><a href="{{action('OwnersFamilyMembersController@edit',['slug'=>$member->slug])  }}">تعديل</a></td>
										<th>:تعديل</th>
									</tr>
								@endif
								@if(in_array('delete_owners_family_members', $permissions))
									<tr>
										<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف الوحدة</button></td>
										<th>:حذف</th>
									</tr>
								@endif
							
						</tbody>
					</table>
				</div>
						
			</div>
		</div>
		
	</div>


@include('partial.deleteConfirm',['name'=>$member->name,
										'id'=>$member->id,
										'message'=>'هل انت متأكد تريد حذف العضو',
										'route'=>'OwnersFamilyMembersController@destroy'])
	 
@endsection
