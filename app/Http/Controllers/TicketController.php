<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Event;
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
        //
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
        //
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
        //
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
        //
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
        //
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
        //
    }
}
