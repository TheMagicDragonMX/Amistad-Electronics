<h2 id = "title" ALIGN = "center"> Resultados </h2>

<?PHP
    //Connect to DB
    include("../connection.php");

    $search = $_REQUEST['search'];
    $username = $_REQUEST['username'];

    $consulta = "   SELECT components.comMatricula AS Matricula, 
                        components.comLink_Datasheet AS Datasheet, 
                        components.comDescripcion AS Descripcion, 
                        components.comCantidad_Stock AS Stock, 
                        components.comPrecio_U_Venta AS Precio_Unitario
                    FROM components
                    WHERE components.comMatricula LIKE '%$search%'";
    
    $queryResult = mysqli_query($connection, $consulta)
    or die ("No se pudo realizar la consulta :/");

    //Table creation. Making the columns
    echo <<< EOT
    <table id = "title" borde = '2' ALIGN = 'center' border = 1>
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Datasheet</th>
                <th>Descripcion</th>
                <th>Stock</th>
                <th>Precio Unitario</th>
                <th>Cantidad a comprar</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
    EOT;

    while ($column = mysqli_fetch_array($queryResult))
    {
        $Matricula = $column['Matricula'];
        $Datasheet = $column['Datasheet'];
        $Descripcion = $column['Descripcion'];
        $Stock = $column['Stock'];
        $Precio_unitario = $column['Precio_Unitario'];
        
        echo <<< EOT
            <tr>
                <td>$Matricula</td> 
                <td>$Datasheet</td> 
                <td>$Descripcion</td> 
                <td>$Stock</td> 
                <td>$Precio_unitario</td> 
                <FORM ACTION = "user_shopping_cart_list.php" METHOD = "POST">
                    <INPUT TYPE = "hidden" NAME = "Matricula" VALUE = '$Matricula'/>
                    <INPUT TYPE = "hidden" NAME = "username" VALUE = '$username'/>
                    <INPUT TYPE = "hidden" NAME = "unit_price" VALUE = $Precio_unitario>
                    <INPUT TYPE = "hidden" NAME = "stock" VALUE = $Stock>
                    <td><INPUT id = "title" TYPE = "number" MIN = "1" NAME = "amount"/>
                    <td><INPUT id = "title" TYPE = "submit" NAME = "addToCartButton" VALUE = "Añadir al carrito"></td>
                </FORM>
            <?php
        EOT;

        echo <<< EOT
            </tr>
        </tbody>
        EOT;
        
    }
    echo "</table>";

    mysqli_close($connection);

    //Go back to the index
    echo <<< EOT
    <FORM id = "title" METHOD = "POST" ALIGN = 'center'>
        <!-- Return Button -->
        <br>
        <INPUT id = "title" TYPE = "submit" NAME = "clearButton" VALUE = "Limpiar búsqueda">
    </FORM>
    EOT;

    if(isset($_POST['clearButton']))
            include("user_index.php");
?>