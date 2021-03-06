@extends('layouts.app')
@section('title')
	All Users
@endsection
@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">All Users</h3>
		</div>
			<div class="panel-body ">	
					
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Role</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
							<tr>									
								<td>{{$user->id}}</td>

								<td>
									<a href="{{ action('UserController@show',['id'=>$user->id]) }}"> {{$user->name}}</a>
								</td>

								<td>
									{{( [] !== $user->roles->pluck('name')->toArray() )    ? $user->roles()->pluck('name')[0] : 'No Role Yet!'}}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</div>
@stop