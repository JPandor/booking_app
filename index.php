<?php

$hotels = file_get_contents('data.json');
$hotels = json_decode($hotels);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='styles.css'>
    <title>Book Your Hotel</title>
</head>
<body>
    <h1>Book hotels at the cheapest prices</h1>
    <form action='compare.php' method='post'>
        <label for='first_name'>First Name</label>
        <input type='text' id='first_name' name='first_name' required>

        <label for='last_name'>Last Name</label>
        <input type='text' id='last_name' name='last_name' required>

        <label for='email'>Email</label>
        <input type='email' id='email' name='email' required>

        <label for='amount_days'>Number Of Days</label>
        <input type='number' id='amount_days' name='amount_days' min='1' required>

        <label for='check_in'>Check-In Date</label>
        <input type='date' id='check_in' name='check_in' required>

        <label for='check-out'>Check-Out Date</label>
        <input type='date' id='check_out' name='check_out' required>

        <label for='hotel'>Hotel</label>
        <select id="hotel" name="hotel" required>
            <option value="hilton" name='hilton'>Hilton</option>
            <option value="conrad" name='conrad'>Conrad</option>
            <option value="grand orchid" name='grand orchid'>Grand Orchid</option>
            <option value="cabana beach" name='cabana beach'>Cabana Beach</option>
            <option value="ngwenya lodge" name='ngwenya lodge'>Ngwenya Lodge</option>
            <option value="kruger park lodge" name='kruger park lodge'>Kruger Park Lodge</option>
            <option value="marriott hotel" name='marriott hotel'>Marriott</option>
            <option value="southern sun" name='southern sun'>Southern Sun</option>
            <option value="durban spa" name='durban spa'>Durban Spa</option>
            <option value="the palace" name='the palace'>The Palace</option>
        </select>

        <label for='compare'>Compare</label>
        <input type='submit' id='compare' name='compare'>
    </form>

    <div>
        <?php
         foreach ($hotels as $key => $array){
            foreach($array as $value){
                echo $value . "<br>";
            }
        }
?>
    </div>
</body>
</html>
