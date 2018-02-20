<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\Selectable;
use Auth;

class Template extends Model
{
	use SoftDeletes, Selectable;
    protected $fillable = ['name', 'content', 'created_by'];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

	public function scopeOwned($query){
		return $query->where('created_by', Auth::user()->id);
	}

}
