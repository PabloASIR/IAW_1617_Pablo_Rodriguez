
<?php
  session_start();


?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    </head>
    <body>

      <?php
      $id = $_GET['id'];
      $connection = new mysqli('localhost', 'root', 'usuario', 'proyecto');

      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      if ($result = $connection->query("SELECT * from links
        where link_id = '$id';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
      //  echo "serie_gender: <input name='gender' value='$obj->serie_gender'\><br><br>";
        echo "link_server: <input name='server' value='$obj->link_server'\><br><br>";
        echo "link_url: <input name='url' value='$obj->link_url'\><br><br>";
        //echo "chapter_season: <input name='season' value='$obj->chapter_season'\><br><br>";
      //  echo "chapter_date_release: <input type='date' name='date_release' value='$obj->chapter_date_release'\><br><br>";
      //  echo "serie_image: <input name='image' value='$obj->serie_image'\><br><br>";
        echo "<button name='edit'>EDITAR</button>"; ?>
        <input type="button" value="Volver"  onClick="location.href='index.php?id=<?php echo $_SESSION['capitulo_actual']?>'" />
<?php
        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $server=$_POST['server'];
        $url=$_POST['url'];

        //$image=$_POST['image'];

        //consulta
        $consulta="UPDATE  `proyecto`.`links` SET  `link_url` =  '$url',
`link_server` =  '$server' WHERE  `links`.`link_id` ='$id';";

        var_dump($consulta);
        if ($result = $connection->query($consulta))

           {
          header ("Location: ./index.php?id=".$_SESSION['capitulo_actual']);
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      unset($connection);
      ?>

      <script type="text/javascript" src=" "></script>
    </body>
</html>
