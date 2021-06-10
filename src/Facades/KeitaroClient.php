<?php 
namespace Ihorhnatchuk\LaravelKeitaro\Facades;

use Illuminate\Support\Facades\Facade;

class KeitaroClient extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'keitaro-client';
	}
}