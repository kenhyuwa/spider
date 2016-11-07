<?php

namespace Kenhyuwa\Spider\Facades;

use Illuminate\Support\Facades\Facade;

class SpiderFacades extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'spider';
	}
}