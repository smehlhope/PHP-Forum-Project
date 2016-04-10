<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/nav'); ?>

<div class="container">
	<div class="jumbotron">
		<div class="container">
			<h2><?= $topic['subject'] ?></h2>	
			<h2><small><?= $topic['category'] ?></small></h2>
			<p class="lead"><?= $topic['description'] ?></p>
			<p>- <em><?= $topic['username'] ?></em></p>
			<p>Posted on: <?= $topic['created_at'] ?></p>
		</div>	
	</div>

	<?php if (intval($current_user['user_id']) == $topic['user_id']) { ?>
	<div id="topic-update-container">
		<h4><em>Edit Topic:</em></h4>
		<form method="post" action="/topics/update/<?= $topic['id']?>" class="form-horizontal">
			<div class="form-group">
				<label for="subject" class="control-label col-sm-3"><em>Topic Subject: </em></label>
				<div class="col-sm-8">
					<input type="text" name="subject" placeholder="Title..." class="form-control" value="<?= $topic['subject'] ?>">
				</div>
			</div>
			<div class="form-group">	
				<label for="category" class="control-label col-sm-3"><em>Category:</em></label>
				<div class="col-sm-8">
					<select name="category" class="form-control">
						<option value="General Discussion">General Discussion</option>
						<option value="Review">Review</option>
						<option value="Question">Question</option>
					</select>
				</div>
			</div>	
			<div class="form-group">	
				<label for="description" class="control-label col-sm-3"><em>Description: </em></label>
				<div class="col-sm-8">
					<textarea name="description" class="form-control" rows="4"><?= $topic['description'] ?></textarea>
				</div>
			</div>
			<div class="col-sm-offset-3 col-sm-3">
				<input type="submit" value="Edit Topic" class="btn btn-warning btn-sm">
			</div>	
		</form>
		<a href="/topics/delete/<?= $topic['id']?>"><button type="button" class="btn btn-danger btn-sm">Delete Topic</button></a>
		<?= $this->session->flashdata("error");  ?>
	</div>
	<?php } ?> 
	
	<div class="container">
	<div class="page-header">
		<h3>Comments</h3>
	</div>
		<?php foreach ($comments as $comment) { ?>
		<div class="list-group">
			<h4 class="list-group-item-heading"><?= $comment['content'] ?></h4>
			<p class="list-group-item-text">- <em><?= $comment['username'] ?> <small><?= $comment['created_at'] ?></small>.</em></p>
		<?php if (intval($current_user['user_id']) != $comment['user_id']) { ?>
		</div>
		<?php } else { ?>
		<form method="post" action="/comments/update/<?= $comment['id'] ?>" class="form-horizontal">
			<div class="form-group">
				<label for="content" class="control-label col-sm-3"><em>Edit Comment: </em></label>
				<div class="col-sm-8">
					<textarea name="content" class="form-control" rows="3" value=""><?= $comment['content'] ?></textarea>
				</div>	
				<input type="hidden" name="topic_id" value="<?= $topic['id'] ?>">
			</div>	
			<div class="col-sm-offset-3 col-sm-3">
				<button type="submit" class="btn btn-warning btn-sm">Edit Comment</button>
			</div>	
		</form>
		<form method="post" action="/comments/delete/<?= $comment['id']?>">
			<input type="hidden" name="topic_id" value="<?= $topic['id'] ?>">
			<button type="submit" class="btn btn-danger btn-sm">Delete Comment</button>
		</form>
	</div>		
		<?php }
		} ?>


	<div class="page-header">
		<h3>Post a comment:</h3>
	</div>	
		<?= $this->session->flashdata('errors'); ?>
		<form method="post" action="/comments/add_comment" class="form-horizontal">
			<div class="form-group">
				<label for="content" class="control-label col-sm-3">Comment: </label>
				<div class="col-sm-8">
					<textarea name="content" class="form-control" placeholder="Reply..." rows="4"></textarea>
				</div>	
			</div>	
			<input type="hidden" name="topic_id" value="<?= $topic['id'] ?>">
			<div class="col-sm-offset-3 col-sm-3">
				<button type="submit" class="btn btn-primary btn-sm">Add Comment</button>
			</div>	
		</form>
	</div>
	<?= $this->session->flashdata("comment-success"); ?>
	<?=  $this->session->flashdata("comment-error");  ?>


<?php $this->load->view('/partials/footer'); ?>