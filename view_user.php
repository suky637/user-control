<?php
session_start();
$conn = mysqli_connect('localhost','root','','surplusactif');

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    echo "<script>window.location.href = '/login.php'</script>";
}
?>
<html>
<head>
<link rel="stylesheet" href="/fancycss.css">
</head>
<body>
  <p class="text-primary">View User</p>
  <a href="/index.php">Back</a>
  <?php
    $conn = mysqli_connect('localhost','root','','surplusactif');
    if (isset($_GET['del'])){
      $del_id = $_GET['del'];
      $delete = "DELETE FROM user WHERE user_id='$del_id'";
      $run_delete = mysqli_query($conn,$delete);
      if($run_delete === true){
        echo "Record has Been deleted";
      }else {
        echo "Failed try again";
      }
    }
  ?>
  <table class="table-grid">
    <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Image</th>
      <th>Details</th>
      <th>Delete</th>
      <th>Edit</th>
      <th>View</th>
      <hr>
    </tr>
  </thead>
  <tdoby>
    <?php
      $conn = mysqli_connect('localhost','root','','surplusactif');
      $select = "SELECT * FROM user";
      $run = mysqli_query($conn,$select);
      while($row_user = mysqli_fetch_array($run))
      {
        $user_id = $row_user['user_id'];
        $user_name = $row_user['user_name'];
        $user_email = $row_user['user_email'];
        $user_image = $row_user['user_image'];
        $user_details = $row_user['user_details'];
        $user_password = $row_user['user_password'];

    ?>
    <tr>
      <td><?php echo $user_id; ?></td>
      <td><?php echo $user_name; ?></td>
      <td><?php echo $user_email; ?></td>
      <td><?php echo $user_password; ?></td>
      <td><img src="upload/<?php echo $user_image; ?>" height="50px"></img></td>
      <td><?php echo $user_details; ?></td>
      <td class="middle-element"><a class='button-red' href="view_user.php?del=<?php echo $user_id;  ?>">Delete</a></td>
      <td class="middle-element"><a class='button-green' href="/edit_user.php?edi=<?php echo $user_id ?>">Edit</a></td>
      <td class="middle-element"><a class='button-greenyellow' href="/view_specific.php?userid=<?php echo $user_id?>">View user</a></td>
    <?php } ?>
  </tbody>

  </table>
