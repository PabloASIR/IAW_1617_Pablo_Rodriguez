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
      //CREATING THE CONNECTION
      $connection = new mysqli('localhost', 'root', 'usuario', 'proyecto');

      //TESTING IF THE CONNECTION WAS RIGHT
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }

      $id = $_GET['id'];
      $seleccion = "SELECT * FROM series where serie_id=$id;";
      $consulta4 = "DELETE FROM `proyecto`.`series` WHERE `series`.`serie_id` = $id";
      $consulta3 = "DELETE FROM see_series where serie_id=$id;";
      $consulta2 = "DELETE FROM news_series where serie_id=$id;";
      $consulta1 = "DELETE FROM links where serie_id=$id;";

//echo ($image);
        if ($result = $connection->query($seleccion)) {
            $obj = $result->fetch_object();
            $image = $obj->serie_image;
            //var_dump($image);
            echo '0';
            // var_dump($consulta4);
            // var_dump($consulta3);
            // var_dump($consulta2);
            // var_dump($consulta1);

            $result4 = $connection->query($consulta4);

                        unlink("$image");
                    } else {
                        mysqli_error($connection);
                    }

              //  mysqli_error($connection);

          //  mysqli_error($connection);

              header('Location: ./index.php');

      /*  echo '<br>';
        echo "<form action='index.php'>
              <input type='submit' value='Volver' />
              </form>";*/
       ?>
      <script type="text/javascript" src=" "></script>
    </body>
</html>
