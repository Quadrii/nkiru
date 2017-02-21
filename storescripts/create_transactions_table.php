<?php

session_start();
if (!isset($_SESSION["manager"])) {
	header("location: index.php");
	exit();
}

if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i','',$_POST["username"]);
	$password = preg_replace('#[^A-Za-z0-9]#i','',$_POST["password"]);

	include "../storescripts/connect_to_mysql.php";
	$sql = mysql_query("SELECT * FROM admin WHERE username='$manager' AND password='$password LIMIT 1'");

	$existCount = mysql_num_rows($sql);
	if ($existCount == 1) {
		while ($row = mysql_fetch_array($sql)) {
			$id = $row["id"];
		}
		$_SESSION["id"] = $id;
		$_SESSION["manager"] = $manager;
		$_SESSION["password"] = $password;
		header("location: index.php");
		exit();
	}else {
		echo "That information is incorrect, try again <a href="index.php">Click Here</a>";
		exit();
	}
}

?>