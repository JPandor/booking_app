<?php

$hotels = file_get_contents('data.json');
$hotels = json_decode($hotels);

$user_hotel = $_POST['hotel'];
$first_name= $_POST['first_name'];
$last_name= $_POST['last_name'];
$email = $_POST['email'];
$amount_days= $_POST['amount_days'];
$check_in= $_POST['check_in'];
$check_out = $_POST['check_out'];

// $hotel_arr = [];
// foreach ($hotels as $value){
//     $hot = (array) $value;
//     array_push($hotel_arr, $hot);
// }
// var_dump($hotel_arr);
// $index = array_search('hilton', $hotel_arr);

// echo $index;

echo array_search($user_hotel, array_column($hotels, 'name'));
// $price = $hotels[]->rate * $amount_days;

echo "<h1>Hello $first_name $last_name</h1>";

echo "These are your entered details:" . "<br>";

echo "Email: $email <br> Hotel:" . ucfirst($user_hotel) . "<br> Check-in: $check_in <br> Check-out: $check_out <br> Amount of days: $amount_days"; 

echo "<h3>Your price for $amount_days is $price";

// class UserDetails {
//     public $first_name;
//     public $last_name;
//     public $email;
//     public $check_in;
//     public $check_out;
//     public $hotel;
//     public $amount_days;

//     function __contruct($first_name, $last_name, $email, $amount_days, $check_in, $check_out, $hotel){
//         $this->first_name = $first_name;
//         $this->last_name = $last_name;
//         $this->email = $email;
//         $this->amount_days = $amount_days;
//         $this->check_in = $check_in;
//         $this->check_out = $check_out;
//         $this->hotel = $hotel;
//     }

//     function getObj(){
//         $index = array_search($this->hotel, $hotels);

//     }
// }



