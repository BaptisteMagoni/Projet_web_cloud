<?php 
if(isset($_POST['btn_connexion'])){
	$id = $_POST['id'];
	$password = $_POST['passwd'];
	if(!empty($id) || !empty($password)){
		echo $id." : ".$password;
	}else{
		$erreur = "Il manque une information au formulaire de connexion. Ressayer !";
	}
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="Styles/index.css">
<!------ Include the above in your HEAD tag ---------->
<html>
  	<head>
	  	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  	</head>
	<body id="LoginForm">
		<div class="container">
		<h1 class="form-heading">Serveur Magoni</h1>
			<div class="login-form">
				<div class="main-div">
				    <div class="panel">
					   	<h2>Panel de connexion</h2>
					   	<p>Entrez votre identifiant et votre mot de passe</p>
				   	</div>
				    <form method="POST">
				    	<div class="form-group">
				            <input type="text" name="id" class="form-control" placeholder="Identifiant">
				        </div>
				        <div class="form-group">
				            <input type="password" name="passwd" class="form-control" id="inputPassword" placeholder="Password">
				        </div>
				        <div class="forgot">
				        	<a href="reset.html">Mot de passe perdu?</a>
						</div>
				        <button type="submit" name="btn_connexion" class="btn btn-primary">Connexion</button>
				    </form>
				</div>
			</div>
		</div>
	</body>
</html>