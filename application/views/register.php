<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/nav'); ?>
<div class="container">
	<h1>Register!</h1>
	<form action="/users/register_user" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="email" class="control-label col-sm-3">Email Address: </label>
			<div class="col-sm-8">
				<input type="email" name="email" placeholder="Email" class="form-control">
			</div>
		</div>
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
		<div class="form-group">
			<label for="password" class="control-label col-sm-3">Confirm Password: </label>
			<div class="col-sm-8">
				<input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control">
			</div>
		</div>
		<div class="col-sm-offset-3 col-sm-3">
			<button type="submit" class="btn btn-primary">Register</button>
		</div>
	</form>
	<!-- 	show errors on page -->
	<!--if had another redirectwould have to use the $this->session->keep_flashdata-->
	<?php if($this->session->flashdata("registration_errors")) {
			echo $this->session->flashdata("registration_errors");
		} ?>
</div>		

<?php $this->load->view('/partials/footer'); ?>	