@extends('layout.app')
@section('content')
	<div class = "row pt-4 pl-2">
		<div class = "col-md-8">
			<form action = "/admin/editAccount" method = "post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="">First Name:</label>
					<input type="text" class="form-control" name = "firstname" value = "{{ $user->firstname }}">
				</div>
				<div class="form-group">
					<label for="">Last Name:</label>
					<input type="text" class="form-control" name = "lastname" value = "{{ $user->lastname }}">
				</div>
				<div class="form-group">
					<label for="password">New Password:</label>
					<input type="password" class="form-control" name = "password" id="password">
				</div>
				<div class="form-group">
					<label for="confirmpass">Confirm Password:</label>
					<input type="password" class="form-control" name = "confirmpass" id="confirmpass">
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
@stop

