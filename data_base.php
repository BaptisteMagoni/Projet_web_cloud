<?php 
	try{

	$bdd = new PDO('mysql:host=127.0.0.1;dbname=bdd_web;charset=utf8', 'root', 'batmantiti44');

	}catch(Exception $e){

		echo "Une erreur est survenu à la connexion de la base de donnée ! \n".$e->getMessage();

}