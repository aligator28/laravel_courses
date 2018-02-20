<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helpers\GetSelected;
use App\Helpers\Selectable;
use Auth;

class Campaign extends Model
{
	use SoftDeletes, Selectable, GetSelected;
  
    protected $fillable = ['name', 'descr', 'created_by', 'sent'];

    public function bunch()
    {
       return $this->belongsTo(Bunch::class);
    }

    public function template()
    {
       return $this->belongsTo(Template::class);
    }
    
    public function scopeOwned($query) {
      return $query->where('created_by', Auth::user()->id);
    }
}
