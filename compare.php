<?php

//getting json data
$json = file_get_contents('data.json');
$hotels = json_decode($hotels);

//getting form information
$user_hotel = $_POST['hotel'];
$first_name= $_POST['first_name'];
$last_name= $_POST['last_name'];
$email = $_POST['email'];
$amount_days= $_POST['amount_days'];
$check_in= $_POST['check_in'];
$check_out = $_POST['check_out'];

//converting objects into an array
$hotel_arr = [];
foreach ($hotels as $value){
    $hot = (array) $value;
    array_push($hotel_arr, $hot);
}

//getting the index of user hotel
$key = array_search($user_hotel, array_column($hotel_arr, 'name'));
//getting price 
$price = $hotel_arr[$key]['rate'] * $amount_days;
//getting amenities
$features = $hotel_arr[$key]['features'];

//writing out the details
echo "<h1>Hello $first_name $last_name</h1>";

echo "These are your entered details:" . "<br>";

echo "Email: $email <br> Hotel:" . $user_hotel . "<br> Check-in: $check_in <br> Check-out: $check_out <br> Amount of days: $amount_days <br>"; 

echo $user_hotel . " has the following features: " . $features;

echo "<h3>Your price for $amount_days night/s is R$price.00</h3>";

$compare;

switch ($user_hotel){
    case "Hilton": 
        $compare = "Conrad";
        break;
    case "Conrad": 
        $compare = "Hilton";
        break;
    case "The Palace": 
        $compare = "Marriott";
        break;  
    case "Marriott": 
        $compare = "The Palace";
        break;
    case "Durban Spa": 
        $compare = "Grand Orchid Guesthouse";
        break; 
    case "Grand Orchid Guesthouse": 
        $compare = "Durban Spa";
        break;
    case "Kruger Park Lodge": 
        $compare = "Ngwenya Lodge";
        break; 
    case "Ngwenya Lodge": 
        $compare = "Kruger Park Lodge";
        break; 
    case "Cabana Beach": 
        $compare = "Southern Sun";
        break; 
    case "Southern Sun": 
        $compare = "Cabana Beach";
        break; 

}

$compare_key = array_search($compare, array_column($hotel_arr, 'name'));
//getting price 
$price = $hotel_arr[$key]['rate'] * $amount_days;
//getting amenities
$features = $hotel_arr[$key]['features'];





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
?>



