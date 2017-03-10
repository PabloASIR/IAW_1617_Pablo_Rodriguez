<!DOCTYPE html>
<html lang="en">

<head>
    <title>Panel de Control</title>
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

}else {
      echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=login.html">';
      session_destroy();
      echo 'No estas registrado';
      exit;

  }
    if (isset($_SESSION['user_nicename']) && $_SESSION['user_nicename'] == admin) {
      $logueado=$_SESSION['username'];
      $imagen=$_SESSION['user_image'];


?>
      <div id="perfil">

     <div id="foto"><a href="perfil.php" id="imagen" title="usuario"><?php echo "<img
        style='width:47px; height:47px;'
        src='../users/$imagen'>"; ?></div>
        <div id="texto">
        <a href="perfil.php"><?php echo "$logueado"; ?></a></span></a><br>
        <a href="../sign_in/logout.php">Cerrar Sesion</a></span></a>
      </div>
     </div>

  <h1>Panel de Control</h1>
  <p></p>

    <div id="film">
    <a href ="../films/">Peliculas</a>
    </div>

    <div id="series">
    <a href ="../series/">Series</a></li>
    </div>

    <div id="users">
    <a href ="../users/">Usuarios</a></li>
    </div>

    <div id="news">
    <a href ="../news/">Noticias</a></li>
    </div>

  <?php


} else {
    echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=login.html">';
    session_destroy();
    echo 'No tienes permiso para acceder a esta pagina, ';
    echo 'hasta luego maricarmen';


//   echo "<br><a href='login.html'>Login</a>";
//echo "<br><br><a href='../sign_up/newuser.php'>Registrarme</a>";
}
  ?>
</body>
</html>
