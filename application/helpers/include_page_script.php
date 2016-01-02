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
	var Page = require("pages/<?= $route ?>");
	page = new Page();
</script>
