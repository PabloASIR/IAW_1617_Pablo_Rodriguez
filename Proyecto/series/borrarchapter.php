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
      $seleccion = "SELECT * FROM chapters where chapter_id=$id;";
      $consulta4 = "DELETE FROM `proyecto`.`chapters` WHERE `chapters`.`chapter_id` = $id";

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

                        //unlink("$image");
                    } else {
                        mysqli_error($connection);
                    }

              //  mysqli_error($connection);

          //  mysqli_error($connection);
echo "header('Location: ./chapters.php?$id');";

      /*  echo '<br>';
        echo "<form action='index.php'>
              <input type='submit' value='Volver' />
              </form>";*/
       ?>
      <script type="text/javascript" src=" "></script>
    </body>
</html>
