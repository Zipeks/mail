<?php
   session_start();
   if (isset($_SESSION['send'])) {
      echo "<div style='text-align:center;'><h1>Wiadomość została wysłana</h1></div>";
      header( "refresh:5;url=index.php" );
   } else {
      header('Location: index.php');
   }
?>