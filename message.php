<?php
require "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];
}


$stmt = mysqli_prepare(
        $conn,
        "INSERT INTO messages (name, email, phone, message) VALUES (?, ?, ?, ?)"
);
mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $phone, $message);
mysqli_stmt_execute($stmt);

header("Location: index.html");
exit;
?>