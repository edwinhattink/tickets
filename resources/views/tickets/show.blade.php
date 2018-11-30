@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<b>{{ $event->name }}</b>
						<small>{{ $event->starts_at_display }}</small>	
					</div>
					<div class="card-body">
						<p class="card-text">
							Type: {{ $ticket->ticketType->name }}
						</p>
						<a href="{{ route('events.tickets.edit', [$event, $ticket]) }}" class="card-link">Edit</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
