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
            if ($result = $connection->query('SELECT *
              FROM news;')) {




                ?>
<h1>News</h1>
      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>news_image</th>
          <th>news_title</th>
          <th>news_info</th>
          <th>news_date</th>
          <th>news_url</th>
          <th>name</th>
          <th>Borrar</th>
          <th>modificar</th>


      </thead>


      <?php

                //FETCHING OBJECTS FROM THE RESULT SET
                //THE LOOP CONTINUES WHILE WE HAVE ANY OBJECT (Query Row) LEFT
                while ($obj = $result->fetch_object()) {
                    //PRINTING EACH ROW
                    echo '<tr>';
                    echo '<td><img src="'.$obj->news_image.'" width=40% /></td>';
                    echo '<td>'.$obj->news_title.'</td>';
                    echo '<td>'.substr($obj->news_info,0,55).'</td>';
                    echo '<td>'.$obj->news_date.'</td>';
                    echo '<td>'.substr($obj->news_url,0,55).'</td>';

                    if ($obj->film_id == NULL) {
                      $serie=$obj->serie_id;
                      $result2 = $connection->query("SELECT serie_name
                      FROM series WHERE serie_id='$serie;'");
                      $obj2 = $result2->fetch_object();
                      echo '<td>'.$obj2->serie_name.'</td>';

                  }else{
                    $pelicula=$obj->film_id;
                    $result3 = $connection->query("SELECT film_name
                    FROM films WHERE film_id='$pelicula;'");
                    $obj3 = $result3->fetch_object();
                    echo '<td>'.$obj3->film_name.'</td>';
                                    }
                    echo '<td><a title="Borrar" href="borrar.php?id='.$obj->news_id.'">
                    <img width="40" height="40" src="del.png" alt="Borrar" /></a></td>';

                    echo '<td><a title="editar" href="editar.php?id='.$obj->news_id.'">
                    <img width="40" height="40" src="mod.png" alt="editar" /></a></td>';


                    //echo <td><button class="btn" action="borrar."></button></td>


                    echo '</tr>';
                }

                          //Free the result. Avoid High Memory Usages
                          $result->close();
                unset($obj);
                unset($connection);
            }

       ?>
    </table>
    <input type="button" value="add news" onClick="location.href='addnews.php'" />

    <input type="button" value="Volver" onClick="location.href='../sign_in/panel-control.php'" />


      <script type="text/javascript" src=" "></script>
    </body>
</html>
