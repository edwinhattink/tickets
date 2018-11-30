<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
	 * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        $tickets = $event->tickets;
		return view('tickets.index', compact('event', 'tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
	 * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
		$ticket = new Ticket();
		$ticketTypes = TicketType::mapIdName();
        return view('tickets.create', compact('event', 'ticket', 'ticketTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
		$ticket = new Ticket();
		return $this->update($request, $event, $ticket);
    }

    /**
     * Display the specified resource.
     *
	 * @param  \App\Event  $event
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Ticket $ticket)
    {
		return view('tickets.show', compact('event', 'ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
	 * @param  \App\Event  $event
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event, Ticket $ticket)
    {
		$ticketTypes = TicketType::mapIdName();
        return view('tickets.edit', compact('event', 'ticket', 'ticketType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Event  $event
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, Ticket $ticket)
    {
        $request->validate([
			'ticket_type_id' => 'required|exists:ticket_types,id',
			'file' => 'required|file|mimes:pdf',
		]);
		
		dump($request->all());
		
		throw new \Exception('not implemented');
    }

    /**
     * Remove the specified resource from storage.
     *
	 * @param  \App\Event  $event
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Ticket $ticket)
    {		
		$ticket->delete();
		
		return redirect()->route('events.show', $event);
    }
}
