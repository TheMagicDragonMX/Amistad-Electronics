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
        <h5 id = "title" ALIGN = "center"> Borrar proveedor </h5>
        
        <!-- Provider deletion form -->
        <form id = 'title' ALIGN = "center" METHOD = "POST">
        <INPUT id = 'title' TYPE = "text" NAME = "name" PLACEHOLDER = "Nombre"/> <br>
        <br> <INPUT id = 'title' TYPE = "submit" NAME = "delete" VALUE = "Borrar"/>
        </form>

        <!-- Return button form -->
        <br>
        <form id = 'title' ACTION = "../admin_index.php" ALIGN = "center" METHOD = "POST">
            <INPUT id = 'title' TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>

        <!-- Deletion processing -->
        <?PHP
            if(isset($_POST['delete'])){
                $connection = mysqli_connect("localhost", "admin", "Admin527", "DB_Electro_Amistad")
                    or die("No se pudo conectar a la base de datos");
                $name = $_POST['name'];
                
                //Checks if the provider exists using its unique name
                $provider_exists = false;
                $select_providers = "SELECT * FROM providers;";
                $providers_table = mysqli_query($connection, $select_providers);
                while($provider_row = mysqli_fetch_array($providers_table)){
                    if($provider_row[2] == $name){
                        $provider_exists = true;
                        break;
                    }
                }

                //Validation to delete only existent providers
                if($provider_exists){
                    //The provider ID is fetched using the passed name
                    $select_provider_ID_query = "SELECT pID_Proveedor FROM providers WHERE pNombre = '$name';";
                    $provider_ID_table = mysqli_query($connection, $select_provider_ID_query);
                    $provider_ID_row = mysqli_fetch_array($provider_ID_table);
                    $provider_ID = $provider_ID_row[0];

                    //The supplies referencing the passed provider are deleted first to avoid errors
                    $delete_supplies = "DELETE FROM supplies WHERE sID_Proveedor = $provider_ID;";
                    mysqli_query($connection, $delete_supplies);

                    //Final provider deletion
                    $delete_provider = "DELETE FROM providers WHERE pID_Proveedor = $provider_ID;";
                    $delete_provider_OK = mysqli_query($connection, $delete_provider);
                    if($delete_provider_OK)
                        echo "<p id = 'title' ALIGN = 'center'> Proveedor borrado correctamente </p>";
                    else
                        echo "<p id = 'title' ALIGN = 'center'> El proveedor no ha podido borrarse </p>";
                }
                else
                    echo "<p id = 'title' ALIGN = 'center'> El proveedor no existe </p>";

                mysqli_close($connection);
            }
        ?>
    </body>
</html>