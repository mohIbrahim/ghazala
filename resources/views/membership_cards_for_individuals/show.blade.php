@extends('layouts.app')
@section('title')
	الكارت {{$membershipCard->serial}}
@endsection

@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1  col-lg-10 col-lg-offset-1">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$membershipCard->serial}} :الكارت</strong></h3>
			</div>
			<div class="panel-body">					
						
				<div class="table-responsive ">
					<table class="table table-striped table-condensed table-hover">
						<tbody class="text-right">
								<tr>
									<td>{{ $membershipCard->serial }}</td>
									<td><strong>:الكود الكارت</strong></td>
								</tr>

								<tr>
									<td>
										<a href="{{ action('UnitsController@show', ['id'=>$membershipCard->unit->id]) }}" target="_blank"> 
											{{ $membershipCard->unit->code }}
										</a>
									</td>
									<td><strong>:كود الوحدة</strong></td>
								</tr>

								<tr>
									<td>
										<a href="{{ action('OwnersController@show', ['slug'=>$membershipCard->owner->slug]) }}" target="_blandk"> 
											{{ $membershipCard->owner->name }}
										</a>
									</td>
									<td><strong>:اسم مالك الوحدة</strong></td>
								</tr>

								<tr>
									<td>{{ $membershipCard->type }}</td>
									<td><strong>:نوع الكارت</strong></td>
								</tr>

								<tr>
									<td>{{ ($membershipCard->release_date)?$membershipCard->release_date->format('d-m-Y') : "" }}</td>
									<td><strong>:تاريخ الإصدار</strong></td>
								</tr>

								<tr>
									<td>{{ ($membershipCard->status)? "فعّال":"غير فعّال" }}</td>
									<td><strong>:حالة الكارت</strong></td>
								</tr>

								<tr>
									<td>{{ ($membershipCard->delivered)? "نعم" : "لا" }}</td>
									<td><strong>هل تم تسليم الكارت؟</strong></td>
								</tr>

								<tr>
									<td>{{ ($membershipCard->delivered_date)? $membershipCard->delivered_date->format('d-m-Y'): '' }}</td>
									<td><strong>:تاريخ تسليم الكارت</strong></td>
								</tr>

								<tr>
									<td>{{ $membershipCard->comments }}</td>
									<td><strong>:التعليقات</strong></td>
								</tr>

								<tr>
									<td>{{ $membershipCard->creator->name }}</td>
									<td><strong>:إنشاء من قبل المستخدم</strong></td>
								</tr>

								<tr>
									<td>{{ $membershipCard->created_at }}</td>
									<td><strong>:تاريخ و وقت الإنشاء</strong></td>
								</tr>

								<tr>
									<td>{{ $membershipCard->updated_at }}</td>
									<td><strong>:تاريخ و وقت التعديل</strong></td>
								</tr>





												
								
								@if(in_array('update_membership_cards_for_individuals', $permissions))
									<tr>
										<td><a href="{{action('MembershipCardsForIndividualsController@edit',['id'=>$membershipCard->id])  }}">تعديل</a></td>
										<td><strong>:تعديل</strong></td>
									</tr>
								@endif
								@if(in_array('delete_membership_cards_for_individuals', $permissions))
									<tr>
										<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف الوحدة</button></td>
										<td><strong>:حذف</strong></td>
									</tr>
								@endif
							
						</tbody>
					</table>
				</div>						
			</div>
		</div>
		
	</div>


@include('partial.deleteConfirm',['name'=>$membershipCard->serial,
										'id'=>$membershipCard->id,
										'message'=>'هل انت متأكد تريد حذف الكارت',
										'route'=>'MembershipCardsForIndividualsController@destroy'])
	 
@endsection
