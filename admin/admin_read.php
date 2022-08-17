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
        <h3 id = "title" ALIGN = "center"> Buscar componente </h1>
        
        <!-- Search/read using register -->
        <form id = "title" ACTION = "read/read_register.php" ALIGN = "center" METHOD = "POST">
            <INPUT id = "title" TYPE = "text" NAME = "register" PLACEHOLDER = "Matrícula"/>
            <INPUT id = "title" TYPE = "submit" VALUE = "Buscar" NAME = "search_register"/>
        </form>

        <!-- Search/read using description -->
        <form id = "title" ACTION = "read/read_description.php" ALIGN = "center" METHOD = "POST">
            <INPUT id = "title" TYPE = "text" NAME = "description" PLACEHOLDER = "Descripción"/>
            <INPUT id = "title" TYPE = "submit" VALUE = "Buscar" NAME = "search_description"/>
        </form>
    </body>
</html>