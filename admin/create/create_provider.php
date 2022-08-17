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
        <h5 id = "title" ALIGN = "center"> Agregar proveedor </h1>  

        <!-- Provider form definition -->
        <form id = 'title' ALIGN = "center" METHOD = "POST">
            <INPUT id = 'title' TYPE = "text" INPUTMODE = "numeric" NAME = "phone_number" PLACEHOLDER = "Teléfono"/> <br>
            <INPUT id = 'title' TYPE = "text" NAME = "name" PLACEHOLDER = "Nombre"/> <br>
            <INPUT id = 'title' TYPE = "number" MIN = "1" NAME = "interval" PATTERN = "^[0-9]+" PLACEHOLDER = "Días entre entregas"/> <br>
            <INPUT id = 'title' TYPE = "text" NAME = "suburb" PLACEHOLDER = "Colonia"/> <br>
            <INPUT id = 'title' TYPE = "text" NAME = "street" PLACEHOLDER = "Calle"/> <br>
            <INPUT id = 'title' TYPE = "number" MIN = "1" NAME = "address_number" PATTERN = "^[0-9]+" PLACEHOLDER = "Número ext."/> <br>
            <INPUT id = 'title' TYPE = "number" MIN = "1" NAME = "client_number" PATTERN = "^[0-9]+" PLACEHOLDER = "Número de cliente"/> <br>
            <br> <INPUT id = 'title' TYPE = "submit" VALUE = "Agregar" NAME = "add"/>
        </form>

        <!-- Return button form -->
        <form id = 'title' ALIGN = "center" ACTION = "../admin_index.php" METHOD = "POST">
            <INPUT id = 'title' TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>

        <!-- Provider processing -->
        <?PHP
            if(isset($_POST['add'])){
                $connection = mysqli_connect("localhost", "admin", "Admin527")
                    or die("Ha fallado la conexión con el servidor");
                $db = mysqli_select_db($connection, "DB_Electro_Amistad")
                    or die("Ha fallado la conexión con la base de datos");
                $name = $_POST['name'];
                
                //Checks if the inserted provider already exists using its unique name
                $provider_exists = false;
                $providers_table = mysqli_query($connection, "SELECT * FROM providers;");
                while($provider_row = mysqli_fetch_row($providers_table)){
                    if($provider_row[2] == $name){
                        $provider_exists = true;
                        break;
                    }
                }
                
                //Validation to avoid provider duplication
                if(!$provider_exists){
                    //The rest of the posted values are obtained
                    $phone = $_POST['phone_number'];
                    $interval = $_POST['interval'];
                    $suburb = $_POST['suburb'];
                    $street = $_POST['street'];
                    $address_number = $_POST['address_number'];
                    $client_number = $_POST['client_number'];
                    
                    //The provider is added to database
                    $query_OK = mysqli_query($connection,
                        "INSERT INTO providers(pTelefono, pNombre, pLapso_Entrega, pColonia, pCalle, pNumero, pNum_Cliente)
                        VALUES ('$phone', '$name', $interval, '$suburb', '$street', $address_number, $client_number);");
                    if($query_OK)
                        echo "<p id = 'title' ALIGN = 'center'> Proveedor agregado correctamente </p>";
                    else
                        echo "<p id = 'title' ALIGN = 'center'> El proveedor no ha podido agregarse </p>";
                }
                else
                    echo "<p id = 'title' ALIGN = 'center'> El proveedor ya existe </p>";
                
                mysqli_close($connection);
            } 
        ?>
    </body>
</html>