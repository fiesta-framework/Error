<?php 

namespace Fiesta\Vendor\Error;

/**
* 
*/
class Handler
{
	private $callback;

	function __construct()
	{
		$callback = call_user_func("Fiesta\Vendor\Error\Handler","run");
		set_error_handler($callback);
	}
	public function run()
	{
		echo "ERROR";
	}
}