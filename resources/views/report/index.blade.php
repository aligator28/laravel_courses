@extends('layouts.app')

@section('content')

	<a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('campaign.index')}}">
		<i class="fa fa-backward" aria-hidden="true"></i> Back
	</a>
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">
					<h3>Report for campaign: <u>"{{ $campaign->name }}"</u></h3>
				</div>

				<div class="card-body">
					<dl class="row">
						<dt class="col-sm-3">Delivered (%):</dt>
						<dd class="col-sm-9">{{ $report->percentDelivered }} %</dd>
						<dt class="col-sm-3">Opened (%):</dt>
						<dd class="col-sm-9">{{ $report->percentOpened }} %</dd>
						<dt class="col-sm-3">Rejected (%):</dt>
						<dd class="col-sm-9">{{ $report->percentRejected }} %</dd>
						<dt class="col-sm-3">Failed (%):</dt>
						<dd class="col-sm-9">{{ $report->percentFailed }} %</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">
				<div class="card-header">
					<h3>All emails for campaign: <u>"{{ $campaign->name }}"</u></h3>
				</div>

				<div class="card-body">
					<dl class="row">
						@foreach( $campaign->bunch->subscribers as $subscriber )
						<dd class="col-sm-12">
							<h5>{{ $subscriber->email }}</h5>
								@foreach($report->all as $rep)
									@if($rep->recipient == $subscriber->email)
										
										@switch($rep->event)
										    @case('opened')
												<p class="text-primary">Viewed on {{ date("Y-m-d H:i:s", substr($rep->timestamp, 0, 10)) }}</p>
										    @break

										    @case('delivered')
										        <p class="text-success">Delivered on {{ date("Y-m-d H:i:s", substr($rep->timestamp, 0, 10)) }}</p>
										    @break
										    
										    @case('failed') 
										        <p class="text-danger">Failed on {{ date("Y-m-d H:i:s", substr($rep->timestamp, 0, 10)) }}</p>
										        <p><strong>Reason:</strong> 
										        {{ $rep->{'delivery-status'}->message }}</p>
										    @break
										
										@endswitch
									@endif
								@endforeach
						</dd>
						@endforeach
					</dl>
				</div>
			</div>
		</div>
	</div>

@endsection