<?php
	try{
		$bdd = new PDO('mysql:host=176.132.180.249:3306;dbname=bdd_web;charset=utf8', 'Baptiste', '');
	}catch(Exception $e){

		if($e->getMessage() == "SQLSTATE[HY000] [2005] Unknown MySQL server host '176.132.180.249:3306' (2)")
			$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_web;charset=utf8', 'Baptiste', '');
		else
			echo "Une erreur est survenu à la connexion de la base de donnée ! ".$e->getMessage();

}
