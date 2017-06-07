@extends('layouts.app')
@section('title')
	المالك {{$owner->name}}
@endsection
@section('head')

@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1  col-lg-10 col-lg-offset-1">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$owner->name}} :المالك</strong></h3>
			</div>
			<div class="panel-body">
				
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">				
					
					<div class="bs-callout bs-callout-info">
						
						<div class="table-responsive ">
							<table class="table table-striped table-condensed table-hover">
								<tbody class="text-right">
										<tr>
											<td>{{ $owner->name }}</td>
											<td><strong>:اسم المالك</strong></td>
										</tr>
										<tr>
											<td>
												@foreach($owner->units as $unit)
													<p><a href="{{ action('UnitsController@show', ['id'=>$unit->id]) }}" target="_blank">{{ $unit->code }}</a></p>
												@endforeach
											</td>
											<td><strong>: أرقام الوحدات</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->ssn }}</td>
											<td><strong>:رقم البطاقة</strong></td>
										</tr>

										<tr>
											<td>{{ ($owner->date_of_birth)? $owner->date_of_birth->format('d-m-Y') : "" }}</td>
											<td><strong>:تاريخ الميلاد</strong></td>
										</tr>

										<tr>
											<td>{{ ($owner->date_of_birth)? $owner->date_of_birth->age : "" }}</td>
											<td><strong>:السن</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->mobile_1 }}</td>
											<td><strong>:رقم الموبيل 1</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->mobile_2 }}</td>
											<td><strong>:رقم الموبيل 2</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->telephone }}</td>
											<td><strong>:رقم التليفون الارضي</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->email }}</td>
											<td><strong>:البريد الإلكتروني الشخصي</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->work_email }}</td>
											<td><strong>:البريد الإلكتروني الخاص بالعمل</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->contact_person_name }}</td>
											<td><strong>:اسم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->contact_person_phone }}</td>
											<td><strong>:رقم تليفون الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->address }}</td>
											<td><strong>:العنوان</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->occupation }}</td>
											<td><strong>:المهنة</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->bank_account_number }}</td>
											<td><strong>:رقم الحساب البنكي</strong></td>
										</tr>

										<tr>
											<td>
												@if($owner->contract_image)
													<a href="{{ asset('images/owner_contracts_images/'.$owner->contract_image) }}" target="_blank">الملف </a>
												@endif
											</td>
											<td><strong>:صورة من عقد بيع الوحدة</strong></td>
										</tr>

										<tr>
											<td>{{ ($owner->contract_date)? $owner->contract_date->format('d-m-Y') : "" }}</td>
											<td><strong>:تاريخ عقد بيع الوحدة</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->owner_status }}</td>
											<td><strong>:وضع المالك</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->comments }}</td>
											<td><strong>:التعليقات</strong></td>
										</tr>
										
										<tr>
											<td>{{ $owner->creator->name }}</td>
											<td><strong>: اسم منشئ المحتوى</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->created_at }}</td>
											<td><strong>:وقت و تاريخ الإنشاء</strong></td>
										</tr>

										<tr>
											<td>{{ $owner->updated_at }}</td>
											<td><strong>:وقت و تاريخ التعديل</strong></td>
										</tr>



														
										
										@if(in_array('update_owners', $permissions))
											<tr>
												<td><a href="{{action('OwnersController@edit',['slug'=>$owner->slug])  }}">تعديل</a></td>
												<th>:تعديل</th>
											</tr>
										@endif
										@if(in_array('delete_owners', $permissions))
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

				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">				
					
					<a href="{{ asset('images/owner_images/'.$owner->personal_image) }}" class="thumbnail">
						<img data-src="" alt="" src="{{ asset('images/owner_images/'.$owner->personal_image) }}">
					</a>


					
				</div>

					
			

						
			</div>
		</div>
		
	</div>


@include('partial.deleteConfirm',['name'=>$owner->name,
										'id'=>$owner->id,
										'message'=>'هل انت متأكد تريد حذف المالك',
										'route'=>'OwnersController@destroy'])
	 
@endsection
