@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Subscribers</h3></div>
				<div class="panel-body">
					{{ link_to_route('subscriber.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}
					<table class="table table-bordered table-responsive table-striped">
						<tr>
							<th width="5%">Id</th>
							<th width="25%">First Name</th>
							<th width="25%">Last Name</th>
							<th width="25%">Assigned to Bunches</th>
							<th width="45%">action</th>
						</tr>
						<tr>
							<td colspan="3" class="light-green-background no-padding" title="Create new
							subscriber">
							<div class="row centered-child">
								<div class="col-md-12">
								</div>
							</div>
						</td>
					</tr>
					@foreach ($items as $model)
					

					<tr onclick="window.location = '{{ url('/subscriber/' . $model->id) }}';">
						<td>{{$model->id}}</td>
						<td>{{$model->name}}</td>
						<td>{{$model->surname}}</td>
						<td>
							@foreach($model->bunches as $bunch)
								@if ($bunch->created_by == Auth::user()->id)
								<p><a href="{{ url('/bunch') . '/' . $bunch->id }}">{{$bunch->name}}</a></p>
								@endif
							@endforeach
						</td>
						<td>
							{{Form::open(['class' => 'confirm-delete', 'route' => ['subscriber.destroy', $model->id],
							'method' => 'DELETE'])}}
							{{ link_to_route('subscriber.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }}
							{{ link_to_route('subscriber.edit', 'edit', [$model->id], ['class' => 'btn btn-success btn-xs']) }}
							{{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit', 'onclick' => 'return confirm("Delete this subscriber?")'])}}
							{{Form::close()}}
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
