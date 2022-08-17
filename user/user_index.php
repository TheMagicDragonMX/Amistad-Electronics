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
        <!--##### Website description #####-->

        <!--##### Index introduction #####-->
        <?PHP
            $user = $_GET['user'];
            echo "<h1 ID = 'title' ALIGN = 'center'>Bienvenido $user!<h1>";
        ?>
        <!--##### Index introduction #####-->


        <!--##### Shopping cart button #####-->
        <FORM id = "title" METHOD = "POST" ALIGN = "right" ACTION = "user_shopping_cart.php">
            <?PHP echo "<INPUT TYPE = 'hidden' NAME = 'user' VALUE = '$user'>"; ?>
            <INPUT id = "title" TYPE = "submit" NAME = "shoppingCartButton" VALUE = "Carrito de compras" ALIGN = "right">
        </FORM>
        <!--##### Shopping cart button #####-->

        <!--##### Profile info button #####-->
        <form id = "title" ACTION = "user_info.php" ALIGN = "right" METHOD = "GET">
            <?PHP echo "<INPUT TYPE = 'hidden' NAME = 'user' VALUE = '$user'>"; ?>
            <INPUT id = "title" TYPE = "submit" NAME = "log_out" VALUE = "Mi perfil"/>
        </form>
        <!--##### Profile info button #####-->

        <!--##### Log out button #####-->
        <form id = "title" ACTION = "../index.php" ALIGN = "right" METHOD = "POST">
            <INPUT id = "title" TYPE = "submit" NAME = "log_out" VALUE = "Salir"/>
        </form>
        <!--##### Shopping cart button #####-->

        <!--##### Registered user search #####-->
        <h1 id = "title" ALIGN = "center"> Busqueda de componentes </h1>
        <hr>

        <FORM id = "title" METHOD = "POST" ALIGN = "center">
            Busca tu material:
            <INPUT id = "title" TYPE = "text" NAME = "search" PLACEHOLDER = "Ingresa una matricula o nombre de componente" SIZE = "40" ALIGN = "center">
            <?PHP echo "<INPUT TYPE = 'hidden' NAME = 'username' VALUE = '$user'/>" ?>
            <!-- Search Button -->
            <INPUT id = "title" TYPE = "submit" NAME = "searchButton" VALUE = "Buscar material" ALIGN = "center">
        </FORM>
        <?PHP 
            if(isset($_POST['searchButton']))
                include("user_search_results.php");
        ?>
        <!--##### Registered user search #####-->
    </body>
</html>