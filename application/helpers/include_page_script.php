<script>
	<?php
		$controller = $this->uri->segment(1);
		$method     = $this->uri->segment(2);
		$route 			= $controller . '/' . $method;
	?>
	var Page = require("pages/<?= $route ?>");
	page = new Page();
</script>
