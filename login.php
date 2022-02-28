<?php session_start(); ?>
<html>
  <body>
    <h1>Login</h1>
    <form method="post">
      <input type="text" placeholder="Username" required="required" name="username">
      <br>
      <input type="password" placeholder="Password" name="password">
      <br>
      <button type="submit" name="submit_btn">Log in</button>
    </form>

    <?php
      $conn = mysqli_connect('localhost','root','','surplusactif');

      if (isset($_POST['submit_btn']))
      {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = false;

        $select = "SELECT * FROM user";
        $run = mysqli_query($conn,$select);
        while($row_user = mysqli_fetch_array($run)){
          $db_name = $row_user['user_name'];
          $db_password = $row_user['user_password'];
          $db_id = $row_user['user_id'];

          if ($username == $db_name && $password == $db_password){
            echo "<script>window.location.href = '/index.php';</script>";
            $_SESSION['username'] = $db_name;
            $_SESSION['password'] = $db_password;
            $_SESSION['id'] = $db_id;
            $login = true;
            break;
          }
        }
        if ($login == false){
          echo "Login failed; the username or password are incorrect";
        }
      }
    ?>

  </body>
</html>
