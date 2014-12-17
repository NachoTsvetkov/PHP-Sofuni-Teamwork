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
        if (!$_SESSION['user_name']) {
            $_SESSION['user_name'] = 'anonymous';
        }else{
            $user_id = $_SESSION['id'];
            $userName = $_SESSION['user_name'];
            $userType = $_SESSION['user_role'];
        }

        if($userType != 'anonymous'){
                echo '<ul id="UploadProfileLogout">
            <li>
                <p>Hello '.$userName.'</p>
            </li>
			<li>
                <a href="add_img.php" class="btn btn-info">Upload</a>
            </li>
            <li>
                <a href="user" class="btn btn-info">Profile</a>
            </li>
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#logout" id="logoutButton"
                        data-whatever="@mdo">Logout
                </button>
            </li>

            </ul>';
            }
            else{
                echo '<ul id="LoginRegister">
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register"
                        id="registerButton" data-whatever="@mdo">Register
                </button>
            </li>
            <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#login" id="loginButton"
                        data-whatever="@mdo">Login
                </button>
            </li>

            </ul>';
            }

        ?>

        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="register">Register</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="firstName" class="control-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword" class="control-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Register" data-dismiss="modal"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                                class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="login">Login</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Email</label>
                                <input type="text" class="form-control" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Password</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Login" data-dismiss="modal"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php 

if (isset($_POST['submit']){
    $user = new User();
    $db = new DbConnection();

    $user -> get_user($_POST['email'], $_POST['password'], $db);

}
    
?>


