<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>
    
</body>
</html>

<?php 

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
    public $compare_name;

    public function __construct($user_hotel, $first_name, $last_name, $email, $check_in, $check_out, $amount_days){
        $this->user_hotel = $user_hotel;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->check_in = $check_in;
        $this->check_out = $check_out;
        $this->amount_days = $amount_days;
        echo "<h1>Hello " .  $this->first_name . " " . $this->last_name . "</h1>";
        echo "These are your entered details:" . "<br>";
        echo "Email: " . $this->email . "<br> Hotel: " . $this->user_hotel . "<br> Check-in: " . $this->check_in . "<br> Check-out: " . $this->check_out . "<br> Amount of days: " . $this->amount_days ."<br>"; 
        
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
        $price = $this->hotel_arr[$this->key]['rate'] * $this->amount_days;
        //get features and image
        $features = $this->hotel_arr[$this->key]['features'];
        $image = $this->hotel_arr[$this->key]['image'];
        $name = $this->hotel_arr[$this->key]['name'];

        //displaying the data
        echo "<div class='hotel-card'>" . $name . " has the following features: " . $features;
        echo "<h3>Your price for " . $this->amount_days . " night/s is R" . $price . ".00</h3> </div>";
    }

    public function compare(){

            if ($this->key == 9){
                $this->compare_key = $this->key - 1;
                $this->compare_name = $this->hotel_arr[$this->compare_key]['name'];
            }else {
                $this->compare_key = $this->key + 1; 
                $this->compare_name = $this->hotel_arr[$this->compare_key]['name'];
            }
            echo $count;
            
    }
    public function book (){
        echo "<form action='email.php' method='get'>
        <select id='hotel' name='hotel' required>
        <option value='$this->user_hotel'>Hilton</option>
        <option value='$this->compare_name'>Conrad</option>
        </select>
        <input type='hidden' name='email' value='$this->email'>
        <input type='hidden' name='amoint_days' value='$this->amount_days'>
        <label for='book'></label>
                <input type='submit' id='submit' name='submit'>
        </form>";
    }
    
}



//instantiate user class
$user1 = new User ($_POST['hotel'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['check_in'], $_POST['check_out'], $_POST['amount_days']);

//run method from class
$user1->getHotelArray();
$user1->getHotelDeets($user1->user_hotel);
$user1->compare();
$user1->getHotelDeets($user1->compare_name);
$user1->book();

?>



