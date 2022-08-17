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
        <h5 id = "title" ALIGN = "center"> Borrar categoría </h5>
        
        <!-- Category deletion form -->
        <form id = 'title' ALIGN = "center" METHOD = "POST">
        <INPUT id = 'title' TYPE = "text" NAME = "name" PLACEHOLDER = "Categoría"/> <br>
        <br> <INPUT id = 'title' TYPE = "submit" NAME = "delete" VALUE = "Borrar"/>
        </form>

        <!-- Return button form -->
        <br>
        <form id = 'title' ACTION = "../admin_index.php" ALIGN = "center" METHOD = "POST">
            <INPUT id = 'title' TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>

        <!-- Deletion process -->
        <?PHP
            if(isset($_POST['delete'])){
                $connection = mysqli_connect("localhost", "admin", "Admin527", "DB_Electro_Amistad")
                    or die("No se pudo conectar a la base de datos");
                $name = $_POST['name'];
                
                //Checks if the inserted category exists
                $category_exists = false;
                $select_categories = "SELECT * FROM categories;";
                $categories_table = mysqli_query($connection, $select_categories);
                while($category_row = mysqli_fetch_array($categories_table)){
                    if($category_row[1] == $name){
                        $category_exists = true;
                        break;
                    }
                }
                
                //Validation to delete only existent categories
                if($category_exists){
                    //The category ID is fetched using the unique name
                    $select_category_ID = "SELECT catID_Categoria FROM categories WHERE catNombre = '$name';";
                    $categories_ID_table = mysqli_query($connection, $select_category_ID);
                    $category_row = mysqli_fetch_array($categories_ID_table);
                    $category_ID = $category_row[0];
                    
                    //The components with the passed category are fetched to avoid errors deleting them first
                    $select_components_ID = "SELECT comMatricula FROM components WHERE comID_Categoria = '$category_ID';";
                    $components_table = mysqli_query($connection, $select_components_ID);
                    
                    while($component_row = mysqli_fetch_array($components_table)){
                        $component_ID = $component_row[0];
                        
                        //Deletion of supplies referencing fetched components to avoid errors
                        $delete_supplies = "DELETE FROM supplies WHERE sMatricula_Com = '$component_ID';";
                        mysqli_query($connection, $delete_supplies);

                        //Deletion of components with passed category
                        $delete_component = "DELETE FROM components WHERE comMatricula = '$component_ID';";
                        mysqli_query($connection, $delete_component);
                    }

                    //Final category deletion
                    $delete_category = "DELETE FROM categories WHERE catID_Categoria = $category_ID;";
                    $delete_category_OK = mysqli_query($connection, $delete_category);
                    if($delete_category_OK)
                        echo "<p id = 'title' ALIGN = 'center'> Categoría borrada correctamente </p>";
                    else
                        echo "<p id = 'title' ALIGN = 'center'> La categoría no ha podido borrarse </p>";

                }
                else
                    echo "<p id = 'title' ALIGN = 'center'> La categoría no existe </p>";

                mysqli_close($connection);
            }
        ?>
    </body>
</html>