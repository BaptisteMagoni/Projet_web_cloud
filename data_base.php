<?php 
	try{

	$bdd = new PDO('mysql:host=192.168.1.37;port=5432;dbname=bdd_web;charset=utf8', 'baptiste', 'titibaba44');

	}catch(Exception $e){

		echo "Une erreur est survenu à la connexion de la base de donnée ! \n".$e->getMessage();

}