<?php
include("database.php");
// On inclue le fichier de configuration et de connexion à la base de données
if (!empty($_GET['login'])){
    $login=$_GET['login'];

    $dbh = new DataBase();
// On récupère dans $_GET le login soumis par l'utilisateur
$sql="SELECT * FROM player WHERE login=:login";
$query=$dbh->prepare($sql);
$query->bindParam(':login', $login, PDO::PARAM_STR);

$query->execute();

$result=$query->fetch(PDO::FETCH_OBJ);

if(!empty($result)){
    echo "<span style ='color:red'> Cet login existe déja ! </span>";

} else {
    echo "<span style ='color:green'> Cet login est disponible !' </span>";

} 

// On prépare la requete qui recherche la présence de l'email dans la table player

}
?>
