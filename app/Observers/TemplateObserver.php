<?php
namespace App\Observers;

use App\Template;
use Auth;

class TemplateObserver
{
	// method fire on creating new Instanse and updating
    public function saving (Template $template) {
    	$template->created_by = Auth::user()->id;
        return $template;
    }
}