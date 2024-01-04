<?php
include 'connect.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

$feedback_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $habit = test_input($_POST["habit"]);

    $sql = "INSERT INTO dbo (name, email, habit) VALUES (?, ?, ?)";
    $params = array($name, $email, $habit);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $feedback_message = "Thank you for signing up! Your feedback is important to us.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

