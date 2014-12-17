<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-lightbox.css"/>
    <link rel="stylesheet" href="css/theme.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    
</head>
<body>
    <header class="navbar-default">
        <div class="cont">
            <h1><a href="index.php">Logo</a></h1>

            <?php 
            var_dump($_SESSION);
            if (!$_SESSION['user_name']) {
                $_SESSION['user_name'] = 'anonymous';
                $_SESSION['user_role'] = 'anonymous';
            }

            if($_SESSION['user_role'] == 'User' || $_SESSION['user_role'] == 'Admin'){
                echo '<ul id="LoginRegister">
                <li>
                    <p>Hello '.$userName.'</p>
                </li>
                <li>
                    <a href="add_img" class="btn btn-info">Upload</a>
                </li>
                <li>
                    <a href="user" class="btn btn-info">Profile</a>
                </li>
                <li>
                     <a href="index" class="btn btn-info">Logout</a>
                </li>

        </ul>';
    }
    else{
        echo '<ul id="LoginRegister">
    <li>
        <a href="regpage" class="btn btn-primary">Login</a>
    </li>
    <li>
        <a href="regpage" class="btn btn-primary">Register</a>
    </li>
</li>

</ul>';
}

?>
</header>