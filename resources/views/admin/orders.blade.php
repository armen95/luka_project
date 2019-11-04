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

@stop