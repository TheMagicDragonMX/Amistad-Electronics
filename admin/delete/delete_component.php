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
        <h5 id = "title" ALIGN = "center"> Borrar componente </h5>
        
        <!-- Component deletion form -->
        <form id = 'title' ALIGN = "center" METHOD = "POST">
        <INPUT id = 'title' TYPE = "text" NAME = "register" PLACEHOLDER = "Matrícula"/> <br>
        <br> <INPUT id = 'title' TYPE = "submit" NAME = "delete" VALUE = "Borrar"/>
        </form>

        <!-- Return button form-->
        <br>
        <form id = 'title' ACTION = "../admin_index.php" ALIGN = "center" METHOD = "POST">
            <INPUT id = 'title' TYPE = "submit" VALUE = "Volver" NAME = "return"/>
        </form>

        <!-- Deletion processing -->
        <?PHP
            if(isset($_POST['delete'])){
                $connection = mysqli_connect("localhost", "admin", "Admin527", "DB_Electro_Amistad")
                    or die("No se pudo conectar a la base de datos");
                $register = $_POST['register'];
                
                //Checks if the component exists using its register
                $component_exists = false;
                $select_components = "SELECT * FROM components;";
                $components_table = mysqli_query($connection, $select_components);
                while($component_row = mysqli_fetch_array($components_table)){
                    if($component_row[0] == $register){
                        $component_exists = true;
                        break;
                    }
                }

                //validation to delete only existent components
                if($component_exists){
                    //The supplies referencing the passed component are deleted first to avoid errors
                    $delete_supplies = "DELETE FROM supplies WHERE sMatricula_Com = '$register';";
                    mysqli_query($connection, $delete_supplies);
                    
                    //The notes referencing the passed component are deleted first to avoid errors
                    $delete_supplies = "DELETE FROM notes WHERE nComponente = '$register';";
                    mysqli_query($connection, $delete_supplies);


                    //Final component deletion
                    $delete_component = "DELETE FROM components WHERE comMatricula = '$register';";
                    $delete_component_OK = mysqli_query($connection, $delete_component);
                    if($delete_component_OK)
                        echo "<p id = 'title' ALIGN = 'center'> Componente borrado correctamente </p>";
                    else
                        echo "<p id = 'title' ALIGN = 'center'> El componente no ha podido borrarse </p>";
                }
                else
                    echo "<p id = 'title' ALIGN = 'center'> El componente no existe </p>";

                mysqli_close($connection);
            }
        ?>
    </body>
</html>