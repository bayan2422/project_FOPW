<!doctype html>
<?php
 include ('config.php');
  
 session_start();
    if(!(isset($_SESSION['username'])))
    {
        header("location:login.php");
    }
    else
    {
        $username = $_SESSION['username'];
      
        include_once 'config.php';
    }
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
					 
					<li><a >welcome,<?php echo $_SESSION['username']; ?> </a></li>
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
                    <h3 id="productName">Chocolate Cake</h3>
					<input type="">
                    <p>A rich and moist chocolate cake with creamy frosting.</p>
                    <p class="product-price">$5.99</p>
                    <div class="action-button">
                        <button class="add-button" data-product="Chocolate Cake">+</button>
                        <button class="remove-button" data-product="Chocolate Cake">-</button>
                        
                        <span id="amount" class="counter">0</span>
                    </div>
                </div>
                <div class="product-item">
                    <img src="Vanilla_Cakes.jpg" alt="Vanilla Cakes" />
                    <h3 id="productName">Vanilla Cakes</h3>
                    <p>Soft and fluffy cakes with a sweet vanilla flavor.</p>
                    <p class="product-price">$6.99</p>
                    <div class="action-button">
                        <button class="add-button" data-product="Vanilla Cake">+</button>
                        <button class="remove-button" data-product="Vanilla Cake">-</button>
                        <span id="amount" class="counter">0</span>
                    </div>
                </div>
                <div class="product-item">
                    <img src="Lemon_Cake.jpg" alt="Lemon Cake" />
                    <h3 id="productName">Lemon Cake</h3>
                    <p>A light and refreshing cake with a zesty lemon flavor.</p>
                    <p class="product-price">$4.99</p>
                    <div class="action-buttons">
                        <button class="add-button" data-product="Lemon Cake">+</button>
                        <button class="remove-button" data-product="Lemon Cake">-</button>
                        <span id="amount" class="counter">0</span>
                    </div>
                </div>
                <div class="cart">
                    <a  id="getData" href="cart.php" class="cta-button">Go to cart</a>
					 
					<button  type="submit"onclick="redirect()">Go to cart   </button>
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
		<script>
		 var productName = document.getElementById("productName").value;
		 var amount = document.getElementById("amount").value;
		 
		 document.getElementById("getData").setAttribute("href","cart.php?var="+productName);
		  
	 </script>
	  <script> 
    function redirect() {
            location.replace("cart.php");
        }
  </script> 
    </body>
</html>
