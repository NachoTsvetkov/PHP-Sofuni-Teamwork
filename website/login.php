<form class="form-horizontal" role="form" method="post" id="login">
    <fieldset>
            <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="text" class="form-control" id="email" name="loginEmail" required>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input type="password" class="form-control" id="password" name="loginPassword" required>
            </div>
    	<div class="form-group">
            <input type="submit" name="loginSubmit" form="login" class="btn btn-primary" value="Login" data-dismiss="modal"/>
    	</div>
   </fieldset>
</form>

<?php

if (isset($_POST['loginSubmit'])) {

    $user = new User();
    $db = new DbConnection(true);

    $result = $user -> get_user($_POST['loginEmail'], $_POST['loginPassword'], $db);

    if (session_status() == PHP_SESSION_NONE) {
        @session_start();
    }
    
    if (!$result) {
        $_SESSION['errorMsg'] = "Incorrect email or password!";
    } else{

    	$_SESSION['user_name'] = $result['user_name'];
      	$_SESSION['user_id'] = $result['user_id'];
    	$_SESSION['user_image'] = $result['user_image'];
		$_SESSION['user_role'] = $result['user_role'];
        
        echo "
        <script type='text/javascript'>
            window.location.href = window.location.href + '/index';
        </script>
        ";
    } 
    session_write_close();
}
