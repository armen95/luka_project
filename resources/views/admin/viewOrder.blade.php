@extends('layout.app')
@section('content')
	<div class="card mt-3">
		<div class="card-body">
			<h4 class="card-title">Order details</h4>
			<div class="col-md-8">
				<table class="table table-bordered m-0">
					<tbody>
						<tr>
							<td style = "width:30%"><b>Name</b></td>
							<td style = "width:70%" class="">{{ $order->name }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Client</b></td>
							<td style = "width:70%" class="">{{ $order->client->name }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Deadline</b></td>
							<td style = "width:70%" class="">{{ $order->deadline }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Status</b></td>
							<td style = "width:70%" class="">{{ $order->status }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Comments</b></td>
							<td style = "width:70%" class="">{{ $order->comments }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>Word count</b></td>
							<td style = "width:70%" class="">{{ $order->word_count }}</td>
						</tr>
						<tr>
							<td style = "width:30%"><b>type</b></td>
							<td style = "width:70%" class="">{{ $order->type }}</td>
						</tr>
					</tbody>
	           </table>
			</div>
			<h5 class="mt-4">Order freelancers</h5>
			<div class="col-md-8">
				@if(count($order_freelancers) > 0)
					<table class="table table-bordered m-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Word count</th>
							</tr>
						</thead>
						<tbody>
							@foreach($order_freelancers as $freelancer)
								<tr>
									<td><a href="/admin/viewFreelancer/{{ $freelancer->id }}">{{ $freelancer->id }}</a></td>
									<td>{{ $freelancer->freelancers->name }}</td>
									<td>{{ $freelancer->freelancers->email }}</td>
									<td>{{ $freelancer->word_count }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>

				@endif
			</div>

		</div>
	</div>
@stop