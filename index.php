<?php
   require 'config.php';
// PHP du formaulaire
if(isset($_POST['add_name'])){

   $argo_name = $_POST['argo_name'];

   if(empty($argo_name)){
   }else{
      $insert = "INSERT INTO names(name) VALUES('$argo_name')";
      $upload = mysqli_query($conn,$insert);
   }
};
?>

<!DOCTYPE html>    
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Argonautes</title>
   <link rel="stylesheet" href="public.css">
</head>

<header>
  <h1>
    <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
    Les Argonautes
  </h1>
</header>

<div class="container">

   <!--Formulaire-->
   <div class="admin-product-form-container">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Ajouter un nouveau membre</h3>
         <input type="text" placeholder="Entrez un nom" name="argo_name" class="box">
         <input type="submit" class="btn" name="add_name" value="Enregistrer l'Argonaute">
      </form>
   </div>

   <?php
   $select = mysqli_query($conn, "SELECT * FROM names");
   ?>

   <!--Liste des nouveaux membres-->
   <h4 class="table-head">Membres de l'équipage :</h4>

   <div class="product-display">
      <table class="product-display-table">
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['name']; ?></td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>

<footer>
  <p>Réalisé par Victor en Anthestérion de l'an 515 avant JC</p>
</footer>
</html>