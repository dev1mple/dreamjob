<?php

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['register'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $emailAddress = trim($_POST['emailAddress']);
    $licenseNumber = trim($_POST['licenseNumber']);
    $contactNumber = trim($_POST['contactNumber']);
    $bodyNumber = trim($_POST['bodyNumber']);
    $plateNumber = trim($_POST['plateNumber']);

    if (!empty($firstName) && !empty($lastName) && !empty($emailAddress) && !empty($licenseNumber) && !empty($contactNumber) && !empty($bodyNumber) && !empty($plateNumber)) {
        
        $query = insertIntoDriversAccounts($pdo, null, $firstName, $lastName, $emailAddress, $licenseNumber, $contactNumber, $bodyNumber, $plateNumber);

        if ($query) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['editDriversBtn'])) {
    $driversId = $_GET['driversId'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $emailAddress = trim($_POST['emailAddress']);
    $licenseNumber = trim($_POST['licenseNumber']);
    $contactNumber = trim($_POST['contactNumber']);
    $bodyNumber = trim($_POST['bodyNumber']);
    $plateNumber = trim($_POST['plateNumber']);

    if (!empty($firstName) && !empty($lastName) && !empty($emailAddress) && !empty($licenseNumber) && !empty($contactNumber) && !empty($bodyNumber) && !empty($plateNumber)) {

        $query = updateADriver($pdo, $driversId, $firstName, $lastName, $emailAddress, $licenseNumber, $contactNumber, $bodyNumber, $plateNumber);

        if ($query) {
            header("Location: ../index.php");
        }
        else {
            echo "Update failed";
        }
    }
    else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['deleteDriversBtn'])) {

    $driversId = $_GET['driversId']; // assuming user_id is an integer

    if (!empty($driversId)) {
        $query = deleteADriver ($pdo, $driversId);

        if ($query) {
            header("Location: ../index.php");
            exit();
        }
        else {
            echo "Deletion failed";
        }
    } else {
        echo "Invalid user ID";
    }
}

?>