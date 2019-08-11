<?php 
	session_start();
	if ((!($_SESSION['is_senior'])) && (!($_SESSION['is_junior'])))
	{
		header("Location:login.php");
	}
	else if(isset($_SESSION['is_junior']) && $_SESSION['is_junior'] == 1)
	{}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Event Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<br>
		<div class="jumbotron">
			<h1>Event Details</h1>
		</div>
		<br>
		<br>
		<a href="logout.php"><button class="btn btn-info">Logout</button></a>
		<br>
		<br>
		<div class="table-responsive">
			<table class="table table-hover table-condensed" id="senior_table">
				<thead>
					<th>#</th>
					<th>Event Name</th>
					<th>Event Date</th>
					<th>Event Location</th>
					<th>Juniors that attended</th>
					<th>Chief Guest</th>
				</thead>
				<tbody>
					<?php  
						require('db_info.php');
						$sql = "select * from events";
						$result = $con -> query($sql);
						if($result->num_rows>0)
						{
							while($row = $result->fetch_assoc())
							{	
					?>
						<tr>
							<td> <?php echo $row['id'] ?> </td>
							<td> <?php echo $row['event_name'] ?> </td>
							<td> <?php echo $row['event_date'] ?> </td>
							<td> <?php echo $row['event_location'] ?> </td>
							<td> <?php 
									$test = $row['junior_id'];
									$res = json_decode($test,true);
									if(empty($res))
									{
										echo "No one attended the event";
									}
									else
									{
										echo "<h5>CMPN</h5>";
										foreach ($res as $value) 
										{
										 	$sql = "select name from junior_data where id=$value && branch='CMPN1' or branch='CMPN2'";
										 	$junior_result = $con ->query($sql);
										 	if($junior_result->num_rows>0)
										 	{
										 		while($internal_row = $junior_result->fetch_assoc())
										 		{
										 			echo $internal_row['name'].'<br>';
										 		}
										 	}
										}
										echo "<h5>ELEC</h5>";
										foreach ($res as $value) 
										{
										 	$sql = "select name from junior_data where id=$value && branch='ELEC'";
										 	$junior_result = $con ->query($sql);
										 	if($junior_result->num_rows>0)
										 	{
										 		while($internal_row = $junior_result->fetch_assoc())
										 		{
										 			echo $internal_row['name'].'<br>';
										 		}
										 	}
										}
										echo "<h5>EXTC</h5>";
										foreach ($res as $value) 
										{
										 	$sql = "select name from junior_data where id=$value && branch='EXTC'";
										 	$junior_result = $con ->query($sql);
										 	if($junior_result->num_rows>0)
										 	{
										 		while($internal_row = $junior_result->fetch_assoc())
										 		{
										 			echo $internal_row['name'].'<br>';
										 		}
										 	}
										 	else
										 	{
										 		echo "No one from this branch attended".'<br>';
										 		break;
										 	}
										}
										echo "<h5>INFT</h5>";
										foreach ($res as $value) 
										{
										 	if($value == 25)
										 	{
										 		$sql = "select name from junior_data where id=$value && branch='INFT1'";
											 	$junior_result = $con ->query($sql);
											 	if($junior_result->num_rows>0)
											 	{
											 		while($internal_row = $junior_result->fetch_assoc())
											 		{
											 			echo $internal_row['name'].'<br>';
											 		}
											 	}	
										 	}
										 	else
										 	{
											 	$sql = "select name from junior_data where id=$value && branch='INFT2'";
											 	$junior_result = $con ->query($sql);
											 	if($junior_result->num_rows>0)
											 	{
											 		while($internal_row = $junior_result->fetch_assoc())
											 		{
											 			echo $internal_row['name'].'<br>';
											 		}
											 	}
										 	}
										}
										echo "<h5>ELEX</h5>";
										foreach ($res as $value) 
										{
										 	$sql = "select name from junior_data where id=$value && branch='ELEX'";
										 	$junior_result = $con ->query($sql);
										 	if($junior_result->num_rows>0)
										 	{
										 		while($internal_row = $junior_result->fetch_assoc())
										 		{
										 			echo $internal_row['name'].'<br>';
										 		}
										 	}
										}
									}
									?> 
								</td>
							<td> <?php echo $row['chief_guest']; ?> </td>
						</tr>
					<?php
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#senior_table').DataTable({
			scrollY:true
		});
	});
</script>
</html>
