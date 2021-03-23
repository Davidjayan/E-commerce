<?php
// Initialize the session
session_start();
 


require_once("dbcontroller.php");
$db_handle = new dbcontroller();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
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
  <link rel="stylesheet" href="/asssets/css/all.css" >
    <link rel="shortcut icon" type="image/jpg" href="images/logo.png"/>
   <script src="https://kit.fontawesome.com/60231954a0.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Anton&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">    
  <style type="text/css">
   
  </style>
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
      margin-left: 5%;
      display: inline-grid;
      padding: 1%;
      color:white;
    }
    nav li a {
      text-decoration: none;
      color: inherit;
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
      background-color: rgb(255,128,153);
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
      justify-content: center;
      margin-top: 10px;
      padding-bottom: 10px;
      flex-direction:row;
      flex-wrap: wrap;   
    }
    .cakes {
      
      background-color: white;
      margin: 3%;
      width: 350px;
      float: left;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 8px 0px, rgba(0, 0, 0, 0.19) 0px 6px 20px 0px;
      
      text-align: center;
    }
    .cont a {
     text-decoration: none;
    color:black;
       
    }
     
     
      
      .list h1{
      color:rgb(255,128,153);
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
         margin:30px;
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
          color:rgb(255,128,153);
      }
      footer a{
          padding-top: 10px;
      }
      footer a:hover{
          color:rgb(255,128,153);
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
     @media only screen and (max-width: 600px) {
      .prev, .next {
        font-size: 11px;
        cursor: pointer;
        position: absolute;
        top: 35%;
        color:white;
          background-color: rgb(255,128,153);
        width: auto;
        padding: 15px;
        margin-left: 4px;
        margin-right: 4px;

      }
         .prev:hover , .next:hover{
             background-color:rgb(255,128,153);
             transition: 0;
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
        footer{
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: flex-start;
        }
          .list ul {
      
      flex-wrap: nowrap;
      overflow-x: scroll;
              -webkit-overflow-scrolling:touch;
              justify-content: flex-start;
    }
         .list ul li{
             margin:10px;
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
         nav li a{
            font-size:10px;
        }
      }

        
  </style>
</head>

<body >
    <header class="shadow">
        <div class="hd">
        <img src="images/logo.png" alt="logo here">
        <h1>
            Decaketales
        </h1>
        <div class="hhh">
            <a href="login.php">
                <i class="fas fa-user-circle"></i>
                <span class="signin">Signin</span>
            </a>
        </div>
        </div>
        <nav id="myHeader">
            <li><a href="home.php">Home</a></li>
            <li><a href="#contactus">Contact Us</a></li>
            <li><a href="#aboutus">About</a></li>
           
        </nav>
    </header>
  
    <div class="slideshow-container">
        <div class="mySlides fade shadow">
            <img src="images/slide/1.jpeg" style="display: block; margin-left: auto; margin-right: auto; height: 400px; width: 60%;">
        </div>
        <div class="mySlides fade shadow">
            <img src="images/slide/2.jpeg" style="display: block; margin-left: auto; margin-right: auto; height: 400px; width: 60%;padding:20px;">
        </div>
        <div class="mySlides fade shadow">
            <img src="images/slide/3.jpeg" style="display: block; margin-left: auto; margin-right: auto; height: 400px; width: 60%;">
        </div>
        <div class="mySlides fade shadow">
            <img src="images/slide/4.jpeg" style="display: block; margin-left: auto; margin-right: auto; height: 400px; width: 60%;">
        </div>
        <div class="mySlides fade shadow">
            <img src="images/slide/5.jpeg" style="display: block; margin-left: auto; margin-right: auto; height: 400px; width: 60%;">
        </div>
        <div class="mySlides fade shadow">
            <img src="images/slide/6.jpeg" style="display: block; margin-left: auto; margin-right: auto; height:400px; width: 60%;">
        </div>
        <div class="mySlides fade shadow">
            <img src="images/slide/7.jpeg" style="display: block; margin-left: auto; margin-right: auto; height: 400px; width: 60%;">
        </div>
    </div> 
    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    <div style="text-align: center;">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
        <span class="dot" onclick="currentSlide(6)"></span>
        <span class="dot" onclick="currentSlide(7)"></span>
        </div>
    
    
    
            <div class="cont">
        <div class="cakes">
             <a href="#celebrationcakes">
                        <div class="image">
                        <img src="images/slide/11.jpeg" width="100%">
                        <div style="padding-left:10%;padding-bottom:10%;color:black;text-align:left;">
                            <h3>Celebration cakes</h3><div id="price4" style="padding-top:8px;">Starting from 
                            <div style="padding-top:7px;"><div class="icon"><i class="fa fa-inr" aria-hidden="true"></i>500</div></div></div>
                            </div>
                            </div>
                            <div class="center"><h2>Celebration cakes</h2></div>
            </a>
        </div>
        <div class="cakes">
            <a href="#exoticcakes">
                        <div class="image">
                        <img src="images/slide/11.jpeg" width="100%">
                        <div style="padding-left:10%;padding-bottom:10%;color:black;text-align:left;">
                            <h3>Exotic cakes</h3><div id="price4" style="padding-top:8px;">Starting from 
                            <div style="padding-top:7px;"><div class="icon"><i class="fa fa-inr" aria-hidden="true"></i>500</div></div></div>
                            </div>
                            </div>
                            <div class="center"><h2>Exotic cakes</h2></div>
                         </a>
        </div>
        <div class="cakes">
            <a href="#brownies">
                        <div class="image">
                        <img src="images/slide/11.jpeg" width="100%">
                        <div style="padding-left:10%;padding-bottom:10%;color:black;text-align:left;">
                            <h3>Brownies</h3><div id="price4" style="padding-top:8px;">Starting from 
                            <div style="padding-top:7px;"><div class="icon"><i class="fa fa-inr" aria-hidden="true"></i>500</div></div></div>
                            </div>
                            </div>
                            <div class="center"><h2>Brownies</h2></div>
                         </a>
        </div>
    </div>
                     
         <div class="Products">
        <div class="list" id="celebrationcakes">
        
        
       
            <h1>
                Celebration cakes
            </h1>
                            <ul>
                
        <?php
	           $product_array = $db_handle->runQuery("SELECT * FROM celebrationcakes ORDER BY id ASC");
	           if (!empty($product_array)) { 
		      foreach($product_array as $key=>$value){
	               ?>   
    <li>
            <div class="jp">
                <img src="<?php echo $product_array[$key]["image"];?>" style="width:280px;height:280px;margin-left:10px;margin-top:10px;border-radius:10%;"> 
        
    	
                
                <a href="product2.php?variable=<?php echo $key;?>&variable2=celebrationcakes">
                
                
                <div style="padding-top:10px;padding-bottom:10px;margin-left:20px"><?php echo $product_array[$key]["name"]; ?></div><span class="cart">
                <div style="margin-left:20px;padding-bottom:10px;"><span>$</span><span id="price<?php echo $product_array[$key]["id"];?>"><?php echo $product_array[$key]["price"]; ?></span><br><div style="padding-top:10px;"><i class="fas fa-star" style="color:orangered; "></i>
                <i class="fas fa-star"style="color:orangered;"></i>
                <i class="fas fa-star" style="color:orangered;"></i>
                    <i class="fas fa-star-half-alt" style="color:orangered;"></i>
                    <i class="far fa-star" style="color:orangered;"></i><span style="padding:10px;"><b>4.1</b> ratings</span>
                    
                    </div></div>
                        
                        
                        
                    </span></a>
                               
                <?php
		}
           
	}
    
                    ?>         
                    
        </div>
                    
                
                
                                </li></ul></div>
      
            <div class="list" id="exoticcakes">
        
        
       
            <h1>
                Exotic cakes
            </h1>
                            <ul>
                
        <?php
	           $product_array = $db_handle->runQuery("SELECT * FROM exoticcakes ORDER BY id ASC");
	           if (!empty($product_array)) { 
		      foreach($product_array as $key=>$value){
	               ?>   
    <li>
            
<div class="jp">
                <img src="<?php echo $product_array[$key]["image"];?>" style="width:280px;height:280px;margin-left:10px;margin-top:10px;border-radius:10%;"> 
        
    	 
                
                
                <a href="product2.php?variable=<?php echo $key;?>&variable2=exoticcakes">
                
                <div style="padding-top:10px;padding-bottom:10px;margin-left:20px"><?php echo $product_array[$key]["name"]; ?></div><span class="cart">
                <div style="margin-left:20px;padding-bottom:10px;"><span>$</span><span id="price<?php echo $product_array[$key]["id"];?>"><?php echo $product_array[$key]["price"]; ?></span><br><div style="padding-top:10px;"><i class="fas fa-star" style="color:orangered; "></i>
                <i class="fas fa-star"style="color:orangered;"></i>
                <i class="fas fa-star" style="color:orangered;"></i>
                    <i class="fas fa-star-half-alt" style="color:orangered;"></i>
                    <i class="far fa-star" style="color:orangered;"></i><span style="padding:10px;"><b>4.1</b> ratings</span>
                    </div></div>
                        
                        
                        
                    </span></a>
                               
                <?php
		}
		}
           
	
    
                    ?>         
                    
                </div>
                    
                
                
                                </li></ul></div>
                     <div class="list" id="brownies">
        
        
       
            <h1>
                Brownies
            </h1>
                            <ul>
                
        <?php
	           $product_array = $db_handle->runQuery("SELECT * FROM brownie ORDER BY id ASC");
	           if (!empty($product_array)) { 
		      foreach($product_array as $key=>$value){
	               ?>   
    <li>
            <div class="jp">
                <img src="<?php echo $product_array[$key]["image"];?>" style="width:280px;height:280px;margin-left:10px;margin-top:10px;border-radius:10%;"> 
        
    	
                
                
                
                <a href="product2.php?variable=<?php echo $key;?>&variable2=brownie">
                <div style="padding-top:10px;padding-bottom:10px;margin-left:20px"><?php echo $product_array[$key]["name"]; ?></div><span class="cart">
                <div style="margin-left:20px;padding-bottom:10px;"><span>$</span><span id="price<?php echo $product_array[$key]["id"];?>"><?php echo $product_array[$key]["price"]; ?></span><br><div style="padding-top:10px;"><i class="fas fa-star" style="color:orangered; "></i>
                <i class="fas fa-star"style="color:orangered;"></i>
                <i class="fas fa-star" style="color:orangered;"></i>
                    <i class="fas fa-star-half-alt" style="color:orangered;"></i>
                    <i class="far fa-star" style="color:orangered;"></i><span style="padding:10px;"><b>4.1</b> ratings</span>
                    </div></div>
                        
                        
                        
                    </span></a>
                               
                <?php
		}
           
	}
    
                    ?>         
                    
        </div>
                    
                
                
                                </li></ul></div>
             
             
    </div>              
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
            
            
            
        
    


    
          
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
        function calc(n) 
        {
          var priceval = document.getElementById("price"+n).innerText;
          var numval = document.getElementById("numval"+n).value;
                     
          document.getElementById("result"+n).innerHTML=priceval * numval;
          document.getElementById("price"+n).style.display="none";
        }   
    </script>
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

</script>
    
</body>

</html>