<?php
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
    array_push($this->hotel_arr, $hotel);
}

//getting the information
$hotel_name = $_GET['hotel'];
$email = $_GET['email'];
$email = $_GET['amount_days'];


//get the key of users choice
$key = array_search($hotel_name, array_column($hotel_arr, 'name'));
//get price of total amount of nights
$price = $hotel_arr[$key]['rate'] * $amount_days;

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
    $mail->addAddress($email);     // Add a recipient
    $mail->addAddress('hotel@bookings.com');     // Add a recipient
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Booking Details';
    $mail->Body    = '<h3>Hi. </h3>  <p>You have succesfully made a booking at ' . $hotel_name . ". <br> The hotel will get in touch with you with all the details. Thank you for booking with us and we wish you a happy trip.</p>";
    $mail->AltBody = 'Hi. You have succesfully made a booking at ' . $hotel_name . ". <br> The hotel will get in touch with you with all the details. Thank you for booking with us and we wish you a happy trip.";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

 
