<?php 

namespace Fiesta\Vendor\Error;

/**
* 
*/
class Handler
{
	private $callback;
	private static $ispassed=false;

	// function __construct()
	// {
	// 	// $callback = call_user_func("Fiesta\Vendor\Error\Handler::run");
	// 	set_error_handler(array($this,"run"));
	// 	set_exception_handler(array($this, "excep"));
	// 	register_shutdown_function(array($this, "reg"));
		
	// }

	public function load()
	{
		// $callback = call_user_func("Fiesta\Vendor\Error\Handler::run");
		set_error_handler(array($this,"run"));
		set_exception_handler(array($this, "excep"));
		register_shutdown_function(array($this, "reg"));
		
	}

	public function run()
	{
		self::$ispassed = false;
		// ob_clean();
		echo "<br>1";
		$error=error_get_last();
		// die(var_dump($error));
		var_dump(debug_backtrace());
		$exception =new \ErrorException ($error["message"]." /1 ",$error["code"],$error["code"], $error["file"], $error["line"]);
		self::excep($exception);
		echo "ERROR";
		// die("run");
	}

	public function reg()
	{
		if( ! self::$ispassed)
		{
			// ob_clean();
			echo "<br>2";
			$error=error_get_last();
			var_dump(debug_backtrace());
			if( ! is_null($error)) 
			{
				$exception =new \ErrorException ($error["code"]."/2",$error["code"],$error["code"], $error["file"], $error["line"]);
				self::excep($exception);
			}
			
			// die("reg");
		}
		
		
		// ;
	}

	public function excep($exp)
	{
		ob_clean();
		self::$ispassed=true;
		echo "<br>3";
		// var_dump($exp);
		echo "<pre>";
		print_r($exp->getTrace());
		die("excep");
	}
}


/*
Excepto => 3
error => 2
*/
