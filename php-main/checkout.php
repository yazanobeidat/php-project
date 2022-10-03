<?php

session_start();
// include "header2.php";



$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "ecommerce";
$conn= new mysqli($hostName,$userName,$password,$dbName);

$id="";




// ---------------------validation-----------------------------------







if(isset($_SESSION['user_name'])){
    // header("location: checkout.php");
    $name=$_SESSION['user_name'];
    // echo "$name";
	// exit;
              

    if(isset($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $item){
        $id= $item[0];
        $productname= $item[1];
        $qty= $item[2];
        $price= $item[3];

        
        $sql = "INSERT INTO orders (username, product_id, product_name,qty,price)
VALUES ( '$name', '$id', '$productname','$qty','$price' )";

if (mysqli_query($conn, $sql)) {
    // echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}}

    //    $sql = "SELECT * FROM products WHERE id= $item[0]";
    //     $result = $conn->query($sql);
    //     if ($result->num_rows > 0) {
    //         while($row = $result->fetch_assoc()) {

            
?>





<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="java.js"></script>


<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>


<div class="row">
  <div class="col-75">
    <div class="container">
      <!-- <form action="/action_page.php"> -->
      <form action="frm" name="frm">
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
          
            <label for="fname" id="full"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="" required>
            <div id="nameerror" style="color: red;"></div>

            <label for="email" id="emaillabel"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="" required>
            <div id="emailerror" style="color: red;"></div>

            <label for="adr" id="addresslabel"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Al Rawabi Street" required>
            <div id="addresserror" style="color: red;"></div>

            <label for="city" id="citylabel"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Al-Salt" required>
            <div id="cityerror" style="color: red;"></div>

            <div class="row">
              <div class="col-50">
                <label for="state" id="statelabel">State</label>
                <input type="text" id="state" name="state" placeholder="Salt" required>
                <div id="stateerror" style="color: red;"></div>
              </div>

              <div class="col-50">
                <label for="zip" id="ziplabel">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="19110" required>
                <div id="ziperror" style="color: red;"></div>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname" id="cnamelabel">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="" required>
            <div id="cnameerror" style="color: red;"></div>

            <label for="ccnum" id="ccnumlabel">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <div id="ccnumerror" style="color: red;"></div>

            <label for="expmonth" id="expmonthlabel">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            <div id="expmontherror" style="color: red;"></div>

            <div class="row">
              <div class="col-50">
                <label for="expyear" id="expyearlabel">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2025" required>
                <div id="emailerror" style="color: red;"></div>
              </div>
              <div class="col-50">
                <label for="cvv" id="cvvlabel">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
                <div id="emailerror" style="color: red;"></div>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <input type="submit" onclick="return IsEmpty();" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

</div>



</body>
</html>


<?php
     }
     else{
         header("location: login.php");
         // exit;
     }
    ?>