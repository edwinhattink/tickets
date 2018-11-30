<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Http\Request;
use \Storage;

class TicketController extends Controller
{
    public function index(Event $event)
    {
        $tickets = $event->tickets;
		return view('tickets.index', compact('event', 'tickets'));
    }

    public function create(Event $event)
    {
		$ticket = new Ticket();
		$ticketTypes = TicketType::mapIdName();
        return view('tickets.create', compact('event', 'ticket', 'ticketTypes'));
    }

    public function store(Request $request, Event $event)
    {
		$request->validate([
			'ticket' => 'required|file|mimes:pdf',
		], [] , ['ticket' => 'file']);
		
		$ticket = new Ticket();
		$ticket->event_id = $event->id;
		return $this->update($request, $event, $ticket);
    }

    public function show(Event $event, Ticket $ticket)
    {
		throw new Exception('Not implemented');
    }

    public function edit(Event $event, Ticket $ticket)
    {
		if ($ticket->event_id != $event->id) {
			return redirect()->route('events.tickets.index', $event->id)->withStatus('Wrong event!');
		}
		
		$ticketTypes = TicketType::mapIdName();
        return view('tickets.edit', compact('event', 'ticket', 'ticketTypes'));
    }

    public function update(Request $request, Event $event, Ticket $ticket)
    {
		if ($ticket->event_id != $event->id) {
			return redirect()->route('events.tickets.index', $event->id)->withStatus('Wrong event!');
		}
		
        $request->validate([
			'ticket_type_id' => 'required|exists:ticket_types,id',
			'ticket' => 'required_without:file|nullable|file|mimes:pdf',
			'file' => 'required_without:ticket',
		], [
			'required_without' => __('validation.required'),
		]);
		
		$ticket->fill($request->all());
		
		if ($request->ticket) {
			$path = $request->file('ticket')->store('tickets');
			$ticket->file = $path;
		}
		
		$ticket->save();
		
		return redirect()->route('events.tickets.index', [$event])->withStatus('Ticket saved succesfully!');
    }

    public function destroy(Event $event, Ticket $ticket)
    {		
		if ($ticket->event_id != $event->id) {
			return redirect()->route('events.tickets.index', $event->id)->withStatus('Wrong event!');
		}
		
		if (Storage::exists($ticket->file)) {
			Storage::delete($ticket->file);
		}
		
		$ticket->delete();
		
		return redirect()->route('events.tickets.index', $event)->withStatus('Ticket deleted succesfully!');
	}
	
	public function download(Event $event, Ticket $ticket) {
		if ($ticket->event_id != $event->id) {
			return redirect()->route('events.tickets.index', $event->id)->withStatus('Wrong event!');
		}
		
		if (Storage::exists($ticket->file)) {
			$extension = pathinfo($ticket->file, PATHINFO_EXTENSION);
			$name =  $event->name . ' ' . $ticket->ticketType->name . ' ' . $ticket->id . '.' . $extension;			
			return Storage::download($ticket->file, str_replace(' ', '_', $name));	
		}
		
		$ticket->file = null;
		$ticket->save();
		return redirect()->route('events.tickets.edit', [$event, $ticket])->withStatus('Ticket has no file, please upload a new file');		
	}
}
