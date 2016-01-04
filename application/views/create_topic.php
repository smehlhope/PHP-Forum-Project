<?php $this->load->view('/partials/header.php'); ?>
<?php $this->load->view('/partials/nav.php'); ?>
<div class="container">
	<?= $this->session->flashdata('errors'); ?>
	<h1>Create A New Topic</h1>
	<form method="post" action="/topics/add_topic" class="form-horizontal">
		<div class="form-group">
			<label for="subject" class="control-label col-sm-3">Topic Subject: </label>
			<div class="col-sm-8">
				<input type="text" name="subject" placeholder="Title..." class="form-control">
			</div>
		</div>
		<div class="form-group">	
			<label for="category" class="control-label col-sm-3">Category: </label>
			<div class="col-sm-6">
				<select name="category" class="form-control">
					<option value="General Discussion">General Discussion</option>
					<option value="Review">Review</option>
					<option value="Question">Question</option>
				</select>
			</div>
		</div>	
		<div class="form-group">	
			<label for="description" class="control-label col-sm-3">Description: </label>
			<div class="col-sm-8">
				<textarea name="description" placeholder="Description of the topic..." class="form-control" rows="4"></textarea>
			</div>
		</div>
		<div class="col-sm-offset-3 col-sm-3">
			<button type="submit" class="btn btn-primary">Add Topic</button>
		<div>	
	</form>
</div>
<?php $this->load->view('/partials/footer.php'); ?>