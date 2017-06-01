<!DOCTYPE html PUBLIC>
<html>

<head>
    <title>indice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Smart Bottom Slide Out Menu" />
    <meta name="keywords" content="jquery, fancy, bottom, navigation, menu" />
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />

</head>

<body>
  <?php
  session_start();

  //echo '()<img src="$imagen" width=80% />)';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  } else {
      echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=../sign_in/login.html">';
      session_destroy();
      echo 'No estas registrado';
      exit;
  }
      if (isset($_SESSION['user_nicename']) && $_SESSION['user_nicename'] == 'user') {
          $logueado = $_SESSION['username'];
          $imagen = $_SESSION['user_image']; ?>
<?php
          include_once("../connection.php");

          //MAKING A SELECT QUERY
          /* Consultas de selección que devuelven un conjunto de resultados */
          if ($result = $connection->query('SELECT *
            FROM news limit 8;')) {
?>

      <div id="contenedor_global">

        <div id="cabecera">
           cabecera
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
  <li>Pestaña de noticias</li><br>
  <div class="noticias">
    <?php
    while ($obj = $result->fetch_object()) {
      ?>

        <div class="noticia">
          <div class="noticia_content">
        <?php
            $linknews =$obj->news_url;
            $imgnews =$obj->news_image;
            echo "<a href='$linknews'>
            <img  src='../news/$imgnews'></a>";
            echo "<h3>".$obj->news_title."</h3>";
            echo "<p>".substr($obj->news_info,0,45)."...</p>";
        ?>
          </div>
        </div>

<?php } ?>
</div>
</div>



                <ul id="navigation">
                  <li class="a"><a id="u" href="index.php" title="Home">Home</a></li>
                    <li class="a"><a id="u" style="color:#F3F781;" title="news">News</a></li>
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
    }  } ?>
</body>

</html>
