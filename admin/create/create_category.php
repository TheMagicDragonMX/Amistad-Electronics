<body style = "background-color: #E0DDB3;">
    <style>
            #title { font-family: "Microsoft PhagsPa"; }
    </style>
    <hr>
    <h5 id = "title" ALIGN = "center"> Agregar categoría </h1>  

    <!-- Creates the form elements for creation and return -->
    <form id = "title" ALIGN = "center" METHOD = "POST">
        <INPUT id = "title" TYPE = "text" NAME = "name" PLACEHOLDER = "Nombre de categoría"/>
        <INPUT id = "title" TYPE = "submit" VALUE = "Agregar" NAME = "add"/>
    </form>
    <form id = "title" ALIGN = "center" ACTION = "../admin_index.php" METHOD = "POST">
        <INPUT id = "title" TYPE = "submit" VALUE = "Volver" NAME = "return"/>
    </form>
</body>

<?PHP
    if(isset($_POST['add'])){
        $connection = mysqli_connect("localhost", "admin", "Admin527")
            or die("Ha fallado la conexión con el servidor");
        $db = mysqli_select_db($connection, "DB_Electro_Amistad")
            or die("Ha fallado la conexión con la base de datos");
        $name = $_POST['name'];
        
        //Checks if the inserted category already exists
        $category_exists = false;
        $categories_table = mysqli_query($connection, "SELECT * FROM categories;");
        while($category_row = mysqli_fetch_row($categories_table)){
            if($category_row[1] == $name){
                $category_exists = true;
                break;
            }
        }
        
        //Validation to avoid category dupplicates
        if(!$category_exists){      
            //The category is added to database              
            $query_OK = mysqli_query($connection, "INSERT INTO categories(catNombre) VALUES ('$name');");
            if($query_OK)
                echo "<p id = 'title' ALIGN = 'center'> Categoría agregada correctamente </p>";
            else   
                echo "<p id = 'title' ALIGN = 'center'> La categoría no pudo ser agregada </p>";
        }
        else
            echo "<p id = 'title' ALIGN = 'center'> La categoría ya existe </p>";

        mysqli_close($connection);
    } 
?>