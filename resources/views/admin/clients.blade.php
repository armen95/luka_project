
@extends('layout.app')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="text-right pt-4">
				<a href="/admin/addclient" class="btn btn-success">New</a>
			</div>
			<div class = "table-wrapper pt-3">
				@if(!empty($clients))
				<table class="table table-striped" id = "clientsTable">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Legal name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Post index</th>
							<th>City</th>
							<th>Country</th>
							<th>Vat number</th>
							<th>Word count</th>
							<th>Contact person</th>
							<th>Requirements</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach($clients as $value)
							<tr>
								<td>{{ $value->id }}</td>
								<td>{{ $value->name }}</td>
								<td>{{ $value->legal_name }}</td>
								<td>{{ $value->email }}</td>
								<td>{{ $value->address }}</td>
								<td>{{ $value->post_index }}</td>
								<td>{{ $value->city }}</td>
								<td>{{ $value->country }}</td>
								<td>{{ $value->vat_number }}</td>
								<td>{{ $value->word_count }}</td>
								<td>{{ $value->contact_person }}</td>
								<td>{{ $value->requirements }}</td>
								<td>
									<a href="/admin/viewClient/{{ $value->id }}" class="btn btn-primary" data-id = "{{ $value->id }}"><i class="fa fa-search"></i></a>
									<a href="#" class="btn btn-primary edit-client" data-id = "{{ $value->id }}"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-danger delete-client" data-id = "{{ $value->id }}"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Legal name</th>
							<th>Email</th>
							<th>Address</th>
							<th>Post index</th>
							<th>City</th>
							<th>Country</th>
							<th>Vat number</th>
							<th>Word count</th>
							<th>Contact person</th>
							<th>Requirements</th>
							<th>Actions</th>
						</tr>
					</tfoot>
				</table>
				@endif
			</div>
		</div>
	</div>


	<!-- Edit modal -->
	<div id="editClientModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Client</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
                    <div class="col error-msg"></div>
					<form action="/admin/editClient" method="post" id = "editClientForm">
						{{ csrf_field() }}
						<input type="hidden" name="client_id" id = "client_id" value="">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" value="" name = "name" id="name" >
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" value="" name = "email" id="email" >
						</div>
						<div class="form-group">
							<label for="legal_name">Legal name:</label>
							<input type="text" class="form-control" value="" name = "legal_name" id="legal_name">
						</div>
						<div class="form-group">
							<label for="address">Address:</label>
							<input type="text" class="form-control" value="" name = "address" id="address">
						</div>
						<div class="form-group">
							<label for="post_index">Post index:</label>
							<input type="number" class="form-control" value="" name = "post_index" id="post_index">
						</div>
						<div class="form-group">
							<label for="city">City:</label>
							<input type="text" class="form-control" value="" name = "city" id="city">
						</div>
						<div class="form-group">
							<label for="country">Country:</label>
							<input type="text" class="form-control" value="" name = "country" id="country">
						</div>
						<div class="form-group">
							<label for="vat_number">Vat number:</label>
							<input type="text" class="form-control" value="" name = "vat_number" id="vat_number">
						</div>
						<div class="form-group">
							<label for="contact_person">Contact person:</label>
							<input type="text" class="form-control" value="" name = "contact_person" id="contact_person">
						</div>
						<div class="form-group">
							<label for="requirements">Requirements:</label>
							<textarea class="form-control" name = "requirements" id="requirements"></textarea>
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
