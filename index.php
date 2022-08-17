<html>
    <head> <!--##### Website description #####-->
        <title> Electrónica Amistad </title> 
        <meta charset = "UTF-8">
        <meta name = "description" content = "Tienda de componentes electrónicos">
    </head>

    <body style = "background-color: #E0DDB3;">
        <style>
            #title { font-family: "Microsoft PhagsPa"; }
        </style>

        <h1 id = "title" ALIGN = "center"> Electrónica Amistad </h1>
        <!--##### Website description #####-->


        <!--##### Login interaction #####-->
        <FORM METHOD = "POST" ALIGN = "right" ACTION = "login.php">
            <!-- Button -->
            <INPUT id = "title" TYPE = "submit" NAME = "login" VALUE = "Iniciar sesión">
        </FORM>
        <hr>

        <!--##### Lit4e Shopping Cart button #####-->
        <FORM METHOD = "POST" ALIGN = "right" ACTION = "lite/lite_shopping_cart.php">
            <!-- Button -->
            <INPUT id = "title" TYPE = "submit" NAME = "login" VALUE = "Carrito de compras">
        </FORM>
        <hr>

        <!--##### Lite user search #####-->
        <h2 id = "title" ALIGN = "center"> Busqueda de componentes </h2>

        <FORM id = "title" METHOD = "POST" ALIGN = "center">
            Busca tu material:
            <INPUT id = "title" TYPE = "text" NAME = "search" PLACEHOLDER = "Ingresa una matricula o nombre de componente" SIZE = "42" ALIGN = "center">

            <!-- Search Button -->
            <INPUT id = "title" TYPE = "submit" NAME = "searchButton" VALUE = "Buscar" ALIGN = "center">
        </FORM>
        <?PHP 
            if(isset($_POST['searchButton']))
                include("lite/lite_search_results.php");
        ?>
        <!--##### Lite user search #####-->
    </body>
</html>