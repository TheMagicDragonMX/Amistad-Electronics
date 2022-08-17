<html>
    <head> <!--##### Website description #####-->
        <title> Electrónica Amistad </title> 
        <meta charset = "UTF-8">
        <meta name = "description" content = "Tienda de componentes electrónicos">
    </head>

    <body style = "background-color: #E0DDB3;">
        <style>
            #title { font-family: "Microsoft PhagsPa"; }
        </style>

        <h1 id = "title" ALIGN = "center"> Electrónica Amistad </h1>
        <!--##### Website description #####-->
        <hr>
        <h2 id = "title" ALIGN = "center"> Mi perfil </h2>
        
        <?PHP 
            include("../connection.php");
            $user = $_GET['user'];
            
            $userQuery = "SELECT * FROM users WHERE uNombre_Perfil = '$user';";
            $userQueryResults = mysqli_query($connection, $userQuery)
                or die ("No se pudo realizar la consulta :/");

            while($userData = mysqli_fetch_array($userQueryResults))
            {
                print "<p id = 'title' ALIGN = 'center'> <b>Contraseña: </b> {$userData['uID_Sesion']} </p>";
                print "<p id = 'title' ALIGN = 'center'> <b>Usuario: </b> {$userData['uNombre_Perfil']} </p>";
                print "<p id = 'title' ALIGN = 'center'> <b>Celular: </b> {$userData['uCelular']} </p>";
                print "<p id = 'title' ALIGN = 'center'> <b>Contraseña (encriptada): </b> {$userData['uPassword']} </p>";
                print "<p id = 'title' ALIGN = 'center'> <b>Colonia: </b> {$userData['uColonia']} </p>";
                print "<p id = 'title' ALIGN = 'center'> <b>Calle: </b> {$userData['uCalle']} </p>";
                print "<p id = 'title' ALIGN = 'center'> <b>Numero: </b>{$userData['uNumero']} </p>";
            }
        ?>

        <!--##### Return button #####-->
        <form id = "title" ACTION = "user_index.php" ALIGN = "center" METHOD = "GET">
            <?PHP echo "<INPUT TYPE = 'hidden' NAME = 'user' VALUE = '$user'>"; ?>
            <br><INPUT id = "title" TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>
        <!--##### Shopping cart button #####-->
    </body>
</html>