<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php $getDriversById = getDriversById($pdo, $_GET['driversId']); ?>
	<form action="core/handleForms.php?driversId=<?php echo $_GET['driversId']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getDriversById['firstName']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getDriversById['lastName']; ?>">
		</p>
		<p>
			<label for="emailAddress">Email ddress</label>
			<input type="text" name="emailAddress" value="<?php echo $getDriversById['emailAddress']; ?>">
		</p>
		<p>
			<label for="licenseNumber">License Number</label>
			<input type="text" name="licenseNumber" value="<?php echo $getDriversById['licenseNumber']; ?>">
		</p>
		<p>
			<label for="contactNumber">Contact Number</label>
			<input type="text" name="contactNumber" value="<?php echo $getDriversById['contactNumber']; ?>">
		</p>
		<p>
			<label for="bodyNumber">Body Number</label>
			<input type="text" name="bodyNumber" value="<?php echo $getDriversById['bodyNumber']; ?>">
		</p>
		
		<p>
			<label for="plateNumber">Plate Number</label>
			<input type="text" name="plateNumber" value="<?php echo $getDriversById['plateNumber']; ?>">

			<input type="submit" name="editDriversBtn">
		</p>
	</form>
</body>
</html>