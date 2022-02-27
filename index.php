<link rel="stylesheet" href="/fancycss.css">
<?php
  session_start();
  $conn = mysqli_connect('localhost','root','','webster');

  if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
      echo "<script>window.location.href = '/login.php'</script>";
  }
  echo "<p class='text-primary'>Bienvenue ";
  echo $_SESSION['username'];

  echo "</p>";
  echo "<hr>";
  echo "<a class='button-green' href='/add_user.php'>Add User</a><br><br>";
  echo "<a class='button-greenyellow' href='/view_user.php'>View user</a><br><br><br>";
  echo "<a class='button-red' href='/logout.php'>Disconnect</a>";
?>
