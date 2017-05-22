<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Confirming Delete</h4>
			</div>
			<div class="modal-body bg-danger">

				{!! Form::open(['method'=>'DELETE', 'action'=>[$route,$id] ]) !!}

					<div class="row">
						<div class="col-md-6" id="wrapeDelete">

							
								
								<strong>Warning!</strong> {{ $message}}, <span style="color:red;">{{$name}}</span>.<br><br>
								<a href="{{action($route,['id'=>$id])}}">
									<button class="btn btn-danger" style="float: right;" >Delete</button>
								</a>
								
							
						</div>
					</div>

				{!! Form::close() !!}
			</div>
			<div class="modal-footer bg-danger">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>



