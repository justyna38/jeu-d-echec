<?php
// On inclue le fichier de connexion a la base de donnees
include("database.php");


// On d�marre ou on r�cup�re la session courante
session_start();

// On invalide le cache de session $_SESSION
if(isset($_SESSION['login'])){
	$_SESSION = [];
	
}

if(isset($_POST['login'])){
	// On récupère le nom de l'utilisateur saisi dans le formulaire
	$nom=$_POST['nom'];
	// On récupère le mot de passe saisi par l'utilisateur et on le crypte (fonction md5)
	$password=md5($_POST['password']);

	$dbh= new DataBase();
	var_dump($_POST);
	
	// On construit la requete qui permet de retrouver l'utilisateur
	// A partir de son nom et de son mot de passe depuis la table admin
	$sql="SELECT * FROM player WHERE login=:nom AND password=:password";
	$query=$dbh->prepare($sql);
    $query->bindParam(':nom', $nom,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
                

	// On execute la requete
	$query->execute();
	$result=$query->fetch(PDO::FETCH_OBJ);
		// Si le resultat de recherche n'est pas vide
		if(!empty($result)){
		// On stocke le login et l'id de l'utilisateur  $_POST['login'] dans $_SESSION
		$_SESSION['id']=$result->id;
		$_SESSION['login']=$result->login;
		// On redirige l'utilisateur vers le fichier list.php
		header('location:list.php');

		// sinon le login est refusé. On le signal par une popup
	}
	else{
		echo"<script>alert('Compte bloqué')</script>";
	}
	}

?>
<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Online Chess</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <h1>Online Chess</h1>
    <hr />
		<!--On affiche le titre de la page-->
		<h1 class="col-lg-7"> Login </h1>      
	    <!--On affiche le formulaire de login-->
		<form name="form" method="post" action="index.php">
<div class="form-group col-md-8">
	<label form="name" for="exampleInputEmail1">Votre login</label>
	<input name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>
<div class="form-group col-md-8">
	<label form="name" for="exampleInputPassword1">Mot de passe</label>
	<input   name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		<a href="user-forgot-password.php"><p>Mot de passe oublié ?</p></a>
</div>
<br>

<button type="submit" name="login" class="btn btn-outline-success" >Login</button> 
<div class="dropdown-divider"></div>
  <a class="dropdown-item" href="signup.php"  style="color: red;">J'ai pas de compte</a>

  </form>
	
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

