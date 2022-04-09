<?php
include("database.php");

session_start();

if(strlen($_SESSION['login'])==0) {
	header('location:index.php');

   
} else {
  $dbh= new DataBase();
  $login=$_SESSION['login'];
  $playerId=$_SESSION['id'];
 //pour le menu déroulant
 $sql1 = "SELECT * FROM player WHERE login=:login";
 $query1 = $dbh->prepare ($sql1);
 $query1-> bindParam(':login',$login, PDO::PARAM_STR);
 $query1->execute();

 $results1 = $query1->fetch();
$fullname = $results1['login'];

 }



    $login=$_SESSION['login'];
    $sql2 = "SELECT * FROM player WHERE login NOT IN(:login)";
    $query2 = $dbh->prepare ($sql2);
    $query2-> bindParam(':login',$login, PDO::PARAM_STR);
    $query2->execute();
   
    $results2 = $query2->fetchAll(PDO::FETCH_OBJ);


 
    $sql3 = "SELECT * FROM game";
    $query3 = $dbh->prepare ($sql3);
  
    $query3->execute();
   
    $results3 = $query3->fetchAll(PDO::FETCH_OBJ);

    if(isset($_GET['del'])){
      $delete=$_GET['del'];
      $dbh= new DataBase();
      $sqlDel="DELETE FROM game WHERE id=:delete";
      $queryDel=$dbh->prepare($sqlDel);
      $queryDel->bindParam(':delete',$delete, PDO::PARAM_INT);
      $queryDel->execute();
      header('location.list.php');

      //je dois ajouter delete dans la table gamedata
    }

    if(isset($_POST['add'])){
      $dbh= new DataBase();

    $color=$_POST['color'];
    $adversaire=$_POST['adversaire'];

    $sql4="INSERT INTO game (white, black) VALUES (:white, :black)";
    $query4 = $dbh->prepare ($sql4);
    $query4-> bindParam(':white',$color, PDO::PARAM_STR);
    $query4-> bindParam(':black',$adversaire, PDO::PARAM_STR);
    $query4->execute();
   
  
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

            
              <h3> Vous etes connecté en tant que <span><?php echo $fullname ?>  </span></h3>
   <div class="content-wrapper">
    	<div class="container">
    		<div class="row">
          	<div class="col-md-12">
              <form name = "form" method="post" action="list.php">
                <div class="form-group">
                <label>Votre couleur<span style="color:red">*</span></label>
                    <select class="form-control"  name="color">
                        <option value="<?php echo $_SESSION ['id']?>">white</option>
                        <option value="<?php echo $_SESSION ['id']?>">black</option>
                        </select>
                    </div>
                    <div>
                    <label>Adversaire<span style="color:red">*</span></label>
                    <select class="form-control" name="adversaire">
                        <option value ="">Choisir un adversaire</option>
                        <?php
                       if(is_array( $results2)){
                        foreach($results2 AS $result2){
                        ?>

                       
                        <option value="<?php echo $result2->id?>"> <?php echo $result2->login ?>
                    </option>

                      <?php
                     }
                    }
                    ?>
                    </select>
                    </div>
                    <button type="submit" name="add" class="btn btn-info">Créer une partie</button>
                    </form>
                    </div>
                  </div>
      	      	</div>
                <div class="row">
                 <div class="col-md-6">
                <table class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                <th scope="col">#</th>
                                <th scope="col">BLANC</th>
                                <th scope="col">NOIR</th>
                                <th scope="col">Action</th>
                
                </tr>
                </thead>
                <tbody>

                <tr>
                <?php
                if(is_array( $results3)){
                  $cnt=1;
                        foreach($results3 AS $result3){
                            $sqla = "SELECT login FROM player WHERE id=".$result3->white;
                            $sqlb = "SELECT login FROM player WHERE id=".$result3->black;

                            $querya = $dbh->prepare ($sqla);
                            $querya->execute();
                            $resulta = $querya->fetch(PDO::FETCH_OBJ);

                            $queryb = $dbh->prepare ($sqlb);
                            $queryb->execute();
                            $resultb = $queryb->fetch(PDO::FETCH_OBJ);



                        ?>
                                <td scope="row"><?php echo $cnt ?></td>
                                <td class='center'><?php echo $resulta->login; ?></td>
                                <td class='center'><?php echo $resultb->login; ?></td>

                                
                                <td > 
                                <?php 
                                
                                   
                                  if(!empty($fullname===$resulta->login)){
                                    ?>
                                         <a href="game.php?sid=<?php echo $result3->id ?>">
                                         <button type="button" class="btn btn-primary">Rejoindre</button>
                                          </a>
                                          <a href="list.php?del=<?php echo $result3->id ?>">
                                         <button type="button"  class="btn btn-danger">Supprimer</button>
                                         </a> 

                                 <?php }elseif(!empty($fullname===$resultb->login)){?>
                                  <a href="game.php?sid=<?php echo $playerId?>"> 
                                          <button type="button" class="btn btn-primary">Rejoindre</button></a>
                                          <a href="list.php?del=<?php echo $result3->id ?>">
                                         <button type="button"  class="btn btn-danger">Supprimer</button> 
                                         </a>
                                           <?php }else{

                                           }

                                         
                                        
                                 
                                 ?>  
                                 
                                </td>


                            </td>
                           
                        </tbody>  
                         <?php
                         $cnt++;
                        }
                    }
                    ?> 
                                    </div>
                                    </div>
    <!-- CORE JQUERY  -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

