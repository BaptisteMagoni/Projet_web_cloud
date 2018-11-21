<?php 
	$list_ip = array('127.0.0.1', '192.168.1.37');
	try{
		foreach($list_ip as $ip){
			try{
				$bdd = new PDO('mysql:host='.$ip.':3306;dbname=bdd_web;charset=utf8', 'Baptiste', 'titibaba44');
				break;
			}catch(Exception $e){

			}
		}

	}catch(Exception $e){

		echo "Une erreur est survenu à la connexion de la base de donnée ! \n".$e->getMessage();

}