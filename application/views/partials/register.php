<h1>Register!</h1>
<form action="/users/register" method="post">
	<p>Email: <input type="text" name="email"></p>
	<p>Username: <input type="text" name="username"></p>
	<p>Password: <input type="password" name="password"></p>
	<p>Confirm Password: <input type="password" name="confirm_password"></p>
	<input type="submit" name="submit" value="submit">
</form>
<!-- 	show errors on page -->
<!--if had another redirectwould have to use the $this->session->keep_flashdata-->
<?php if($this->session->flashdata("registration_errors")) {
		echo $this->session->flashdata("registration_errors");
	} ?>