<html>
    <body style = "background-color: #E0DDB3;">
        <style>
                #title { font-family: "Microsoft PhagsPa"; }
            </style>
        <h1 id = "title" ALIGN = "center"> Carrito de compras </h1>
        
        <table id = "title" ALIGN = "center" BORDER = 1>
            <tr>
            <th>Cantidad</th>
            <th>Matrícula</th>
            <th>Descripción</th>
            <th>Precio unitario</th>
            <th>Importe</th>
            </tr>

        <?PHP
        include("../connection.php");
        $user = $_POST['user'];

        $user_ID_query = "SELECT uID_Sesion FROM users WHERE uNombre_Perfil = '$user';";
        $user_ID_table = mysqli_query($connection, $user_ID_query);
        $user_ID_row = mysqli_fetch_array($user_ID_table);
        $user_ID = $user_ID_row[0];

        $cart_query = "SELECT notes.nCantidad_Com, components.comMatricula, components.comDescripcion, components.comPrecio_U_Venta, components.comPrecio_U_Venta * notes.nCantidad_Com 
                       FROM notes 
                       INNER JOIN components 
                       ON notes.nComponente = components.comMatricula
                       WHERE nUsuario = '$user_ID';";
        $cart_table = mysqli_query($connection, $cart_query);

        //The requested values are shown, 1 row per entry
        while($cart_row = mysqli_fetch_array($cart_table)){
            echo <<< EOT
            <tr id = "title">
                <td>$cart_row[0]</td>
                <td>$cart_row[1]</td>
                <td>$cart_row[2]</td>
                <td>$cart_row[3]</td>
                <td>$cart_row[4]</td>
            </tr>
            EOT;
        }

        echo "</table>";

        mysqli_close($connection);
        ?>
        
        <form id = "title" ACTION = "user_index.php" ALIGN = "center" METHOD = "GET">
            <?PHP echo "<INPUT id = 'title' TYPE = 'hidden' NAME = 'user' VALUE = '$user'>"; ?>
            <br><INPUT id = "title" TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>
    </body>
</html>