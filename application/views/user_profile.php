<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<title>Welcome</title>
	<meta name="description" content="Welcome">
</head>
<body>
	<div id="page-container">
		<h1>Welcome <?=$user_session["username"]?>!</h1>
		<div id="user-information">
			<h3>Email Address: <?= $user_session["email"]?></h3>
			<h3>User Joined: <?= $user_session["created_at"]?></h3>
		</div>
		
	</div>
	<a href="/users/logout">Log Off</a>
</body>
<html>