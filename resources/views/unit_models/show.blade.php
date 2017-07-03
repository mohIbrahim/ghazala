@extends('layouts.app')
@section('title')
	النموذج {{$unitModel->name}}
@endsection
@section('content')
	<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3  col-lg-6 col-lg-offset-3">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$unitModel->name}} :النموذج</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive text-center">
					<table class="table table-hover ">
						
						<tbody>
								<tr>
									<td>{{ $unitModel->name }}</td>
									<th>اسم النموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->type }}</td>
									<th>نوع النموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->total_area }} m<sup>2</sup> </td>
									<th>المساحة الكلية للنموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->net_area }} m<sup>2</sup> </td>
									<th>المساحة الصافية للنموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->number_of_rooms }}</td>
									<th>عدد الغرف بالنموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->number_of_floors }}</td>
									<th>عدد الطوابق بالنموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->number_of_toilets }}</td>
									<th>عدد دورات المياة بالنموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->number_of_balconies }}</td>
									<th>عدد شُرُفات بالنموذج</th>
								</tr>


								<tr>
									<td>{{ $unitModel->number_of_kitchens }}</td>
									<th>عدد المطابخ بالنموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->finishing_type }}</td>
									<th>نوع التشطيب للنموذج</th>
								</tr>

								<tr>
									<td>{{ ($unitModel->garden)? "يوجد":"لا يوجد" }}</td>
									<th>وجود حدائق بالنموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->garden_area }} m<sup>2</sup></td>
									<th>مساحة الحديقة</th>
								</tr>

								<tr>
									<td>{{ ($unitModel->pool)? "يوجد":"لا يوجد" }}</td>
									<th>وجود حمام سباحة بالنموذج</th>
								</tr>

								<tr>
									<td>{{ $unitModel->pool_area }} m<sup>2</sup></td>
									<th>مساحة حمام سباحة</th>
								</tr>

								<tr>
									<td>{{ $unitModel->comments }}</td>
									<th>التعليقات</th>
								</tr>


								<tr>
									<td>
										@if($unitModel->creator)
											{{ $unitModel->creator->name }}
										@endif
									</td>
									<th>إنشاء من قبل</th>
								</tr>
								
								<tr>
									<td>{{ $unitModel->created_at }}</td>
									<th>تاريخ و وقت الإنشاء</th>
								</tr>

								<tr>
									<td>{{ $unitModel->updated_at }}</td>
									<th>تاريخ و وقت التعديل</th>
								</tr>
								
								@if(in_array('update_unit_models', $permissions))
									<tr>
										<td><a href="{{action('UnitModelsController@edit',['slug'=>$unitModel->slug])  }}">تعديل</a></td>
										<th>تعديل</th>
									</tr>
								@endif
								@if(in_array('delete_unit_models', $permissions))
									<tr>
										<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">حذف النموذج</button></td>
										<th>حذف</th>
									</tr>
								@endif
							
						</tbody>
					</table>
				</div>
						
			</div>
		</div>
		
	</div>


@include('partial.deleteConfirm',['name'=>$unitModel->name,
										'id'=>$unitModel->id,
										'message'=>'هل انت متأكد تريد حذف النموذج',
										'route'=>'UnitModelsController@destroy'])
	 
@endsection
