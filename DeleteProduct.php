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
			<table  align="left" border="1" bgcolor="#ffcc00" >
                        <tr>
                           <th > prodid  <br>  <br></th>
                            <th > name  <br>  <br></th>
							<th  >type  <br>  <br></th> 
							<th > price  <br>  <br></th>
                            <th > size  <br>  <br></th>
							<th  >servingsize   <br>  <br></th> 
                            <th > Calories  <br>  <br></th>
                            <th > CalFromFat  <br>  <br></th>
							<th  >TotalFat   <br>  <br></th> 
							<th > SatFat  <br>  <br></th>
                            <th > Chol  <br>  <br></th>
							<th  >Sodium   <br>  <br></th> 
							<th  >Carbohydrate   <br>  <br></th> 
                        </tr>
                        <?php
						 require ("Model/Credentials.php");

		mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
		
			$query2="select * from menu";
			 $result2 = mysql_query($query2) or die(mysql_error());
			 while($pro_row=mysql_fetch_array($result2)){
				 $pro_id=$pro_row['prodid'];
				 $pro_name=$pro_row['name'];
				 $pro_type=$pro_row['type'];
				  $pro_single_price=$pro_row['price'];
				  $pro_size=$pro_row['size'];
				 $pro_image=$pro_row['image'];
				 $pro_servingsize=$pro_row['ServingSize'];
				 $pro_calories=$pro_row['Calories'];
				 $pro_CalFromFat=$pro_row['CalFromFat'];
				 $pro_TotalFat=$pro_row['TotalFat'];
				 $pro_SatFat=$pro_row['SatFat'];
				 $pro_Chol=$pro_row['Chol'];
				 $pro_Sodium=$pro_row['Sodium'];
				 $pro_Carbohydrate=$pro_row['Carbohydrate'];
				 
				 
				
                        ?>
						<tr align="center">
						
						<td> <?php echo $pro_id;?><br>
						<td><input type="text"  name="name[<?php echo $pro_id;?>]" value="<?php echo $pro_name;?>"/> </td>
						<td><input type="text"  name="type[<?php echo $pro_id;?>]" value="<?php echo $pro_type;?>"/> </td>
						<td><input type="text" size="4" name="price[<?php echo $pro_id;?>]" value="<?php echo $pro_single_price;?>"/> </td>
						<td><input type="text" size="4" name="size[<?php echo $pro_id;?>]" value="<?php echo $pro_size;?>"/> </td>
						<td><input type="text" size="4" name="ServingSize[<?php echo $pro_id;?>]" value="<?php echo $pro_servingsize;?>"/> </td>
						<td><input type="text" size="4" name="Calories[<?php echo $pro_id;?>]" value="<?php echo $pro_calories;?>"/> </td>
						<td><input type="text" size="4" name="CalFromFat[<?php echo $pro_id;?>]" value="<?php echo $pro_CalFromFat;?>"/> </td>
						<td><input type="text" size="4" name="TotalFat[<?php echo $pro_id;?>]" value="<?php echo $pro_TotalFat;?>"/> </td>
						<td><input type="text" size="4" name="SatFat[<?php echo $pro_id;?>]" value="<?php echo $pro_SatFat;?>"/> </td>
						<td><input type="text" size="4" name="Chol[<?php echo $pro_id;?>]" value="<?php echo $pro_Chol;?>"/> </td>
						<td><input type="text" size="4" name="Sodium[<?php echo $pro_id;?>]" value="<?php echo $pro_Sodium;?>"/> </td>
						<td><input type="text" size="4" name="Carbohydrate[<?php echo $pro_id;?>]" value="<?php echo $pro_Carbohydrate;?>"/> </td>
							<input type="hidden" name="itemid[]" value="<?php echo $pro_id;?>">
					<td ><input type="submit" style=" background:url(images/delete.png);  background-repeat: no-repeat; width:90px; height:25px;text-indent:90px; overflow:hidden;" name="deleteid" value="<?php echo $pro_id;?>" /></td>
					<td ><input type="submit" style=" background:url(images/update_button.gif);  background-repeat: no-repeat; width:90px; height:28px;text-indent:90px; overflow:hidden;"  name="update_basket" value="<?php echo $pro_id;?>" /></td>
						</tr>
						
						
						<?php 
							 
						   }
		
		?>
		
						
		<tr align="center">
						<td colspan="15" ><input id="button2" type="submit" name="update_basket" value="Update All Rows Of Menu" style='color:#f9f9f9;font-size:23px;font-weight:bolder;text-align: center;'/> <br> <br></td>
						
					
					
						</tr>
						
						
                     </table>
				</form>
				<?php 
				
				if(isset($_POST['deleteid'])){
					 require ("Model/Credentials.php");
				$ip=getIp();
mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);		
		$remove_id=$_POST['deleteid'];
			
						$delete_item="delete from menu where prodid='$remove_id'";
					 $res = mysql_query($delete_item);
					 if($res){ 
					 echo "<script>alert('Product Deleted successfully  ')</script>";
					 echo "<script> window.open('DeleteProduct.php','_self')</script>";
					
					 }
				
				}
				
				if(isset($_POST['update_basket'])){
					 require ("Model/Credentials.php");
				$ip=getIp();
mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);		
		if(isset($_POST['itemid'])){
		foreach($_POST['itemid'] as $item_id){
			 $name=$_POST['name'][$item_id];
				 $type=$_POST['type'][$item_id];
				  $single_price=$_POST['price'][$item_id];
				  $size=$_POST['size'][$item_id];
				 $servingsize=$_POST['ServingSize'][$item_id];
				 $calories=$_POST['Calories'][$item_id];
				 $CalFromFat=$_POST['CalFromFat'][$item_id];
				 $TotalFat=$_POST['TotalFat'][$item_id];
				 $SatFat=$_POST['SatFat'][$item_id];
				 $Chol=$_POST['Chol'][$item_id];
				 $Sodium=$_POST['Sodium'][$item_id];
				 $Carbohydrate=$_POST['Carbohydrate'][$item_id];
				
					$update_item="UPDATE `menu` SET `name` = '$name', `type` = '$type', `price` = '$single_price', `size` = '$size',`ServingSize` = '$servingsize', `Calories` = '$calories', `CalFromFat` = '$CalFromFat', `TotalFat` = '$TotalFat', `SatFat` = '$SatFat', `Chol` = '$Chol', `Sodium` = '$Sodium', `Carbohydrate` = '$Carbohydrate' WHERE prodid= '$item_id'";
					 $res2 = mysql_query($update_item);
					 if($res2){ 
					 
				echo "<script>alert('Product updated successfully  ')</script>";
					 echo "<script> window.open('DeleteProduct.php','_self')</script>";
					 }
				}
				}
				}
							
				
				?>
            </div>
        
           <div id="contentsidebardeleteProd">
			<br><br><br><br><br><br>
			<div id="sidebar_title">Categories </div>
             <ul id="sidebar_text"><li><a href="CustomerOrderDetails.php" style='text-decoration:none;'>Order Details </a><br><br><br></li>
			 <li> <a href="AddProductByAdmin.php"  style='text-decoration:none;'>Add Product to the menu</a><br><br><br></li>
			   <li><a href="DeleteProduct.php" style='text-decoration:none;'>Delete or update a Product from the menu </a><br><br><br></li>
			     <li><a href="AdminFunctionality.php" style='text-decoration:none;'>Go back to menu </a></li>
			   </ul>	
			   </div>
            
           <footer id="cFtr2">
			
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
