<?php
require_once "class.chess.php";

session_start();

// On initialise le tableau $_SESSION

if (!isset($_SESSION['idgame']) or ($_SESSION['idgame'] == 0)) {
  if (isset($_GET['color'])) {
    if ($_GET['color'] == 'white') {
      $_SESSION['white'] = $_SESSION['id'];
      $_SESSION['black'] = $_GET['opponent'];
    } else {
      $_SESSION['black'] = $_SESSION['id'];
      $_SESSION['white'] = $_GET['opponent'];
    }
  }
  $_SESSION['idgame'] = 0;
}

if (isset($_GET['game']) && ($_GET['game'] > 0)) {
  $_SESSION['white'] = $_GET['white'];
  $_SESSION['black'] = $_GET['black'];
  $_SESSION['idgame'] = $_GET['game'];
}



// On instancie la classe OnlineChess
$chess = new OnlineChess();

// On recupere le login du joueur dont c'est le tour par la methode $chess->getPlayer
$player = $chess->getPlayer();

// On recupere le dossier des images des pièces par la methode $chess->setImageDir
$chess->setImageDir("images/");

?>

<html lang="fr">

<head>
  <?php if ($player != $_SESSION['login']) { ?>
    <!-- NB : ne refraichier la page que si le joueur attend son tour-->
    <meta http-equiv="Refresh" content="5;url=game.php">
  <?php } ?>

  <title>Online Chess \_|_/</title>
  <!-- CUSTOM STYLE  -->
  <link href="css/style.css" rel="stylesheet" />

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
  <!-- script type="text/javascript"	src="js/game.js"></script -->
</head>

<body>
  <h1>Online Chess</h1>
  <a href="list.php">Liste des parties</a> - Connecte en tant que <?php echo $_SESSION['login'] ?>
  <hr>
  <?php
  // On affiche un message aux utilisateurs si nécezzaire
  echo '<p style="text-align: center;">' . $chess->message(true) . '</p>';

  // Affiche le plateau au moyen de la méthode board
  $chess->board();

  // Affiche le formulaire de soumission du mouvement au moyen de la methode form
  $chess->form();
  ?>
</body>

</html>