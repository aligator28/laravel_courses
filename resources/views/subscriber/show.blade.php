@extends('layouts.app')

@section('content')

<div class="panel-heading container-fluid">
	<div class="form-group">
		<a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('subscriber.index')}}">
			<i class="fa fa-backward" aria-hidden="true"></i> Back
		</a>
		<div class="centered-child col-md-9 col-sm-7 col-xs-6"><h3>Subscriber: <b>{{$item->name}}</b></h3></div>
		<div class="col-md-2 col-sm-3 col-xs-4">
			<div class="pull-right">
				{{Form::open(['class' => 'confirm-delete', 'route' => ['subscriber.destroy', $item->id], 'method' => 'DELETE'])}}
				{{ link_to_route('subscriber.edit', 'edit', [$item->id], ['class' => 'btn btn-primary btn-xs']) }} |
				{{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
<div class="panel-body">
	<table class="table table-bordered table-responsive">
		<tr>
			<th width="25%">Attribute</th>
			<th width="75%">Value</th>
		</tr>
		@foreach ($item->getAttributes() as $attribute => $value)
		<tr>
			<td>{{$attribute}}</td>
			<td>{{$value}}</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection