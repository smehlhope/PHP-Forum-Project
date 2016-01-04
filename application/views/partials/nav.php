<body>
<div class="container">
	<!-- Static navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/topics">The Wandering Reader</a>
			</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="/topics">Home</a></li>
				<?php if (!$this->session->userdata('user_session')) { ?>
				<li class="dropdown">
					 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Get Online!<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="/users/login">Login</a></li>
						<li><a href="/users/register">Register</a></li>
					</ul>
        		</li>
        		<?php } ?>
				<li><a href="/topics/new">Create New Topic</a></li>
			</ul>
			<?php if ($this->session->userdata('user_session')) { ?>
			<ul class="nav navbar-right navbar-nav">
				<li><p class="navbar-text">Signed in as <strong><?= $this->session->userdata['user_session']['username']; ?></strong></p></li>
				<li><a href="/logout">Logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
			</ul>
			<?php } ?>

		</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>
</div> <!--/.container -->
