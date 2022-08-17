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
        <h5 id = "title" ALIGN = "center"> Agregar vendedor </h1>  

        <!-- Seller form definition -->
        <form id = 'title' ALIGN = "center" METHOD = "POST">
            <INPUT id = 'title' TYPE = "number" MIN = "1" NAME = "payroll" PATTERN = "^[0-9]+" PLACEHOLDER = "Nómina"/> <br>
            <INPUT id = 'title' TYPE = "text" NAME = "name" PLACEHOLDER = "Nombre"/> <br>
            <INPUT id = 'title' TYPE = "text" NAME = "first_lastname" PLACEHOLDER = "Primer apellido"/> <br>
            <INPUT id = 'title' TYPE = "text" NAME = "second_lastname" PLACEHOLDER = "Segundo apellido"/> <br>
            <br> <INPUT id = 'title' TYPE = "submit" VALUE = "Agregar" NAME = "add"/>
        </form>

        <!-- Return button form -->
        <form id = 'title' ALIGN = "center" ACTION = "../admin_index.php" METHOD = "POST">
            <INPUT id = 'title' TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>

        <!-- Seller processing -->
        <?PHP
            if(isset($_POST['add'])){
                $connection = mysqli_connect("localhost", "admin", "Admin527")
                    or die("Ha fallado la conexión con el servidor");
                $db = mysqli_select_db($connection, "DB_Electro_Amistad")
                    or die("Ha fallado la conexión con la base de datos");
                $payroll = $_POST['payroll'];
                
                //Checks if the inserted vendor exists using their payroll
                $seller_exists = false;
                $sellers_table = mysqli_query($connection, "SELECT * FROM sellers;");
                while($seller_row = mysqli_fetch_row($sellers_table)){
                    if($seller_row[0] == $payroll){
                        $seller_exists = true;
                        break;
                    }
                }
                
                //Validation to avoid seller duplication
                if(!$seller_exists){
                    //The rest of the posted values are obtained
                    $name = $_POST['name'];
                    $first_lastname = $_POST['first_lastname'];
                    $second_lastname = $_POST['second_lastname'];
                    
                    //The seller is added to database
                    $query_OK = mysqli_query($connection,
                        "INSERT INTO sellers
                        VALUES ($payroll, '$name', '$first_lastname', '$second_lastname');");
                    if($query_OK)
                        echo "<p id = 'title' ALIGN = 'center'> Vendedor agregado correctamente </p>";
                    else
                        echo "<p id = 'title' ALIGN = 'center'> El vendedor no ha podido agregarse </p>";
                }
                else
                    echo "<p id = 'title' ALIGN = 'center'> El vendedor ya existe </p>";
                
                mysqli_close($connection);
            } 
        ?>
    </body>
</html>