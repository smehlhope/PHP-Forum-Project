<script>
	<?php
		$controller = $this->uri->segment(1);
		$action     = $this->uri->segment(2);
		switch($action) {
			case false:
				$action = 'index';
			case is_numeric($action):
				$action = 'show';
		};
		$route = $controller . '/' . $action;
	?>
	// Require general JS
	var Main = require("./main");
	// require page-specifc JS
	var Page = require("pages/<?= $route ?>");
	page = new Page();
</script>
