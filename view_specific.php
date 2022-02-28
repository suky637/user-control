<link rel="stylesheet" href="/fancycss.css">
<html>
    <?php
        session_start();
        $conn = mysqli_connect('localhost','root','','surplusactif');

        if (!isset($_SESSION['username']) && !isset($_SESSION['password'])){
            echo "<script>window.location.href = '/login.php'</script>";
        }
    ?>
    <body>
        <a href="/view_user.php">Back</a>
        <h1>View user</h1>
        <p>This is the user publish</p>

        <table class="table-grid">
            <thead>
                <tr>
                    <th>Article</th>
                    <th>date</th>
                    <th>Quantité</th>
                <hr>
                </tr>
            </thead>
            
            <tbody>
            <?php
                if (isset($_GET['userid']))
                {
                    $user_id_c = $_GET['userid'];
                    $select = "SELECT * FROM articles WHERE userid='$user_id_c'";
                    
                    $run = mysqli_query($conn,$select);
                    $row_user = mysqli_fetch_array($run);
                    if ($row_user != NULL)
                    {
                        $titre = $row_user['titre'];
                        $date = $row_user['datetime_post'];
                        $quantite = $row_user['quantite'];
                    }
                }
            ?>
            <td class="middle-element"><?php if ($row_user != NULL)echo $titre; else echo "NULL"?></td>
            <td class="middle-element"><?php if ($row_user != NULL)echo $date;?></td>
            <td class="middle-element"><?php if ($row_user != NULL)echo $quantite;?></td>
            </tbody>
        </table>
    </body>
</html>