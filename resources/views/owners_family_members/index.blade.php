@extends('layouts.app')
@section('title')
	عرض كل الوحدات
@endsection
@section('content')
	<div class="">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong>عرض كل الوحدات</strong></h3>
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

								
								<th>هل الوحدة معروضة للإيجار؟</th>
								<th>هل الوحدة للبيع؟</th>
								<th>رقم عداد الكهرباء</th>
								<th>رقم الدور</th>
								<th>العنوان</th>
								
								<th>كود حساب الوحدة</th>
								<th>نوع النموذج</th>
								<th>أسماء المُلاَّك</th>
								<th>كود الوحدة</th>
							</tr>
							
						</thead>
						<tbody>
							@foreach($units as $unit)
								<tr>
									<td>
										@if(in_array('update_units', $permissions))
											<a href="{{action('UnitsController@edit',['id'=>$unit->id])  }}">تعديل</a>
										@endif
									</td>
									<td>{{ $unit->updated_at }}</td>
									<td>{{ $unit->created_at }}</td>
									<td>{{ $unit->creator->name }}</td>
									<td>{{ ($unit->for_rent)? "نعم":"لا" }}</td>
									<td>{{ ($unit->for_sale)? "نعم":"لا" }}</td>
									<td>{{ $unit->electricity_meter_number }}</td>
									<td>{{ $unit->floor_number }}</td>
									<td>{{ str_limit($unit->address, 30) }}</td>
									<td>{{ $unit->unit_account_code }}</td>


									<td>{{ $unit->model->name }}</td>

									<td>
										@foreach($unit->owners as $owner)
											<p><a href="{{ action('OwnersController@show', ['slug'=>$owner->slug]) }}" target="_blank"> {{ $owner->name }}</a></p>
										@endforeach
									</td>

									<td>
										<a href="{{ action('UnitsController@show', ['id'=>$unit->id]) }}">{{ $unit->code }}</a>
									</td>
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
						{{ $units->links() }}
			</div>
		</div>
		
	</div>

	 
@endsection