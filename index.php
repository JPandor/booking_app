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
    <script src="https://unpkg.com/vue@3"></script>
    <link href='styles.css' rel='stylesheet'>
    <title>Book Your Hotel</title>
</head>
<body>
    
        <h1>Book hotels at the cheapest prices</h1>
    <main id='container'>
        <div class='flex'>
            <form action='booking.php' method='post'>
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
                    <option value="Hilton">Hilton</option>
                    <option value="Conrad">Conrad</option>
                    <option value="Grand Orchid">Grand Orchid</option>
                    <option value="Cabana Beach">Cabana Beach</option>
                    <option value="Ngwenya Lodge">Ngwenya Lodge</option>
                    <option value="Kruger Park Lodge">Kruger Park Lodge</option>
                    <option value="Marriott">Marriott</option>
                    <option value="Southern Sun">Southern Sun</option>
                    <option value="Durban Spa">Durban Spa</option>
                    <option value="The Palace">The Palace</option>
                </select>
                <label for='compare'>Compare</label>
                <input type='submit' id='compare' name='compare'>
            </form>
        </div>
        <div id='app' class='flex'>
            <ul>
                <li v-for='(hotel, index) in hotel_arr' :key='index'>
                    <ul>
                        <li v-for='item in hotel' class='media-box'>
                            <img v-bind:src='item.image'>
                            <h4> {{ item.name }}</h4>
                            <p> {{ item.rate }} </p>
                            <p> {{ item.features }} </p>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </main>
    <script src='script.js'></script>
</body>
</html>
