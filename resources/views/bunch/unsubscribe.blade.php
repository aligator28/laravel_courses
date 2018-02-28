@extends('layouts.app')

@section('content')

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card card-default">

				<div class="card-header">
					<h3 class="text-success">You successfully Unsubscribed from 
					<strong>"{{ $bunch->name }}"</strong> email newsletter!</h3>
				</div>

			</div>
		</div>
	</div>

@endsection