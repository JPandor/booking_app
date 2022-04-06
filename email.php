<?php
session_start();

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';


$hotel_arr = [];
//getting json data
$json_data = file_get_contents('data.json');
$json_data = json_decode($json_data);

//converting json objects into an array
foreach ($json_data as $value){
    $hotel = (array) $value;
    array_push($hotel_arr, $hotel);
}

//getting the information
$hotel_name = $_GET['hotel'];


//get the key of users choice
$key = array_search($hotel_name, array_column($hotel_arr, 'name'));
//get price of total amount of nights
$price = $hotel_arr[$key]['rate'] * $_SESSION['amount_days'];
$name = $hotel_arr[$key]['name'];

$hotel_email = str_replace(' ', '', $hotel_name) . "@goodbookings.com";

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mailtrap.io';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'b2d7d1788a8c08';                       // SMTP username
    $mail->Password   = 'de45537a61dbc0';                       // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 2525;                                   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress($hotel_email);     // Add a recipient
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking Details';
    $mail->Body    = "<h3>Hi</h3>
    <p>A client has succesfully placed a booking at your hotel!</p>
    <p>These are the details:</p>
    <ul>
        <li>First name: " . $_SESSION['first_name'] . "</li>
        <li>Last name: " . $_SESSION['last_name'] . "</li>
        <li>Email: " . $_SESSION['email'] . "</li>
        <li>Amount of days: " . $_SESSION['amount_days'] . "</li>
        <li>Check-in date: " .  $_SESSION['check_in'] . "</li>
        <li>Check-out date: " .  $_SESSION['check_out'] . "</li>
    </ul>";
    $mail->AltBody = "Hi. " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . " has succesfully made a booking at your hotel for " . $_SESSION['amount_days']  . " nights. Please contact them. Email: " . $_SESSION['email'];

    $mail->send();
    header('Location: ./complete.php');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

 
