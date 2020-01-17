<?php

	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$host = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$dbname = substr($url["path"], 1);
	
	$tokenInfoUsers = getenv("TOKEN_INFOUSERS");
	$admin_group_InfoUsers = getenv('ADMIN_GROUP_INFOUSERS');	
	$test_group = getenv('TEST_GROUP');

	$master = getenv("MASTER");

	$passSMTP = getenv("PASSWORD_SMTP");

?>
