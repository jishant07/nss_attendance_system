<?php 
	session_start();
	require("db_info.php");
	$_SESSION['is_senior'] = 0;
	$_SESSION['is_junior'] = 0;
	extract($_POST);
	$admin_sql = "select * from `senior_login` where username = '$user_name' and password='".md5($pwd)."';";
	$admin_result = $con->query($admin_sql);
	if($admin_result->num_rows > 0)
	{
		$_SESSION['is_senior'] = 1;
		header("Location: index.php");
	}
	$worker_sql = 
		"select * from `junior_login` where username = '$user_name' and password='".md5($pwd)."';";
	$worker_result = $con->query($worker_sql);
	if ($worker_result->num_rows>0)
	{
		$_SESSION['is_junior'] = 1;
		header("Location: index.php");
	}
	if ((!($_SESSION['is_senior'])) && (!($_SESSION['is_junior']))) 
	{
		$_SESSION['is_error'] = 1;
		header("Location: login.php");
	}
 ?>