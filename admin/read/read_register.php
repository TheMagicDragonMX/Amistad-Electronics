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
        <h5 id = "title" ALIGN = "center"> Resultados de matrícula </h1>  

        <?PHP
            $connection = mysqli_connect("localhost", "admin", "Admin527", "DB_Electro_Amistad")
            or die("No se ha podido conectar al server");
            $register = $_REQUEST['register'];

            //The result-column headers are shown
            echo <<< EOT
                <table id = 'title' ALIGN = "center" BORDER = "2">
                <tr id = 'title'>
                <th>Proveedor</th>
                <th>Precio de compra</th>
                <th>Categoría</th>
                <th>Matrícula</th>
                <th>Descripción</th>
                <th>Cantidad en Stock</th>
                </tr>
            EOT;

            //The requested values are fetched
            $query = "SELECT DISTINCT providers.pNombre, supplies.sPrecio_U_Compra, categories.catNombre, components.comMatricula, components.comDescripcion, components.comCantidad_Stock
            FROM categories INNER JOIN components ON categories.catID_Categoria = components.comID_Categoria INNER JOIN supplies ON components.comMatricula = supplies.sMatricula_Com INNER JOIN providers ON supplies.sID_Proveedor = providers.pID_Proveedor
            WHERE components.comMatricula = '$register';";
            $results_table = mysqli_query($connection, $query);

            //The requested values are shown, 1 row per entry
            while($result_row = mysqli_fetch_array($results_table)){
                echo <<< EOT
                <tr id = 'title'>
                <td>$result_row[0]</td>
                <td>$result_row[1]</td>
                <td>$result_row[2]</td>
                <td>$result_row[3]</td>
                <td>$result_row[4]</td>
                <td>$result_row[5]</td>
                </tr>
                EOT;
            }

            echo "</table>";

            mysqli_close($connection);
        ?>

        <br>
        <form id = 'title' ACTION = "../admin_index.php" ALIGN = "center" METHOD = "POST">
            <INPUT id = 'title' TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>
    </body>
</html> 