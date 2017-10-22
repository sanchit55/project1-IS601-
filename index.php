<?php

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
		if(isset($_REQUEST['sheet']))
		{
			$pageCall = $_REQUEST['sheet'];
		}

		$sheet = new $pageCall;
		if($_SERVER['REQUEST_METHOD'] == 'GET')
		{
			$sheet->get();
		}
		else
		{
			$sheet->post();
		}
	}
}

abstract class sheet{
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
