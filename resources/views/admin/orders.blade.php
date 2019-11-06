@extends('layout.app')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="text-right pt-4">
				<a href="/admin/addorder" class="btn btn-success">New</a>
			</div>
			<div class = "table-wrapper pt-3">
				@if(!empty($orders))
				<table class="table table-striped" id = "ordersTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Client</th>
							<th>Freelancer</th>
							<th>Word Count</th>
							<th>Status</th>
							<th>Type</th>
							<th>Deadline</th>
							<th>Comments</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $value)
							<tr>
								<td>{{ $value->id }}</td>
								<td>{{ $value->name }}</td>
								<td>{{ $value->client->name }}</td>
								<td>{{ $value->freelancer->name }}</td>
								<td>{{ $value->word_count }}</td>
								<td>{{ $value->status }}</td>
								<td>{{ $value->type }}</td>
								<td>{{ $value->deadline }}</td>
								<td>{{ $value->comments }}</td>
								<td>
									<a href="#" class="btn btn-primary edit-order" data-id = "{{ $value->id }}"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger delete-order" data-id = "{{ $value->id }}"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Client</th>
							<th>Freelancer</th>
							<th>Word Count</th>
							<th>Status</th>
							<th>Type</th>
							<th>Deadline</th>
							<th>Comments</th>
							<th>Actions</th>
						</tr>
					</tfoot>
				</table>
				@endif
			</div>
		</div>
	</div>


	<div id="editOrderModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Order</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="/admin/editOrder" method="post" id = "editOrderForm">
						{{ csrf_field() }}
						<input type="hidden" name="order_id" id = "order_id" value="">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" value="" name = "name" id="name">
						</div>
						<div class="form-group">
							<label for="">Client</label>
							@if(!empty($clients))
								<select name = "client_id" id = "client_id" class="form-control">
									<option value="">Choose Client</option>
									@foreach($clients as $client)
										<option value="{{ $client->id}}">{{ $client->name }}</option>
									@endforeach
								</select>
							@endif
						</div>
						<div class="form-group">
							<label for="">Freelancer</label>
							@if(!empty($freelancers))
								<select name = "freelancer_id" id = "freelancer_id" class="form-control">
									<option value="">Choose Freelancer</option>
									@foreach($freelancers as $freelancer)
										<option value="{{ $freelancer->id}}">{{ $freelancer->name }}</option>
									@endforeach
								</select>
							@endif
						</div>
						<div class="form-group">
							<label for="deadline">Deadline:</label>
							<input type="datetime-local" class="form-control" name = "deadline" id="deadline">
						</div>
						<div class="form-group">
							<label for="status">Status:</label>
							<input type="text" class="form-control" name = "status" id="status">
						</div>
						<div class="form-group">
							<label for="type">Type:</label>
							<select name = "type" id = "type" class="form-control">
								<option value="">Choose type</option>
								<option value="translation">Translation</option>
								<option value="copywriting">Copywriting</option>
								<option value="proofreading">Proofreading</option>
								<option value="proofreading">Editing</option>
								<option value="other">Other</option>
							</select>
							<input type="text" class="form-control d-none" name = "other_type" id="other_type">
						</div>
						<div class="form-group">
							<label for="word_count">Word Count:</label>
							<input type="number" class="form-control" name = "word_count" id="word_count">
						</div>
						<div class="form-group">
							<label for="comments">Comments:</label>
							<textarea class="form-control" name = "comments" id="comments"></textarea>
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

@stop