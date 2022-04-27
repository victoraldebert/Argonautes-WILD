<?php
   include 'config.php';

if(isset($_POST['add_name'])){

   $argo_name = $_POST['argo_name'];
   

   if(empty($argo_name)){
      $message[] = 'Veuillez remplir le champs';
   }else{
      $insert = "INSERT INTO names(name) VALUES('$argo_name')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         $message[] = 'Nouveau Argonautes ajouté !';
      }else{
         $message[] = 'Problême d\'ajout';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM names WHERE id = $id");
   header('location: admin_page.php');
};

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Argonautes</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Header section -->
<header>
  <h1>
    <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
    Les Argonautes
  </h1>
</header>

<!-- Main section -->
<main>
  
  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    <label for="name">Nom de l&apos;Argonaute</label>
    <!-- Pas sûr de lutilité du class box -->
    <input type="text" name="argo_name" placeholder="Charalampos" class="box" />    

    <button type="submit" class="btn" name="add_name">Envoyer</button>
  </form>
  
  <!-- Member list -->
  
</main>

<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
</footer>
</body>
</html>