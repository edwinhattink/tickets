<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
		$events = Event::all();
		return view('events.index', compact('events'));
    }

    public function create()
    {
		$event = new Event();
		$event->starts_at = new Carbon();
		return view('events.create', compact('event'));
    }

    public function store(Request $request)
    {
		
		$event = new Event();
		return $this->update($request, $event);
    }

    public function show(Event $event)
    {
        throw new Exception('Not implemented');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
			'name' => 'required',
			'starts_at' => 'required|date',
		]);
		$event->fill($request->all());
		$event->starts_at = new Carbon($request->starts_at);
		$event->save();
		return redirect()->route('events.tickets.index', $event)->withStatus('Event saved succesfully!');
    }

    public function destroy(Event $event)
    {
		$event->delete();
		return redirect()->route('events.tickets.index')->withStatus('Event deleted succesfully!');
    }
}
