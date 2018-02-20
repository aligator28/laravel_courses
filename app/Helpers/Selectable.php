<?php

namespace App\Helpers;


trait Selectable
{
	 public static function getSelectList($value = 'name', $key = 'id') {
	 	return static::owned()->pluck($value, $key);//->owned()
 	}
}
