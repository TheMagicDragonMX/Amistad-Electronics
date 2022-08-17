<html>
    <head> <!-- Website description -->
        <title> Electrónica Amistad </title> 
        <meta charset = "UTF-8">
        <meta name = "description" content = "Tienda de componentes electrónicos">
    </head>
    <body style = "background-color: #E0DDB3;">
        <style>
            #title { font-family: "Microsoft PhagsPa"; }
        </style>
        <h1 id = "title" ALIGN = "center"> Iniciar sesion </h1>

        <!-- Login section -->
        <FORM id = "title" METHOD = "POST" ALIGN = "center">
            <!-- Username and password textbars -->
            <INPUT id = "title" TYPE= "text" NAME = "user" PLACEHOLDER = "username" SIZE = "30">
            <br> <br>
            <INPUT id = "title" TYPE = "password" NAME = "password" PLACEHOLDER = "password" SIZE = "30">

            <!-- Button -->
            <br> <br>
            <INPUT id = "title" TYPE = "submit" NAME = "loginButton" VALUE = "Iniciar sesión">
        </FORM>

        <!-- New user section -->
        <FORM id = "title" METHOD = "POST" ALIGN = "center" ACTION = "user/user_registration.php">
            <!-- Username and password textbars -->
            ¿Eres nuev@? ¡Registrate aqui! ->
                
            <!-- Button -->
            <INPUT id = "title" TYPE = "submit" NAME = "registerButton" VALUE = "Registrarme">
        </FORM>

        <!-- Return to index button -->
        <FORM id = "title" METHOD = "POST" ALIGN = "center" ACTION = "index.php">
            <INPUT id = "title" TYPE = "submit" NAME = "returnToIndex" VALUE = "Volver al inicio"/>
        </FORM>

        <?PHP
            include("user/user_login.php");
        ?>
    </body>
</html>