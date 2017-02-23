
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
</style>
    <body>
      <?php
            //CREATING THE CONNECTION
            $connection = new mysqli('localhost', 'root', 'usuario', 'proyecto');

            //TESTING IF THE CONNECTION WAS RIGHT
            if ($connection->connect_errno) {
                printf("Connection failed: %s\n", $connection->connect_error);
                exit();
            }
            //MAKING A SELECT QUERY
            /* Consultas de selección que devuelven un conjunto de resultados */
            $id = $_GET['id'];
            $_SESSION['capitulo_actual']=$id;

            $consulta = "SELECT * FROM films where film_id=$id;"; //ARREGLAR
            $seleccion = "SELECT * FROM links where film_id='$id';";
          //  var_dump($consulta);
            if ($result = $connection->query($seleccion)) {

                if ($result1 = $connection->query($consulta)) {
                  $obj2 = $result1->fetch_object();
                  echo "<h1>$obj2->chapter_name</h1>";

        ?>

      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>link_server</th>
          <th>link_url</th>
          <th>modificar</th>
          <th>Borrar</th>


      </thead>
      <?php

                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                while ($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo '<tr>';
                    echo '<td>'.$obj->link_server.'</td>';
                    echo '<td>'.$obj->link_url.'</td>';

                    echo '<td><a title="editar" href="editarlink.php?id='.$obj->link_id.'">
                    <img width="40" height="40" src="mod.png" alt="editar" /></a></td>';

                    echo '<td><a title="Borrar" href="borrarlink.php?id='.$obj->link_id.'">
                    <img width="40" height="40" src="del.png" alt="Borrar" /></a></td>';





                    //echo <td><button class="btn" action="borrar."></button></td>

                    echo '</tr>';
                }
                } else {
                    mysqli_error($connection);
                }
                mysqli_error($connection);
            }

    //header ("Location: ./index.php");

/*  echo '<br>';
echo "<form action='index.php'>
    <input type='submit' value='Volver' />
    </form>";*/
?>
</table>
<input type="button" value="new link" onClick="location.href='newlink.php?idfilm=<?php echo $_GET['id']; ?>'" />

<input type="button" value="volver" onClick="location.href='../films/index.php'" />

</body>
</html>
