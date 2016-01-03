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
				<a class="navbar-brand" href="#">The Wandering Reader</a>
			</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="/topics">Home</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?php $this->load->view('partials/login'); ?></li>
          </ul>
    		</li>
				<li><a href="/topics/new">Create New Topic</a></li>
			</ul>

			<ul class="nav navbar-right navbar-nav">
				<li><p class="navbar-text">Signed in as <strong><?= $this->session->userdata['user_session']['username']; ?></strong></p></li>
				<li><a href="/logout">Logout</a></li>
			</ul>
		</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</nav>
</div> <!--/.container -->
