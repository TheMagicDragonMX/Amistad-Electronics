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

        <?php
            $amount = (float)$_POST['amount'];
            $stock = $_POST['stock'];
            
            if($amount <= $stock){
                include("../connection.php");

                $unit_price = $_POST['unit_price'];
                $import = $amount * $unit_price;
                $Matricula = $_POST['Matricula'];
                $username = $_POST['username'];

                $user_ID_query = "SELECT uID_Sesion FROM USERS WHERE uNombre_Perfil = '$username';";
                $user_ID_table = mysqli_query($connection, $user_ID_query);
                $user_ID_row = mysqli_fetch_array($user_ID_table);
                $user_ID = $user_ID_row[0];

                $insert_note = "INSERT INTO notes(nCantidad_Com, nImporte, nComponente, nUsuario)
                VALUES ($amount, $import, '$Matricula', $user_ID);";
                mysqli_query($connection, $insert_note);
                
                header("Location:user_index.php?user=$username");

                mysqli_close($connection);
            }
            else
                print "<p id = 'title' ALIGN = 'center'> No se tienen suficientes componentes </p>";

            //Go back to the index
            echo <<< EOT
            <FORM id = "title" METHOD = "POST" ALIGN = 'center'>
                <!-- Return Button -->
                <br>
                <INPUT id = "title" TYPE = "submit" NAME = "clearButton" VALUE = "Volver">
            </FORM>
            EOT;

            if(isset($_POST['clearButton']))
                include("user_index.php");
        ?>
    </body>
</html>