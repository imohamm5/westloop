<!DOCTYPE html>
<?php 
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>WestLoopMart</title>
		<link rel="stylesheet" href="Styles/style.css" type="text/css" />
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
			<?php basket();
			$username=$_SESSION['username'];
			 require ("Model/Credentials.php");
			 mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
			$get_u="select * from users where name='$username'";
			$query1=mysql_query($get_u)or die(mysql_error);
			$row=mysql_fetch_array($query1);
			$customer_id=$row['userid'];
		
			//echo "$customer_id";
			
			
			$row=mysql_fetch_array($query1);
			
			?>
              
                           <h1>Thank you : <?php echo $username; ?> <br></h1> 
						 
						   <h2 style="text-align:center;padding-top:20px;">

Thank you for doing business with us! 
<br><br><br><br><br><br>
</h2>
                 <a href="Menu.php"> <button id="button1">Go back to menu.</button></a>     
			
                   <?php
						 require ("Model/Credentials.php");
$total=0;
$sub_total=0;	
$tax=0;	
		mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
		$ip=getIp();
		 $query = "SELECT * FROM basket WHERE ip='$ip'";
        $result = mysql_query($query) or die(mysql_error());
		while($ip_row=mysql_fetch_array($result)){
			$pro_id=$ip_row['id'];
			$pro_qty=$ip_row['qty'];
			$orderType=$ip_row['orderType'];
			$Address=$ip_row['Address'];
			$Customer_record="insert into orders_information (customer_id,p_id,qty) values('$customer_id','$pro_id','$pro_qty')";
			 $result5 = mysql_query($Customer_record) or die(mysql_error());
			$query2="select * from menu where prodid='$pro_id'";
			 $result2 = mysql_query($query2) or die(mysql_error());
			 while($pro_row=mysql_fetch_array($result2)){
				 $pro_price=array($pro_row['price']*$pro_qty);
				 $pro_name=$pro_row['name'];
				 $pro_image=$pro_row['image'];
				 $pro_single_price=$pro_row['price'];
				 
			$values=array_sum($pro_price);	 
			$total +=$values;
			$sub_total=round($total,2);
			$tax=round(($total*0.125),2);
			$sub_total=round(($sub_total+$tax),2);
                        	 
						   }
		}
		mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
		$query3="INSERT INTO orders(c_id,Total_Amt,orderType,Address) VALUES('$customer_id','$sub_total','$orderType','$Address')";
		$querydelete="delete from basket where ip='$ip' and customer_id='$customer_id'";
		$result3 = mysql_query($query3) or die(mysql_error());
		
			$query1=mysql_query($querydelete)or die(mysql_error);
			
		
		//paypal payment details 
		
	//	$amount1=$_GET['amt'];
		//$currency=$_GET['cc'];
	//	$trx_id=$_GET['tx'];
		
		
		
		?>
		
				
            </div>
        
            <div id="sidebar">
                
            </div>
            
           <footer id="cFtr">
			
			 <div id="footer">             
            
            
            <nav id="navigation3">
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
