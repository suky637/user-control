<?php
  session_start();
  
  $conn = mysqli_connect('localhost','root','','surplusactif');

  echo "<script>window.location.href = '/login.php'</script>";

  session_destroy();
 ?>
