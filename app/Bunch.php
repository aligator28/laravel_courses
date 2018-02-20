<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\Selectable;
use App\Helpers\GetSelected;
use Auth;

class Bunch extends Model
{
	use SoftDeletes, Selectable, GetSelected;

    protected $fillable = ['name', 'descr', 'created_by', 'campaign_id'];

    public function subscribers()
	{
	    return $this->belongsToMany(Subscriber::class)
	      ->withTimestamps();
	}

	public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

	public function scopeOwned($query) {
	 	return $query->where('created_by', Auth::user()->id);
	}
}
