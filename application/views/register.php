<h1>Register!</h1>
<form action="/users/register" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="email" class="control-label col-sm-3">Email Address: </label>
		<div class="col-sm-8">
			<input type="email" name="email" placeholder="Email">
		</div>
	</div>
	<div class="form-group">
		<label for="username" class="control-label col-sm-3">Username: </label>
		<div class="col-sm-8">
			<input type="text" name="username" placeholder="Username">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="control-label col-sm-3">Password: </label>
		<div class="col-sm-8">
			<input type="password" name="password" placeholder="Password">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="control-label col-sm-3">Confirm Password: </label>
		<div class="col-sm-8">
			<input type="password" name="confirm_password" placeholder="Confirm Password">
		</div>
	</div>
	<div class="col-sm-offset-3 col-sm-3">
		<input type="submit" name="submit" value="Submit">
	</div>
</form>
<!-- 	show errors on page -->
<!--if had another redirectwould have to use the $this->session->keep_flashdata-->
<?php if($this->session->flashdata("registration_errors")) {
		echo $this->session->flashdata("registration_errors");
	} ?>