<nav>
	<a href="/topics">Home</a> | 
	<a href="/topics/new">Create a New Topic</a> |
	<a href="/users/logout">Logout</a>
</nav>
<div id="welcome-banner">
	<p>Welcome back, <?= $this->session->userdata['user_session']['username']; ?>!</p>
</div>
