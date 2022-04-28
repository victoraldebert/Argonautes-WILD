<?php

include 'config.php';               

$id = $_GET['edit'];

// if(isset($_POST['update_product'])){

//    $argo_name = $_POST['argo_name'];

//    if(empty($argo_name)){
//       $message[] = 'please fill out all!';    
//    }else{

//       $update_data = "UPDATE names SET name='$argo_name' WHERE id = '$id'";
//       $upload = mysqli_query($conn, $update_data);

//       if($upload){
//          move_uploaded_file($product_image_tmp_name, $product_image_folder);
//          header('location:index.php');
//       }else{
//          $$message[] = 'please fill out all!'; 
//       }
//    }
// };

?>

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="style.css"> -->
   <link rel="stylesheet" href="public.css">
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

</div>

</div>

</body>
</html>