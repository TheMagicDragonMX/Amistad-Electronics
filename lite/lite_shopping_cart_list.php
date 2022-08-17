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

                $insert_note = "INSERT INTO notes(nCantidad_Com, nImporte, nComponente, nUsuario)
                VALUES ($amount, $import, '$Matricula', 0);";
                mysqli_query($connection, $insert_note);
                
                header("Location:../index.php");

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
                include("../index.php");
        ?>
    </body>
</html>