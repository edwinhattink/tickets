<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    protected $fillable = [
		'name',	
	];
	
	public static function mapIdName(): array {
		return self::all()->mapWithKeys(function ($item) {
			return [$item->id => $item->name];
		})->toArray();
	}
}
