<?php 
if(isset($_POST['valide'])){
	$username = htmlspecialchars($_POST['identifie']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$passwd = htmlspecialchars($_POST['passwd']);

	if(!empty($username) OR !empty($nom) OR !empty($prenom) OR !empty($passwd)){
		$req_user = $bdd->prepare("INSERT INTO users(username, password, nom, prenom, grade) VALUES (?,?,?,?,?)");
		$req_user->execute(array($username, $passwd, $nom, $prenom, "Visiteur"));
		header('Location:'.$adresse);
	}else{
		echo "error";
	}
}
?>