@extends('layouts.app')
@section('title')
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
			
            
            {!! Form::open(['method'=>'POST', 'action'=>'UnitsDebtReportsController@notify']) !!}
            	{!! Form::submit('Send') !!}
           		

					<div class="table-responsive">
						<table id="units" class="table table-hover text-center">
							<thead>
								<tr>
									<td><strong>ايميل المالك</strong></td>
									@if(in_array('view_finance', $permissions))
										<td><strong>المديونية المستحقة</strong></td>
									@endif									
									<td><strong>أسماء المُلاَّك</strong></td>
									<td><strong>كود الوحدة</strong></td>
									<td><strong>
												<strong>أختر الوحدة المراد<br> إعلامها بالمديونية المستحقة</strong>
												<br>
										<div class="checkbox">
											<label>
												<input type="checkbox" value="" id="select_all">
												<strong>أختر الكل</strong>
											</label>
										</div>
									</strong></td>
								</tr>								
							</thead>
							<tbody>
								@foreach($units as $unit)
									<tr>
										<td>
											@foreach($unit->owners as $owner)
												{{$owner->email}} <br>
											@endforeach
										</td>									
										@if(in_array('view_finance', $permissions))
										<td>{{ (int)$unit->the_current_unit_debt }}</td>
										@endif

										<td>
											@foreach($unit->owners as $owner)
												<p><a href="{{ action('OwnersController@show', ['slug'=>$owner->slug]) }}" target="_blank"> {{ $owner->name }}</a></p>
											@endforeach
										</td>

										<td>
											<a href="{{ action('UnitsController@show', ['id'=>$unit->id]) }}">{{ $unit->code }}</a>
										</td>

										<td>
											{!! Form::checkbox('units_ids[]', $unit->id, false, ['class'=>'checkbox form-control']);!!}
										</td>
									</tr>
								@endforeach
								
							</tbody>
						</table>
					</div>

            	{!! Form::close() !!}
						
		
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
	    	$("#units").dataTable( {
	            "paging": true,
	            "searching": true,
	            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		       
	        } );
	    	// SELECT ALL
			//select all checkboxes
			$("#select_all").change(function(){  //"select all" change 
			    $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
			});

			//".checkbox" change 
			$('.checkbox').change(function(){ 
			    //uncheck "select all", if one of the listed checkbox item is unchecked
			    if(false == $(this).prop("checked")){ //if this item is unchecked
			        $("#select_all").prop('checked', false); //change "select all" checked status to false
			    }
			    //check "select all" if all checkbox items are checked
			    if ($('.checkbox:checked').length == $('.checkbox').length ){
			        $("#select_all").prop('checked', true);
			    }
			});
			//END SELECT ALL

        });
    </script>
@endsection