@extends('layouts.app')
@section('title')
الوحدة {{$unit->code}}
@endsection
@section('content')

<div class="col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2  col-lg-8 col-lg-offset-2">

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title text-center"><strong> {{$unit->code}} :الوحدة</strong></h3>
		</div>
		<div class="panel-body">




			<ul class="nav nav-pills pull-right">
				<li><a data-toggle="pill" href="#menu4"><strong>المستأجرين</strong></a></li>
				<li><a data-toggle="pill" href="#menu3"><strong>ملصقات الدخول</strong></a></li>
				<li><a data-toggle="pill" href="#menu2"><strong>كروت الدخول</strong></a></li>
				<li><a data-toggle="pill" href="#menu1"><strong>المُلاَّك</strong></a></li>
				<li class="active"><a data-toggle="pill" href="#home"><strong>الوحدة</strong></a></li>
			</ul>



			

			<div class="tab-content text-center">





				<div id="home" class="tab-pane fade in active">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<span class="arabic-direction">
								<h2> الوحدة {{ $unit->code }}</h2>
							</span>
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
												<td><strong>اسم المستأجر</strong></td>
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
							@include('partial.deleteConfirm',['name'=>$unit->code,
								'id'=>$unit->id,
								'message'=>'هل انت متأكد تريد حذف الوحدة',
								'route'=>'UnitsController@destroy'])
							</div>
						</div>
					</div>





					<div id="menu1" class="tab-pane fade">

						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								
								<div class="panel-body">
									<span class="arabic-direction">
										<h2> المُلاَّك </h2>
									</span>
									@foreach($unit->owners as $owner)

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
																<td>
																	@if($owner->creator)
																	{{ $owner->creator->name }}
																	@endif
																</td>
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
																<td><strong>:تعديل</strong></td>
															</tr>
															@endif
															

														</tbody>
													</table>
													<br>
													<br>													
												</div>

											</div>

										</div>


										<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">				

											<a href="{{ asset('images/owner_images/'.$owner->personal_image) }}" class="thumbnail">
												<img data-src="" alt="" src="{{ asset('images/owner_images/'.$owner->personal_image) }}">
											</a>
										</div>

									@endforeach
								</div>
							</div>
						</div>
					</div>






					<div id="menu2" class="tab-pane fade">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								
								<span class="arabic-direction">
									<h2> الكروت </h2>
								</span>

								<div class="panel-body">					
									@foreach($unit->owners as $owner)
										@foreach($owner->membershipCardsForIndividual as $key=>$membershipCard)

											<div class="table-responsive arabic-direction">
												<table class="table table-striped table-condensed table-hover">
													<tbody class="text-right">
														<span class="label label-warning">{{ ($membershipCard->release_date)?$membershipCard->release_date->format('Y') : "" }}</span>
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
															<td>
																@if($membershipCard->creator)
																	{{ $membershipCard->creator->name }}
																@endif
															</td>
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


													</tbody>
												</table>
											</div>						
										@endforeach
									@endforeach
								</div>								
							</div>
						</div>
					</div>






					<div id="menu3" class="tab-pane fade">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								@foreach($unit->owners as $owner)
									@foreach($owner->entryStickersForCars as $key=>$entrySticker)
										<div class="table-responsive ">
											<table class="table table-striped table-condensed table-hover">
												<tbody class="text-right">
													<tr>
														<td>{{ $entrySticker->code }}</td>
														<td><strong>:كود الملصق الخاص بالسيارة</strong></td>
													</tr>

													<tr>
														<td>{{ $entrySticker->owner->name }}</td>
														<td><strong>:اسم مالك الوحدة</strong></td>
													</tr>

													<tr>
														<td>{{ $entrySticker->car_owner }}</td>
														<td><strong>:اسم المالك الفعلي للسيارة</strong></td>
													</tr>

													<tr>
														<td>{{ $entrySticker->release_date->format('d/m/Y') }}</td>
														<td><strong>:تاريخ الإصدار</strong></td>
													</tr>


													<tr>
														<td>{{ $entrySticker->plate_number }}</td>
														<td><strong>:رقم لوحة السيارة</strong></td>
													</tr>

													<tr>
														<td>{{ $entrySticker->the_manufacture_company }}</td>
														<td><strong>:اسم الشركة المصنعة للسيارة</strong></td>
													</tr>

													<tr>
														<td>{{ $entrySticker->type }}</td>
														<td><strong>:تصنيف السيارة</strong></td>
													</tr>

													<tr>
														<td>{{ $entrySticker->model }}</td>
														<td><strong>:موديل السيارة</strong></td>
													</tr>

													<tr>
														<td>{{ $entrySticker->color }}</td>
														<td><strong>:لون السيارة</strong></td>
													</tr>

													<tr>
														<td>{{ $entrySticker->status }}</td>
														<td><strong>:السماح بدخول السيارة</strong></td>
													</tr>

													<tr>
														<td>{{ $entrySticker->comments }}</td>
														<td><strong>:التعليقات</strong></td>
													</tr>



													@if(in_array('update_entry_stickers_for_cars', $permissions))
													<tr>
														<td><a href="{{action('EntryStickersForCarsController@edit',['id'=>$entrySticker->id])  }}">تعديل</a></td>
														<td><strong>:تعديل</strong></td>
													</tr>
													@endif


												</tbody>
											</table>
										</div>

									@endforeach
								@endforeach					
							</div>
						</div>
					</div>






					<div id="menu4" class="tab-pane fade">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								@if($unit->renter)
									<div class="table-responsive ">
										<table class="table table-striped table-condensed table-hover">
											<tbody class="text-right">
													<tr>
														<td>{{ $unit->renter->name }}</td>
														<td><strong>:اسم المستأجر</strong></td>
													</tr>
													<tr>
														<td>
															@foreach($unit->renter->units as $unit)
																<p><a href="{{ action('UnitsController@show', ['id'=>$unit->id]) }}" target="_blank">{{ $unit->code }}</a></p>
															@endforeach
														</td>
														<td><strong>: أرقام الوحدات</strong></td>
													</tr>

													<tr>
														<td>{{ $unit->renter->ssn }}</td>
														<td><strong>:رقم البطاقة</strong></td>
													</tr>

													

													<tr>
														<td>{{ $unit->renter->mobile_1 }}</td>
														<td><strong>:رقم الموبيل 1</strong></td>
													</tr>

													<tr>
														<td>{{ $unit->renter->mobile_2 }}</td>
														<td><strong>:رقم الموبيل 2</strong></td>
													</tr>

													<tr>
														<td>{{ $unit->renter->telephone }}</td>
														<td><strong>:رقم التليفون الارضي</strong></td>
													</tr>

													<tr>
														<td>{{ $unit->renter->email }}</td>
														<td><strong>:البريد الإلكتروني الشخصي</strong></td>
													</tr>

													

													<tr>
														<td>{{ $unit->renter->address }}</td>
														<td><strong>:العنوان</strong></td>
													</tr>

													<tr>
														<td>{{ $unit->renter->occupation }}</td>
														<td><strong>:المهنة</strong></td>
													</tr>										

													<tr>
														<td>{{ $unit->renter->comments }}</td>
														<td><strong>:التعليقات</strong></td>
													</tr>
													
													<tr>
														<td>
															@if($unit->renter->creator)
																{{ $unit->renter->creator->name }}
															@endif
														</td>
														<td><strong>: اسم منشئ المحتوى</strong></td>
													</tr>

													<tr>
														<td>{{ $unit->renter->created_at }}</td>
														<td><strong>:وقت و تاريخ الإنشاء</strong></td>
													</tr>

													<tr>
														<td>{{ $unit->renter->updated_at }}</td>
														<td><strong>:وقت و تاريخ التعديل</strong></td>
													</tr>			
													
													@if(in_array('update_renters', $permissions))
														<tr>
															<td><a href="{{action('RentersController@edit',['slug'=>$unit->renter->slug])  }}">تعديل</a></td>
															<td><strong>:تعديل</strong></td>
														</tr>
													@endif													
												
											</tbody>
										</table>
									</div>
								@endif
							</div>
						</div>
					</div>






				</div>
			</div>
		</div>
		
	</div>	

@endsection
