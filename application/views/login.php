<h1>Login!</h1>
<form action="/users/login" method="post" class="form-horizontal">
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
	<div class="col-sm-offset-3 col-sm-3">
		<input type="submit" name="submit" value="Submit">
	</div>	
</form>