@if ($errors->any())
    <div class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<div>{{ $error }}</div>
		@endforeach
    </div>
@endif
<div class="form-group">
	<label for="ticket_type_id">Type</label>
	{{ Form::select('ticket_type_id', $ticketTypes, null, ['class' => 'form-control', 'id' => 'ticket_type_id']) }}
</div>
<div class="form-group">
	<label for="starts_at">File (PDF)</label>
	{{ Form::file('file', ['class' => 'form-control', 'id' => 'starts_at']) }}
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">Save</button>
	<a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
</div>