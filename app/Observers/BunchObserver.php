<?php
namespace App\Observers;

use App\Bunch;
use Auth;

class BunchObserver
{
	// method fire on creating new Instanse and updating
    public function saving (Bunch $bunch) {
    	$bunch->created_by = Auth::user()->id;
        return $bunch;
    }
}