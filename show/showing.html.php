<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Simple name</title>
	</head>
	<body>
		<h2>All users:</h2><br>
		<ul>
			<?php foreach ($users as $user): ?>
				<li><p><?php echo html_str($user[0]) . " " .html_str($user[1]); ?></p></li>
			<?php endforeach; ?>
		</ul>
		<p><br><a href="../">Main page</a></p>
	</body>
</html>