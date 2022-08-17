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
        <h5 id = "title" ALIGN = "center"> Borrar suministro </h5>
        
        <!-- Supply deletion form -->
        <form id = 'title' ALIGN = "center" METHOD = "POST">
        <INPUT id = 'title' TYPE = "number" MIN = "1" NAME = "folio" PATTERN = "^[0-9]+" PLACEHOLDER = "Folio"/> <br>
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
                $folio = $_POST['folio'];
                
                //Checks if supply exists using its folio
                $supply_exists = false;
                $select_supplies = "SELECT * FROM supplies;";
                $supplies_table = mysqli_query($connection, $select_supplies);
                while($supply_row = mysqli_fetch_array($supplies_table)){
                    if($supply_row[0] == $folio){
                        $supply_exists = true;
                        break;
                    }
                }

                //Validation to delete only existent supplies
                if($supply_exists){
                    $delete_supply = "DELETE FROM supplies WHERE sFolio = $folio;";
                    $delete_supply_OK = mysqli_query($connection, $delete_supply);
                    if($delete_supply_OK)
                        echo "<p id = 'title' ALIGN = 'center'> Suministro borrado correctamente </p>";
                    else
                        echo "<p id = 'title' ALIGN = 'center'> El suministro no ha podido borrarse </p>";
                }
                else
                    echo "<p id = 'title' ALIGN = 'center'> El suministro no existe </p>";

                mysqli_close($connection);
            }
        ?>
    </body>
</html>