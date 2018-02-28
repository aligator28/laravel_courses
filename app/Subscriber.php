<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\Selectable;


class Subscriber extends Model
{
	use SoftDeletes, Selectable;

    protected $fillable = ['name', 'surname', 'email', 'hash'];

    public function bunches()
	{
	    return $this->belongsToMany(Bunch::class)
	      ->withTimestamps();
	}
	public function scopeOwned($query) {
		// do not do any scope
	 	return $query;
	}
}
