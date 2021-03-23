<?php
session_start();

require_once("dbcontroller.php");
$db_handle = new dbcontroller();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
            
                    $new_variable = $_GET['variable2'];
            
            $productByCode = $db_handle->runQuery("SELECT * FROM $new_variable WHERE code='" . $_GET["code"] . "'");
            
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                                        
							}
 // Function call 
//function_alert($_SESSION["cart_item"][$k]["quantity"]);


					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
      
        
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
    
	
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
    
   
        
          
     
        
}

    
}

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
  
  
  
?>

<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8">
  <title>Decaketales</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link rel="shortcut icon" type="image/jpg" href="images/logo.png"/>
   <script src="https://kit.fontawesome.com/60231954a0.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Anton&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">    
  <style type="text/css">
    @font-face {
      font-family: 'Montserrat', sans-serif;
    }
    html, body {
      width: 100%;
      height: 100%;
      margin: 0px;
    }
    body {
      background-image: radial-gradient(rgb(255, 255, 255), rgb(227, 206, 200));
      box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }
    header {
      height: auto; 
      width: 100%;
      background-color: rgb(252, 213, 202);
      
    }
    
    .sticky {
      width: 100%;
      position: fixed;
      top: 0px;
        z-index: 1;
    }
      .hd{
          display: flex;
          flex-direction: row;
          justify-content: flex-start;
          flex-wrap: nowrap;
          align-content: center;
      }
    .hd h1 {
      font-family: 'Righteous', cursive;
      text-align: center;
      
      margin:1% 25%;
      font-size: 50px;
      color: whitesmoke;
      
      padding-top: 3.2%;
     
      text-shadow: rgb(255,128,153) 2px 2px 2px;
    }
    .shadow {
      box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 8px 0px, rgba(0, 0, 0, 0.19) 0px 6px 20px 0px;
      
    }
      .hd img{
          margin-left: 0;
          margin-top:auto;
          width:180px;
          height: 180px;
          
          
      }
    .signin {
      
     
     
      text-align: center;
    }
      .hhh{
          
          margin:auto 1%;
          
      }
   
    .hhh a {
        white-space: nowrap;
      padding:10%;
      font-size: 20px;
      color: white;
      text-decoration: none;
      background-color: rgb(255,128,153);
      border-radius: 20px;
    }
    .hhh a:hover {
      
      color: white;
      text-decoration: none;
      background-color: rgb(255,128,153);
     
      border: 2px solid white;
      transition: 0.2s;
    }
    nav {
      float: left;
      background-color: rgb(255,128,153);
      width: 100%;
    }
    nav li {
        color: white;
      margin-left: 5%;
      display: inline-grid;
      padding: 1%;
    }
    nav li a {
      text-decoration: none;
      
      font-size: 14px;
    }
    nav li:hover {
      transition: 0.6s;
      background-color: white;
      color:rgb(255,128,153);
    }
    .mySlides {
      display: none;
    }
    img {
     vertical-align: middle;
      
    }
    .slideshow-container {
      max-height: 700px;
      max-width: 1000px;
      position: relative;
      margin: auto;
      z-index: -1;
      padding:10px;
    }
    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: black;
      font-weight: bold;
      font-size: 18px;
      transition: all 0.6s ease 0s;
      border-radius: 0px 5px 5px 0px;
      user-select: none;
    }
    .next {
      right: 0px;
      border-radius: 5px 0px 0px 5px;
    }
    .prev:hover, .next:hover {
      color: white;
      transition: 0.5s;
      background-color: rgb(240, 188, 173);
    }
    .dot {
      cursor: pointer;
      height: 7px;
      width: 7px;
      margin: 0px 2px;
      background-color: rgb(187, 187, 187);
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease 0s;
    }
    .active, .dot:hover {
      background-color: rgb(240, 188, 173);
    }
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }
    .cont {
      display: flex;
      width: 100%;
      margin-top: 10px;
      padding-bottom: 10px;
      flex-direction:row;
    }
    .cakes {
      position: relative;
      background-color: white;
      margin-left: 3%;
      width: 30%;
      float: left;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 8px 0px, rgba(0, 0, 0, 0.19) 0px 6px 20px 0px;
      border-radius: 10px;
      text-align: center;
    }
    .cont a {
     text-decoration: none;
    color:black;
       
    }
     
     
      
      .list h1{
      
      padding-top: 20px;
      text-align: center;
      }
    .list ul {
      list-style: none;
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
    }
      .list ul li{
          padding:30px;
      }
    
    .cart {
      width: 100%;
      display: flex;
      flex-direction: row;
      align-items: flex-end;
    }
    .price {
      margin-right: 30px;
    }
    .add {
      border-style: none;
    }
      .cakes:hover .image{
          opacity: 0.3;
      }
      
      .image{
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;

      }
      .center{
          color:black;
          transition: .5s ease;
          opacity: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          text-align: center;
      }
      .cakes:hover .center{
          opacity: 1;
      }
      .icon{
          color:orangered;
      }
      
    input {
      width: 50px;
      border-style: none;
      padding: 3px;
    }
    input:focus {
      outline: none;
    }
      .btn2{
        float: right;
      }
      .btn2 button{
         background-color:blanchedalmond;
        border-color:aliceblue;
      }
      .btn2 button:focus{
         
         outline: none;
      }
      .btn2 button:hover{
          transform:translate(2px,2px);
          cursor:pointer;
      }
      .jp{
          background-color: white;
          border-radius: 10%;
          
          width: 300px;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      }
      a{
        text-decoration: inherit;
        color:inherit;
      }
      footer{
          background-color:#04091E;
          padding:5% 0;
          display: flex;
          flex-direction: row;
          justify-content: center;
          flex-wrap: wrap;
          width:100%;
      }
      .fcol1{
          display:flex;
          flex-direction:column;
          color:white;
          padding:20px;
          margin:auto;
          width:30%;
          height:70%;
          text-align: left;
      }
      .fcol2{
          display:flex;
          flex-direction:column;
          color:white;
          border-left: 2px solid white;
          padding:20px;
          height: 70%;
          width:30%;
          
          text-align: left;
          margin:auto;
          
      }
      .fcol3{
          display:flex;
          flex-direction:column;
          color:white;
          border-left: 2px solid white;
          padding:20px;
          width: 30%;
          margin:auto;
          height: 70%;
          text-align: left;
      }
      footer i{
          font-size: 22px;
      }
      footer i:hover{
          color:rgb(216, 160, 129);
      }
      footer a{
          padding-top: 10px;
      }
      footer a:hover{
          color:rgb(216, 160, 129);
      }
      .bttns{
          display: flex;
          justify-content: center;
          padding:20px;
      }
      .bttns a{
          margin:20px;
          padding:15px;
          color:white;
          font-size:20px;
          background-color:rgb(255,128,153);
          border-radius: 5px;
      }
      .bttns a:hover{
          background-color:transparent;
          border:1px solid rgb(255,128,153);
          transition: 0.5s;
          color:rgb(255,128,153);
      }
      .no-records{
          text-align: center;
          
      }
      .emp{
          padding:5%;
          font-size:26px;
      }
      
      
     
      
      
      
      
      
      


        .dubai{
            display: none;
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
      
      .dis{
         
          font-size:30px;
          
          width:100%;
          
          margin:10px 0;
          text-align: right;
          
      }
      .dis a{
          
          color:rgb(255,128,153);
          
          cursor: pointer;
      }
      
      .glass{
          display:none;
          width:99.5%;
          position: absolute;
          top:0px;
          color:black;
          z-index: 2;
          background-image: radial-gradient(rgb(255, 255, 255,0.7), rgb(227, 206, 200,0.7));
      }.glass1{
          width:60%;
          border:4px solid rgb(255,128,153);
          margin:60px auto;
          border-radius: 10px;
          padding:6%;
          background-image: radial-gradient(rgb(255, 255, 255), rgb(227, 206, 200));
      }
        .mob input{
            border-color: #CCCCCC;
            width:100%;
            border-radius: 5px; 
            
            padding:10px;
            
        }
        .mob1{
            width:100%;
            border-radius: 5px;
            height: 70px;
            border-color: #CCCCCC;
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
  margin-bottom: 10px;
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
  background-color: rgb(255,128,153);
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
  background-color: rgb(255,128,153);
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
 
}
      
    @keyframes fade {
      0% {
        opacity: 0.4;
      }
      100% {
        opacity: 1;
      }
    }
    @keyframes fade {
      0% {
        opacity: 0.4;
      }
      100% {
        opacity: 1;
      }
    }
    
      @media only screen and (max-width: 500px) {
      .prev, .next {
        font-size: 11px;
        cursor: pointer;
        position: absolute;
        top: 15%;
        width: auto;
        padding: 9px;
        margin-left: 4px;
        margin-right: 4px;

      }
      .hd h1{
            font-size: 30px;
            margin:0 10%;
        }
        .hhh a{
            font-size: 8px;
        }
        .hd img{
            width:60px;
            height:60px;
        }
         .col1{
          margin:auto;
      }
      .col1 img{
          width:250px;
          height: 300px;
          border: 5px solid rgb(255,128,153);
          border-radius: 20%;
          
      }.col2 h1{
          margin:30px 0;
          font-size: 40px;
      }
      .banner input{
         margin:auto;
          width:65px;
          height: 30px;
         color: black;
          border-radius: 5%;
          border:3px solid rgb(255,128,153);
          
      }
        .appear{
            width:20%;  
            top:40%;
        }
        .x{
            font-size: 18px;
            right:5px;
        }
      
      .col2{
          margin:auto;
      }
        footer{
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: flex-start;
        }
        .fcol1{
            border: none;
            margin:auto 0;
            width: 90%;
            
        }.fcol2{
            border: none;
            margin:auto 0;
            width: 90%;
            
        }.fcol3{
            border: none;
            margin:auto 0;
            width: 90%;
        }
          .bttns{
          display: flex;
          justify-content: center;
          padding:10px;
      }
      .bttns a{
          margin:2px;
          padding:10px;
          color:white;
          font-size:12px;
          
      }
      
          table{
              width:50%;
              white-space: pre-wrap;
              font-size: 11px;
              overflow-x: scroll;
          }
       .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
          
       
        .mob input{
            border-color: #CCCCCC;
            width:90%;
            border-radius: 5px; 
            
            padding:10px;
            
        }
        .mob1{
            width:100%;
            border-radius: 5px;
            height: 70px;
            border-color: #CCCCCC;
        }
          .dubai input{
              width:90%;
          }

          .no-records img{
              width:90%;
              border-radius: 10px;
          }   
          nav li a{
            font-size:10px;
        }
          
          
    }
        
  </style>
</head>

<body >
    <header class="shadow">
        <div class="hd">
        <img src="images/logo.png"  alt="logo here">
        <h1>
            Decaketales
        </h1>
        <div class="hhh">
            <a href="shopcart.php">
                <i class="fas fa-user-circle"></i>
                <span class="signin"><?php echo htmlspecialchars($_SESSION["username"]); ?></span>
            </a></div>
        
        </div>

        <nav id="myHeader">
            <li><a href="home.php">Home</a></li>
            <li><a href="#contactus">Contact Us</a></li>
            <li><a href="#aboutus">About</a></li>
            <li><a href="logout.php" >Logout</a></li>
        </nav>
    </header>





<div id="shopping-cart">



    

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart"  cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="shopcart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><i class="fas fa-trash-alt"></i></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
           
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
    <div class="bttns">
      <a id="btnEmpty" href="shopcart.php?action=empty"><i style="padding:0 10px;cursor:pointer;"class="fas fa-dumpster"></i>Empty Cart</a>
      <a id="btnCollect" style="cursor:pointer;"onclick="glas()"><i style="padding:0 10px;" class="fas fa-clipboard-check"></i>Confirm Order</a>
    </div>
  <?php
} else {
?>
    <div class="no-records"><img src="images/cartempty.gif" style="padding:20px 0"><br><div class="emp"><b>Your Cart is Empty</b></div></div>
  
<?php 
}
?>
    
    
    
    <footer>
    <div id="contactus" class="fcol1">
        <h4>Contact us</h4>
        <a href="tel:+918072099081">+91 80720 99081</a>
        <a href="mailto:decaketales@gmail.com">decaketales@gmail.com</a>
        
        </div>
        <div class="fcol2">
        <h4>Follow us</h4>
        <div >
        <i style="padding:20px;" class="fab fa-instagram"></i>
        <i style="padding:20px;" class="fab fa-facebook-f"></i>
        <i style="padding:20px;" class="fab fa-twitter"></i>
        <i style="padding:20px;" class="fab fa-whatsapp"></i>
            </div>        
        </div>
        <div id="aboutus"class="fcol3">
        <h4>About us</h4>
        <p style="opacity:0.7;font-size:14px;letter-spacing:0.5px;line-height:20px;">Decaketales is chennai's best cake shop.Which have their own delivery service and has lots of varities of cakes </p>
        </div>
    </footer>
