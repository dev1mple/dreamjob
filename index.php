<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dev1mple's Vehicle Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h3>Welcome dev1mple's Vehicle Registration!</h3>
    <p>Please enter user's info to register an account:</p>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="driversId">Drivers ID:</label>
            <input type="text" name="driversId" id="driversId" required>
        </p>
        <p>
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName" required>
        </p>
        <p>
            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName" required>
        </p>
        <p>
            <label for="emailAddress">Email Address:</label>
            <input type="text" name="emailAddress" id="emailAddress" required>
        </p>
        <p>
            <label for="licenseNumber">License Number:</label>
            <input type="text" name="licenseNumber" id="licenseNumber" required>
        </p>
        <p>
            <label for="contactNumber">Contact Number:</label>
            <input type="text" name="contactNumber" id="contactNumber"  required>
        </p>
        <p>
            <label for="bodyNumber">Body Number:</label>
            <input type="text" name="bodyNumber" id="bodyNumber"  required>
        </p>
        <p>
            <label for=" plateNumber">Plate Number:</label>
            <input type="text" name=" plateNumber" id=" plateNumber" required>
        </p>
        <p>
            <button type="submit" name="register">Register</button>
        </p>
    </form>

    <h3>Customer Accounts Record</h3>
    <table> 
        <tr>
            <th>DriversId</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>License Number</th>
            <th>Contact Number</th>
            <th>Body Number</th>
            <th>Plate Number</th>
            <th>Actions</th>
        </tr>
        <?php
        // Corrected function call and variable naming
        $allDriversAccounts = seeAllDriversAccounts($pdo);
        if (!empty($allDriversAccounts)) {
            foreach ($allDriversAccounts as $row) {
        ?>
        <tr>
            <td><?php echo ($row['driversId']); ?></td>
            <td><?php echo ($row['firstName']); ?></td>
            <td><?php echo ($row['lastName']); ?></td>
            <td><?php echo ($row['emailAddress']); ?></td>
            <td><?php echo ($row['licenseNumber']); ?></td>
            <td><?php echo ($row['contactNumber']); ?></td>
            <td><?php echo ($row['bodyNumber']); ?></td>
            <td><?php echo ($row['plateNumber']); ?></td>
            <td class="action-links">
                <a href="editdriver.php?driversId=<?php echo urlencode($row['driversId']); ?>">Edit</a>
                <a href="deletedriver.php?driversId=<?php echo urlencode($row['driversId']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
        <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="8">No Records Found!</td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>