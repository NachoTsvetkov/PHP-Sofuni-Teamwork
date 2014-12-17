<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/lightbox.css"/>
    <link rel="stylesheet" href="css/theme.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    
</head>
<body>
<div id="fb-root"></div>
    <header class="navbar-default">
        <div class="cont">
            <a href="index.php"><img src="img/logo.png" width="120" height="50"></a>

            <?php

            if (!$_SESSION['user_name']) {
                $_SESSION['user_name'] = 'anonymous';
                $userType = 'anonymous';
            }else{
                $user_id = $_SESSION['id'];
                $userName = $_SESSION['user_name'];
                $userType = $_SESSION['user_role'];
            }

            if($userType == 'User' || $userType == 'Admin'){
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