<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Collective\Html\Eloquent\FormAccessible;
use Carbon\Carbon;

class Event extends Model
{
	use FormAccessible;
	
    protected $fillable = [
		'name',
	];
	
	protected $dates = [
		'starts_at',
	];
	
	public function tickets(): Relation {
		return $this->hasMany(Ticket::class);
	}
	
	public function formStartsAtAttribute(Carbon $startsAt)
    {
		return $startsAt->format('Y-m-d\TH:i');
	}
	
	public function getStartsAtDisplayAttribute() 
	{
		return $this->starts_at->format('d-m-Y H:i');
	}	
	
}
