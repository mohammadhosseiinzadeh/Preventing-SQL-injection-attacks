<?php


// echo '<pre>';
// var_dump($_POST);


$name = $_POST['CustomerName'];
$city = $_POST['City'];
$address = $_POST['Address'];
$postalCode = $_POST['PostalCode'];
$country = $_POST['Country'];

$serverName = 'localhost';
$username = 'root';
$password = '';
$db = 'w3schools';


try {
    $connection = new PDO("mysql:host=$serverName;dbname=$db", $username, $password);
    // $sql = "INSERT INTO `customers` (`CustomerName`, `Address`, `City`, `PostalCode`, `Country`) VALUES ('$name', '$address', '$city', '$postalCode', '$country')";
    // $connection->exec($sql);

    $sql = "INSERT INTO `customers` (`CustomerName`, `Address`, `City`, `PostalCode`, `Country`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$name, $address, $city, $postalCode, $country]);


    echo 'کاربر با موفقیت ثبت شد';
} catch (Exception $e) {
    echo 'error :' . $e->getMessage();
    return false;
}
