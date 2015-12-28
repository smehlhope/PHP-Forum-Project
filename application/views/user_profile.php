<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Welcome</title>
	<meta name="description" content="Welcome">
</head>
<body>
	<div id="page-container">
		<h1>Welcome <?=$user_session["first_name"]?></h1>
		<div id="user-information">
			<h3>First Name: <?= $user_session["first_name"]?></h3>
			<h3>Last Name: <?= $user_session["last_name"]?></h3>
			<h3>Email Address: <?= $user_session["email"]?></h3>
		</div>
		
	</div>
	<a href="/login/logout">Log Off</a>
</body>
<html>