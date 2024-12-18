<!doctype html>
<?php
 include ('config.php');
  
// إستقبال البيانات القادمة من الحقول في صفحة index.php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

 
    
    $sql = "INSERT INTO users (username,email,password)
VALUES ( '$username', '$email', '$password' )";

// إختبار الإتصال
if (!mysqli_query($conn, $sql)) {
die("Connection failed: " . mysqli_connect_error());
}

 
echo "The user has been registered successfully";?>
<script> alert('Congratulation you have registered sucessfully !!');</script>
<?php
}

 



mysqli_close($conn);
?>
<html lang="en">
    <head>
        <title>Sweet Bakery</title>
        <link rel="stylesheet" href="styles.css" />
		<script type="text/javascript">

function validate()
      {
		 /// test of the password
		 if ((/^([0-9]+[a-zA-Z]+|[a-zA-Z]+[0-9]+)[0-9a-zA-Z]*$/.test(document.myForm.password.value)==false)||(document.myForm.password.value.length < 8)) {
          alert( "password shall be with letters and numeric and minimum with lenght 8" );
            document.myForm.password.focus() ;
            return false;
			}
			/// test of password and confirmation
			
			
			if( document.myForm.password.value != document.myForm.password2.value )
         {
            alert( "password and confirmation don't match" );
            document.myForm.password2.focus() ;
            return false;
         }
					 
         return( true );
      }
	  </script>
    </head>
    <body>
        <!-- Navigation Bar -->
        <header>
            <nav>
                <div class="logo">
                    <h1>Sweet Backery</h1>
                </div>
                <ul class="nav-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
					<li><a href="#register"> Register </a> </li>
					<li><a href="login.php"> Login </a> </li>
                </ul>
            </nav>
        </header>

        <!-- Hero Section -->
        <section id="home" class="hero">
            <div class="hero-content">
                <h2>Welcome to Sweet Bakery!</h2>
                <p>Freshly baked cakes made with love.</p>
                <a href="#menu" class="cta-button">Explore Our Menu</a>
            </div>
        </section>

        <!-- Featured Products -->
        <section id="menu" class="menu">
            <h2>Our Specialties</h2>
            <div class="product-gallery">
                <div class="product-item">
                    <img src="Chocolate_Cake.jpg" alt="Chocolate Cake" />
                    <h3>Chocolate Cake</h3>
                    <p>A rich and moist chocolate cake with creamy frosting.</p>
                    <p class="product-price">$5.99</p>
                    <div class="action-button">
                        <button class="add-button" data-product="Chocolate Cake">+</button>
                        <button class="remove-button" data-product="Chocolate Cake">-</button>
                        
                        <span class="counter">0</span>
                    </div>
                </div>
                <div class="product-item">
                    <img src="Vanilla_Cakes.jpg" alt="Vanilla Cakes" />
                    <h3>Vanilla Cakes</h3>
                    <p>Soft and fluffy cakes with a sweet vanilla flavor.</p>
                    <p class="product-price">$6.99</p>
                    <div class="action-button">
                        <button class="add-button" data-product="Vanilla Cake">+</button>
                        <button class="remove-button" data-product="Vanilla Cake">-</button>
                        <span class="counter">0</span>
                    </div>
                </div>
                <div class="product-item">
                    <img src="Lemon_Cake.jpg" alt="Lemon Cake" />
                    <h3>Lemon Cake</h3>
                    <p>A light and refreshing cake with a zesty lemon flavor.</p>
                    <p class="product-price">$4.99</p>
                    <div class="action-buttons">
                        <button class="add-button" data-product="Lemon Cake">+</button>
                        <button class="remove-button" data-product="Lemon Cake">-</button>
                        <span class="counter">0</span>
                    </div>
                </div>
                <div class="cart">
                    <a href="cart.php" class="cta-button">Go to cart</a>
                </div>
            </div>
            
        </section>
		 
        <!-- About Us Section -->
        <section id="about" class="about">
            <h2>About Sweet Bakery</h2>
            <p>
                We have been baking the finest, freshest desserts for over 10 years. Our passion for baking is reflected
                in every treat we create. From traditional recipes to modern twists, Sweet Bakery offers something for
                everyone.
            </p>
        </section>

		<!-- register Section -->
        <section id="register" class="contact">
            <h2>Join Us</h2>
            <p>Please Write the following Information!</p>
          	<form method="post" action="index.php" name="myForm" onSubmit="return(validate());">
                <label for="name">User Name:</label>
                <input type="text" id="name" name="username" required />
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
				<label for="name">Password:</label>
                <input type="password"   name="password"   required />
				<label for="name">Confirm Password:</label>
				<input type="password" name="password2"    required>
                 
                <button type="submit">Send</button>
				
            </form>
        </section>
		
        <!-- Contact Section -->
        <section id="contact" class="contact">
            <h2>Contact Us</h2>
            <p>Have questions? Want to place an order? Reach out to us!</p>
            <form action="#" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required />
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required />
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </section>
        
        

        
        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Sweet Bakery | All Rights Reserved</p>
        </footer>
        <script src="script.js"></script>
    </body>
</html>
