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
      if ($result = $connection->query("SELECT * from series
        where serie_id = '$id';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
        echo "serie_gender: <input name='gender' value='$obj->serie_gender'\><br><br>";
        echo "serie_name: <input name='name' value='$obj->serie_name'\><br><br>";
        echo "serie_sinopsis: <input name='sinopsis' value='$obj->serie_sinopsis'\><br><br>";
        echo "serie_trailer: <input name='trailer' value='$obj->serie_trailer'\><br><br>";
        echo "serie_date_release: <input type='date' name='date_release' value='$obj->serie_date_release'\><br><br>";
        echo "serie_image: <input name='image' value='$obj->serie_image'\><br><br>";
        echo "<button name='edit'>EDITAR</button>";
        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $gender=$_POST['gender'];
        $name=$_POST['name'];
        $sinopsis=$_POST['sinopsis'];
        $trailer=$_POST['trailer'];
        $date_release=$_POST['date_release'];
        $image=$_POST['image'];

        //consulta
        $consulta="UPDATE  `proyecto`.`series` SET
        `serie_gender` =  '$gender',
        `serie_name` =  '$name',
        `serie_sinopsis` =  '$sinopsis',
        `serie_trailer` =  '$trailer',
        `serie_date_release` =  '$date_release',
        `serie_image` =  '$image'
        WHERE  `series`.`serie_id` =$id;";

        var_dump($consulta);
        if ($result = $connection->query($consulta))

           {
          header ("Location: ./index.php");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }
      }
      unset($connection);
      ?>

      <script type="text/javascript" src=" "></script>
    </body>
</html>
