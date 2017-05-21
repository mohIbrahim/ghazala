<?php
	$flag = 0;
	$bool = false;	
?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>
				Role Name <span style="color: red;"> +</span>
			</th>
			<th>
				Privileges <span style="color: red;"> +</span>
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="col-md-2">
				<div class="form-group">
					{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter Role Name']) !!}
				</div>			
				<div class="form-group">					
					{!! Form::label('descriptions', 'Role Description') !!}
					{!! Form::text('descriptions',null,['class'=>'form-control','placeholder'=>'Enter Role Name']) !!}					
				</div>
			</td>
			<td class="col-md-2">
				@foreach($permissions as $permission)
					<?php
						if(isset($role)){
							$bool = in_array($permission->name, $role->permissions->pluck('name')->toArray());
						}else{
							$bool = false;
						}
					?>
					<div class=""> 
						{!! Form::checkbox('permission[]', $permission->id, $bool) !!}
						{{ $permission->name }}
					</div>

					<?php $flag++; ?>
					@if($flag == 4 )							
						<hr>
						<?php $flag =0;?>
					@endif

				@endforeach			
			</td>		
		</tr>
	</tbody>
</table>
<div class="form-group">
	{!! Form::submit('save', ['class'=>'btn btn-primary']) !!}
</div>
