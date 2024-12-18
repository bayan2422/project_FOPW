<?php
 include ('config.php');
  
  
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['submitlogin'])){
      
 $username = stripslashes($_REQUEST['username']);
       
 $username = mysqli_real_escape_string($conn,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($conn,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";
 $result = mysqli_query($conn,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
	
      /*  exit;*/
         echo "<div class='form'>
<h3>Welcome,".$username.
"</h3></div>";
header('location: home.php?q=1'); 	
         }else{
 echo "<div class='form'>
<h3>name/password is incorrect.</h3>
 </div>";
	}
 
    }
	
	
////////// ENd login PAGE //////////////
?>
<html lang="en">
    <head>
        <title>Sweet Bakery</title>
        <link rel="stylesheet" href="styles.css" />
		<style>
		input.login{padding: 12px;
    font-size: 1.1rem;
    background-color: #e91e63 !important;
    color: white;
    border: none;
    border-radius: 5px;
cursor: pointer;}
</style>
    </head>
    <body>
        <!-- Navigation Bar -->
        <header>
            <nav>
                <div class="logo">
                    <h1>Sweet Backery</h1>
                </div>
                <ul class="nav-links">
                    <li><a href="index.php#home">Home</a></li>
                    <li><a href="index.php#menu">Menu</a></li>
                    <li><a href="index.php#about">About Us</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
					<li><a href="index.php#register"> Register </a> </li>
					<li class="button"><a href="#login"> Login </a> </li>
                </ul>
            </nav>
        </header>

       
 
		<section id="login" class="contact">	
			 <h2>Login</h2>
			     <form action="" method="post" name="login" onSubmit="return(validate2019());">
						<label> User Name </label>
						<input type="text" name="username" > 
						<label> Password </label>
						<input type="password" name="password" > 
						
 						  <input class="login" type="submit" value="send" name="submitlogin" class="button button-block"/> 		   
					</form>
		</section>
		
		
		        
        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Sweet Bakery | All Rights Reserved</p>
        </footer>
        <script src="script.js"></script>
    </body>
</html>