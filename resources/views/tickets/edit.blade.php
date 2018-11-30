@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Edit {{ $event->name }}</div>
					<div class="card-body">
						{{ Form::model($event, ['route' => ['events.update', $event], 'method' => 'put']) }}
						
							@include('events.form')
						
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
