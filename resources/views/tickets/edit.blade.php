@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Edit {{ $ticket->ticketType->name }} ticket for {{ $event->name }}</div>
					<div class="card-body">
						{{ Form::model($ticket, ['route' => ['events.tickets.update', $event, $ticket], 'method' => 'put']) }}
						
							@include('tickets.form')
							
							{{ Form::hidden('file') }}
						
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
