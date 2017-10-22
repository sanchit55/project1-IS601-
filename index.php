<?php

class Assembly{
	public static function autoload($class)
	{
		include $class . '.php'; // Specific Files to be loaded
	}
}
spl_autoload_register(array('Assembly','autoload')); //To create a queue of autoload function
$obj = new main();

class main{
	public function __construct()
	{
		$pageCall='formlayout';
		if(isset($_REQUEST['sheet'])) // Requsting variables from the sheet
		{
			$pageCall = $_REQUEST['sheet'];   
		}

		$sheet = new $pageCall;
		if($_SERVER['REQUEST_METHOD'] == 'GET') //Contans server and execution envoirnment information 
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
