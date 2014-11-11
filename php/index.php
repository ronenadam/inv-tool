<!DOCTYPE html>
<html>
   <head>
      <title>Inventory Tool - Main</title>
      
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
      <br>
      <div class="container-fluid center-block">
         <div class="row">         
            <div class="container" id="content">
               <?php include("./inventory.php"); ?>
            </div>     
         </div>   
      </div>     
      <div id="footer"><?php include("../html/footer.html") ?></div>
      
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="../js/bootstrap.min.js"></script>
   </body>
</html>