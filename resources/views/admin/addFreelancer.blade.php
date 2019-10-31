@extends('layout.app')
@section('content')
	<div class="row">
		<div class="col-md-10">
			<h4 class="pt-4">Add New Freelancer</h4>
			<div class="form-wrapper pt-4">
				<form action = "/admin/saveFreelancer" method = "post">
					{{ csrf_field() }}
					<div class="form-group">
						<p class="text-danger">{{$errors->first('name')}}</p>
						<label for="name">Name:</label>
						<input type="text" class="form-control" value="{{ old('name') }}" name = "name" id="name">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('email')}}</p>
						<label for="email">Email:</label>
						<input type="email" class="form-control" value="{{ old('email') }}" name = "email" id="email">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('contact')}}</p>
						<label for="contact">Contact:</label>
						<input type="text" class="form-control" value="{{ old('contact') }}" name = "contact" id="contact">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('source_lang')}}</p>
						<label for="source_lang">Source language:</label>
						<input type="text" class="form-control" value="{{ old('source_lang') }}" name = "source_lang" id="source_lang">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('target_lang')}}</p>
						<label for="target_lang">Target language:</label>
						<input type="text" class="form-control" value="{{ old('target_lang') }}" name = "target_lang" id="target_lang">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('hourly_payment')}}</p>
						<label for="hourly_payment">Hourly payment:</label>
						<input type="text" class="form-control" value="{{ old('hourly_payment') }}" name = "hourly_payment" id="hourly_payment">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('word_payment')}}</p>
						<label for="word_payment">Word payment:</label>
						<input type="text" class="form-control" value="{{ old('word_payment') }}" name = "word_payment" id="word_payment">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('speciality')}}</p>
						<label for="speciality">Speciality:</label>
						<input type="text" class="form-control" value="{{ old('speciality') }}" name = "speciality" id="speciality">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('availability')}}</p>
						<label for="availability">Availability:</label>
						<input type="text" class="form-control" value="{{ old('availability') }}" name = "availability" id="availability">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('tracking_system')}}</p>
						<label for="tracking_system">Tracking system:</label>
						<input type="text" class="form-control" value="{{ old('tracking_system') }}" name = "tracking_system" id="tracking_system">
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="/admin/freelancers" class="btn btn-primary">Cancel</a>
					</div>

				</form>
			</div>
		</div>
	</div>
@stop