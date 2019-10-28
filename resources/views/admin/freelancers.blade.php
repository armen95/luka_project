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
@stop