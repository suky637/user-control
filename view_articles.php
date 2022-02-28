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
  <p class="text-primary">View Articles</p>
  <a href="/index.php">Back</a>
  <?php
    $conn = mysqli_connect('localhost','root','','surplusactif');
    if (isset($_GET['del'])){
      $del_id = $_GET['del'];
      $delete = "DELETE FROM articles WHERE id='$del_id'";
      $run_delete = mysqli_query($conn,$delete);
      if($run_delete === true){
        echo "Record has Been deleted";
      }else {
        echo "Failed try again";
      }
    }
  ?>
  <br><br><a class='button-greenyellow' href="/create_article.php">Create Article</a><br>
  <table class="table-grid">
    <thead>
    <tr>
      <th>id</th>
      <th>Catégorie</th>
      <th>title</th>
      <th>contenu</th>
      <th>quantité</th>
      <th>image</th>
      <th>date</th>
      <th>delete</th>
      <th>edit</th>
      
    </tr>
  </thead>
  <br>
  <input type="text" placeholder="Search a category"><button>Search</button>
  <tdoby>
  <hr>
    <?php
      $conn = mysqli_connect('localhost','root','','surplusactif');
      $select = "SELECT * FROM articles";
      $run = mysqli_query($conn,$select);
      while($row_user = mysqli_fetch_array($run))
      {
        $id = $row_user['id'];
        $titre = $row_user['titre'];
        $contenu = $row_user['contenu'];
        $categorie = $row_user['categorie'];
        $quantite = $row_user['quantite'];
        $user_image = $row_user['user_image'];
        $datetime_post = $row_user['datetime_post'];
        $userid = $row_user['userid'];
    
        $select2 = "SELECT * FROM user WHERE user_id='$userid'";            
        $run2 = mysqli_query($conn,$select2);
        $row_user2 = mysqli_fetch_array($run2);

        if ($row_user2 != NULL)
        {
            $username = $row_user2['user_name'];
        }

    ?>
    <tr>
      <td><?php echo $id; ?></td>
      <td><?php echo $categorie?></td>
      <td><?php echo $titre; ?></td>
      <td><?php echo $contenu; ?></td>
      <td><?php echo $quantite; ?></td>
      <td><img src="upload/<?php echo $user_image; ?>" height="50px"></td>
      <td><?php echo $datetime_post; ?></td>
      <td class="middle-element"><a class='button-red' href="/view_article.php?del=<?php echo $id;  ?>">Delete</a></td>
      <td class="middle-element"><a class='button-green' href="/edit_articles.php?edi=<?php echo $id ?>">Edit</a></td>
    <?php } ?>
  </tbody>

  </table>
