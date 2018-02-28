@extends('layouts.app')

@section('content')

<div class="container">
<div class="panel-heading">
	<div class="form-group">
		<a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('campaign.index')}}">
			<i class="fa fa-backward" aria-hidden="true"></i> back
		</a>
		<div class="centered-child col-md-9 col-sm-7 col-xs-6"><h3>Campaign: <b>{{$item->name}}</b></h3></div>
		<div class="col-md-2 col-sm-3 col-xs-4">
			<div>
				{{Form::open(['class' => 'confirm-delete', 'route' => ['campaign.destroy', $item->id], 'method' => 'DELETE'])}}
				{{ link_to_route('campaign.edit', 'edit', [$item->id], ['class' => 'btn btn-primary btn-xs']) }} 
				{{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
<div class="panel-body">
	<ul>
		<li><h4>Subject {{ $item->name }}</h4></li>
		<li><span>To</span>
			<span>
			{{-- @foreach ($item->bunches as $bunch) --}}
			@if ($item->bunch->subscribers()->exists())
				@foreach ( $item->bunch->subscribers as $key => $subscriber )
					@if ( $key > 199 ) 
						...
					@break
					@endif

					<strong>{{ $subscriber->email }}, </strong>
				@endforeach
			{{-- @endforeach --}}
			@endif
			</span>
		</li>
		<li>From <strong>emailfrom@gmail.com</strong></li>
		@if ( $item->template()->exists() )
		<li>Message <strong> {!! $item->template->content !!} </strong></li>
		@else 
		no template defined
		@endif
	</ul>
</div>
</div>
@endsection