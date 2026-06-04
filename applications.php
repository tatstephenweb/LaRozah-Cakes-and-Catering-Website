<?php
require "config.php";

/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';*/


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['fullname'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST['phone']);
    $age = $_POST['age'];
    $experience = $_POST['experience'];
    $notes = $_POST['notes'];
    $schedule = $_POST['schedule'];
    $intake = $_POST['intake'];
    $heard = $_POST['heard'];


    try {
        //Save message
       $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO applications (name, email, phone, age, experience, notes, schedule, intake, heard) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt, "sssssssss", $name, $email, $phone, $age, $experience, $notes, $schedule, $intake, $heard);
        mysqli_stmt_execute($stmt);


        // Send email (FROM BUSINESS → TO BUSINESS)
        /*$mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // BUSINESS EMAIL ONLY
        $mail->Username   = 'mgnlongnigltd@gmail.com';
        $mail->Password   = 'wzspolggovqztymq';

        //$mail->SMTPSecure = 'tls';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->port = 587;

        // Sender must be YOUR email (SMTP rule)
        $mail->setFrom('mgnlongnigltd@gmail.com', 'Round Trip Booked');

        // Where business receives message
        $mail->addAddress('mgnlongnigltd@gmail.com');

        // User email goes here
        $mail->addReplyTo($email, $name);

        $websiteUrl = "https://mgnlong/admin/admin-login.html";
        $mail->Subject = 'NEW BOOKING ALERT';
        $mail->Body = "You have been booked for a Round Trip. The information about the client is stated below:\n\n" .
            "Name: $name\n\n" .
            "Email: $email\n\n" .
            "Phone Number: $phone\n\n" .
            "Travelling from: $from\n\n".
            "Travelling to: $to\n\n".
            "Number of Passengers: $passengers\n\n".
            "Date of Trip: $departDate\n\n".
            "Date of Return: $arriveDate\n\n".
            "Click link to check Admin Panel: $websiteUrl";

        $mail->send();

        //send confirmation to the user's email
        $confirmMail = new PHPMailer(true);
        $confirmMail->isSMTP();
		$confirmMail->Host = 'smtp.gmail.com';//SMTP SERVER
		$confirmMail->SMTPAuth = true;
		$confirmMail->Username = 'mgnlongnigltd@gmail.com';
		$confirmMail->Password = 'wzspolggovqztymq';//app password
		$confirmMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$confirmMail->port = 587;
		$confirmMail->setFrom('mgnlongnigltd@gmail.com', 'M.G Nlong Booking Confirmation');
		$confirmMail->addAddress($email);


		//MAIL CONTENT
		$confirmMail->isHTML(true);
		$confirmMail->Subject = "You booked a round trip ride with us";
		$confirmMail->Body = "<p>Your booking will be confirmed.<br>Kindly wait for some moments for a call or message from us.</p>\n\n".
		    "Name: $name\n\n<br>".
            "Email: $email\n\n<br>".
            "Phone Number: $phone\n\n<br>".
            "Travelling from: $from\n\n<br>".
            "Travelling to: $to\n\n<br>".
            "Number of Passengers: $passengers\n\n<br>".
            "Date of Trip: $departDate\n\n<br>".
            "Date of Return: $arriveDate\n\n<br>".
            "<p>The above information is your booking details.</p>";

		$confirmMail->send();*/

    } catch (Exception $e) {
        // Optional: log error, don't expose to user
        //echo "<script>alert('error');</script>";
		exit;
    }

    header("Location: larozah-academy.html");
    exit;
}
