
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}

table {
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;
    margin: 45px;
    width: 480px;
    text-align: center;
    border-collapse: collapse;
  }

th {
  font-size: 20px;
  font-weight: normal;
  padding: 7px;
  background: #b9c9fe;
  border-top: 4px
  solid #aabcfe;
  border-bottom: 1px
  solid #fff;
  color: #039;
 }

td {
  padding: 8px;
  background: #e8edff;
  border-bottom: 1px
  solid #fff;
  color: #669;
  border-top: 1px
  solid transparent;
}

tr:hover td {
  background: #d0dafd;
  color: #339;
}
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>


      <?php

        if (!isset($_POST['name'])) : ?>
        <form action="newchapter.php" method="post" >
          <fieldset>
            <legend>Add Chapter</legend>
        <!--    <span>film_id:</span><input type="text" name="id" required><br> -->
            <span>chapter_name:</span><input type="text" name="name" required><br>
            <span>chapter_number:</span><input type="number" name="number" ><br>
            <span>chapter_season:</span><input type="number" name="season" ><br>
            <span>chapter_date_release:</span><input type="date" name="date_release" ><br>
	          <input type="submit" value="Enviar" name="send">
            <input type="hidden" name='idserie' value="<?php echo $_GET['idserie']; ?>" />
            <input type="button" value="Volver" onClick="location.href='index.php'" />

	         </fieldset>
        </form>
   <?php else: ?>

      <?php  echo '<h3>Showing data coming from the form</h3>';
        //var_dump($_POST);
        //CREATING THE CONNECTION
        $connection = new mysqli('localhost', 'root', 'usuario', 'proyecto');
       //TESTING IF THE CONNECTION WAS RIGHT
       if ($connection->connect_errno) {
           printf("Connection failed: %s\n", $connection->connect_error);
           exit();

       }

  if (isset($_POST['send'])) {
      $id = $_POST['idserie'];
      $name = $_POST['name'];
      $number = $_POST['number'];
      $season = $_POST['season'];
      $date_release = $_POST['date_release'];

      $consulta = "INSERT INTO `proyecto`.`chapters` (`chapter_id` ,`chapter_season` ,
`chapter_name` ,`chapter_date_release` ,`serie_id` ,`chapter_number`)
VALUES (NULL , '$season', '$name', '$date_release', '$id', '$number');";
      var_dump($consulta);
      $result = $connection->query($consulta);

      if (!$result) {
          print_r("$consulta");
          echo 'Query Error';
      } else {
          echo 'New CHAPTER added';
          header('Location: ./chapters.php');

      }
      echo '<br>';
      echo "<form action='chapters.php'>
            <input type='submit' value='Volver' />
            </form>";

      //echo "PRODUCT ADDED";
  }

 ?>

<?php endif; ?>
<br>

  </body>
</html>
