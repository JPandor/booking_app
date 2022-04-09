<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles1.css">
    <title>Booking</title>
</head>
<body>
    


<?php 
session_start();
//get user details and process them
class User {
    public $user_hotel;
    public $first_name;
    public $last_name;
    public $email;
    public $check_in;
    public $check_out;
    public $amount_days;
    public $hotel_arr = [];
    public $key;
    public $compare_key;
    public $compare_hotel;
    public $name;
    public $image;
    public $features;
    public $price;

    public function __construct($user_hotel, $first_name, $last_name, $email, $check_in, $check_out, $amount_days){
        $this->user_hotel = $user_hotel;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
        $this->amount_days = $amount_days;
    }

    public function getHotelArray(){
        //getting json data
        $json_data = file_get_contents('data.json');
        $json_data = json_decode($json_data);

        //converting json objects into an array
        foreach ($json_data as $value){
            $hotel = (array) $value;
            array_push($this->hotel_arr, $hotel);
        }
        //sorting the array by price
        usort($this->hotel_arr, function($a, $b) {
            return $a['rate'] - $b['rate'];
        });
    }

    public function getHotelDeets($search){
        //get the key of users choice
        $this->key =  array_search($search, array_column($this->hotel_arr, 'name'));
        //get price of total amount of nights
        $this->price = $this->hotel_arr[$this->key]['rate'] * $this->amount_days;
        //get features and image
        $this->features = $this->hotel_arr[$this->key]['features'];
        $this->image = $this->hotel_arr[$this->key]['image'];
        $this->name = $this->hotel_arr[$this->key]['name'];
    }

    public function compare(){
        $count = 0;
        foreach ($this->hotel_arr as $value){
            $count = $count + 1;
        }
        $key_count = $count - 2;
        $count = $count - 1;
    
            if ($this->key == $count){
                $this->compare_key = $key_count;
                $this->compare_hotel = $this->hotel_arr[$this->compare_key]['name'];
            }else {
                $this->compare_key = $this->key + 1; 
                $this->compare_hotel = $this->hotel_arr[$this->compare_key]['name'];
            }
            
    }
    public function book (){
        $_SESSION['first_name'] = $this->first_name;
        $_SESSION['last_name'] = $this->last_name;
        $_SESSION['email'] = $this->email;
        $_SESSION['amount_days'] = $this->amount_days;
        $_SESSION['check_in'] = $this->check_in;
        $_SESSION['check_out'] = $this->check_out;
    }
    
}



//instantiate user class
$user1 = new User ($_POST['hotel'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['check_in'], $_POST['check_out'], $_POST['amount_days']);


?>
<div id="info">
    <h1>Hello <?php echo $user1->first_name . " " . $user1->last_name?> </h1>
    <p>These are your entered details: </p>
    <ul>
        <li> Email: <?php echo $user1->email ?></li>
        <li> Hotel: <?php echo $user1->user_hotel ?></li>
        <li> Check-in: <?php echo $user1->check_in ?></li>
        <li> Check-out: <?php echo $user1->check_out ?></li>
        <li> Total nights: <?php echo $user1->amount_days ?></li>
    </ul>
    <h3>We've found the best hotels for you based off your search. Compare these 2 hotels and make your pick!</h3>
</div>

<?php

$user1->getHotelArray();

$user1->getHotelDeets($user1->user_hotel);

?> 
<div class='container'>
    <div class='media-card'>
        <div class='media-head'>
            <img src='<?php echo $user1->image?>' width='250px' height='200px'>
        </div>
        <div class='media-body'>
            <h2> <?php echo $user1->name?> </h2>
            <p> <?php echo $user1->name?> has the following features: </p>
            <p> <?php echo $user1->features?> </p>
            <h3>Your price for <?php echo $user1->amount_days?> night/s is <?php echo $user1->price?></h3>
        </div>
    </div>

<?php

$user1->compare();

$user1->getHotelDeets($user1->compare_hotel);

?>

    <div class='media-card'>
        <div class='media-head'>
            <img src='<?php echo $user1->image?>' max-width='250px' max-height='200px'>
        </div>
        <div class='media-body'>
            <h2> <?php echo $user1->name?> </h2>
            <p> <?php echo $user1->name?> has the following features: </p>
            <p> <?php echo $user1->features?> </p>
            <h3>Your price for <?php echo $user1->amount_days?> night/s is <?php echo $user1->price?></h3>
        </div>
    </div>
</div>
<?php


$user1->book();

?>

<form action='email.php' method='get'>
        <label for='hotel'>Choose your hotel</label><br>
        <select id='hotel' name='hotel' required>
        <option value='<?php echo $user1->user_hotel?>'><?php echo $user1->user_hotel?></option>
        <option value='<?php echo $user1->compare_hotel?>'><?php echo $user1->compare_hotel?></option>
        </select>
        <label for='book'></label>
                <input type='submit' id='submit' name='submit'>
        </form>

</body>
</html>



