<?PHP
    $server = "localhost";
    $user = "root";
    $password = "";

    // Connection to DB
    $connection = mysqli_connect($server, $user, $password, "DB_Electro_Amistad")
        or die("No se pudo conectar con la base de datos");
?>