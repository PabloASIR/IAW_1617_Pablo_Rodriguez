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
      if ($result = $connection->query("SELECT * from films
        where film_id = '$id';")) {

        $obj = $result->fetch_object();

        echo "<form method='post'>";
        echo "Film_gender: <input name='gender' value='$obj->film_gender'\><br><br>";
        echo "film_name: <input name='name' value='$obj->film_name'\><br><br>";
        echo "film_sinopsis: <input name='sinopsis' value='$obj->film_sinopsis'\><br><br>";
        echo "film_duration: <input name='duration' value='$obj->film_duration'\><br><br>";
        echo "film_trailer: <input name='trailer' value='$obj->film_trailer'\><br><br>";
        echo "film_date_release: <input type='date' name='date_release' value='$obj->film_date_release'\><br><br>";
        echo "film_image: <input name='image' value='$obj->film_image'\><br><br>";
        echo "<button name='edit'>EDITAR</button>";
        echo "</from>";
      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);

      if (isset($_POST['edit'])) {

        //variables
        $gender=$_POST['gender'];
        $sinopsis=$_POST['sinopsis'];
        $name=$_POST['name'];
        $duration=$_POST['duration'];
        $trailer=$_POST['trailer'];
        $date_release=$_POST['date_release'];
        $image=$_POST['image'];

        //consulta
        $consulta="UPDATE  `proyecto`.`films` SET
        `film_gender` =  '$gender',
        `film_name` =  '$name',
        `film_sinopsis` =  '$sinopsis',
        `film_duration` =  '$duration',
        `film_trailer` =  '$trailer',
        `film_date_release` =  '$date_release',
        `film_image` =  '$image'
        WHERE  `films`.`film_id` =$id;";

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
      <input type="button" value="VOLVER" onClick="location.href='./index.php'" />

      <script type="text/javascript" src=" "></script>
    </body>
</html>
