<?php 
namespace Ihorhnatchuk\LKClient\Facades;

use Illuminate\Support\Facades\Facade;

class KeitaroAdv extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'keitaro-adv';
	}
}