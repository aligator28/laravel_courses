@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Bunches</h3></div>
				<div class="panel-body">
					{{ link_to_route('bunch.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}
					<table class="table table-bordered table-responsive table-striped">
						<tr>
							<th width="5%">Id</th>
							<th width="30%">Name</th>
							<th width="30%">Subscribers</th>
							<th width="25%">Time</th>
							<th width="35%">action</th>
						</tr>
						<tr>
							<td colspan="3" class="light-green-background no-padding" title="Create new
							bunch">
							<div class="row centered-child">
								<div class="col-md-12">
								</div>
							</div>
						</td>
					</tr>
					@foreach ($items as $model)
					<tr onclick="window.location = '{{ url('/bunch/' . $model->id) }}';">
						<td>{{$model->id}}</td>
						<td>{{$model->name}}</td>
						<td>{{ count($model->subscribers) }}</td>
						<td>{{$model->created_at}}</td>
						<td>
							{{Form::open(['class' => 'confirm-delete', 'route' => ['bunch.destroy', $model->id],
							'method' => 'DELETE'])}}
							{{ link_to_route('bunch.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }}
							{{ link_to_route('bunch.edit', 'edit', [$model->id], ['class' => 'btn btn-success btn-xs']) }}
							{{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit', 'onclick' => 'return confirm("Delete this bunch?")'])}}
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
