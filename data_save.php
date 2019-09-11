<?php 
	$event_name = $_POST['event_name'];
	$event_date = $_POST['event_date'];
	$event_location = $_POST['event_location'];
	$chief_guest =  (!$_POST['chief_guest'] ? "NA" : $_POST['chief_guest']);
	require('db_info.php');
	$senior_data = json_encode($_POST['attending_seniors']); 
	$junior_data = json_encode($_POST['attending_juniors']); 
	$sql = "INSERT INTO `events`( `event_name`, `event_date`, `event_location`,`senior_id`,`junior_id`, `chief_guest`) VALUES ('$event_name', '$event_date', '$event_location','$senior_data','$junior_data', '$chief_guest')";
	$con -> query($sql);
	foreach ($_POST['attending_seniors'] as $val) 
	{
		$select_sql = "select id,no_of_events from senior_data where id=$val";
		$sen_res = $con->query($select_sql);
		$sen_row = $sen_res->fetch_assoc();
		$old_value = $sen_row['no_of_events'];
		$new_value = $old_value + 1;
		$update_sql = "update `senior_data` set `no_of_events`=$new_value where `id`=$val";
		$con->query($update_sql);
	}
	foreach ($_POST['attending_juniors'] as $val) 
	{
		$select_sql = "select id,no_of_events from `junior_data` where id=$val";
		$jun_res = $con->query($select_sql);
		$jun_row = $jun_res->fetch_assoc();
		$old_value = $jun_row['no_of_events'];
		$new_value = $old_value + 1;
		$update_sql = "update `junior_data` set `no_of_events`=$new_value where `id`=$val";
		$con->query($update_sql);
	}
	/*header("Location: index.php"); */
 ?>