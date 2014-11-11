<?php
   // Get a connection to the database.
   function getConnection() {
   
      $host = "localhost";
      $user = "inv_user";
      $pass = "inv123";
      $db = "invdemo";
   
      $connection = @mysqli_connect($host, $user, $pass, $db);

      if (mysqli_connect_errno()) {
         // TODO Log error to file? "Failed to connect to MySQL: ".mysqli_connect_error()
      }
      
      return $connection;
   }
   
   /* Retrieve the data from the database.
      Depending on the response from the DB.
      DB contained data, returns: An array of arrays of key-value pairs.
      DB exists but is empty, returns: An empty array.
      DB did not exist, returns: false.
      */  
   function getInventory() {
      
      $connection = getConnection();
      
      if ($connection) {
         $data = mysqli_query($connection, "SELECT * FROM inventory");
         
         // DB contained data.
         while ($row = mysqli_fetch_assoc($data)) {
            $result[] = $row;
         }

         mysqli_close($connection);
      } else {
         // DB did not exist.
         return false;
      }
      
      // DB was empty.
      if (empty($result)) {
         $result = [];
      }
      
      return $result;
   }
   
   // Retrieve an item from the database. Return it as an array of key-value pairs.
   function getItemById($id) {
      
      $connection = getConnection();
      
      // TODO Prevent SQL injection. Prepared statement?
      $data = mysqli_query($connection, "SELECT * FROM inventory WHERE item_id = $id");

      $result = mysqli_fetch_assoc($data);
      
      mysqli_close($connection);

      return $result;
   }

   // Inserts a new item or updates an existing item in the database.
   function saveOrUpdateItem($item) {
      
      $connection = getConnection();
 
      $item_id = $item['item_id'];
      $item_name = $item['item_name'];
      $item_price = $item['item_price'];
      $item_color = $item['item_color'];
      $item_condition = $item['item_condition'];
      
      // If the id field is blank, it's a new entry in the database.
      if (empty($item_id)) {
         $result = mysqli_query($connection, "INSERT INTO inventory 
            (item_name, item_price, item_color, item_condition)
            VALUES ('$item_name', $item_price, '$item_color', '$item_condition')");
      // If the id field is set, it's an update to an existing item.
      } else {
         $result = mysqli_query($connection, "UPDATE inventory 
            SET item_name='$item_name', item_price=$item_price, item_color='$item_color',
               item_condition='$item_condition'
            WHERE item_id=$item_id");
      }
      
      mysqli_close($connection);
      
      return $result;
   }
   
   // Deletes an item from the database.
   function deleteItemById($id) {
   
      $connection = getConnection();

      $result = mysqli_query($connection, "DELETE FROM inventory WHERE item_id=" . $id);

      mysqli_close($connection);
      
      return $result;
   }
   
   // Validate form.
   function validateForm($data) {
      
      /* If all fields other than the first field, item_id, are blank, reject the submission.
         New items won't have an item_id yet.
      */
      foreach (array_slice($data, 1) as $value) {
         if ($value == "") {
            return false;
         }
      }
      
      return true;
   }
?>