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
			<table  align="center" class = 'coffeeTable2' >
                        <tr>
                           
                            <th > Items  <br>  <br></th>
                            <th > Quantity  <br>  <br></th>
							<th  >Total Price   <br>  <br></th> 
                        </tr>
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
                        ?>
						<tr align="center">
						
						<td> <?php echo $pro_name;?><br>
						<img src="<?php echo $pro_image;?>"width="60" height="60"/></td>
						<td><input type="text" size="4" name="qty[<?php echo $pro_id;?>]" value="<?php echo $pro_qty;?>"/> </td>
							<input type="hidden" name="itemid[]" value="<?php echo $pro_id;?>">
						<td> <?php echo "$".$pro_single_price;?></td>
					<td ><input type="submit" style=" background:url(images/delete.png);  background-repeat: no-repeat; width:90px; height:25px;text-indent:90px; overflow:hidden;" name="deleteid" value="<?php echo $pro_id;?>" /></td>
					<td ><input type="submit" style=" background:url(images/update_button.gif);  background-repeat: no-repeat; width:90px; height:28px;text-indent:90px; overflow:hidden;"  name="update_basket" value="<?php echo $pro_id;?>" /></td>
						</tr>
						
						
						<?php 
							 
						   }
		}
		
		?>
		<tr align="right">
		 <tr>
        <td colspan="4" style="font-size:22px;">
          Order Type :
          <input type="radio" checked="checked" name="actions" value="PickUp" id="PickUp" class="static_class" />
          <label for="yes">Pick Up</label>
          <input type="radio" checked="checked" name="actions" value="Delivery" id="Delivery" class="static_class"/>
          <label for="no">Delivery </label>
        </td>
      </tr>
      <tr>
        <td style="font-size:22px;" >
          <div id="extra"> <label >Address </label>
            <textarea rows="4" cols="35px" name="Address" class="textboxid4 style"></textarea>
          </div>
        </td>
      </tr>
						<td colspan="4"><b> Sub Total :</b> <br> <br> </td>
						<td ><?php echo "$".$total;?></td>
						</tr>
						<tr align="right">
						<td colspan="4"><b> Tax :</b> <br> <br></td>
						<td ><?php echo "$".$tax;?></td>
						</tr>
						<tr align="right">
						<td colspan="4"><b> Total :</b> <br> <br></td>
						<td ><?php echo "$".$sub_total;?> </td>
						</tr>
						
		<tr align="center">
						<td colspan="1" ><input id="button2" type="submit" name="update_basket" value="Update Basket"/> <br> <br></td>
						
						<td ><input  id="button2" type="submit" name="continue" value="Continue Ordering"/> <br> <br></td>
						<td></td>
						<td></td>
						<td ><input id="button2" type="submit"  name="Checkout" value="Checkout" /> <br> <br></td>
					
						</tr>
						
						
                     </table>
					  <script src="http://code.jquery.com/jquery.js"></script>
    <script type="text/javascript">
      $(function(){
        $(".static_class").click(function(){
          if($(this).val() === "Delivery")
            $("#extra").show("fast");
          else
            $("#extra").hide("fast");
        });
      });
    </script>
				</form>
				<?php 
				
				if(isset($_POST['deleteid'])){
					 require ("Model/Credentials.php");
				$ip=getIp();
mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);		
		$remove_id=$_POST['deleteid'];
			
						$delete_item="delete from basket where id='$remove_id' and ip='$ip'";
					 $res = mysql_query($delete_item);
					 if($res){ 
					 echo "<script> window.open('AddOrderMain.php','_self')</script>";
						// header('location: http://localhost/Masters%20Project/AddOrderMain.php');
					 }
				
				}
				
				if(isset($_POST['update_basket'])){
					 require ("Model/Credentials.php");
				$ip=getIp();
mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);		
		if(isset($_POST['itemid'])){
		foreach($_POST['itemid'] as $item_id){
				$quantity=$_POST["qty"][$item_id];
			
					$update_item="update basket set qty='$quantity' where id='$item_id'";
					 $res2 = mysql_query($update_item);
					 if($res2){ 
				 echo "<script> window.open('AddOrderMain.php','_self')</script>";
			//			 header('location: http://localhost/Masters%20Project/AddOrderMain.php');
					 }
				}
				}
				}
								
				if(isset($_POST['continue'])){
					echo "<script> window.open('Menu.php','_self')</script>";
				}
			
				if(isset($_POST['Checkout'])){
				require ("Model/Credentials.php");
		$ip=getIp();
mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);		
				$orderType=$_POST["actions"];
			$address=$_POST["Address"];
					$update_item="update basket set orderType='$orderType',Address='$address' where ip='$ip'";
					 $res2 = mysql_query($update_item);
					 if($res2){ 
				echo "<script> window.open('Login.php','_self')</script>";
	
					 }
				}
			
				
				?>
            </div>
        
            <div id="sidebar">
                
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
                <p id="btmAdr"> 1006 W Lake, Chicago,IL 60607 USA, Ph: 773- 708-4674<br>All rights reserved</p>
            </footer>
      
    </body>
</html>
