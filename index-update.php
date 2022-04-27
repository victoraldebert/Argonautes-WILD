<?php

include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $argo_name = $_POST['argo_name'];

   if(empty($argo_name)){
      $message[] = 'Remplissez le champ';    
   }else{

      $update_data = "UPDATE names SET name='$argo_name' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         header('location:admin_page.php');
      }else{
         $$message[] = 'Remplissez le champ'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM names WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <!-- <h3 class="title">Mettre à jour le produit</h3> -->
      <input type="text" class="box" name="argo_name" value="<?php echo $row['name']; ?>" placeholder="Entrez le nom du membres">
      <!-- <a href="admin_page.php" class="btn">Revenir en arrière</a> -->
   </form>

   <?php }; ?>

</div>

</div>

</body>
</html>