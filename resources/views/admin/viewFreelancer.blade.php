@extends('layout.app')
@section('content')
	<div class="card mt-3">
		<div class="card-body">
			<h4 class="card-title">Freelancer details</h4>
			<div class="col-md-8">
				<table class="table table-bordered m-0">
					<tbody>
						<tr>
							<td style = "width:30%"><b>Name</b></td>
							<td style = "width:70%" class="">{{ $freelancer->name }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Email</b></td>
							<td style = "width:70%" class="">{{ $freelancer->email }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Contact</b></td>
							<td style = "width:70%" class="">{{ $freelancer->contact }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Source lang</b></td>
							<td style = "width:70%" class="">{{ $freelancer->source_lang }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Target lang</b></td>
							<td style = "width:70%" class="">{{ $freelancer->target_lang }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Hourly payment</b></td>
							<td style = "width:70%" class="">{{ $freelancer->hourly_payment }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Word payment</b></td>
							<td style = "width:70%" class="">{{ $freelancer->word_payment }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Speciality</b></td>
							<td style = "width:70%" class="">{{ $freelancer->speciality }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Availability</b></td>
							<td style = "width:70%" class="">{{ $freelancer->availability }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Tracking system</b></td>
							<td style = "width:70%" class="">{{ $freelancer->tracking_system }}</td>
						</tr>
					</tbody>
	           </table>
			</div>
			<h5 class="mt-4">Freelancer Orders</h5>
			<div class="col-md-8">
				@if(count($freelancer_orders) > 0)
					<table class="table table-bordered m-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Word count</th>
								<th>Type</th>
								<th>Deadline</th>
							</tr>
						</thead>
						<tbody>
							@foreach($freelancer_orders as $order)
								<tr>
									<td><a href="/admin/viewOrder/{{ $order->order_id }}">{{ $order->order_id }}</a></td>									
									<td>{{ $order->orders->name }}</td>
									<td>{{ $order->word_count }}</td>
									<td>{{ $order->orders->type }}</td>
									<td>{{ $order->orders->deadline }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				@endif
			</div>

		</div>
	</div>
@stop