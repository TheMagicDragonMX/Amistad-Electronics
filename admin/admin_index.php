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
        <h1 id = "title" ALIGN = "center"> Acciones administrativas </h1>
        <form id = "title" ALIGN = "right" ACTION = "../index.php">
            <INPUT id = "title" TYPE = "submit" VALUE = "Salir" NAME = "log_out"/>
        </form>
        <hr>

        <!-- Main administration menu form -->
        <FORM id = "title" ALIGN = "center" METHOD = "POST">
            <INPUT id = "title" TYPE = "submit" VALUE = "Agregar..." NAME = "create"/>
            <INPUT id = "title" TYPE = "submit" VALUE = "Buscar..." NAME = "read"/>
            <INPUT id = "title" TYPE = "submit" VALUE = "Actualizar precio de venta..." NAME = "update"/>
            <INPUT id = "title" TYPE = "submit" VALUE = "Borrar..." NAME = "delete"/>
        </FORM>

        <!-- Selected option submenu is shown -->
        <?PHP
            if(isset($_POST['create']))
                include("admin_create.php");
            if(isset($_POST['read']))
                include("admin_read.php");
            if(isset($_POST['update']))
                include("admin_update.php");
            if(isset($_POST['delete']))
                include("admin_delete.php");
        ?>
    </body>
</html>