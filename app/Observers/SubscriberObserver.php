<?php
namespace App\Observers;

use App\Subscriber;
use Hash;

class SubscriberObserver
{
	// method fire on creating new Instanse and updating
    public function saving (Subscriber $subscriber) {
    	
    	$subscriber->hash = Hash::make($subscriber->email);
        return $subscriber;
    }
}