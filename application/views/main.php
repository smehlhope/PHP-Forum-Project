<?php $this->load->view('partials/header'); ?>
<?php $this->load->view('partials/nav'); ?>

<div id="forum-container">
<h1>Wandering Reader Discussion Board</h1>

<?= $this->session->flashdata("topic-delete-success"); ?>
		
<table>
	<thead>
		<tr>
			<th>Subject</th>
			<th>Category</th>
			<th>Description</th>
			<th>Replies</th>
			<th>Author</th>
			<th>Activity</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($topics as $topic) { ?>	
		<tr>
			<td><h4><a href="/topics/<?= $topic['id'] ?>"><?= $topic['subject'] ?></a></h4></td>
			<td><h4><?= $topic['category'] ?></h4></td>
			<td><p><?= $topic['description'] ?></p></td>
			<td><p><?= $topic['comment_count'] ?></p></td>
			<td><p><?= $topic['username'] ?></p></td>
			<td><p><?= $topic['updated_at'] ?></p></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<!-- var_dump($this->session->all_userdata());  
array (size=6)
  'session_id' => string 'a8bab57e7df9556e61af57d582f03aac' (length=32)
  'ip_address' => string '::1' (length=3)
  'user_agent' => string 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.3' (length=120)
  'last_activity' => int 1451412505
  'user_data' => string '' (length=0)
  'user_session' => 
    array (size=8)
      'id' => string '1' (length=1)
      'username' => string 'tester' (length=6)
      'password' => string '5f4dcc3b5aa765d61d8327deb882cf99' (length=32)
      'email' => string 'test@mail.com' (length=13)
      'avatar' => null
      'access_lvl' => null
      'created_at' => string '2015-12-28 14:13:53' (length=19)
      'updated_at' => null
-->
</div>


<?php $this->load->view('/partials/footer'); ?>

