<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Review;

class Car extends Model
{
	public function reviews()
	{
		return $this->hasMany(Review::class);
	}
}
