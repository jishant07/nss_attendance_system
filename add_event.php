<?php 
	session_start();
	if(isset($_SESSION['is_senior']) && $_SESSION['is_senior'] == 1)
	{}
	else if(isset($_SESSION['is_junior']) && $_SESSION['is_junior'] == 1)
	{
		header("Location:login.php");
	}
	else
	{
		header("Location:login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Event detail addition</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<br>
		<br>
		<div class="jumbotron">
			<h1>Add events page</h1>
		</div>
		<br>
		<br>
		<a href="logout.php"><button class="btn btn-info">Logout</button></a>
		<br>
		<br>
		<div class="form-group" style="margin: auto; text-align: center;">
			<form action="data_save.php" method="post">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-sm-12">
						Event Name: 
						<input type="text" name="event_name" required class="form-control" placeholder="Event Name">
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						Event Date:
						<input type="date" name="event_date" required class="form-control" placeholder="Event Date">
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						Location:
						<input type="text" name="event_location" required class="form-control" placeholder="Event Location">
					</div>
					<div class="col-lg-3 col-md-6 col-sm-12">
						Chief Guest:
						<input type="text" name="chief_guest" placeholder="Chief Guest (If Any)" class="form-control">
					</div>
				</div>
				<h2>Senior Attendance</h2>
				<div class="row">
						<?php  
							require('db_info.php');
							$sql = "select id,name from senior_data";
							$result = $con -> query($sql);
							if($result->num_rows>0)
							{
								while($row = $result->fetch_assoc())
								{
						?>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<input type="checkbox" class="form-check-input" name="attending_seniors[]" value="<?php echo $row['id'] ?>">
							<label><?php echo $row['name']; ?></label>
						</div>
						<?php
								}
							}
						?>
				</div>
				<br>
				<br>
				<h2>Junior Attendance</h2>
				<div class="row">
						<?php  
							require('db_info.php');
							$sql = "select id,name from junior_data";
							$result = $con -> query($sql);
							if($result->num_rows>0)
							{
								while($row = $result->fetch_assoc())
								{
						?>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<input type="checkbox" class="form-check-input" name="attending_juniors[]" value="<?php echo $row['id'] ?>">
							<label><?php echo $row['name']; ?></label>
						</div>
						<?php
								}
							}
						?>
				</div>
				<button class="btn btn-info">Submit</button>
				<br>
				<br>
			</form>
		</div>
	</div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</html>