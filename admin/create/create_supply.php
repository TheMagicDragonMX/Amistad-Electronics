<html>
    <head>
        <title> Electrónica Amistad </title>
        <meta charset = "UTF-8">
        <meta name = "description" content = "Tienda de componentes electrónicos">
    </head>

    <body style = "background-color: #E0DDB3;">
        <style>
            #title { font-family: "Microsoft PhagsPa"; }
        </style>
        <hr>
        <h5 id = "title" ALIGN = "center"> Agregar suministro </h1>  

        <!-- Supply form definition -->
        <form id = "title" ALIGN = "center" METHOD = "POST">
            <INPUT id = "title" TYPE = "number" MIN = "1" NAME = "folio" PATTERN = "^[0-9]+" PLACEHOLDER = "Folio"/> <br>
            <INPUT id = "title" TYPE = "number" MIN = "1" NAME = "amount" PATTERN = "^[0-9]+" PLACEHOLDER = "Cantidad del componente"/> <br>
            <INPUT id = "title" TYPE = "number" MIN = "0" NAME = "purchase_price" PATTERN = "^[0-9]+" PLACEHOLDER = "Precio de compra" STEP = "any"/> <br>
            <INPUT id = "title" TYPE = "date" PATTERN = "[0-9]{4}-[0-9]{2}-[0-9]{2}" NAME = "delivery date"/> <br>

            <!--  The provider names are fetched to create a Select widget-->
            Proveedor:<br>
            <SELECT id = "title" NAME = "provider">
            <?PHP
                $connection = mysqli_connect("localhost", "admin", "Admin527")
                    or die("Ha fallado la conexión con el servidor");
                $db = mysqli_select_db($connection, "DB_Electro_Amistad")
                    or die("Ha fallado la conexión con la base de datos");
                $providers = mysqli_query($connection, "SELECT * FROM providers;");
                
                while($row = mysqli_fetch_array($providers)){
                    $provider_ID = $row['pID_Proveedor'];
                    $provider_name = $row['pNombre'];
                    echo "<OPTION id = 'title' VALUE = '$provider_ID'>$provider_name";
                }
            ?>
            </SELECT> <br> <br>
            
            <!-- The component registers are fetched to create a Select widget -->
            Componente:<br>
            <SELECT id = "title" NAME = "component">
            <?PHP
                $components = mysqli_query($connection, "SELECT * FROM components;");
                
                while($row = mysqli_fetch_array($components)){
                    $component_register = $row['comMatricula'];
                    $component_desc = $row['comDescripcion'];
                    echo "<OPTION id = 'title' VALUE = '$component_register'>$component_desc";
                }
            ?>
            </SELECT> <br> <br>

            <INPUT id = "title" TYPE = "submit" VALUE = "Agregar" NAME = "add"/>
        </form>
        
        <!-- Return button form -->
        <form id = "title" ALIGN = "center" ACTION = "../admin_index.php" METHOD = "POST">
            <INPUT id = "title" TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>

        <!-- Supply processing -->
        <?PHP
            if(isset($_POST['add'])){
                $folio = $_POST['folio'];
                
                //Checks if the inserted supply already exists using its folio
                $folio_exists = false;
                $supplies_table = mysqli_query($connection, "SELECT * FROM supplies;");
                while($supply_row = mysqli_fetch_row($supplies_table)){
                    if($supply_row[0] == $folio){
                        $folio_exists = true;
                        break;
                    }
                }

                //Validation to avoid supply duplication
                if(!$folio_exists){
                    //The rest of the posted values are obtained
                    $amount = $_POST['amount'];
                    $purchase_price = $_POST['purchase_price'];
                    $delivery = $_POST['delivery_date'];                    
                    $delivery_date = strtotime($delivery);
                    $delivery_string = date("Y/n/j", $delivery_date); //The date is formatted according to the database insert requirements
                    $total_price = $amount * $purchase_price * 1.16;
                    $provider_ID = $_POST['provider'];
                    $component_register = $_POST['component'];

                    //Updates the component amount for selected register
                    $update_component_amount = "UPDATE components SET comCantidad_Stock = comCantidad_Stock + $amount WHERE comMatricula = '$component_register';";
                    mysqli_query($connection, $update_component_amount);
                    
                    //The supply is added to the database
                    $query_OK = mysqli_query($connection, "INSERT INTO supplies
                        VALUES ($folio, $amount, $purchase_price, '$delivery_string', $total_price, $provider_ID, '$component_register');");
                    if($query_OK)
                        echo "<p id = 'title' ALIGN = 'center'> Suministro agregado correctamente </p>";
                    else
                        echo "<p id = 'title' ALIGN = 'center'> El suministro no ha podido agregarse </p>";
                }
                else
                    echo "<p id = 'title' ALIGN = 'center'> El suministro ya existe </p>";
                
                mysqli_close($connection);
            } 
        ?>
    </body>
</html>