<?php
   // Get the inventory data.
   include("./common.php");
   $data = getInventory();

   // If the DB exists, populate a table with the inventory data.
   if ($data || gettype($data) === "array") {   
      echo "<table class='table table-striped table-hover'>
               <thead>
                  <th>Inventory ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Color</th>
                  <th>Condition</th>
                  <th></th>
                  <th></th>
               </thead>";
      
      foreach ($data as $value) {
         $id = $value['item_id'];

         echo "<tr>
            <td>$id</td>
            <td>" . $value['item_name'] . "</td>
            <td>" . $value['item_price'] . "</td>
            <td>" . $value['item_color'] . "</td>
            <td>" . $value['item_condition'] . "</td>
            <td><a href='./add-item.php?item_id=$id'>Edit</a></td>
            <td><a href='./delete-item.php?item_id=$id'>Delete</a></td>
            </tr>";
      }
      
      echo "</table>";
      echo "<a href='./add-item.php'>Add an item</a>";
      
   } else {
      echo "<br><div class='alert alert-info text-center'>Failed to connect to server.</div>";
   }
?>


