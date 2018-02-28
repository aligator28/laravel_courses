<?php

namespace App\Helpers;

trait ReportHelper
{
	private function rounded($one, $all)
	{
		return round( (($one / $all) * 100), 2);
	}
}
