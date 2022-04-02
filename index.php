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
    <link rel='stylesheet' href='styles.css'>
    <script src="https://unpkg.com/vue@3"></script>
    <title>Book Your Hotel</title>
    <style>
        body {
            /* background-image: url('images/background.jpg'); */
            background: linear-gradient(to top, #99CDD6, #D84846);
}

img {
    width: 250px;
    height: 200px;
    border: black solid 3px;
    border-radius: 12px;
}

.scrolling-list {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}
ul {
    list-style-type: none;
}
.media-body{
    max-width: 250px;
    background-color: white;
    padding: 3px;
    border: black solid 3px;
    border-radius: 12px;
}
input{
    min-width: 98%;
    border-radius: 12px;
    min-height: 40px;
}
select{
    min-width: 98%;
    justify-content: center;
    border: black solid 2px;
    border-radius: 12px;
    margin-bottom: 10px;
    margin-top: 10px;
    min-height: 40px;
}
form {
    border: none;
    font-weight: bold;
    font-size: 25px;
}
li{
    margin: 10px;
}
    </style>
</head>
<body>
    
        <h1>Book hotels at the cheapest prices</h1>
    <main>
        <div>
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
                <label for='compare'></label>
                <input type='submit' id='compare' name='compare' value='Compare'>
            </form>
        </div>
        <div id='app'>
            <h2>Check out our best hotels!</h2>
            <ul>
                <li v-for='(hotel, index) in hotel_arr' :key='index'>
                    <ul class='scrolling-list'>
                        <li v-for='item in hotel' class='media-card'>
                            <div class='media-head'>
                                <img v-bind:src='item.image' max-width='250px' max-height='200px'>
                            </div>
                            <div class='media-body'>
                                <h4> {{ item.name }}</h4>
                                <p> R{{ item.rate }}.00 per night </p>
                                <p> {{ item.features }} </p>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </main>
    <script src='script.js'></script>
</body>
</html>
