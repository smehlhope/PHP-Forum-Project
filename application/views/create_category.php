<?php $this->load->view('/partials/header.php'); ?>
<?php $this->load->view('/partials/nav.php'); ?>

<form method="post" action="/categories/create">
	<label for="name">Category Title: </label>
	<input type="text" name="name" placeholder="Title...">
	<label for="description">Description: </label>
	<textarea name="description" placeholder="Description of the topic..."></textarea>
	<input type="submit" value="Add Category">
</form>

<?php $this->load->view('/partials/footer.php'); ?>
