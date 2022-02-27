<?php
session_start();
$conn = mysqli_connect('localhost','root','','webster');

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    echo "<script>window.location.href = '/login.php'</script>";
}
?>
<!-- Add user source code !-->
<html>
<head>
<link rel="stylesheet" href="/fancycss.css">
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
    <p class="text-primary">Add user</p>
    <a href="/index.php">Go Back</a>
    <div class="border-around">
    <p class="paragraph">Name</p><input class="input-350px" type="text" id="Name" name="Name">
    </div><div class="border-around">
    <p class="paragraph">Email</p><input class="input-350px" type="email" id="email" name="email">
    </div><div class="border-around">
    <p class="paragraph">Password</p><input class="input-350px" type="password" id="pwd" name="pswd">
    </div><div class="border-around">
    <p class="paragraph">Image</p><input class="image-bg-gray" type="file" id="image" name="image">
    </div><div class="border-around">
    <p class="paragraph">Details</p><textarea class="input-350px" name="details" id="details"></textarea><br><br>
    </div>
    <button class="button-greenyellow" type="submit" name="submit-btn">Submit</button>
  </form>

  <?php
    $conn = mysqli_connect('localhost','root','','webster');

    if (isset($_POST['submit-btn'])){
      $user_name = $_POST['Name'];
      $user_email = $_POST['email'];
      $user_password = $_POST['pswd'];
      $image = $_FILES['image']['name'];
      $tmp_name = $_FILES['image']['tmp_name'];
      $user_details = $_POST['details'];

      $insert = "INSERT INTO user(user_name,user_email,user_password,user_image,user_details) VALUES('$user_name','$user_email','$user_password','$image','$user_details')";

      $run_insert = mysqli_query($conn, $insert);
      if ($run_insert === true){
        echo "Data Has been Inserted";
        move_uploaded_file($tmp_name, "upload/$image");
      }else {
        echo "Cheh t'es pas beau";
      }
    }
  ?>
</body>
</html>
