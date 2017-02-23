<!DOCTYPE html>
<html lang="en">

<head>
<title>Panel de Control</title>
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
      echo "$logueado ---> ";
      echo "<img src='../users/$imagen' width=2%>";
        ?>
  <h1>Panel de Control</h1>
  <p>Aqui irian los enlaces que le permitirian al usuario
  editar su perfil o cualquier otra cosa que desees.</p>

  <ul>
    <li><a href ="../films/">Peliculas</a></li>
    <li><a href ="../series/">Series</a></li>
    <li><a href ="../users/">Usuarios</a></li>
    <li><a href ="../news/">Noticias</a></li>
  </ul>

  <br><br>
  <a href=logout.php>Cerrar Sesion X </a>"
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
