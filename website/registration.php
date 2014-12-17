<form role="form" method="post" name="register" id="register" class="form-horizontal">
	<fieldset>
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
    <div class="form-group">
        <input type="submit" name="registerSubmit" class="btn btn-primary" value="Register" data-dismiss="modal"/>
    </div>
    </fieldset>
</form>

<?php 

if (isset($_POST['registerSubmit'])) {

	$user = new User();
	$db = new DbConnection($_SESSION['isDev']);

	var_dump($user -> check_user($_POST['email'], $db));

	$check = $user -> check_user($_POST['email'], $db);

	var_dump($check);

	if ($user) {
		$_SESSION['errorMsg'] = "User with that email already exists!";
		header("Location: 'error.php'");
	}else{
		header("Location: 'index.php'");
	}

}