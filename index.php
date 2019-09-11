<?php 
	session_start();
	if ((!($_SESSION['is_senior'])) && (!($_SESSION['is_junior'])))
	{
		header("Location:login.php");
	}
	else if(isset($_SESSION['is_junior']) && $_SESSION['is_junior'] == 1)
	{
		header("Location:junior_index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<title>Senior Index</title>
</head>
<body>
	<div class="container">
		<br>
		<br>
		<div class="row text-center" style="margin:auto;text-align:center;">
			<div class="col-lg-3 col-md-3 mb-4">
				<a href="add_event.php"><button class="btn btn-info">Add Events</button></a>
			</div>
			<div class="col-lg-3 col-md-3 mb-4">
				<a href="see_events.php"><button class="btn btn-info">Event Details</button></a>
			</div>
			<div class="col-lg-3 col-md-3 mb-4">
				<a href="daterange.php"><button class="btn btn-info">Check between dates</button></a>
			</div>
			<div class="col-lg-3 col-md-3 mb-4">
				<a href="logout.php"><button class="btn btn-info">Logout</button></a>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-lg-6">
				<h2>Senior Data</h2>
				<div class="table-responsive">
					<table class="table table-hover table-condensed" id="senior_data">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Branch</th>
							<th>Events Attended</th>
							<th>% Attendance</th>
						</thead>
						<tbody>
							<?php  
								require('db_info.php');
								$sql = "select * from senior_data";
								$result = $con -> query($sql);
								$count_sql = "select id from events";
								$getting_number = $con -> query($count_sql);
								$number_of_events = $getting_number->num_rows;
								if($result->num_rows>0)
								{
									while($row = $result->fetch_assoc())
									{
										
							?>
							<tr>
								<td> <?php echo $row['id'] ?> </td>
								<td> <?php echo $row['name'] ?> </td>
								<td> <?php echo $row['branch'] ?> </td>
								<td> <?php if($row['no_of_events']){echo $row['no_of_events'];}else{echo "No events attended";} ?> </td>
								<td> <?php if($number_of_events !=0)
										{
											echo ($row['no_of_events']/$number_of_events)*100;
										}
										else
										{
											echo "No events yet";
										}
									?> 
								</td>
							</tr>
							<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-6">
				<h2>Junior Data</h2>
				<div class="table-responsive">
					<table class="table table-hover table-condensed" id="junior_data">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Branch</th>
							<th>Roll No</th>
							<th>Events Attended</th>
							<th>% Attendance</th>
						</thead>
						<tbody>
							<?php  
								require('db_info.php');
								$sql = "select * from junior_data";
								$result = $con -> query($sql);
								$count_sql = "select id from events";
								$getting_number = $con -> query($count_sql);
								$number_of_events = $getting_number->num_rows;
								if($result->num_rows>0)
								{
									while($row = $result->fetch_assoc())
									{
										
							?>
							<tr>
								<td> <?php echo $row['id'] ?> </td>
								<td> <?php echo $row['name'] ?> </td>
								<td> <?php echo $row['branch'] ?> </td>
								<td> <?php echo $row['roll_no']; ?> </td>
								<td> <?php if($row['no_of_events']){echo $row['no_of_events'];}else{echo "No events attended";} ?> </td>
								<td> <?php if($number_of_events !=0 && $number_of_events>9)
										{
											echo ($row['no_of_events']/($number_of_events-9))*100;
										}
										else if($number_of_events == 9)
										{
											echo "100";
										}
										else
										{
											echo "No events yet";
										}
									?> 
								</td>
							</tr>
							<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#senior_data').DataTable();
		$('#junior_data').DataTable();
	});
</script>
</html>