<?php /*
	private $host = "localhost";
	private $db = "myblog";
	private $username = "root";
	private $password = " ";
	private $charset = "utf8";*/
		try
		{
			$db=new PDO("mysql:host=localhost;
			dbname=myblog;
			charset=utf8;",'root','123456');
		}
		catch(PDOExpception $e)
		{
			/*echo $e->getMessage();*/
			echo 'error';
			print_r($e);
		}
 ?>
