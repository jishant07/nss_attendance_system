<?php 
	extract($_POST);
?>
	<div class="table-responsive">
			<table class="table table-hover table-condensed" id="senior_table">
				<thead>
					<th>#</th>
					<th>Event Name</th>
					<th>Event Date</th>
					<th>Event Location</th>
					<th>Seniors that attended</th>
					<th>Juniors that attended</th>
					<th>Chief Guest</th>
				</thead>
				<tbody>
					<?php  
						require('db_info.php');
						$sql = "SELECT * FROM `events` where `event_date` BETWEEN '$start_date' and '$end_date'";
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
									$test = $row['senior_id'];
									$res = json_decode($test,true);
									echo "<h5>CMPN</h5>";
									foreach ($res as $value) 
									{
									 	$sql = "select name from senior_data where id=$value && branch='CMPN'";
									 	$senior_result = $con ->query($sql);
									 	if($senior_result->num_rows>0)
									 	{
									 		while($internal_row = $senior_result->fetch_assoc())
									 		{
									 			echo $internal_row['name'].'<br>';
									 		}
									 	}
									}
									echo "<h5>ELEC</h5>";
									foreach ($res as $value) 
									{
									 	$sql = "select name from senior_data where id=$value && branch='ELEC'";
									 	$senior_result = $con ->query($sql);
									 	if($senior_result->num_rows>0)
									 	{
									 		while($internal_row = $senior_result->fetch_assoc())
									 		{
									 			echo $internal_row['name'].'<br>';
									 		}
									 	}
									}
									echo "<h5>EXTC</h5>";
									foreach ($res as $value) 
									{
									 	$sql = "select name from senior_data where id=$value && branch='EXTC'";
									 	$senior_result = $con ->query($sql);
									 	if($senior_result->num_rows>0)
									 	{
									 		while($internal_row = $senior_result->fetch_assoc())
									 		{
									 			echo $internal_row['name'].'<br>';
									 		}
									 	}
									}
									echo "<h5>INFT</h5>";
									foreach ($res as $value) 
									{
									 	$sql = "select name from senior_data where id=$value && branch='INFT'";
									 	$senior_result = $con ->query($sql);
									 	if($senior_result->num_rows>0)
									 	{
									 		while($internal_row = $senior_result->fetch_assoc())
									 		{
									 			echo $internal_row['name'].'<br>';
									 		}
									 	}
									}
									echo "<h5>ELEX</h5>";
									foreach ($res as $value) 
									{
									 	$sql = "select name from senior_data where id=$value && branch='ELEX'";
									 	$senior_result = $con ->query($sql);
									 	if($senior_result->num_rows>0)
									 	{
									 		while($internal_row = $senior_result->fetch_assoc())
									 		{
									 			echo $internal_row['name'].'<br>';
									 		}
									 	}
									}
								?> 
							</td>
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
						else
						{
							echo "No data found";
						}
					?>
				</tbody>
			</table>
		</div>
<script type="text/javascript">
	$('#senior_table').DataTable();
</script>