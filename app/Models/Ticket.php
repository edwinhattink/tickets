<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Ticket extends Model
{
	
	protected $fillable = [
		'file',
		'ticket_type_id',	
	];
	
	public function event(): Relation {
		return $this->belongsTo(Event::class);
	}
	
	public function ticketType(): Relation {
		return $this->belongsTo(TicketType::class);
	}
	
}
