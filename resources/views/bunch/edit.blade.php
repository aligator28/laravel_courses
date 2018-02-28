@extends('layouts.app')
@section('content')
<div class="col">
	<div class="panel-heading">
		<div class="form-group">
		<a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('bunch.index')}}">
			<i class="fa fa-backward" aria-hidden="true"></i> back
		</a>
			<div class="centered-child col-md-11 col-sm-10 col-xs-10"><h3>Edit Template</h3></div>
		</div>
	</div>
	
	@include('partials.errors')

	<div class="panel-body">
		{!! Form::model($item, ['route' => ['bunch.update', $item->id], 'method' => 'PUT']) !!}
		
		@include('bunch._form')
		
		<div class="form-group">
			{!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection