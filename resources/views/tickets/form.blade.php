<div class="form-group">
	<label for="name">Name</label>
	{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter event name', 'id' => 'name']) }}
</div>
<div class="form-group">
	<label for="starts_at">Start date and time</label>
	{{ Form::datetimeLocal('starts_at', null, ['class' => 'form-control', 'id' => 'starts_at']) }}
</div>
<div class="form-group">
	<button type="submit" class="btn btn-primary">Save</button>
	<a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>
</div>