<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Your remaining PHP code goes here
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test1');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration(firstName, lastName, email, password, number) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $password, $number);
    $execval = $stmt->execute();
    if ($execval) {
        echo "Registration successful";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
