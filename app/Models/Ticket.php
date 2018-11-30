<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation;

class Ticket extends Model
{
	
	public function event(): Relation {
		return $this->belongsTo(Event::class);
	}
	
	public function ticketType(): Relation {
		return $this->belongsTo(TicketType::class);
	}
	
}
