
<form action="index" role="form" method="post">
    <div class="modal-body">
        <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="text" class="form-control" id="email" required>
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input type="password" class="form-control" id="password" required>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="loginSubmit" class="btn btn-primary" value="Login" data-dismiss="modal"/>
    </div>
</form>

<?php 

if (isset($_POST['loginSubmit'])) {
    $user = new User();
    $db = new DbConnection($_SESSION['isDev']);

    var_dump($db);

    $result = $user -> get_user($_POST['email'], $_POST['password'], $db);

    var_dump($result);

    if (!$user) {
        $_SESSION['errorMsg'] = "Incorrect email or password!";
        header("Location: 'error.php'");
    }else{
    
    	header("Location: 'index.php'");
    }
}
