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
	<?php if (intval($this->session->userdata['user_session']['id']) == $topic['user_id']) { ?>
	<div id="topic-update-container">
		<h4>Edit Topic:</h4>
		<form method="post" action="/topics/update/<?= $topic['id']?>">
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
			<input type="submit" value="Edit Topic">
		</form>
		<p> OR </p>
		<a href="/topics/delete/<?= $topic['id']?>"><button>Delete Topic</button></a>
		<?= $this->session->flashdata("error");  ?>
	</div>
	<?php } ?> 
	
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
		<?php if (intval($this->session->userdata['user_session']['id']) == $comment['user_id']) { ?>
		<form method="post" action="/comments/update/<?= $comment['id'] ?>">
			<label for="content">Response: </label>
			<textarea name="content" placeholder="Reply..."></textarea>
			<input type="hidden" name="topic_id" value="<?= $topic['id'] ?>">
			<input type="submit" value="Edit Comment">
		</form>
		<?php } ?>
	</div>
	<?php } ?>
</div>

<?php $this->load->view('/partials/footer'); ?>