<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;

class Review extends Model
{
	public function car()
	{
		return $this->belongsTo(Car::class);
	}
}
