@extends('layouts.app')
@section('title')
	عرض كل الوحدات
@endsection
@section('head')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
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
					<table id="units" class="table table-hover text-center">
						<thead>
							<tr>								
								<td><strong>تاريخ و وقت التعديل</strong></td>
								{{-- <td><strong>تاريخ و وقت الإنشاء</strong></td>
								<td><strong>إنشاء من قبل المستخدم</td</strong>> --}}

								@if(in_array('view_finance', $permissions))
									<td><strong>المديونية المستحقة</strong></td>
								@endif
								<td><strong>هل الوحدة معروضة للإيجار؟</strong></td>
								<td><strong>هل الوحدة للبيع؟</strong></td>
								<td><strong>رقم عداد الكهرباء</strong></td>
								<td><strong>رقم الدور</strong></td>
								<td><strong>العنوان</strong></td>
								
								<td><strong>كود حساب الوحدة</strong></td>
								<td><strong>نوع النموذج</strong></td>
								<td><strong>أسماء المُلاَّك</strong></td>
								<td><strong>كود الوحدة</strong></td>
							</tr>
							
						</thead>
						<tbody>
							@foreach($units as $unit)
								<tr>
									<td>{{ $unit->updated_at }}</td>
									{{-- <td>{{ $unit->created_at }}</td>
									<td>
										@if($unit->creator)
											{{ $unit->creator->name }}
										@endif
									</td> --}}
									@if(in_array('view_finance', $permissions))
										<td>{{ $unit->the_current_unit_debt }}</td>
									@endif
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

	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	
	<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

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



         
	    	$("#units").dataTable( {
	            "paging": false,
	            "searching": false,
	            dom: 'Bfrtip',
		        buttons: [
		        @if(in_array('create_units', $permissions))
		            'copy', 'csv', 'excel', 'print'
		        @endif
		        ]
	        } );



        });
    </script>
@endsection