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
        <h3 id = "title" ALIGN = "center"> Selección de objeto </h3>
        
        <!-- Delete options with their respective redirects -->
        <form id = "title" ALIGN = "center" NAME = "deletion_form">
            <INPUT id = "title" TYPE = "button" VALUE = "Categoría" NAME = "category"
                ONCLICK = "document.deletion_form.action = 'delete/delete_category.php';
                document.deletion_form.submit()"/> 
            <INPUT id = "title" TYPE = "button" VALUE = "Componente" NAME = "component"
                ONCLICK = "document.deletion_form.action = 'delete/delete_component.php';
                document.deletion_form.submit()"/> 
            <INPUT id = "title" TYPE = "button" VALUE = "Proveedor" NAME = "provider"
                ONCLICK = "document.deletion_form.action = 'delete/delete_provider.php';
                document.deletion_form.submit()"/> 
            <INPUT id = "title" TYPE = "button" VALUE = "Suministro" NAME = "supply"
                ONCLICK = "document.deletion_form.action = 'delete/delete_supply.php';
                document.deletion_form.submit()"/> 
            <INPUT id = "title" TYPE = "button" VALUE = "Vendedor" NAME = "seller"
                ONCLICK = "document.deletion_form.action = 'delete/delete_seller.php';
                document.deletion_form.submit()"/> 
        </form>
    </body>
</html>