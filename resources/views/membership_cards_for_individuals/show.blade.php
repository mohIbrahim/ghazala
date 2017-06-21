@extends('layouts.app')
@section('title')
	الكارت {{$membershipCard->serial}}
@endsection

@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1  col-lg-10 col-lg-offset-1">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center arabic-direction"><strong> الكارت:{{$membershipCard->serial}} </strong></h3>
			</div>
			<div class="panel-body">					
						
				<div class="table-responsive arabic-direction">
					<table class="table table-striped table-condensed table-hover">
						<tbody class="text-right">
								<tr>
									<td><strong>الكود الكارت:</strong></td>
									<td>{{ $membershipCard->serial }}</td>
								</tr>

								<tr>
									<td><strong>كود الوحدة:</strong></td>
									<td>
										@if($membershipCard->unit)
											<a href="{{ action('UnitsController@show', ['id'=>$membershipCard->unit->id]) }}" target="_blank"> 
												{{ $membershipCard->unit->code }}
											</a>
										@endif
									</td>
								</tr>

								<tr>
									<td><strong>اسم مالك الوحدة:</strong></td>
									<td>
										@if($membershipCard->owner)
											<a href="{{ action('OwnersController@show', ['slug'=>$membershipCard->owner->slug]) }}" target="_blandk"> 
												{{ $membershipCard->owner->name }}
											</a>
										@endif
									</td>
								</tr>

								<tr>
									<td><strong>نوع الكارت:</strong></td>
									<td>{{ $membershipCard->type }}</td>
								</tr>

								<tr>
									<td><strong>تاريخ الإصدار:</strong></td>
									<td>{{ ($membershipCard->release_date)?$membershipCard->release_date->format('d-m-Y') : "" }}</td>
								</tr>

								<tr>
									<td><strong>حالة الكارت:</strong></td>
									<td>{{ ($membershipCard->status)? "فعّال":"غير فعّال" }}</td>
								</tr>

								<tr>
									<td><strong>هل تم تسليم الكارت؟</strong></td>
									<td>{{ ($membershipCard->delivered)? "نعم" : "لا" }}</td>
								</tr>

								<tr>
									<td><strong>تاريخ تسليم الكارت:</strong></td>
									<td>{{ ($membershipCard->delivered_date)? $membershipCard->delivered_date->format('d-m-Y'): '' }}</td>
								</tr>

								<tr>
									<td><strong>التعليقات:</strong></td>
									<td>{{ $membershipCard->comments }}</td>
								</tr>

								<tr>
									<td><strong>إنشاء من قبل المستخدم:</strong></td>
									<td>{{ $membershipCard->creator->name }}</td>
								</tr>

								<tr>
									<td><strong>تاريخ و وقت الإنشاء:</strong></td>
									<td>{{ $membershipCard->created_at }}</td>
								</tr>

								<tr>
									<td><strong>تاريخ و وقت التعديل:</strong></td>
									<td>{{ $membershipCard->updated_at }}</td>
								</tr>





												
								
								@if(in_array('update_membership_cards_for_individuals', $permissions))
									<tr>
										<td><strong>تعديل:</strong></td>
										<td><a href="{{action('MembershipCardsForIndividualsController@edit',['id'=>$membershipCard->id])  }}">تعديل</a></td>
									</tr>
								@endif
								@if(in_array('delete_membership_cards_for_individuals', $permissions))
									<tr>
										<td><strong>حذف:</strong></td>
										<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف الوحدة</button></td>
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
