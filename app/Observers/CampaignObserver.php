<?php
namespace App\Observers;

use App\Campaign;
use Auth;

class CampaignObserver
{
	// method fire on creating new Instanse and updating
    public function saving (Campaign $campaign) {
    	$campaign->created_by = Auth::user()->id;
        return $campaign;
    }
}