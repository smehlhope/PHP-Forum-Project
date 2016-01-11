<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/nav'); ?>

<div class="container">
	<h1>Login!</h1>
	<form action="/users/login_user" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="username" class="control-label col-sm-3">Username: </label>
			<div class="col-sm-8">
				<input type="text" name="username" placeholder="Username" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="control-label col-sm-3">Password: </label>
			<div class="col-sm-8">
				<input type="password" name="password" placeholder="Password" class="form-control">
			</div>
		</div>
		<div class="col-sm-offset-3 col-sm-3">
			<button type="submit" class="btn btn-primary">Login</button>
		</div>	
	</form>
</div>
<?php $this->load->view('/partials/footer'); ?>