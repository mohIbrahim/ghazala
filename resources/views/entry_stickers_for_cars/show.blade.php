@extends('layouts.app')
@section('title')
	ملصق دخول السيارة {{$entrySticker->code}}
@endsection

@section('content')
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1  col-lg-10 col-lg-offset-1">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center"><strong> {{$entrySticker->code}} :ملصق دخول السيارة</strong></h3>
			</div>
			<div class="panel-body">					
						
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
								@if(in_array('delete_entry_stickers_for_cars', $permissions))
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


@include('partial.deleteConfirm',['name'=>$entrySticker->code,
										'id'=>$entrySticker->id,
										'message'=>'هل انت متأكد تريد حذف ملصق دخول السيارة',
										'route'=>'EntryStickersForCarsController@destroy'])
	 
@endsection
