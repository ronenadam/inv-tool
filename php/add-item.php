<?php
   include("./common.php");
  
   $item = [
      "item_id" => "",
      "item_name" => "",
      "item_price" => "",
      "item_color" => "",
      "item_condition" => ""
   ];
   
   $display_error = false;
   
   // If editing an item, populate the form with existing data.
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET["item_id"]) && !empty($_GET["item_id"])) {
         $item_id = $_GET["item_id"];
      }

      if (isset($item_id)) {
         $item = getItemById($item_id);
      }
   // New item or problem with submitting edits to an existing item.
   } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $item = [
         "item_id" => $_POST["id"],
         "item_name" => $_POST["name"],
         "item_price" => $_POST["price"],
         "item_color" => $_POST["color"],
         "item_condition" => $_POST["condition"]
      ];
      
      if (validateForm($_POST)) {
         $result = saveOrUpdateItem($item);
      } else {
         $result = false;
      }

      if ($result) {
         header("Location: index.php");
         die();
      } else {
         $error_message = "Item was not saved.";
         
         $display_error = true;
      }
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Inventory Tool - Add/Edit Item</title>
      
      <!-- Brand icon -->
      <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
      
      <!-- Google fonts -->
      <link href='http://fonts.googleapis.com/css?family=Old+Standard+TT|Montserrat' rel='stylesheet' type='text/css'>

      <!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
      
      <!-- Custom changes to Bootstrap -->
      <link rel="stylesheet" type="text/css" href="../css/custom.css">
   </head> 
   <body>
      <div id="header"><?php include("../html/header.html") ?></div>
      <div class="col-xs-4"></div>
      <div class="col-xs-4">        
         <form action="./add-item.php" method="POST">
            <div class="page-header text-center"><h4>Please describe your item.</h4></div>
            <br>
            <input type="hidden" name="id" value="<?= $item['item_id'] ?>">
            Name<br>
            <input type="text" name="name" class="form-control input-sm" value="<?= $item['item_name'] ?>"><br>
            Price<br>
            <input type="text" name="price" class="form-control input-sm" value="<?= $item['item_price'] ?>"><br>
            Color<br>
            <input type="text" name="color" class="form-control input-sm" value="<?= $item['item_color'] ?>"><br>
            Condition<br>
            <select name="condition" class="form-control input-sm">
               <option value=""></option>
               <option value="NEW" <?= $item['item_condition'] === 'NEW' ? "selected" : "" ?>>New</option>
               <option value="LIKE_NEW" <?= $item['item_condition'] === 'LIKE_NEW' ? "selected" : "" ?>>Like New</option>
               <option value="GENTLY_USED" <?= $item['item_condition'] === 'GENTLY_USED' ? "selected" : "" ?>>Gently Used</option>
               <option value="MODERATE_WEAR" <?= $item['item_condition'] === 'MODERATE_WEAR' ? "selected" : "" ?>>Moderate Wear</option>
            </select>
            <br>
            <input class="btn-link" type="submit" value="Save item" id="save_item">
            <a href="./index.php" id="cancel_new_item">Cancel</a>
         </form>
         <?php
            if ($display_error) {
               echo "<br><div class='alert alert-danger text-center' id='error_message'>
                  <p>Item was not saved.<br><br>Please fill in all fields.</p></div>";
            }
         ?>
      </div>
      <div class="col-xs-4"></div>
      <div id="footer"><?php include("../html/footer.html") ?></div>
   </body>
</html>