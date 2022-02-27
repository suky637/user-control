<?php
session_start();
$conn = mysqli_connect('localhost','root','','webster');

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    echo "<script>window.location.href = '/login.php'</script>";
}
?>
<!-- Add user source code !-->
<html>
<body>
  <a href="/view_user.php">Go Back</a>
  <h1>Edit User</h1>
  <?php
    $conn = mysqli_connect('localhost','root','','webster');
    if (isset($_GET['edi'])){
      $edit_id = $_GET['edi'];
      $select = "SELECT * FROM user WHERE user_id='$edit_id'";
      $run = mysqli_query($conn, $select);
      $row_user = mysqli_fetch_array($run);
      $user_id = $row_user['user_id'];
      $user_name = $row_user['user_name'];
      $user_email = $row_user['user_email'];
      $user_image = $row_user['user_image'];
      $user_details = $row_user['user_details'];
      $user_password = $row_user['user_password'];
    }
  ?>
  <form action="" method="post" enctype="multipart/form-data">

    <p>Name</p><input type="text" id="Name" name="Name" value="<?php echo $user_name; ?>">
    <p>Email</p><input type="email" id="email" name="email" value="<?php echo $user_email; ?>">
    <p>Password</p><input type="password" id="pwd" name="pswd" value="<?php echo $user_password; ?>"><br>
    <p>Image</p><input type="file" id="image" name="image" >
    <p>Details</p><textarea name="details" id="details"><?php echo $user_details; ?></textarea><br><br>

    <button type="submit" name="submit-btn">Submit</button>
  </form>

  <?php
    $conn = mysqli_connect('localhost','root','','webster');

    if (isset($_POST['submit-btn'])){
      $euser_name = $_POST['Name'];
      $euser_email = $_POST['email'];
      $euser_password = $_POST['pswd'];
      $eimage = $_FILES['image']['name'];
      $etmp_name = $_FILES['image']['tmp_name'];
      $euser_details = $_POST['details'];

      if (empty($eimage)){
        $eimage = $user_image;
      }

      $update= "UPDATE user SET user_name='$euser_name',user_email='$euser_email',user_password='$euser_password',user_image='$eimage',user_details='$euser_details' WHERE user_id='$edit_id'";

      $run_update = mysqli_query($conn, $update);
      if ($run_update === true){
        echo "Data Has been Upgraded";
        move_uploaded_file($etmp_name, "upload/$eimage");
      }else {
        echo "Cheh t'es pas beau";
      }
    }
  ?>
</body>
</html>
