@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<a href="{{ route('events.create') }}">
							Create new event
						</a>
					</div>
				</div>
			</div>
			@foreach($events as $event)
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">{{ $event->name }}</div>

						<div class="card-body">
							<p class="card-text">
								{{ $event->starts_at }}
							</p>
							<a href="{{ route('events.edit', $event) }}" class="card-link">Edit</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
