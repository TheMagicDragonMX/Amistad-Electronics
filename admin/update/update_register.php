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
        <hr>
        <h5 id = "title" ALIGN = "center"> Actualizar por matrícula </h1>  

        <?PHP
            $connection = mysqli_connect("localhost", "admin", "Admin527", "DB_Electro_Amistad")
            or die("No se ha podido conectar al server");
            $register = $_REQUEST['register'];
            
            //Checks if the component exists using the passed register
            $component_exists = false;
            $components_table = mysqli_query($connection, "SELECT * FROM components;");
            while($component_row = mysqli_fetch_row($components_table)){
                if($component_row[0] == $register){
                    $component_exists = true;
                    break;
                }
            }
            
            //Validation to show update options only for existent components
            if($component_exists){
                //The headers of the table with trading info are shown
                echo <<< EOT
                    <table id = 'title' ALIGN = "center" BORDER = "2">
                    <tr id = 'title'>
                    <th>Matrícula</th>
                    <th>Descripción</th>
                    <th>Proveedor</th>
                    <th>Precio de compra</th>
                    <th>Precio de venta</th>
                    </tr>
                EOT;

                //The trading values are added to the table, fetching them using the passed register
                $query = "SELECT * FROM v_prices WHERE comMatricula = '$register';";
                $results_table = mysqli_query($connection, $query);
                while($result_row = mysqli_fetch_array($results_table)){
                    echo <<< EOT
                    <tr id = 'title'>
                    <td>$result_row[0]</td>
                    <td>$result_row[1]</td>
                    <td>$result_row[2]</td>
                    <td>$result_row[3]</td>
                    <td>$result_row[4]</td>
                    </tr>
                    EOT;
                }

                echo "</table>";
                
                //The update form is shown 
                echo <<< EOT
                <br>
                <h5 id = 'title' ALIGN = "center"> Ingrese el nuevo precio de venta para el componente buscado </h5>
                <form id = 'title' ALIGN = "center" METHOD = "POST">
                <INPUT id = 'title' TYPE = "hidden" NAME = "register" VALUE = "$register"/>
                <INPUT id = 'title' TYPE = "number" MIN = "0" NAME = "price" PATTERN = "^[0-9]+" PLACEHOLDER = "Nuevo precio"/> <br>
                <br> <INPUT id = 'title' TYPE = "submit" VALUE = "Actualizar" NAME = "update_price"/>
                </form>
                EOT;
            }
            else
                print "<h5 id = 'title' ALIGN = 'center'> No se ha encontrado el componente buscado </h5>";
        ?>

        <!-- Return button form -->
        <br>
        <form id = 'title' ACTION = "../admin_index.php" ALIGN = "center" METHOD = "POST">
            <INPUT id = 'title' TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>
        
        <!-- Price update processing -->
        <?PHP
            if(isset($_POST['update_price'])){
                //Form values are obtained
                $register = $_POST['register'];
                $price = $_POST['price'];
                
                //The price is updated
                $query = "UPDATE components SET comPrecio_U_Venta = $price WHERE comMatricula = '$register';";
                $query_OK = mysqli_query($connection, $query);
                if($query_OK)
                    echo "<p id = 'title' ALIGN = 'center'> Precio actualizado correctamente </p>";
                else
                    echo "<p id = 'title' ALIGN = 'center'> El precio no ha podido actualizarse </p>";
            }

            mysqli_close($connection);
        ?>
    </body>
</html> 