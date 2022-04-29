<?php
 
   require 'config.php';

if(isset($_POST['add_name'])){

   $argo_name = $_POST['argo_name'];

   if(empty($argo_name)){
      $message[] = 'Veuillez remplir le champ';
   }else{
      $insert = "INSERT INTO names(name) VALUES('$argo_name')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($product_image_tmp_name, $product_image_folder);
         $message[] = 'Nouveau Argonautes ajouté !';
      }else{
         $message[] = 'Problême d\'ajout';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM names WHERE id = $id");
   header('location: index.php');
};

?>

<!DOCTYPE html>    
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Argonautes</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<!-- Header section -->
<header>
  <h1>
    <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
    Les Argonautes
  </h1>
</header>

<!-- Main section -->
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Ajouter un nouveau membres</h3>
         <input type="text" placeholder="Entrer le nom du nouveau membres" name="argo_name" class="box">
         <input type="submit" class="btn" name="add_name" value="Enregistrer l'Argonautes">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM names");
   
   ?>

   <h4 class="table-head">Membres de l'équipage :</h4>

   <div class="product-display">
      <table class="product-display-table">
         <!-- <thead> -->
         <!-- <tr>
            <th>Membres de l'équipage</th>
         </tr> -->
         <!-- </thead> -->
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['name']; ?></td>
           
         </tr>
      <?php } ?>
      </table>
   </div>

</div>

<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
</footer>
</html>