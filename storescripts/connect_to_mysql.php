<?php

$db_host = "localhost";

$db_username = "nksurvei_builder";

$db_pass = "xUd*rT!FbgZ%";

$db_name = "nksurvei_mystore";


mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");

?>