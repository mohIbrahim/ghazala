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
					<table class="table table-striped  table-condensed text-right">

						<thead>
							
						</thead>
						
						<tbody>
								<tr>
									<td>{{ $unit->code }}</td>
									<th>:كود الوحدة</th>
								</tr>

								<tr>
									<td>{{ $unit->model->name }}</td>
									<th>:اسم النموذج</th>
								</tr>

								<tr>
									<td>{{ $unit->unit_account_code }}</td>
									<th>:كود حساب الوحدة</th>
								</tr>

								<tr>
									<td>{{ $unit->address }}</td>
									<th>:عنوان الوحدة</th>
								</tr>

								<tr>
									<td>{{ $unit->direction }}</td>
									<th>:إتجاة الوحدة</th>
								</tr>

								<tr>
									<td>{{ $unit->floor_number }}</td>
									<th>:رقم الدور</th>
								</tr>

								<tr>
									<td>{{ $unit->electricity_meter_number }}</td>
									<th>:رقم عداد الكهرباء</th>
								</tr>

								<tr>
									<td>{{ ($unit->for_sale)?"نعم":"لا" }}</td>
									<th>هل الوحدة للبيع؟</th>
								</tr>

								<tr>
									<td>{{ $unit->sale_details }}</td>
									<th>:تفاصيل البيع</th>
								</tr>

								<tr>
									<td>{{ $unit->sale_price }}</td>
									<th>:سعر البيع</th>
								</tr>

								<tr>
									<td>{{ ($unit->for_rent)? "نعم" : "لا" }}</td>
									<th>هل الوحدة معروضة للإيجار؟</th>
								</tr>

								<tr>
									<td>{{ isset($unit->rent_from)? $unit->rent_from->format('d-m-Y'):"" }}</td>
									<th>:بداية المدة المحددة للإيجار</th>
								</tr>

								<tr>
									<td>{{ isset($unit->rent_to)?$unit->rent_to->format('d-m-Y'):"" }}</td>
									<th>:نهاية المدة المحددة للإيجار</th>
								</tr>

								<tr>
									<td>{{ $unit->rent_price }} EGP</td>
									<th>:سعر الإيجار</th>
								</tr>

								<tr>
									<td>{{ $unit->rent_details }}</td>
									<th>:تفاصيل الإيجار</th>
								</tr>

								<tr>
									<td>{{ $unit->comments }}</td>
									<th>:التعليقات</th>
								</tr>								
								
								@if(in_array('update_units', $permissions))
									<tr>
										<td><a href="{{action('UnitsController@edit',['id'=>$unit->id])  }}">تعديل</a></td>
										<th>:تعديل</th>
									</tr>
								@endif
								@if(in_array('delete_units', $permissions))
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


@include('partial.deleteConfirm',['name'=>$unit->code,
										'id'=>$unit->id,
										'message'=>'هل انت متأكد تريد حذف الوحدة',
										'route'=>'UnitsController@destroy'])
	 
@endsection