</div>
    <div id="gh" class="glass">
        
    <div class="glass1">
        <div class="dis"><a onclick="disappear()"><i class="fas fa-times-circle"></i></a></div> 
       
        <?php
            if(isset($_POST['submit'])){
       
           $username=$_SESSION["username"];
           
         
        
        if(!empty($_SESSION["cart_item"])) {
               
                
		   
            foreach ($_SESSION["cart_item"] as $g => $v1){
                //function_alert("Test");
             /*function_alert($_SESSION["cart_item"][$g]["name"]);
             function_alert($code = $_SESSION["cart_item"][$g]["code"]);
             function_alert($quantity = $_SESSION["cart_item"][$g]["quantity"]);
             function_alert($price = $_SESSION["cart_item"][$g]["price"]);
             $item_price = ($_SESSION["cart_item"][$g]["price"])*($_SESSION["cart_item"][$g]["quantity"]);
               
             
             function_alert($item_price);*/
                $code = $_SESSION["cart_item"][$g]["code"];
                $quantity = $_SESSION["cart_item"][$g]["quantity"];
                $price = $_SESSION["cart_item"][$g]["price"];
                $item_price = ($_SESSION["cart_item"][$g]["price"])*($_SESSION["cart_item"][$g]["quantity"]);
               
                $host = "localhost";
                $dbusername = "root";
                $dbpassword = "";
                $dbname = "tblproduct";
                
                
                    $mobile = $_POST['mobile'];
                    $address = $_POST['address'];
                    $payment = $_POST['payment'];

                // Create connection
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

                if (mysqli_connect_error()){
                  die('Connect Error ('. mysqli_connect_errno() .') '
                    . mysqli_connect_error());
                }
                else{
                    foreach ($_SESSION["cart_item"] as $g => $v1){
                  $sql = "INSERT INTO placedorder (quantity,price,code,totalprice,username,mobile,address,payment) values ('$quantity','$price','$code','$item_price','$username','$mobile','$address','$payment')";
                    }
                if($conn->query($sql))
                {
                      echo "Order Confirmed";
                     } else {
                      echo "error";
                     }
                }
                 
                  
            
               
                          
            }
        }
          
    }
        
        
        
        
        ?>
        
        
        <form method="POST">
        <div class="mob"><label>Mobile<input type="text" name="mobile" required></label><br></div>
        <label>Address*<textarea type="text" class="mob1" name="address" required></textarea></label><br>
 <label><input type="radio"  value="Paid"  name="payment" onchange="myFun1()">Debit card</label>
        <div class="dubai" id="paypage"><div class="row">
  <div class="col-75">
    <div class="container">
      
      
        <div class="row">
      

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Roman Reigns">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" >
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2023">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="***">
              </div>
            </div>
          </div>
          
        </div>
        
        
      
    </div>
  </div>
  
            </div></div>
        
        
        
    <label><input type="radio" value="Notpaid" name="payment" onchange="myFun2()">COD</label>
            
            
            
        <input type="submit" name="submit" value="Place order" class="btn">
        </form></div></div>
   
    
    
    
    
    
    
    
    
    

</body>
    <script>
       window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
         
        
         function myFun1(){
        document.getElementById("paypage").style.display="block";
    }
    function myFun2(){
        document.getElementById("paypage").style.display="none";
    }
        function glas(){
            document.getElementById("gh").style.display="block";
            document.getElementById("shopping-cart").style.position="fixed";
            
        }
        function disappear(){
            document.getElementById("gh").style.display="none";
            document.getElementById("shopping-cart").style.position="relative";
        }
        
        
        if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
        
    </script>
</html>
