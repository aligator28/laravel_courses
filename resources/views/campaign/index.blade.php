@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Campaigns</h3></div>
				<div class="panel-body">
					{{ link_to_route('campaign.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}
					<table class="table table-bordered table-responsive table-striped">
						<tr>
							<th width="5%">Id</th>
							<th width="25%">Name</th>
							<th width="25%">Bunches</th>
							<th width="25%">Templates</th>
							<th width="25%" colspan="2">action</th>
						</tr>
						<tr>
							<td colspan="3" class="light-green-background no-padding" title="Create new
							campaign">
							<div class="row centered-child">
								<div class="col-md-12">
								</div>
							</div>
						</td>
					</tr>
					@foreach ($items as $model)
					<tr onclick="window.location = '{{ url('/campaign/' . $model->id) }}';">
						<td>{{$model->id}}</td>
						<td>{{$model->name}}</td>
						<td>
							{{ $model->bunch->name }}
							{{-- @foreach($model->bunches as $bunch)
							<p>{{ $bunch->name }}</p>
							@endforeach --}}
						</td>
						<td>
							{{ $model->template->name }}
						</td>						
						<td>
							{{Form::open(['class' => 'confirm-delete', 'route' => ['campaign.destroy', $model->id],
							'method' => 'DELETE'])}}
							{{ link_to_route('campaign.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }}
							{{ link_to_route('campaign.edit', 'edit', [$model->id], ['class' => 'btn btn-success btn-xs']) }}
							{{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit', 'onclick' => 'return confirm("Delete this campaign?")'])}}
							{{Form::close()}}
						</td>
						<td>
						@if ($model->sent == 1)
							<button disabled class='btn btn-warning btn-xs'>Campaign SENT!</button>
						@else
							{{ link_to_route('campaignSend', 'SEND CAMPAIGN', [$model->id], ['class' => 'btn btn-warning btn-xs']) }}
						@endif
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
