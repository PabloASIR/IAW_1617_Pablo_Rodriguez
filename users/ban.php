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
      if ($result = $connection->query("SELECT * from users
        where user_id = '$id';")) {

        $obj = $result->fetch_object();
        $state = $obj->user_nicename;

      //


      } else {

            echo "Error: " . $result . "<br>" . mysqli_error($connection);
      }

      unset($obj);
//isset($username)&&

if ($state == 'user' OR 'admin') {
  $consulta= "UPDATE  `proyecto`.`users` SET  `user_nicename` =  'banned' WHERE  `users`.`user_id` =$id;";
}if ($state == 'banned') {
  $consulta= "UPDATE  `proyecto`.`users` SET  `user_nicename` =  'user' WHERE  `users`.`user_id` =$id;";
}else {
  echo"error al banear";

}


        if ($result = $connection->query($consulta))

           {
          header ("Location: ./index.php");
        } else {

              echo "Error: " . $result . "<br>" . mysqli_error($connection);
        }

      unset($connection);
      ?>

      <script type="text/javascript" src=" "></script>
    </body>
</html>
