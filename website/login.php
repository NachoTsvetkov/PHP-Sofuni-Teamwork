<form action="index" class="form-horizontal" role="form" method="post" id="login" xmlns="http://www.w3.org/1999/html">
    <fieldset>
            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="text" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
    <div class="form-group">
            <input type="submit" name="loginSubmit" class="btn btn-primary" value="Login" data-dismiss="modal"/>
    </div>
   </fieldset>
</form>

<?php

if (isset($_POST['submit'])) {
    $user = new User();
    $db = new DbConnection($_SESSION['isDev']);

    $user->get_user($_POST['email'], $_POST['password'], $db);

    if (!$result) {
        $_SESSION['errorMsg'] = "Incorrect email or password!";
        header("Location: 'error.php'");
    }else{
    	echo 'REGISTERED';
    	header("Location: 'index.php'");
    } 
}
