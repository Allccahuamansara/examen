<?php 
    require_once 'login.php';
    $conexion = new mysqli($hn, $un, $pw, $db);
    if ($conexion->connect_error) die ("Fatal error");

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $username = $_POST['username'];
        $pw_temp =$_POST['password'];

        $password = password_hash($pw_temp, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios (nombres, apellidos, username, password)  VALUES('$nombre','$apellido','$username', '$password')";


        $result = $conexion->query($query);


        if (!$result) die ("Falló registro");

        echo "Registro exitoso <a href='signin.php'>Ingresar</a>";

    }
    else
    {
        echo <<<_END
        <h1>Regístrate</h1>
        <form action="signup.php" method="post"><pre>
        Nombre  <input type="text" name="nombre">
        Apellido  <input type="text" name="apellido">
        Usuario  <input type="text" name="username">
        Password <input type="text" name="password">
                 <input type="hidden" name="reg" value="yes">
                 <input type="submit" value="REGISTRAR">
        </form>
        _END;
    }
    /*
    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
        if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      }*/
?>
