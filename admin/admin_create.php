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
        <h3 id = "title" ALIGN = "center"> Selección de objeto </h1>  

        <!-- Creation options with their respective redirects -->
        <form id = "title" ALIGN = "center" NAME = "creation_form">
            <INPUT id = "title" TYPE = "button" VALUE = "Categoría" NAME = "category"
                ONCLICK = "document.creation_form.action = 'create/create_category.php';
                document.creation_form.submit()"/> 
            <INPUT id = "title" TYPE = "button" VALUE = "Proveedor" NAME = "provider"
                ONCLICK = "document.creation_form.action = 'create/create_provider.php';
                document.creation_form.submit()"/> 
            <INPUT id = "title" TYPE = "button" VALUE = "Vendedor" NAME = "seller"
                ONCLICK = "document.creation_form.action = 'create/create_seller.php';
                document.creation_form.submit()"/> 
            
            <!-- Validation for creation of components and supplies -->
            <?PHP
                include("../connection.php");

                //Checks if at least 1 category exists
                $count_categories = "SELECT COUNT(*) FROM categories;";
                $categories_count_table = mysqli_query($connection, $count_categories);
                $categories_count_row = mysqli_fetch_array($categories_count_table);
                $categories_exist = $categories_count_row[0];
                
                //Validation to allow creation of components only with existent categories
                if($categories_exist){
                        echo <<< EOT
                        <INPUT id = "title" TYPE = "button" VALUE = "Componente" NAME = "component"
                        ONCLICK = "document.creation_form.action = 'create/create_component.php';
                        document.creation_form.submit()"/> 
                    EOT;
                }
                else
                    echo "<br><h5 id = 'title' ALIGN = 'center'> Para crear un componente, primero cree una categoría </h5>";

                //Checks if at least 1 component exists
                $count_components = "SELECT COUNT(*) FROM components;";
                $components_count_table = mysqli_query($connection, $count_components);
                $components_count_row = mysqli_fetch_array($components_count_table);
                $components_exist = $components_count_row[0];
                
                //Checks if at least 1 provider exists
                $count_providers = "SELECT COUNT(*) FROM providers;";
                $providers_count_table = mysqli_query($connection, $count_providers);
                $providers_count_row = mysqli_fetch_array($providers_count_table);
                $providers_exist = $providers_count_row[0];

                //Validation to allow creation of supplies only with existent components and providers
                if($components_exist && $providers_exist){
                    echo <<< EOT
                        <INPUT id = "title" TYPE = "button" VALUE = "Suministro" NAME = "supply"
                        ONCLICK = "document.creation_form.action = 'create/create_supply.php';
                        document.creation_form.submit()"/> 
                    EOT;
                }
                else
                    echo "<br><h5 id = 'title' ALIGN = 'center'> Para crear un suministro, primero cree un componente y un proveedor </h5>";
            ?>
        </form>
    </body>
</html>