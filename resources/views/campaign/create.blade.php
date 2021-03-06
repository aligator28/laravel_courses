@extends('layouts.app')
@section('content')
<div class="col">
	<div class="panel-heading">
		<div class="form-group">
		<a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('campaign.index')}}">
			<i class="fa fa-backward" aria-hidden="true"></i> Back
		</a>
		<div class="centered-child col-md-11 col-sm-10 col-xs-10"><h3>New Campaign</h3></div>
		</div>
	</div>
	<div class="panel-body">

	@include('partials.errors')

		{!! Form::open(['route' => 'campaign.store']) !!}
			
			@include('campaign._form')
		
		<div class="form-group">
			{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}
	</div>
</div>
@endsection