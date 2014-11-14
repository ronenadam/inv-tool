<?php
   include("./common.php");

   $item = [
      "item_id" => "",
      "item_name" => "",
      "item_price" => "",
      "item_color" => "",
      "item_condition" => ""
   ];
   
   // Populate the table for the specified item.
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET["item_id"]) && !empty($_GET["item_id"])) {
         $item_id = $_GET["item_id"];
      }

      if (isset($item_id)) {
         $item = getItemById($item_id);
      }
   // DB transaction or problem caused redirect.
   } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $item_id = $_POST["item_id"];

      $result = deleteItemById($item_id);
      
      if ($result) {
         header("Location: index.php");
         die();
      } else {
         // TODO Log this.
         $error_message = "Did not save.";
      }
   }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Inventory Tool - Delete Item</title>
      
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
      <!-- Header -->
      <div id="header"><?php include("../html/header.html") ?></div>
      
      <!-- Content -->
         <div class="row">
            <div class="col-xs-1"></div>
            <div class="col-xs-10">
               <div class="alert alert-danger-custom text-center" id="warning">
                  <p><h4>Delete this item?</h4></p>
               </div> 
               <table class="table table-striped">
                  <thead>
                     <th>Inventory ID</th>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Color</th>
                     <th>Condition</th>
                  </thead>
               <?php
                  // Get the item data and populate a table.
                  $data = getItemById($item_id);

                  echo "<tr>
                     <td>$item_id</td>
                     <td>" . $item['item_name'] . "</td>
                     <td>" . $item['item_price'] . "</td>
                     <td>" . $item['item_color'] . "</td>
                     <td>" . $item['item_condition'] . "</td>
                     </tr>";
               ?>
               </table>              
               <form action="./delete-item.php" method="POST">
                  <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
                  
                  <div class="row">
                     <div class="col-xs-2">
                        <input class="btn-link" type="submit" value="Delete this item" id="delete_item">
                     </div>
                     <div class="col-xs-1 href-text-align-with-button-text">
                        <a href="./index.php" id="cancel_delete_item">Cancel</a>
                     </div>
                  </div>
               </form>
           </div>
           <div class="col-xs-1"></div>
         </div>
      </div>
      
      <!-- Footer -->
      <div id="footer"><?php include("../html/footer.html") ?></div>
   </body>
</html>