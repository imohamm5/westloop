<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <title>WestLoopMart</title>
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
	
	<script src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(41.8857326,-87.6524721);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:18,
  mapTypeId:google.maps.MapTypeId.HYBRID
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
map.setTilt(0);
}

google.maps.event.addDomListener(window, "load", initialize);

</script>
	
	</head>
    <body background='/Images/menu-bck.jpg' style='background-repeat:no-repeat;'>
        
          
		  <div class="header"> 
		  <h1 class="logo">
		  <a href="index.php"> <img alt="WestLoop Mart" src="../images/Logo.png"/></a>
		  </h1>
            <nav id="navigation">
                <ul id="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Menu.php">Menu</a></li>
                    <li><a href="catering.php">Catering</a></li>
                    <li><a href="location.php">Location</a></li>
					 <li><a href="aboutus.php">About Us</a></li>
					 <li><a href="Nutrition.php">Nutritions</a></li>
                </ul>
            </nav>
        	
			
			       <ul class="sm-nav">
		<li id="send-email" class="hovDown"><a class="sn" href="/FeedbackForm.php" style="top: -50px;">Send Email</a></li>
		<li id="visit-facebook" class="hovDown"><a class="sn" href="http://goo.gl/N5RVy3" target="_blank" style="top: -50px;">Visit Facebook</a></li>
		<li id="visit-twitter" class="hovDown"><a class="sn" href="https://www.twitter.com/coolj_p20" target="_blank" style="top: -50px;">Visit Twitter</a></li>
		<!-- <li id="visit-blog" class="hovDown"><a class="sn" href="http://feeds.feedburner.com/GoodcentsBlog">Visit Blog</a></li> -->	
	</ul>
			</div>
	
		
            <div id="content_area">
             <?php
			 session_start();
			 $username=$_SESSION['username'];
			 require ("Model/Credentials.php");
			 mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
			$get_u="select Count(*) as count from orders";
			$query1=mysql_query($get_u)or die(mysql_error);
			$row=mysql_fetch_array($query1);
		
			//echo "$customer_id";
			
			
			?>
              
                           <h1>Welcome  : <?php echo $username; ?> <br></h1> 
						 
						   <h2 style="text-align:center;padding-top:20px;">

Total Number of order until now : <?php echo $row['count'];?><br><br></h2>
<form  method="POST" enctype="multipart/form-data"  align="center"  >
			<table  align="center"  border="1" class="additem">
                        <tr  >
                           
                            <th align="center" bgcolor='#4CAF50'> Product Id </th>
                            <th align="center" bgcolor='#4CAF50'>Number Of Times Ordered  </th>
						
                        </tr>
      
<?php 
require ("Model/Credentials.php");
			 mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
			$get_u="SELECT p_id, count(p_id) as count1 FROM `orders_information` group by p_id";
			$query1=mysql_query($get_u)or die(mysql_error);
		while	($row=mysql_fetch_array($query1)){
			$Pid=$row['p_id'];
			$count=$row['count1'];
			?>
			<tr>
                           
                            <td ><?php echo $Pid;?> </td>
                            <td ><?php echo $count;?>   </td>
						
                        </tr>
			<?php
		}

?>             </table>
</form>
            </div>
        
            <div id="contentsidebardeleteProd2">
			<br><br><br><br><br><br>
			<div id="sidebar_title">Categories </div>
             <ul id="sidebar_text"><li><a href="CustomerOrderDetails.php" style='text-decoration:none;'>Order Details </a><br><br><br></li>
			 <li> <a href="AddProductByAdmin.php"  style='text-decoration:none;'>Add Product to the menu</a><br><br><br></li>
			   <li><a href="DeleteProduct.php" style='text-decoration:none;'>Delete or update a Product from the menu </a><br><br><br></li>
			   <li><a href="AdminLogin.php" style='text-decoration:none;'>Logout </a></li>
	
			  
			   </ul>
			  
            </div>
            
           <footer id="cFtr">
			
			 <div id="footer">             
            
             <a href="AdminLogin.php">AdminLogin</a>
            <nav id="navigation2">
                <ul id="nav2">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Menu.php">Menu</a></li>
                    <li><a href="catering.php">Catering</a></li>
                    <li><a href="location.php">Location</a></li>
					 <li><a href="aboutus.php">About Us</a></li>
                </ul>
            </nav>
			</div>
               <div id="bottom-Address">
			   <p id="btmAdr"> 1006 W Lake, Chicago,IL 60607 USA, Ph: 773- 708-4674 <br>All rights reserved</p>
				</div>
            </footer>
      
    </body>
</html>
