@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">{{ $event->name }}</div>
					<div class="card-body">
						<p class="card-text">
							Start time: {{ $event->starts_at }}
						</p>
						<a href="{{ route('events.edit', $event) }}" class="card-link">Edit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
