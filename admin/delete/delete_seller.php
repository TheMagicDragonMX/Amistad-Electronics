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
        <h5 id = "title" ALIGN = "center"> Borrar vendedor </h5>
        
        <!-- Seller deletion form -->
        <form id = 'title' ALIGN = "center" METHOD = "POST">
        <INPUT id = 'title' TYPE = "number" MIN = "1" NAME = "payroll" PATTERN = "^[0-9]+" PLACEHOLDER = "Nómina"/> <br>
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
                $payroll = $_POST['payroll'];
                
                //Checks of the seller exists using their payroll
                $seller_exists = false;
                $select_sellers = "SELECT * FROM sellers;";
                $sellers_table = mysqli_query($connection, $select_sellers);
                while($seller_row = mysqli_fetch_array($sellers_table)){
                    if($seller_row[0] == $payroll){
                        $seller_exists = true;
                        break;
                    }
                }

                //Validation to delete only existent sellers
                if($seller_exists){
                    $delete_seller = "DELETE FROM sellers WHERE venNomina = $payroll;";
                    $delete_seller_OK = mysqli_query($connection, $delete_seller);
                    if($delete_seller_OK)
                        echo "<p id = 'title' ALIGN = 'center'> Vendedor borrado correctamente </p>";
                    else
                        echo "<p id = 'title' ALIGN = 'center'> El vendedor no ha podido borrarse </p>";
                }
                else
                    echo "<p id = 'title' ALIGN = 'center'> El vendedor no existe </p>";

                mysqli_close($connection);
            }
        ?>
    </body>
</html>