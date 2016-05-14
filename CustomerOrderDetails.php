<!DOCTYPE html>
<?php 
session_start();
?>
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
	
		 <?php 
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
return $ip;
}
		function basket(){
			 require ("Model/Credentials.php");
		if(isset($_GET['id'])){	
		
		mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
		$ip=getIp();
		$id=$_GET['id'];
		 $query = "SELECT * FROM basket WHERE id='$id' and ip='$ip'";
        $result = mysql_query($query) or die(mysql_error());
		if(mysqli_num_rows($result)>0){
			echo "";
		}else{
			$insert_pro="insert into basket (id,ip) values ('$id','$ip')";
			$execute=mysql_query($insert_pro);
			
			echo "<script>window.open('AddOrderMain.php','_self')</script>";
		
		}
	}
}

function total_item(){
	 require ("Model/Credentials.php");
		if(isset($_GET['id'])){	
		
		mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
		$ip=getIp();
		 $query = "SELECT * FROM basket WHERE ip='$ip'";
        $result = mysql_query($query) or die(mysql_error());
		$count_item=mysql_num_rows($result);
	
	
		}else{
mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
		$ip=getIp();
		 $query = "SELECT * FROM basket WHERE ip='$ip'";
        $result = mysql_query($query) or die(mysql_error());
		$count_item=mysql_num_rows($result);
		
		}
		echo $count_item;
	}
	
	function total_price(){
		 require ("Model/Credentials.php");
$total=0;		
		mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
		$ip=getIp();
		 $query = "SELECT * FROM basket WHERE ip='$ip'";
        $result = mysql_query($query) or die(mysql_error());
		while($ip_row=mysql_fetch_array($result)){
			$pro_id=$ip_row['id'];
			$query2="select * from menu where prodid='$pro_id'";
			 $result2 = mysql_query($query2) or die(mysql_error());
			 while($pro_row=mysql_fetch_array($result2)){
				 $pro_price=array($pro_row['price']);
			$values=array_sum($pro_price);	 
			$total +=$values;
			 }
		}
		echo $total;
	}
			?>
            <div id="content_area" align="center">
			<?php basket()?>
              <form  method="POST" enctype="multipart/form-data" >
			<table  align="center"  border="1" class="additem" >
                        <tr>
                           <th align="center" bgcolor='#4CAF50'> Order Id  <br>  <br></th>
                            <th align="center" bgcolor='#4CAF50' > Customer Id  <br>  <br></th>
							<th align="center" bgcolor='#4CAF50' >Tota Amount <br>  <br></th> 
							<th align="center" bgcolor='#4CAF50' >Order Type <br>  <br></th> 
							<th align="center" bgcolor='#4CAF50' >Address <br>  <br></th> 
							<th align="center" bgcolor='#4CAF50'> Date And Time  <br>  <br></th>
               
                        </tr>
                        <?php
						 require ("Model/Credentials.php");

		mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
		
			$query2="select * from orders";
			 $result2 = mysql_query($query2) or die(mysql_error());
			 while($pro_row=mysql_fetch_array($result2)){
				 $pro_id=$pro_row['order_id'];
				 $pro_name=$pro_row['c_id'];
				 $pro_type=$pro_row['Total_Amt'];
				 $pro_orderType=$pro_row['orderType'];
				 $pro_Address=$pro_row['Address'];
				  $pro_single_price=$pro_row['dateTime'];
				  
			
				
                        ?>
						<tr align="center">
						
						<td> <?php echo $pro_id;?><br>
						<td> <?php echo $pro_name;?><br>
						<td> <?php echo $pro_type;?><br>
						<td> <?php echo $pro_orderType;?><br>
						<td> <?php echo $pro_Address;?><br>
						<td> <?php echo $pro_single_price;?><br>
						</tr>
						
						
						<?php 
							 
						   }
		
		?>
		
	             </table>
				</form>
            </div>
        
           <div id="contentsidebardeleteProd3">
			<br><br><br><br><br><br>
			<div id="sidebar_title">Categories </div>
             <ul id="sidebar_text">
			 <li><a href="CustomerOrderDetails.php" style='text-decoration:none;'>Order Details </a><br><br><br></li>
			 <li> <a href="AddProductByAdmin.php"  style='text-decoration:none;'>Add Product to the menu</a><br><br><br></li>
			   <li><a href="DeleteProduct.php" style='text-decoration:none;'>Delete or update a Product from the menu </a><br><br><br></li>
			     <li><a href="AdminFunctionality.php" style='text-decoration:none;'>Go back to menu </a></li>
			   </ul>	
			   </div>
            
           <footer id="cFtr">
			
			 <div id="footer">             
            
            
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
