<form role="form" method="post" name="register" id="register" class="form-horizontal">
	<fieldset>
        <legend>Register</legend>
		<div class="form-group">
			<label for="email" class="control-label">Email</label>
			<input type="email" class="form-control" id="email" name="email" required>
		</div>
		<div class="form-group">
			<label for="username" class="control-label">First Name</label>
			<input type="text" class="form-control" id="username" name="username" required>
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

	$check = $user -> check_user($_POST['email'], $db);

	if ($check) {
		$_SESSION['errorMsg'] = "User with that email already exists!";
		echo "<script type='text/javascript'>
			window.location = '/error';
		</script>";
	} else {
		$user_name = $_POST['username'];
		$user_email = $_POST['email'];
		$user_password = $_POST['password'];

		$user -> add_user($user_name, $user_password, $user_email, null, $db);

		echo "<script type='text/javascript'>
			window.location = '/index';
		</script>";

	}

}