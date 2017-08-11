@extends('layouts.app')
@section('title')
	الموظف| {{$employee->name}}
@endsection
@section('head')
	
	
@endsection
@section('content')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<div class="col-xs-10 col-xs-offset-1	col-sm-8 col-sm-offset-2	col-md-3 col-md-offset-1	col-lg-2 col-lg-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">

					<div class="row">						
						<img src="{{ asset('images/employees_images/'.$employee->personal_image)}}" width="220px" class="img-responsive img-thumbnail img-circle center-block" alt="Image">
						<br>
					</div>

					<div class="row">						
						<table class="table table-striped table-hover text-center arabic-direction">

							<tbody>
								<tr>
									<td><strong>{{$employee->name}}</strong></td>									
								</tr>
								<tr>
									<td>
										<strong>
											@if($employee->date_of_birth)
												{{$employee->date_of_birth->age}} سنة - {{$employee->gender}}
											@endif
										</strong>
									</td>
								</tr>

								<tr>
									<td><strong>{!!(($employee->status)?"<span style='color:#2cc421'>موظف حالى فى الخدمة</span>":"موظف سابق")!!}</strong></td>									
								</tr>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>

		<div class="col-xs-12	col-sm-10 col-sm-offset-1	col-md-7 col-md-offset-0	col-lg-8 col-lg-offset-0">
			<div class="panel panel-default">
				<div class="panel-body">

					<h3 class="arabic-direction text-center">
						<span class="glyphicon glyphicon-list-alt"></span>
						<strong>بيانات الموظف</strong>
					</h3>						
					<div class="row">
						<table class="table  table-hover text-center arabic-direction arabic-font2">

							<tbody>
								<tr>
									<td>الكود</h4></td>
									<td>{{ $employee->code }}</td>
								</tr>
								<tr>
									<td>الوظائف</h4></td>									
									<td>
										<table class="table">
											<thead>
												<tr>
													<td>#</td>
													<td>القسم</td>
													<td>الوظيفة</td>
												</tr>												
											</thead>
											<tbody>
												@foreach($employee->jobs as $key=>$job)
													<tr>
														<td>{{$key+1}}</td>
														<td>{{$job->department}}</td>
														<td>{{$job->name}}</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</td>									
								</tr>

								<tr>
									<td>الرقم القومى</td>
									<td>{{ $employee->ssn }}</td>
								</tr>

								<tr>
									<td>التليفون</td>
									<td>{{ $employee->phone }}</td>
								</tr>

								<tr>
									<td>المدينة</td>
									<td>{{ $employee->city }}</td>
								</tr>

								<tr>
									<td>العنوان</td>
									<td>{{ $employee->address }}</td>
								</tr>

								<tr>
									<td>تاريخ الميلاد</td>
									<td>{{ $employee->date_of_birth }}</td>
								</tr>

								<tr>
									<td>اسم الشخص الذي يمكن<br> الاتصال به فى حالة<br> عدم الوصول للموظف</td>
									<td>{{ $employee->contact_person_name }}</td>
								</tr>

								<tr>
									<td>رقم تليفون الشخص<br> الذي يمكن الاتصال به <br>فى حالة عدم الوصول للموظف</td>
									<td>{{ $employee->contact_person_phone }}</td>
								</tr>

								<tr>
									<td>تاريخ التعيين</td>
									<td>
										@if($employee->date_of_hiring)
											{{ $employee->date_of_hiring->format('d-m-Y') }}
										@endif
									</td>
								</tr>

								<tr>
									<td>قيمة الراتب</td>
									<td>{{ $employee->salary }} جنية</td>
								</tr>

								<tr>
									<td>التعليقات</td>
									<td>{{ $employee->comments }}</td>
								</tr>














							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection
