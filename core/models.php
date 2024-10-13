<?php

require_once 'dbConfig.php' ;

function insertIntoDriversAccounts($pdo, $driversId, $firstName, $lastName, $emailAddress, $licenseNumber, $contactNumber, $bodyNumber, $plateNumber){

    $sql = "INSERT INTO drivers_account (driversId, firstName, lastName, emailAddress, licenseNumber, contactNumber, bodyNumber, plateNumber) VALUES (?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$driversId, $firstName, $lastName, $emailAddress, $licenseNumber, $contactNumber, $bodyNumber, $plateNumber]) ;

    if ($executeQuery) {
        return true;
    }
}

function seeAllDriversAccounts($pdo){
    $sql = "SELECT * FROM drivers_account";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    
    if($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getDriversById($pdo, $driversId){
    $sql = "SELECT * FROM drivers_account WHERE driversId = ?";
    $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$driversId])) {
            return $stmt->fetch();
    }
}

function updateADriver($pdo, $driversId, $firstName, $lastName, $emailAddress, $licenseNumber, $contactNumber, $bodyNumber, $plateNumber){
    
    $sql = "UPDATE drivers_account
        SET firstName = ?,
            lastName = ?,
            emailAddress = ?,
            licenseNumber = ?,
            contactNumber = ?,
            bodyNumber = ?,
            plateNumber = ?
        WHERE driversId = ?";
    $stmt = $pdo->prepare($sql);
    
    return $stmt->execute([$firstName, $lastName, $emailAddress, $licenseNumber, $contactNumber, $bodyNumber, $plateNumber, $driversId]);

    if($executeQuery){
        return true;
    }
}

function deleteADriver($pdo, $driversId) {
    $stmt = $pdo->prepare("DELETE FROM drivers_account WHERE driversId = ?");

    $executeQuery = $stmt->execute([$driversId]);

    if ($executeQuery) {
        return true;
    }
}

?>