<?php $this->load->view('/partials/header.php'); ?>
<?php $this->load->view('/partials/nav.php'); ?>
<div class="container">
	<?= $this->session->flashdata('errors'); ?>
	<h1>Create A New Topic</h1>
	<form method="post" action="/topics/add_topic" class="form-horizontal">
		<div class="form-group">
			<label for="subject" class="col-sm-2 control-label">Topic Subject: </label>
			<input type="text" name="subject" placeholder="Title..." class="col-sm-4">
		</div>
		<div class="form-group">	
			<label for="category" class="col-sm-2 control-label">Category: </label>
			<select name="category" class="col-sm-4">
				<option value="General Discussion">General Discussion</option>
				<option value="Review">Review</option>
				<option value="Question">Question</option>
			</select>
		</div>	
		<div class="form-group">	
			<label for="description" class="col-sm-2 control-label">Description: </label>
			<textarea name="description" placeholder="Description of the topic..." class="col-sm-4" rows="4"></textarea>
		</div>	
		<p class="center"><input type="submit" value="Add Topic" class="btn btn-default"></p>
	</form>
</div>
<?php $this->load->view('/partials/footer.php'); ?>