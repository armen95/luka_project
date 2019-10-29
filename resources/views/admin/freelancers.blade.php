@extends('layout.app')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="text-right pt-4">
				<a href="/admin/addfreelancer" class="btn btn-success">New</a>
			</div>
			<div class = "table-wrapper pt-3">
				@if(!empty($freelancers))
				<table class="table table-striped">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Source lang</th>
						<th>Target lang</th>
						<th>Hourly payment</th>
						<th>Word payment</th>
						<th>Speciality</th>
						<th>Availability</th>
						<th>Tracking system</th>
						<th>Actions</th>
					</tr>
					@foreach($freelancers as $value)
						<tr>
							<td>{{ $value->id }}</td>
							<td>{{ $value->name }}</td>
							<td>{{ $value->email }}</td>
							<td>{{ $value->contact }}</td>
							<td>{{ $value->source_lang }}</td>
							<td>{{ $value->target_lang }}</td>
							<td>{{ $value->hourly_payment }}</td>
							<td>{{ $value->word_payment }}</td>
							<td>{{ $value->speciality }}</td>
							<td>{{ $value->availability }}</td>
							<td>{{ $value->tracking_system }}</td>
							<td>
								<a href="#" class="btn btn-primary edit-freelancer" data-id = "{{ $value->id }}"><i class="fa fa-pencil"></i></a>
								<a href="#" class="btn btn-danger delete-freelancer" data-id = "{{ $value->id }}"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
					@endforeach
				</table>
				@endif
			</div>
		</div>
	</div>



	<div id="editFreelancerModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Freelancer</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="/admin/editFreelancer" method="post" id = "editFreelancerForm">
						{{ csrf_field() }}
						<input type="hidden" name="freelancer_id" id = "freelancer_id" value="">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" value="" name = "name" id="name">
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="email" class="form-control" value="" name = "email" id="email">
						</div>
						<div class="form-group">
							<label for="contact">Contact:</label>
							<input type="text" class="form-control" value="" name = "contact" id="contact">
						</div>
						<div class="form-group">
							<label for="source_lang">Source language:</label>
							<input type="text" class="form-control" value="" name = "source_lang" id="source_lang">
						</div>
						<div class="form-group">
							<label for="target_lang">Target language:</label>
							<input type="text" class="form-control" value="" name = "target_lang" id="target_lang">
						</div>
						<div class="form-group">
							<label for="hourly_payment">Hourly payment:</label>
							<input type="number" class="form-control" value="" name = "hourly_payment" id="hourly_payment">
						</div>
						<div class="form-group">
							<label for="word_payment">Word payment:</label>
							<input type="number" class="form-control" value="" name = "word_payment" id="word_payment">
						</div>
						<div class="form-group">
							<label for="speciality">Speciality:</label>
							<input type="text" class="form-control" value="" name = "speciality" id="speciality">
						</div>
						<div class="form-group">
							<label for="availability">Availability:</label>
							<input type="text" class="form-control" value="" name = "availability" id="availability">
						</div>
						<div class="form-group">
							<label for="tracking_system">Tracking system:</label>
							<input type="text" class="form-control" value="" name = "tracking_system" id="tracking_system">
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