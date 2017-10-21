<?php
ini_set('display_errors','On');

class Assembly{
	public static function autoload($class)
	{
		include $class . '.php';
	}
}
spl_autoload_register(array('Assembly','autoload'));
$obj = new main();

class main{
	public function __construct()
	{
		$pageCall='formlayout';
		if(isset($_REQUEST['page']))
		{
			$pageCall = $_REQUEST['page'];
		}

		$page = new $pageCall;
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$page->get();
		}
		else
		{
			$page->post();
		}
	}
}

abstract class page{
	protected $html;

	public function __construct()
	{
		$this->html.='<html>';
		$this->html.='<body>';
	}

	public function __destruct()
	{
		$this->html.='</body></html>';
		print($this->html);
	}
}








?>
