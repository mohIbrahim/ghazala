@extends('layouts.app')
@section('title')
	عقد الإيجار {{$rentingContract->id}}
@endsection
@section('head')

@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1  col-lg-10 col-lg-offset-1">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center arabic_direction"><strong>  عقد الإيجار:{{$rentingContract->id}}</strong></h3>
			</div>
			<div class="panel-body">
				
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">				
					
					<div class="bs-callout bs-callout-info">
						
						<div class="table-responsive arabic-direction">
							<table class="table table-striped table-condensed table-hover">
								<tbody class="text-right">
										<tr>
											<td><strong>مسلسل:</strong></td>
											<td>{{ $rentingContract->id }}</td>
										</tr>

										<tr>
											<td><strong>كود الوحدة:</strong></td>
											<td>
												@if($rentingContract->unit)
													<a href="{{ action('UnitsController@show', ['id'=>$rentingContract->unit->id]) }}" target="_blank">
														{{ $rentingContract->unit->code }}
													</a>
												@endif
											</td>
										</tr>

										<tr>
											<td><strong>اسم المستأجر:</strong></td>
											<td>
												@if($rentingContract->renter)
													<a href="{{ action('RentersController@show', ['slug'=>$rentingContract->renter->slug]) }}" target="_blank">
														{{ $rentingContract->renter->name }}
													</a>
												@endif
											</td>
										</tr>

										<tr>
											<td><strong>تاريخ بداية العقد:</strong></td>
											<td>
												@if($rentingContract->from)
													{{ $rentingContract->from->format('d-m-Y') }}
												@endif
											</td>
										</tr>

										<tr>
											<td><strong>تاريخ نهاية العقد:</strong></td>
											<td>
												@if($rentingContract->to)
													{{ $rentingContract->to->format('d-m-Y') }}
												@endif
											</td>
										</tr>

										<tr>
											<td><strong>صورة العقد:</strong></td>
											<td>
												@if($rentingContract->soft_copy)
													<a href="{{ asset('images/renting_contracts_images/'.$rentingContract->soft_copy) }}" target="_blank">
														PDF													
													</a>
												@endif												
											</td>
										</tr>										
										
										<tr>
											<td><strong>اسم منشئ المحتوى:</strong></td>
											<td>
												@if($rentingContract->creator)
													{{ $rentingContract->creator->name }}
												@endif
											</td>
										</tr>

										<tr>
											<td><strong>وقت و تاريخ الإنشاء:</strong></td>
											<td>{{ $rentingContract->created_at }}</td>
										</tr>

										<tr>
											<td><strong>وقت و تاريخ التعديل:</strong></td>
											<td>{{ $rentingContract->updated_at }}</td>
										</tr>			
										
										@if(in_array('update_renting_contracts', $permissions))
											<tr>
												<th>تعديل:</th>
												<td><a href="{{action('RentingContractsController@edit',['id'=>$rentingContract->id])  }}">تعديل</a></td>
											</tr>
										@endif
										@if(in_array('delete_renting_contracts', $permissions))
											<tr>
												<th>حذف:</th>
												<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف الوحدة</button></td>
											</tr>
										@endif
									
								</tbody>
							</table>
						</div>

					</div>
					
				</div>						
			</div>
		</div>
		
	</div>


@include('partial.deleteConfirm',['name'=>$rentingContract->id,
										'id'=>$rentingContract->rentingContract,
										'message'=>'هل انت متأكد تريد حذف العقد رقم',
										'route'=>'RentingContractsController@destroy'])
	 
@endsection
