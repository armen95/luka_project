@extends('layout.app')
@section('content')
	<div class="row">
		<div class="col-md-10">
			<h4 class="pt-4">Add New Client</h4>
			<div class="form-wrapper pt-4">
				<form action = "/admin/saveClient" method = "post">
					{{ csrf_field() }}
					<div class="form-group">
						<p class="text-danger">{{$errors->first('name')}}</p>
						<label for="name">Name:</label>
						<input type="text" class="form-control" value="{{ old('name') }}" name = "name" id="name">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('legal_name')}}</p>
						<label for="legal_name">Legal name:</label>
						<input type="text" class="form-control" value="{{ old('legal_name') }}" name = "legal_name" id="legal_name">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('email')}}</p>
						<label for="email">Email:</label>
						<input type="text" class="form-control" value="{{ old('email') }}" name = "email" id="email">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('address')}}</p>
						<label for="address">Address:</label>
						<input type="text" class="form-control" value="{{ old('address') }}" name = "address" id="address">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('post_index')}}</p>
						<label for="post_index">Post index:</label>
						<input type="number" class="form-control" value="{{ old('post_index') }}" name = "post_index" id="post_index">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('city')}}</p>
						<label for="city">City:</label>
						<input type="text" class="form-control" value="{{ old('city') }}" name = "city" id="city">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('country')}}</p>
						<label for="country">Country:</label>
						<input type="text" class="form-control" value="{{ old('country') }}" name = "country" id="country">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('vat_number')}}</p>
						<label for="vat_number">Vat number:</label>
						<input type="text" class="form-control" value="{{ old('vat_number') }}" name = "vat_number" id="vat_number">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('contact_person')}}</p>
						<label for="contact_person">Contact person:</label>
						<input type="text" class="form-control" value="{{ old('contact_person') }}" name = "contact_person" id="contact_person">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('requirements')}}</p>
						<label for="requirements">Requirements:</label>
						<textarea class="form-control" name = "requirements" id="requirements">{{ old('requirements') }}</textarea>
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="/admin/clients" class="btn btn-primary">Cancel</a>
					</div>

				</form>
			</div>
		</div>
	</div>
@stop