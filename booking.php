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
    }

    public function getHotelDeets($search){
        $key =  array_search($search, array_column($this->hotel_arr, 'name'));
        $price = $this->hotel_arr[$key]['rate'] * $this->amount_days;
        $features = $this->hotel_arr[$key]['features'];
        $image = $this->hotel_arr[$key]['image'];
        $name = $this->hotel_arr[$key]['name'];
        echo "<h1>Hello " .  $this->first_name . $this->last_name . "</h1>";
        echo "These are your entered details:" . "<br>";
        echo "Email: " . $this->email . "<br> Hotel: " . $this->user_hotel . "<br> Check-in: " . $this->check_in . "<br> Check-out: " . $this->check_out . "<br> Amount of days: " . $this->amount_days ."<br>"; 
        echo $this->user_hotel . " has the following features: " . $features;
        echo "<h3>Your price for " . $this->amount_days . " night/s is R" . $price . ".00</h3>";
    }

    
    
}



//instantiate user class
$user1 = new User ($_POST['hotel'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['check_in'], $_POST['check_out'], $_POST['amount_days']);

//run method from class
$user1->getHotelArray();
$user1->getHotelDeets($user1->user_hotel);

$user1->getClosest();


?>



