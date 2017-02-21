<?php 

session_start();

?>

<?php

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
		echo "That information is incorrect, try again <a href=\"index.php\">Click Here</a>";
		exit();
	}
}

?>

<head>
	<title>NK&N | Admin-Login</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
		SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!-- Custom Theme files -->
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- font-awesome icons -->
	<link href="../css/font-awesome.css" rel="stylesheet"> 
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="../js/jquery.min.js"></script>
	<!-- for bootstrap working -->
	<script type="text/javascript" src="../js/bootstrap-3.1.1.min.js"></script>
	<!-- //for bootstrap working -->
	<link rel="stylesheet" href="../css/jquery.countdown.css" /> <!-- countdown --> 
	<!-- //js -->  
	<!-- start-smooth-scrolling -->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling --> 
</head> 

<body>
	<div class="container">
		<form id="form1" name="form1" method="post" action="admin_login.php">
			<div class="form-group">
				<label for="username">
					Username
				</label>
				<input name="username" type="text" class="form-control" id="username" style="width:30%;">
			</div>
			<div class="form-group">
				<label for="password">
					Password
				</label>
				<input name="password" type="password" class="form-control" id="password" style="width:30%;">
			</div>
			<button type="submit" class="btn btn-default" name="button" id="button" value="">Submit</button>
		</form>
	</div>
</body>