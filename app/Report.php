<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Report extends Model
{
	use SoftDeletes;
    protected $fillable = ['recipient', 'event', 'campaign_id', 'created_by', 'event_date'];

    public function campaign()
    {
       return $this->belongsTo(Campaign::class);
    }

    public function scopeOwned($query) {
      return $query->where('created_by', Auth::user()->id);
    }
}
