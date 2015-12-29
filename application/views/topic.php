<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/nav'); ?>

<div id="topic-container">
	<div id="topic-header">
		<h1><?= $topic['subject'] ?></h1>
		<p><?= $topic['category'] ?></p>
	</div>
	<div id="topic-description-container">
		<p><?= $topic['description'] ?></p>
		<p><?= $topic['username'] ?></p>
		<p>Posted on: <?= $topic['created_at'] ?></p>
	</div>
</div>
<div class="form-container">
	<h3>Post a comment:</h3>
	<?= $this->session->flashdata('errors'); ?>
	<form method="post" action="/comments/add_comment">
		<label for="content">Response: </label>
		<textarea name="content" placeholder="Reply..."></textarea>
		<input type="hidden" name="topic_id" value="<?= $topic['id'] ?>">
		<input type="submit" value="Add Comment">
	</form>
</div>
<div id="comment-container">
	<?php foreach ($comments as $comment) { ?>
	<div class="one-comment-container">
		<p><?= $comment['content'] ?></p>
		<p>- <?= $comment['username'] ?> at <?= $comment['created_at'] ?>.</p>
	</div>
	<?php } ?>
</div>

<?php $this->load->view('/partials/footer'); ?>