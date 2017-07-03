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
			<div class="row">            
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 pull-right text-right">
                    <div class="form-group">
                        <h4>{!! Form::label('op', 'بحــــث') !!}</h4>
                        {!! Form::text('op', null, ['class'=>'form-control', 'id'=>'op']) !!}
                    </div>
                </div>
            </div>
            
            <div id="search_results">
               {{-- resutls --}}
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>								
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
									<td>{{ $unit->updated_at }}</td>
									<td>{{ $unit->created_at }}</td>
									<td>
										@if($unit->creator)
											{{ $unit->creator->name }}
										@endif
									</td>
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
	
</div>
	 
@endsection


@section('jsFooter')
    <script>
        $(document).ready(function(){
            $('#op').on('keyup',function(){
                var key = $('#op').val();
                $.ajax({
                    url:"{{action('UnitsController@indexAjax')}}",
                    type:"GET",
                    data:"key="+key,
                    dataType:'script',
                    timeout: 3000,
                    beforeSend:function(http){
                        $('#search_results').html('Loading..');
                    },
                    success:function (response, status, http) {
                        $('#search_results').html(response);
                    },
                });
            });
        });
    </script>
@endsection