@extends('layouts.app')
@section('title')
	المستأجر {{$renter->name}}
@endsection
@section('head')

@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1  col-lg-10 col-lg-offset-1">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$renter->name}} :المستأجر</strong></h3>
			</div>
			<div class="panel-body">
				
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">				
					
					<div class="bs-callout bs-callout-info">
						
						<div class="table-responsive ">
							<table class="table table-striped table-condensed table-hover">
								<tbody class="text-right">
										<tr>
											<td>{{ $renter->name }}</td>
											<td><strong>:اسم المستأجر</strong></td>
										</tr>
										<tr>
											<td>
												@foreach($renter->units as $unit)
													<p><a href="{{ action('UnitsController@show', ['id'=>$unit->id]) }}" target="_blank">{{ $unit->code }}</a></p>
												@endforeach
											</td>
											<td><strong>: أرقام الوحدات</strong></td>
										</tr>

										<tr>
											<td>{{ $renter->ssn }}</td>
											<td><strong>:رقم البطاقة</strong></td>
										</tr>

										

										<tr>
											<td>{{ $renter->mobile_1 }}</td>
											<td><strong>:رقم الموبيل 1</strong></td>
										</tr>

										<tr>
											<td>{{ $renter->mobile_2 }}</td>
											<td><strong>:رقم الموبيل 2</strong></td>
										</tr>

										<tr>
											<td>{{ $renter->telephone }}</td>
											<td><strong>:رقم التليفون الارضي</strong></td>
										</tr>

										<tr>
											<td>{{ $renter->email }}</td>
											<td><strong>:البريد الإلكتروني الشخصي</strong></td>
										</tr>

										

										<tr>
											<td>{{ $renter->address }}</td>
											<td><strong>:العنوان</strong></td>
										</tr>

										<tr>
											<td>{{ $renter->occupation }}</td>
											<td><strong>:المهنة</strong></td>
										</tr>										

										<tr>
											<td>{{ $renter->comments }}</td>
											<td><strong>:التعليقات</strong></td>
										</tr>
										
										<tr>
											<td>
												@if($renter->creator)
													{{ $renter->creator->name }}
												@endif
											</td>
											<td><strong>: اسم منشئ المحتوى</strong></td>
										</tr>

										<tr>
											<td>{{ $renter->created_at }}</td>
											<td><strong>:وقت و تاريخ الإنشاء</strong></td>
										</tr>

										<tr>
											<td>{{ $renter->updated_at }}</td>
											<td><strong>:وقت و تاريخ التعديل</strong></td>
										</tr>			
										
										@if(in_array('update_renters', $permissions))
											<tr>
												<td><a href="{{action('RentersController@edit',['slug'=>$renter->slug])  }}">تعديل</a></td>
												<th>:تعديل</th>
											</tr>
										@endif
										@if(in_array('delete_renters', $permissions))
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
		</div>
		
	</div>


@include('partial.deleteConfirm',['name'=>$renter->name,
										'id'=>$renter->id,
										'message'=>'هل انت متأكد تريد حذف المستأجر',
										'route'=>'RentersController@destroy'])
	 
@endsection
