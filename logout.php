<?php
  session_start();
  
  $conn = mysqli_connect('localhost','root','','webster');

  echo "<script>window.location.href = '/login.php'</script>";

  session_destroy();
 ?>
