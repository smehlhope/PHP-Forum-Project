<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/nav'); ?>

<div class="container">
		<h1>Welcome <?=$user_session["username"]?>!</h1>
		<div id="user-information">
			<h3>Email Address: <?= $user_session["email"]?></h3>
			<h3>User Joined: <?= $user_session["created_at"]?></h3>
			<h3>Gravatar Image: <img src="<?= $user_session["avatar"]?>" alt="<?=$user_session["username"]?>'s avatar"></h3>
		</div>
		
</div>

<div class="container">
	<h1>Edit User Information</h1>
	<form action="/users/edit" method="post" class="form-horizontal">
		<div class="form-group">
			<label for="email" class="control-label col-sm-3">Email Address: </label>
			<div class="col-sm-8">
				<input type="email" name="email" placeholder="Email" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label for="username" class="control-label col-sm-3">Username: </label>
			<div class="col-sm-8">
				<input type="text" name="username" placeholder="Username"  class="form-control">
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
			<button type="submit" class="btn btn-primary">Edit Information</button>
		</div>
	</form>
	<!-- 	show errors on page -->
	<?php if($this->session->flashdata("errors")) {
			echo $this->session->flashdata("errors");
		} ?>
</div>	


<?php var_dump($user_session); ?>
<?php $this->load->view('/partials/footer'); ?>