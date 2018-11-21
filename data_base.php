<?php 
	try{

	$bdd = new PDO('mysql:host=192.168.1.37;dbname=web_bdd;charset=utf8', 'root', '');

	}catch(Exception $e){

		echo "Une erreur est survenu à la connexion de la base de donnée ! \n";

}