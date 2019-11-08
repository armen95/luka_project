@extends('layout.app')
@section('content')
	<div class="card mt-3">
		<div class="card-body">
			<h4 class="card-title">Client details</h4>
			<div class="col-md-8">
				<table class="table table-bordered m-0">
					<tbody>
						<tr>
							<td style = "width:30%"><b>Name</b></td>
							<td style = "width:70%" class="">{{ $client->name }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Legal name</b></td>
							<td style = "width:70%" class="">{{ $client->legal_name }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Email</b></td>
							<td style = "width:70%" class="">{{ $client->email }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Address</b></td>
							<td style = "width:70%" class="">{{ $client->address }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Post index</b></td>
							<td style = "width:70%" class="">{{ $client->post_index }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>City</b></td>
							<td style = "width:70%" class="">{{ $client->city }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Country</b></td>
							<td style = "width:70%" class="">{{ $client->country }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Vat number</b></td>
							<td style = "width:70%" class="">{{ $client->vat_number }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Contact person</b></td>
							<td style = "width:70%" class="">{{ $client->contact_person }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Requirements</b></td>
							<td style = "width:70%" class="">{{ $client->requirements }}</td>
						</tr>
					</tbody>
	           </table>
			</div>
			<h5 class="mt-4">Client Orders</h5>
			<div class="col-md-8">
				@if(count($client_orders) > 0)
					<table class="table table-bordered m-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Type</th>
								<th>Status</th>
								<th>Word count</th>
								<th>Deadline</th>
								<th>Comments</th>
							</tr>
						</thead>
						<tbody>
							@foreach($client_orders as $order)
								<tr>
									<td><a href="/admin/viewOrder/{{ $order->id }}">{{ $order->id }}</a></td>									
									<td>{{ $order->name }}</td>
									<td>{{ $order->type }}</td>
									<td>{{ $order->status }}</td>
									<td>{{ $order->word_count }}</td>
									<td>{{ $order->deadline }}</td>
									<td>{{ $order->comments }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				@endif
			</div>

		</div>
	</div>
@stop