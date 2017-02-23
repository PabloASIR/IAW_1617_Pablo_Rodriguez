
<?php
  session_start();


?>
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
        if (!isset($_POST['server'])) : ?>
        <form action="newlink.php" method="post" >
          <fieldset>
            <legend>Add Chapter</legend>
        <!--    <span>film_id:</span><input type="text" name="id" required><br> -->
            <span>link_server:</span><input type="text" name="server" required><br>
            <span>link_url:</span><input type="text" name="url" ><br>
            <input type="submit" value="Enviar" name="send">
            <input type="hidden" name='idchapter' value="<?php echo $_GET['idchapter']; ?>" />
            <input type="button" value="Volver"  onClick="location.href='index.php?id=<?php echo $_SESSION['capitulo_actual']?>'" />

           </fieldset>
        </form>
   <?php else: ?>

      <?php  echo '<h3>Showing data coming from the form</h3>';
        //var_dump($_POST);
        $id = $_GET['id'];
        //CREATING THE CONNECTION
        $connection = new mysqli('localhost', 'root', 'usuario', 'proyecto');
       //TESTING IF THE CONNECTION WAS RIGHT
       if ($connection->connect_errno) {
           printf("Connection failed: %s\n", $connection->connect_error);
           exit();

       }

  if (isset($_POST['send'])) {
      $idchapter = $_POST['idchapter'];
      $server = $_POST['server'];
      $url = $_POST['url'];


      $consulta = "INSERT INTO  `proyecto`.`links` (
`link_id`,`link_url` ,`link_server`,`film_id`,`chapter_id`)
VALUES (NULL ,  '$url',  '$server', NULL ,  '$idchapter');";
      var_dump($consulta);
      $result = $connection->query($consulta);

      if (!$result) {
          print_r("$consulta");
          echo 'Query Error';
      } else {
          echo 'New LINK added';
          header ("Location: ./index.php?id=".$_SESSION['capitulo_actual']);

      }
      $prueba = $_SESSION['capitulo_actual'];
      echo '<br>';
      echo "<form action='index.php?.$prueba'>
            <input type='submit' value='Volver' />
            </form>";

      //echo "PRODUCT ADDED";
  }

 ?>

<?php endif; ?>
<br>

  </body>
</html>
