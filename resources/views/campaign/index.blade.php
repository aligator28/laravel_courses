@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Campaigns</h3></div>
				<div class="panel-body">
					<div class="row centered-child">
						<div class="col-md-12">
						{{ link_to_route('campaign.create', 'Create', null, ['class' => 'btn btn-info']) }}
						</div>
					</div>
				
					@include('partials.errors')
					
					<table class="table table-bordered table-responsive table-striped">
						<tr>
							<th width="5%">Id</th>
							<th width="20%">Name</th>
							<th width="20%">Bunches</th>
							<th width="20%">Templates</th>
							<th width="40%" colspan="2">action</th>
						</tr>
					@foreach ($items as $model)
					<tr onclick="window.location = '{{ url('/campaign/' . $model->id) }}';">
						<td>{{$model->id}}</td>
						<td>{{$model->name}}</td>
						<td>
						@if ( $model->bunch()->exists() )
							{{ $model->bunch->name }}
							{{-- @foreach($model->bunches as $bunch)
							<p>{{ $bunch->name }}</p>
							@endforeach --}}
						@endif
						</td>
						<td>
						@if ($model->template()->exists())
							{{ $model->template->name }}
							@else
							no template
						@endif
						</td>						
						<td>
							{{Form::open(['class' => 'confirm-delete', 'route' => ['campaign.destroy', $model->id],
							'method' => 'DELETE'])}}
							{{ link_to_route('campaign.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }}
							{{ link_to_route('campaign.edit', 'edit', [$model->id], ['class' => 'btn btn-success btn-xs']) }}
							<hr>
							{{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit', 'onclick' => 'return confirm("Delete this campaign?")'])}}
							{{Form::close()}}
						</td>
						<td>
						@if ($model->sent == 1)

							<button disabled class='btn btn-warning btn-xs'>Campaign SENT!</button>
							<hr>
							{{ link_to_route('report.show', 'Campaign Report', [$model->id], ['class' => 'btn btn-success btn-xs']) }}

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
