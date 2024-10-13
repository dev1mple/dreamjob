<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<h1>Are you sure you want to delete this user?</h1>
	<?php $getDriversById = getDriversById($pdo, $_GET['driversId']); ?>
	<form action="core/handleForms.php?driversId=<?php echo $_GET['driversId']; ?>" method="POST">

			<p>First Name: <?php echo $getDriversById['firstName']; ?></p>
			<p>Last Name: <?php echo $getDriversById['lastName']; ?></p>
			<p>Email Address: <?php echo $getDriversById['emailAddress']; ?></p>
			<p>License Number: <?php echo $getDriversById['licenseNumber']; ?></p>
			<p>Contact Number: <?php echo $getDriversById['contactNumber']; ?></p>
			<p>Body Number: <?php echo $getDriversById['bodyNumber']; ?></p>
			<p>Plate Number: <?php echo $getDriversById['plateNumber']; ?></p>

			<input type="submit" name="deleteDriversBtn" value="Delete">
		</div>
	</form>
</body>
</html>