<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/vue@3"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' href='styles/styles.css' type="text/css">
    <title>Booking</title>
</head>
<body>
    
    <main>
        <h1 class="text-center">Book Hotels At The <span class='underline'>Cheapest</span> Prices!</h1>
        <div id='app'>
            <a href="#form" class="btn btn-primary btn-large" id="link">Book Now!</a>

            <ul>
                <li v-for='(hotel, index) in hotel_arr' :key='index'>
                    <ul id="scrolling-list">
                        <li v-for='item in hotel' class="card m-3 hotel-card">
                            <div>
                                <img v-bind:src='item.image' class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"> {{ item.name }}</h4>
                                <p class="card-text"> R{{ item.rate }}.00 per night </p>
                                <p class="card-text"> {{ item.features }} </p>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div>
            <h2 id="heading">Enter your details below to make a booking</h2>
            <form action='booking.php' method='post' id="form">
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" aria-describedby="emailHelp" name='first_name' required>
                  </div>
                  <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" aria-describedby="emailHelp" id='last_name' name='last_name' required>
                  </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="amount_days" class="form-label">Number Of Days</label>
                    <input type="number" class="form-control" id="amount_days" aria-describedby="emailHelp" name='amount_days' min='1' required>
                </div>
                <div class="mb-3">
                    <label for="check_in" class="form-label">Check-In</label>
                    <input type="date" class="form-control" id="check_in" aria-describedby="emailHelp" name='check_in' required>
                  </div>
                  <div class="mb-3">
                    <label for="check_out" class="form-label">Check-Out</label>
                    <input type="date" class="form-control" id="check_out" aria-describedby="emailHelp" name='check_out' required>
                  </div>
                  <div class="mb-3">
                    <label for="hotel" for="hotel" class="form-label">Hotel</label>
                    <select id="hotel" name="hotel" class="form-select" required>
                        <option value="Hilton">Hilton</option>
                        <option value="Conrad">Conrad</option>
                        <option value="Grand Orchid Guesthouse">Grand Orchid Guesthouse</option>
                        <option value="Cabana Beach">Cabana Beach</option>
                        <option value="Ngwenya Lodge">Ngwenya Lodge</option>
                        <option value="Kruger Park Lodge">Kruger Park Lodge</option>
                        <option value="Marriott">Marriott</option>
                        <option value="Southern Sun">Southern Sun</option>
                        <option value="Durban Spa">Durban Spa</option>
                        <option value="The Palace">The Palace</option>
                    </select>
                  </div>
                
                <button type="submit" class="btn btn-info btn-block input-block-level" id="button">Submit</button>
              </form>
        
        </div>
    </main>
    <script src='script.js'></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
