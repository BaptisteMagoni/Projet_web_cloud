<?php
	try{
		$bdd = new PDO('mysql:host=192.168.1.37:3306;dbname=bdd_web;charset=utf8', 'Baptiste', 'titibaba44');
	}catch(Exception $e){

		if($e->getMessage() == "SQLSTATE[HY000] [2005] Unknown MySQL server host '192.168.1.37:3306' (2)")
			$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_web;charset=utf8', 'Baptiste', 'titibaba44');
		else
			echo "Une erreur est survenu à la connexion de la base de donnée ! ".$e->getMessage();

}