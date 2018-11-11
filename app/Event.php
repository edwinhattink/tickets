<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
	
	public function formStartsAtAttribute(Carbon $startsAt)
    {
		return $startsAt->format('Y-m-d\TH:i');
    }
}
