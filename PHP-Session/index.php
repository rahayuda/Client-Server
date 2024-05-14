<?php
session_start();

if (isset($_SESSION["username"])) {
	$session_cookie_params = $_SESSION["cookie_params"];
	?>

	<h1>Welcome, <?php echo $_SESSION["username"]; ?>!</h1>
	<p>Email: <?php echo $_SESSION["email"]; ?></p>
	<p>Session ID: <?php echo $_SESSION["id"]; ?></p>
	<p>Session Name: <?php echo $_SESSION["name"]; ?></p>
	<p>Session Save Path: <?php echo $_SESSION["save_path"]; ?></p>
	<p>Session Module Name: <?php echo $_SESSION["module_name"]; ?></p>
	<p>Session Cookie Parameters:</p>
    <ul>
        <li>Lifetime: <?php echo $session_cookie_params["lifetime"]; ?></li>
        <li>Path: <?php echo $session_cookie_params["path"]; ?></li>
        <li>Domain: <?php echo $session_cookie_params["domain"]; ?></li>
        <li>Secure: <?php echo $session_cookie_params["secure"] ? 'True' : 'False'; ?></li>
        <li>HTTP Only: <?php echo $session_cookie_params["httponly"] ? 'True' : 'False'; ?></li>
    </ul>
	<p>Session Cache Limiter: <?php echo $_SESSION["cache_limiter"]; ?></p>
	<p>Session Cache Expire: <?php echo $_SESSION["cache_expire"]; ?> minutes</p>

	<p>Session Status: 
		<?php 
		echo $_SESSION["status"];
		switch ($_SESSION["status"]) {
			case PHP_SESSION_DISABLED:
			echo ". Sessions are disabled.";
			break;
			case PHP_SESSION_NONE:
			echo ". Sessions are enabled, but none exists.";
			break;
			case PHP_SESSION_ACTIVE:
			echo ". Sessions are enabled, and one exists.";
			break;
		} 
		?>
	</p>

	<a href="logout.php">Logout</a>

	<?php
} else {
	header("Location: login.php");
	exit();
}
?>