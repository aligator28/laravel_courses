@extends('layouts.app')
@section('content')
	<div class="row" style="margin-bottom: 40px">
		<div class="col-md-12 alert alert-danger">
			<a class="text-primary" target="_blank" href="{{ url('public/email_templates/cupcake/index.html') }}">Готовый шаблон для теста</a> (копируем код и вставляем в поле CKEditor'a в режиме Источник - в верхнем ряду кнопочка "Источник")

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>Templates</h3></div>
				@include('partials.success')
				<div class="panel-body">
					{{ link_to_route('template.create', 'create', null, ['class' => 'btn btn-info btn-xs']) }}
					<table class="table table-bordered table-responsive table-striped">
					<tr></tr>
						<tr>
							<th width="5%">Id</th>
							<th width="40%">Name</th>
							<th width="35%">Time</th>
							<th width="45%">action</th>
						</tr>
					@foreach ($items as $model)
					<tr onclick="window.location = '{{ url('/template/' . $model->id) }}';">
						<td>{{$model->id}}</td>
						<td>{{$model->name}}</td>
						<td>{{$model->created_at}}</td>
						<td>
							{{Form::open(['class' => 'confirm-delete', 'route' => ['template.destroy', $model->id],
							'method' => 'DELETE'])}}
							{{ link_to_route('template.show', 'info', [$model->id], ['class' => 'btn btn-info btn-xs']) }}
							{{ link_to_route('template.edit', 'edit', [$model->id], ['class' => 'btn btn-success btn-xs']) }}
							{{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit', 'onclick' => 'return confirm("Delete this template?")'])}}
							{{Form::close()}}
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
