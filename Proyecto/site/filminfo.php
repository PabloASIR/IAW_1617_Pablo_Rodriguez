<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>indice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Smart Bottom Slide Out Menu" />
    <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
    <link rel="stylesheet" href="style2.css" type="text/css" media="screen" />

</head>

<body>
  <?php
  session_start();

  //echo '()<img src="$imagen" width=80% />)';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  } else {
      echo '<META HTTP-EQUIV="Refresh" CONTENT="2; URL=../sign_in/login.html">';
      session_destroy();
      echo 'No estas registrado';
      exit;
  }
      if (isset($_SESSION['user_nicename']) && $_SESSION['user_nicename'] == user) {
          $logueado = $_SESSION['username'];
          $imagen = $_SESSION['user_image']; ?>
<?php
          include_once("../connection.php");

          $id = $_GET['id'];
          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query("SELECT * from films
            where film_id = '$id';")) {
              $obj = $result->fetch_object(); ?>

      <div id="contenedor_global">

        <div id="cabecera">

         </div>
         <div id="perfil">

        <div id="foto"><a href="perfil.php" id="imagen" title="usuario"><?php echo "<img
           style='width:47px; height:47px;'
           src='../users/$imagen'>"; ?></div>
           <div id="texto">
           <a href="perfil.php"><?php echo "$logueado"; ?></a></span></a><br>
           <a href="../sign_in/logout.php">Cerrar Sesion</a></span></a>
         </div>
       </div>

            <div id="cuerpo">


<div id="contenido">

  <div id="lateral">
    <div id="trailer">
      <?php
      $urltrailer = $obj->film_trailer;

      echo "<td><a title='trailer' href='$urltrailer'>
      <img src='img/trailer.png' alt='trailer' /></a></td>";
      ?>
    </div>
    <div id="caratula">
    <?php
    $imgfilm = $obj->film_image;
              echo "<img src='../films/$imgfilm' />"; ?>
    </div>


    <form>
      <p class="clasificacion">
          <input id="radio1" name="estrellas" value="5" type="radio"><!--
        --><label for="radio1">★</label><!--
        --><input id="radio2" name="estrellas" value="4" type="radio"><!--
        --><label for="radio2">★</label><!--
        --><input id="radio3" name="estrellas" value="3" type="radio"><!--
        --><label for="radio3">★</label><!--
        --><input id="radio4" name="estrellas" value="2" type="radio"><!--
        --><label for="radio4">★</label><!--
        --><input id="radio5" name="estrellas" value="1" type="radio"><!--
        --><label for="radio5">★</label>

      </p>
    </form>




  <?php
    echo '<br>';
              $result2 = $connection->query("SELECT TRUNCATE(avg(grade),2) AS media
      FROM rate_films WHERE film_id='$id;'");
              $obj2 = $result2->fetch_object();
              echo '<h2>Rate Users = '.$obj2->media.'</h2>'; ?>


</div>
  <div class="peliculas" style="width:70%;">
        <div class="pelicula">
          <div class="pelicula_content">
            <div id="nombre">
          <?php
          $name = $obj->film_name;
              echo "<h1>$name</h1>"; ?>
        </div>

            <div id="sinopsis">
              <?php
              $sinopsis = $obj->film_sinopsis;
              echo "<h3>$sinopsis</h3>"; ?>
            </div>



            <div id="enlaces">
              <table style="border:1px solid black">
              <thead>
                <tr>
                  <th>Server</th>
                  <th>URL</th>
              </thead>

              <?php
              $seleccion = "SELECT * FROM links where film_id='$id';";
              $result3 = $connection->query($seleccion);

                        while ($obj3 = $result3->fetch_object()) {

                            echo '<tr>';
                            echo '<td>'.$obj3->link_server.'</td>';
                            $url=$obj3->link_url;
                            // var_dump($url);
                            echo "<td><a title='url' href='http://www.$url'>
                            <img width='40' height='40' src='img/play.png' alt='editar' /></a></td>";

                            //echo <td><button class="btn" action="borrar."></button></td>

                            echo '</tr>';
                        }
                        }

        ?>




            </div>
          </div>
        </div>

</div>
</div>



              <ul id="navigation">
                <li class="a"><a id="u" href="index.php" title="Home">Home</a></li>
                  <li class="a"><a id="u" href="news.php" title="news">News</a></li>
                  <li class="a"><a id="u" href="films.php" title="films">Films</a></li>
                  <li class="a"><a id="u" href="series.php" title="series">Series</a></li>
                  <li class="a"><a id="u" title="calendar">Calendar</a></li>
                </ul>


                <!-- The JavaScript -->
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                <script type="text/javascript">
                    $(function() {
                        var d = 300;
                        $('#navigation #u').each(function() {
                            var $this = $(this);
                            var r = Math.floor(Math.random() * 41) - 20;
                             $this.css({
                                 '-moz-transform': 'rotate(' + r + 'deg)',
                                 '-webkit-transform': 'rotate(' + r + 'deg)',
                                 'transform': 'rotate(' + r + 'deg)'
                             });
                            // $('#content').css({
                            //     '-moz-transform': 'rotate(' + r + 'deg)',
                            //     '-webkit-transform': 'rotate(' + r + 'deg)',
                            //     'transform': 'rotate(' + r + 'deg)'
                            // });
                            $this.stop().animate({
                                'marginTop': '-70px'
                            }, d += 150);
                        });
                        $('#navigation > .a').hover(
                            function() {
                                var $this = $(this);
                                $('a', $this).stop().animate({
                                    'marginTop': '-40px'
                                }, 200);
                            },
                            function() {
                                var $this = $(this);
                                $('a', $this).stop().animate({
                                    'marginTop': '-70px'
                                }, 200);
                            }
                        ).click(function() {
                            var $this = $(this);
                            var name = this.className;
                            $('#content').animate({
                                marginTop: -600
                            }, 300, function() {
                                var $this = $(this);
                                var r = Math.floor(Math.random() * 41) - 20;
                                $this.css({
                                    '-moz-transform': 'rotate(' + r + 'deg)',
                                    '-webkit-transform': 'rotate(' + r + 'deg)',
                                    'transform': 'rotate(' + r + 'deg)'
                                });
                                $('#' + name).show();
                                $this.animate({
                                    marginTop: -200
                                }, 300);
                            })
                        });
                    });
                </script>

            </div>

            <!-- <div id="pie">
                pie
            </div> -->
        </div>
<?php

          }
       ?>
</body>

</html>
