<?php
session_start();
?>

<?php
//conexion
$connection = new mysqli('localhost', 'root', 'usuario', 'proyecto');

//comprobación de errores
if ($connection->connect_error) {
 die("La conexion falló: " . $connection->connect_error);
}

//var_dump($_POST);

$login = $_POST['username'];
$password = $_POST['password'];
//mis campos en la base de datos son: user_login para el usuario y user_pass para la contraseña
$sql = "SELECT * FROM users WHERE (user_login = '$login'
OR  user_email = '$login')
AND user_pass=md5('$password')";



//echo $sql;

$result = $connection->query($sql);
$obj=$result->fetch_object();


if ($result->num_rows > 0) {



    echo "HOLA<br>";
//user_nicename es el campo en la base de datos que identifica el privilegio
  //  $obj=$result->fetch_object();
    $privilege = $obj->user_nicename;
    $username = $obj->user_login;
    $image = $obj->user_image;

  //  var_dump($privilege);
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['user_nicename'] = $privilege;
    $_SESSION['user_image'] = $image;


    //$_SESSION['start'] = time();
      if(isset($username) && $privilege == 'admin'){
        //header()

    echo "Bienvenido " . $username,"!<br>";
    echo "Redireccionando... ";
    //echo "<br><br><a href=panel-control.php>Panel de Control</a>";
    echo '<META HTTP-EQUIV="Refresh" CONTENT="3; URL=panel-control.php">';


}      if(isset($username)&& $privilege == 'user'){

  echo "Bienvenido! " . $_SESSION['username'];
  echo "<br><br>Actualmente no tenemos nada disponible para un desecho humano como tu <3 </a><br>";
  echo "  <a href=logout.php>Cerrar Sesion X </a>";

        //header
}
if(isset($username)&& $privilege == 'banned'){

  echo "El usuario " . $_SESSION['username'] ." ha sido baneado y no tiene acceso a la pagina";
  //echo "<br><a href='login.html'>Volver</a>";
echo '<META HTTP-EQUIV="Refresh" CONTENT="5; URL=login.html">';
}
 } else {
   echo "Username o Password son incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($connection);
 ?>
