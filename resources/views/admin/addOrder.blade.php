@extends('layout.app')
@section('content')
	<div class="row">
		<div class="col-md-10">
			<h4 class="pt-4">Add New Order</h4>
			<div class="form-wrapper pt-4">
				<form action = "/admin/saveOrder" method = "post">
					{{ csrf_field() }}
					<div class="form-group">
						<p class="text-danger">{{$errors->first('name')}}</p>
						<label for="name">Name:</label>
						<input type="text" class="form-control" value="{{ old('name') }}" name = "name" id="name">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('client_id')}}</p>
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
						<p class="text-danger">{{$errors->first('freelancer_id')}}</p>
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
						<p class="text-danger">{{$errors->first('deadline')}}</p>
						<label for="deadline">Deadline:</label>
						<input type="datetime-local" class="form-control" value="{{ old('deadline') }}" name = "deadline" id="deadline">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('status')}}</p>
						<label for="status">Status:</label>
						<input type="text" class="form-control" value="{{ old('status') }}" name = "status" id="status">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('type')}}</p>
						<label for="type">Type:</label>
						<select name = "type" id = "type" class="form-control">
							<option value="">Choose type</option>
							<option value="translation">Translation</option>
							<option value="copywriting">Copywriting</option>
							<option value="proofreading">Proofreading</option>
							<option value="editing">Editing</option>
							<option value="other">Other</option>
						</select>
						<input type="text" class="form-control d-none" value="" name = "other_type" id="other_type">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('word_count')}}</p>
						<label for="word_count">Word Count:</label>
						<input type="number" class="form-control" value="{{ old('word_count') }}" name = "word_count" id="word_count">
					</div>
					<div class="form-group">
						<p class="text-danger">{{$errors->first('comments')}}</p>
						<label for="comments">Comments:</label>
						<textarea class="form-control" name = "comments" id="comments">{{ old('comments') }}</textarea>
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="/admin/orders" class="btn btn-primary">Cancel</a>
					</div>

				</form>
			</div>
		</div>
	</div>
@stop