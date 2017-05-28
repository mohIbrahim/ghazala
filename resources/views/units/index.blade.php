@extends('layouts.app')
@section('title')
	عرض كل النماذج للوحدات
@endsection
@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1  col-lg-10 col-lg-offset-1">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong>عرض كل النماذج للوحدات</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>								
								<th>تعديل</th>
								<th>تاريخ و وقت التعديل</th>
								<th>تاريخ و وقت الإنشاء</th>
								<th>إنشاء من قبل</th>
								<th>عدد الغرف بالنموذج</th>
								<th>المساحة الصافية للنموذج</th>
								<th>المساحة الكلية للنموذج</th>
								<th>نوع النموذج</th>
								<th>اسم النموذج</th>
							</tr>
							
						</thead>
						<tbody>
							@foreach($unitModels as $model)
								<tr>
									<td>
										@if(in_array('update_unit_models', $permissions))
											<a href="{{action('UnitModelsController@edit',['slug'=>$model->slug])  }}">تعديل</a>
										@endif
									</td>
									<td>{{ $model->updated_at }}</td>
									<td>{{ $model->created_at }}</td>
									<td>{{ $model->creator->name }}</td>
									<td>{{ $model->number_of_rooms }}</td>
									<td>{{ $model->net_area }} m<sup>2</sup> </td>
									<td>{{ $model->total_area }} m<sup>2</sup> </td> 
									<td>{{ $model->type }}</td>
									<td>
										<a href="{{ action('UnitModelsController@show', ['slug'=>$model->slug]) }}">{{ $model->name }}</a>
									</td>
								</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
						{{ $unitModels->links() }}
			</div>
		</div>
		
	</div>

	 
@endsection