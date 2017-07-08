@extends('layouts.app')
@section('title')
	الوحدة {{$unit->code}}
@endsection
@section('content')
	<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  col-lg-6 col-lg-offset-3">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$unit->code}} :الوحدة</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive ">
					<table class="table table-striped  table-condensed text-center">
						
						
						<tbody>

								<tr>
									<td>{{ $unit->code }}</td>
									<td><strong>:كود الوحدة</strong></td>
								</tr>

								<tr>
									<td>
										@foreach($unit->owners as $owner)
											<p><a href="{{ action('OwnersController@show', ['slug'=>$owner->slug]) }}" target="_blank"> {{ $owner->name }} </a></p>
										@endforeach
									</td>
									<td><strong>:أسماء المُلاَّك</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->model->name }}</td>
									<td><strong>:اسم النموذج</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->unit_account_code }}</td>
									<td><strong>:كود حساب الوحدة</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->address }}</td>
									<td><strong>:عنوان الوحدة</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->direction }}</td>
									<td><strong>:إتجاة الوحدة</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->floor_number }}</td>
									<td><strong>:رقم الدور</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->electricity_meter_number }}</td>
									<td><strong>:رقم عداد الكهرباء</strong></td>
								</tr>

								<tr>
									<td>{{ ($unit->for_sale)?"نعم":"لا" }}</td>
									<td><strong>هل الوحدة للبيع؟</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->sale_details }}</td>
									<td><strong>:تفاصيل البيع</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->sale_price }}</td>
									<td><strong>:سعر البيع</strong></td>
								</tr>

								<tr>
									<td>{{ ($unit->for_rent)? "نعم" : "لا" }}</td>
									<td><strong>هل الوحدة معروضة للإيجار؟</strong></td>
								</tr>

								<tr>
									<td>
										@if($unit->renter)
											<a href="{{ action('RentersController@show', ['slug'=>$unit->renter->slug])}}">
												{{ $unit->renter->name }}
											</a> 
										@endif
									</td>
									<td><strong>اسم المستأجر الحالي</strong></td>
								</tr>

								<tr>
									<td>{{ isset($unit->rent_from)? $unit->rent_from->format('d-m-Y'):"" }}</td>
									<td><strong>:بداية المدة المحددة للإيجار</strong></td>
								</tr>

								<tr>
									<td>{{ isset($unit->rent_to)?$unit->rent_to->format('d-m-Y'):"" }}</td>
									<td><strong>:نهاية المدة المحددة للإيجار</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->rent_price }} EGP</td>
									<td><strong>:سعر الإيجار</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->rent_details }}</td>
									<td><strong>:تفاصيل الإيجار</strong></td>
								</tr>

								<tr>
									<td>

										<div class="row">
											@foreach($unit->images as $image)
												
													<a href="{{ asset('images/unit_images/'.$image->unit_image)}}" >
														<img src="{{ asset('images/unit_images/'.$image->unit_image)}}" alt="..." width="100px">
													</a>
												
											@endforeach
										
										</div>
									</td>
									<td><strong>:الصور</strong></td>
								</tr>



								<tr>
									<td>{{ $unit->comments }}</td>
									<td><strong>:التعليقات</strong></td>
								</tr>

								<tr>
									<td>
										@if($unit->creator)
											{{ $unit->creator->name }}
										@endif
									</td>
									<td><strong>:إنشاء من قبل المستخدم</strong></td>
								</tr>

								<tr>
									<td>{{ $unit->created_at }}</td>
									<td><strong>:تاريخ و وقت الإنشاء</strong></td>
								</tr>	

								<tr>
									<td>{{ $unit->updated_at }}</td>
									<td><strong>:تاريخ و وقت التعديل</strong></td>
								</tr>					
								
								@if(in_array('update_units', $permissions))
									<tr>
										<td><a href="{{action('UnitsController@edit',['id'=>$unit->id])  }}">تعديل</a></td>
										<td><strong>:تعديل</strong></td>
									</tr>
								@endif
								@if(in_array('delete_units', $permissions))
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


@include('partial.deleteConfirm',['name'=>$unit->code,
										'id'=>$unit->id,
										'message'=>'هل انت متأكد تريد حذف الوحدة',
										'route'=>'UnitsController@destroy'])
	 
@endsection
