<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<title>Check out</title>
	<link rel="stylesheet" href="styles/styleCheckoutPage.css">
	
</head>
<body>
	
	<header>
        <div class="top-bar">
            <a href="#" class="logo-hlink"><img src="img/logo.jpeg" alt="Logo" class="logo-h"></a>
            <nav class="navigation top">
                <ul>
                    <li><a href="index.html" class="home-nav">Home</a></li>
                    <li><a href="collection.html">Collection</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html" class="contact-nav">Contact</a></li>
                </ul>
            </nav>
            <div class="icons">
                <a href="#" class="cart-icon"><img src="img/cart.svg" class="svg-icon"></a>
                <a href="#" class="profile-icon"><img src="img/account.svg" class="svg-icon"></a>
				<a href="#" class="profile-name">Aathif Zahir</a>
            </div>
        </div>
    </header>
<!--main container-->
	
	<div class="payment-method-text">Check out</div>
	<div class="check-out-container">
		<img src="img/credit_card.png" alt="credit Image" class="credit-card-icon">
		<div class="check-out-container-text">Payment method</div>
		<div class="check-out-container-text2">Select payment method</div>
		
		<form method="post" action="">
		<div class="name-textbox">
		  <label for="name-on-card" class="label">Name on Card:</label>
		  <input type="text" id="name-on-card" name="name-on-card" placeholder="Enter name on card" required>
		</div>
		<div class="cardno-textbox">
		  <label for="Card Number" class="label2">Enter card number:</label>
		  <input type="text"  id="number-on-card" name="number-on-card" placeholder="Enter card number" required>
		</div>
		<div class="exp-textbox">
			<label for="exp-input" class="label3">Expiry Date of Card:</label>
			<input type="month" id="exp-input" name="expiry" required>
		</div>
		<div class="cvv-textbox">
			<label for="cvv-input" class="label4">CVV Number:</label>
			<input type="text"  id="cvv-input" name="cvv" placeholder="XXX" required>
		</div>
		<div class="line11"></div>
		
		<div class="c-address">
		  <label for="add address" class="labe15">Address:</label>
		  <input type="text" id="u-address" name="Address" placeholder="Enter address" required>
		</div>
		<div class="po-address">
		  <label for="zip address" class="labe15">Zip/Postal Address:</label>
		  <input type="text" id="p-address" name="zip" placeholder="Enter code" required>
		</div>
		<div class="dist-select">
			<label class="label6" for="district">Select District:</label>
			<select id="district" name="district">
			  <option value="Ampara">Ampara</option>
			  <option value="Anuradhapura">Anuradhapura</option>
			  <option value="Badulla">Badulla</option>
			  <option value="Batticaloa">Batticaloa</option>
			  <option value="Colombo">Colombo</option>
			  <option value="Galle">Galle</option>
			  <option value="Gampaha">Gampaha</option>
			  <option value="Hambantota">Hambantota</option>
			  <option value="Jaffna">Jaffna</option>
			  <option value="Kalutara">Kalutara</option>
			  <option value="Kandy">Kandy</option>
			  <option value="Kegalle">Kegalle</option>
			  <option value="Kilinochchi">Kilinochchi</option>
			  <option value="Kurunegala">Kurunegala</option>
			  <option value="Mannar">Mannar</option>
			  <option value="Matale">Matale</option>
			  <option value="Matara">Matara</option>
			  <option value="Monaragala">Monaragala</option>
			  <option value="Mullaitivu">Mullaitivu</option>
			  <option value="Nuwara Eliya">Nuwara Eliya</option>
			  <option value="Polonnaruwa">Polonnaruwa</option>
			  <option value="Puttalam">Puttalam</option>
			  <option value="Ratnapura">Ratnapura</option>
			  <option value="Trincomalee">Trincomalee</option>
			  <option value="Vavuniya">Vavuniya</option>
			</select>
		  </div>
	
		<button class="co-button" type="submit">Proceed Checkout</button>
		</form>
		
	</div>
	
	<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the form data
  $nameOnCard = $_POST["name-on-card"];
  $cardNum = $_POST["number-on-card"];
  $expInput = $_POST["expiry"]; // Expiry input in the format "YYYY-MM"
  $cvvNum = $_POST["cvv"];
  $cusAddress = $_POST["Address"];
  $addressZip = $_POST["zip"];
  $cusDistrict = $_POST["district"];
  $paymentDate = date("Y-m-d"); // Current date
// Extract month and year from the expiry input
$expMonth = substr($expInput, 5, 2);
$expYear = substr($expInput, 2, 2);
$cardExp = $expMonth . $expYear;
$cardExp = date("F Y", strtotime($expInput));

// Create a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ots";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = "INSERT INTO billing_info (Name_on_card, Card_num, Card_exp, Cvv_num, Cus_address, adress_zip, Cus_district, Payment_date) 
VALUES ('$nameOnCard', '$cardNum', '$cardExp', '$cvvNum', '$cusAddress', '$addressZip', '$cusDistrict', '$paymentDate')";


if ($conn->query($stmt) === true) {
} else {
	echo "Error: " . $stmt . "<br>" . $conn->error;
}



  // Close the statement and connection
  
  $conn->close();
}
?>


	<footer>
		<div class="footer-logo">
			<a href="#" class="logo"><img src="img/logo.jpeg" alt="Logo" class="logo-f"></a>
		</div>
		<nav class="footer-navigation">
			<ul>
				<li><a href="#">About Us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Terms and Conditions</a></li>
				<li><a href="#">Privacy and Cookies</a></li>
			</ul>
		</nav>
		<hr class="footer-hr">
		<div class="footer-bottom">
		<div></div>
		<p class="footer-copyright">
			&copy; 2022 Brand. All rights reserved.
		</p>
		<div class="footer-social-media">
			<ul>
				<li><a href="#"><img src="img/facebook.svg" alt="facebook" class="footer-social"></a></li>
				<li><a href="#"><img src="img/twitter.svg" alt="twitter" class="footer-social"></a></li>
				<li><a href="#"><img src="img/instagram.svg" alt="instagram" class="footer-social"></a></li>
			</ul>
		</div>
		</div>
	</footer>
	
	<!--<script src="script/script.js"></script>-->

</body>
</html>
