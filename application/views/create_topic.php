<?php $this->load->view('/partials/header.php'); ?>
<?php $this->load->view('/partials/nav.php'); ?>
<div class="form-container">
	<?php echo $this->session->flashdata('errors'); ?>
	<form method="post" action="/topics/add_topic">
		<label for="subject">Topic Subject: </label>
		<input type="text" name="subject" placeholder="Title...">
		<label for="category">Category: </label>
		<select name="category">
			<option value="General Disscussion">General Discussion</option>
			<option value="Review">Review</option>
			<option value="Question">Question</option>
		</select>
		<label for="description">Description: </label>
		<textarea name="description" placeholder="Description of the topic..."></textarea>
		<input type="submit" value="Add Topic">
	</form>
</div>
<?php $this->load->view('/partials/footer.php'); ?>