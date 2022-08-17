<body style = "background-color: #E0DDB3;">
        <style>
            #title { font-family: "Microsoft PhagsPa"; }
        </style>

    <h1 id = "title" ALIGN = "center"> Nuevo usuario </h1>

    <!-- Creates the form elements for creation and return -->
    <FORM id = "title" ALIGN = "center" METHOD = "POST">
        <INPUT id = "title" TYPE = "text" NAME = "username" PLACEHOLDER = "Nombre de usuario"/> <br>
        <INPUT id = "title" TYPE = "number" NAME = "phoneNumber" PLACEHOLDER = "Numero de teléfono"/> <br>
        <INPUT id = "title" TYPE = "password" NAME = "password" PLACEHOLDER = "Contraseña"/> <br>
        <INPUT id = "title" TYPE = "text" NAME = "colonyName" PLACEHOLDER = "Colonia"/> <br> 
        <INPUT id = "title" TYPE = "text" NAME = "streetName" PLACEHOLDER = "Calle"/> <br>
        <INPUT id = "title" TYPE = "number" NAME = "houseNumber" PLACEHOLDER = "Numero de casa"/> <br> <br>
        <INPUT id = "title" TYPE = "submit" VALUE = "Completar registro" NAME = "submitRegister"/> <br>
    </FORM>

    <?PHP 
        if(isset($_POST['submitRegister']))
        {
            $username = $_REQUEST['username'];
            $phoneNumber = $_REQUEST['phoneNumber'];
            $password = $_REQUEST['password'];
            $colonyName = $_REQUEST['colonyName'];
            $streetName = $_REQUEST['streetName'];
            $houseNumber = $_REQUEST['houseNumber'];
            
            $encrypted_Password = base64_encode($password);

            // Conect to DB
            include("../connection.php");

            $insertUserQuery = "INSERT INTO users(uNombre_Perfil, uCelular, uPassword, uColonia, uCalle, uNumero) 
                                VALUES ('$username', $phoneNumber, '$encrypted_Password', '$colonyName', '$streetName', $houseNumber);";

            $insertUser_OK = mysqli_query($connection, $insertUserQuery);
            if($insertUser_OK)
                echo "<p id = 'title' ALIGN = 'center'> ¡Fuiste añadido al sistema! <br> Ya puedes volver al inicio de sesion </p>";
            else   
                echo "<p id = 'title' ALIGN = 'center'> !Lo sentimos! Algo salió mal :(<br>¡Intentalo de nuevo! </p>";
        }
    ?>

    <!-- Return to login button -->
    <FORM id = "title" METHOD = "POST" ALIGN = "center" ACTION = "../login.php">
        <INPUT id = "title" TYPE = "submit" NAME = "returnToLogin" VALUE = "Volver al inicio de sesion"/>
    </FORM>
</body>