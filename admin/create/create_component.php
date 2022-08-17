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
        <h5 id = "title" ALIGN = "center"> Agregar componente </h1>  
        
        <!-- Creation of create-component form -->
        <form id = "title" ALIGN = "center" METHOD = "POST">
            <INPUT id = "title" TYPE = "text" NAME = "register" PLACEHOLDER = "Matrícula"/> <br>
            <INPUT id = "title" TYPE = "text" NAME = "datasheet" PLACEHOLDER = "Link de hoja de datos"/> <br>
            <INPUT id = "title" TYPE = "textarea" NAME = "description" PLACEHOLDER = "Descripción breve"/> <br>
            <INPUT id = "title" TYPE = "number" MIN = "0" NAME = "sell_price" PLACEHOLDER = "Precio de venta" STEP = "any"/> <br> <br>
            
            <!-- Categories are fetched to create a Select widget -->
            Categoría:<br>
            <SELECT id = "title" NAME = "category">
            <?PHP
                $connection = mysqli_connect("localhost", "admin", "Admin527")
                    or die("Ha fallado la conexión con el servidor");
                $db = mysqli_select_db($connection, "DB_Electro_Amistad")
                    or die("Ha fallado la conexión con la base de datos");
                $categories = mysqli_query($connection, "SELECT * FROM categories;");
                
                while($row = mysqli_fetch_array($categories)){
                    $category_name = $row['catNombre'];
                    echo "<OPTION id = 'title' VALUE = '$category_name'>$category_name";
                }
            ?>
            </SELECT> <br> <br>

            <INPUT id = "title" TYPE = "submit" VALUE = "Agregar" NAME = "add"/>
        </form>
        
        <!-- Return button form -->
        <form id = "title" ALIGN = "center" ACTION = "../admin_index.php" METHOD = "POST">
            <INPUT id = "title" TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>
        
        <!-- Processing phase -->
        <?PHP
            if(isset($_POST['add'])){
                $register = $_POST['register'];

                //Checks if the inserted component already exists using its register
                $component_exists = false;
                $components_table = mysqli_query($connection, "SELECT * FROM components;");
                while($component_row = mysqli_fetch_row($components_table)){
                    if($component_row[0] == $register){
                        $component_exists = true;
                        break;
                    }
                }

                //Validation to avoid component dupplication
                if(!$component_exists){
                    //The rest of the posted values are obtained
                    $datasheet = $_POST['datasheet'];
                    $description = $_POST['description'];
                    $amount = 0;
                    $sell_price = $_POST['sell_price'];
                    
                    //The category id for selected category is fetched
                    $category_name = $_POST['category'];
                    $category_matrix = mysqli_query($connection,
                        "SELECT * FROM categories WHERE catNombre = '$category_name';");
                    $category_row = mysqli_fetch_array($category_matrix);
                    $category_ID = $category_row['catID_Categoria'];

                    //The component is added to database
                    $query_OK = mysqli_query($connection, "INSERT INTO components
                        VALUES('$register', '$datasheet', '$description', $amount, $sell_price, $category_ID)");
                    if($query_OK)
                        echo "<p id = 'title' ALIGN = 'center'> Componente agregado correctamente </p>";
                    else
                        echo "<p id = 'title' ALIGN = 'center'> El componente no ha podido agregarse </p>";
                }
                else
                    echo "<p id = 'title' ALIGN = 'center'> La matrícula de componente ya existe </p>";

                mysqli_close($connection);
            } 
        ?>
    </body>
</html>