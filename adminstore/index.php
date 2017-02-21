<?php 

session_start();
if (!isset($_SESSION["manager"])) {
	header("location: admin_login.php");
	exit();
}


$managerID = preg_replace('#[^0-9#]i','',$_SESSION["id"]);
$manager = preg_replace('#[^A-Za-z0-9]#i','',$_SESSION["manager"]);
$password = preg_replace('#[^A-Za-z0-9]#i','',$_SESSION["password"]);

include "../storescripts/connect_to_mysql.php";
$sql = mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password LIMIT 1'");

$existCount = mysql_num_rows($sql);
if($existCount == 0) {
	echo "No record found";
	exit();
}

?>

<head>
	<title>NK&N | Admin</title>
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
	<!-- header -->
		<?php include_once("../template_header.php"); ?>
	<!-- //header -->
</body>
