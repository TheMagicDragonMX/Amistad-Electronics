<?PHP
    if(isset($_POST['loginButton']))
    {
        // Conect to DB
        include("connection.php");

        $user = $_REQUEST['user'];
        $password = $_REQUEST['password'];

        if($user == "admin" && $password == "Admin527")
            header("Location:admin/admin_index.php");
        else
        {
            // Check if the user is registered in the database
            $query = "SELECT * FROM users;";
            $passwordQuery = "SELECT uPassword FROM users;";
            $userExists = false;
            $usersTable = mysqli_query($connection, $query);
            $passwordTable = mysqli_query($connection, $passwordQuery);

            while($userRow = mysqli_fetch_row($usersTable) AND $passwordRow = mysqli_fetch_row($passwordTable))
            {
                if($userRow[1] == $user AND base64_decode($passwordRow[0]) == $password)
                {
                    $userExists = true;
                    break;
                }
            }

            if($userExists)
            {
                header("Location: user/user_index.php?user=$user");
            }
            else
                echo "<p id = 'title' ALIGN = 'center'> Lo sentimos! No estas registrado en el sistema :( <p>";
        }   
    }
?>