<!DOCTYPE html>
<html>
<head>
	<title>Date Picker</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<div class="jumbotron">
			<h1>Date Range Picker</h1>
		</div>
		<form class="form-group">
			<div class="row">
				<div class="col-lg-6 mb-4">
					From : <input type="date" name="start_date" class="form-control" id="start_date">
				</div>
				<div class="col-lg-6 mb-4">
					To : <input type="date" name="end_date" class="form-control" id="end_date">
				</div>
			</div>
		</form>
		<button class="btn btn-primary" id="submit">Submit</button>
		<div id="result"></div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function()
	{
		$('#submit').click(function()
		{
			$.ajax({
				url:"daterangerequest.php",
				method:"POST",
				data:{start_date:$('#start_date').val(),
						end_date:$('#end_date').val()},
				success : function(e)
				{
					$('#result').html(e);
				},
				error : function()
				{
					alert("AJAX error");
				}
			});
		});
	});
</script>
</html>