
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
								<td>{{ $value->contact_person }}</td>
								<td>{{ $value->requirements }}</td>
								<td>
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

@stop