<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
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
				<table class='NutritionTable' style='font-size:16px;
 font-weight:bolder;' >
						<tr bgcolor="#009900">
						<th  colspan="2"> <a href="index.php"> <img alt="WestLoop Mart" src="../images/Logo.png"/></a></th>
						<th colspan='8' style='color:#f9f9f9;font-size:23px;font-weight:bolder;text-align: center;'>US  NUTRITION INFORMATION Feb 2016</th>
						</tr>
						<tr bgcolor="#ffcc00"><th style='height: 70px; text-align:center;'  >SANDWICHES </th>
							<th >ServingSize(g): </th>
							 <th>Calories:	</th>
							<th>Cal.FromFat: </th>
							 <th>TotalFat(g): </th>
							 <th>Sat.Fat(g): </th>
							  <th>Chol.(mg): </th>
							   <th>Sodium(mg): </th>
							   <th>Carbohydrate(g): </th>
							   
							</tr>
                <?php  
				


 require ("Model/Credentials.php");
 mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
		 $query = "SELECT * FROM menu";
        $result = mysql_query($query) or die(mysql_error());
		$flag=0;
 while($row=mysql_fetch_array($result)){
 $name=$row['name'];
 $price=$row['price'];
 $type=$row['type'];
 $size=$row['size'];
 $image=$row['image'];
 $ServingSize=$row['ServingSize'];
 $Calories=$row['Calories'];
 $CalFromFat=$row['CalFromFat'];
 $TotalFat=$row['TotalFat'];
 $SatFat=$row['SatFat'];
 $Chol=$row['Chol'];
 $Sodium=$row['Sodium'];
 $Carbohydrate=$row['Carbohydrate'];
if($flag==0){
$flag=1;
 ?>
 
					<tr bgcolor="#53ff1a" style='text-align:center;'>
                            <td style='height: 50px;text-align:center;'><a href=""><?php echo "$name";?><span>
						
							<table style='width:550px;table-layout:fixed;'>
							<tr ><b >	Product information</b><th rowspan="4"><img runat = 'server' src ="<?php echo $image;?>" id='coffeeTableimage2'> </th><th >Name :</th>
                            <td ><?php echo "$name";?></td></tr>
							
                        <tr>
                            <th>Price :</th>
                            <td><?php echo "$price";?></td>
                        </tr>
                        
                        <tr>
                            <th>Type : </th>
                            <td><?php echo "$type";?></td>
                        </tr>
                        
                        <tr>
                            <th>Size : </th>
                            <td><?php echo "$size";?></td>
                        </tr>
						
							
						</table></span></a></td>
							<td ><?php echo "$ServingSize";?></td>
							<td ><?php echo "$Calories";?></td>
							<td ><?php echo "$CalFromFat";?></td>
							<td ><?php echo "$TotalFat";?></td>
							<td ><?php echo "$SatFat";?></td>
							<td ><?php echo "$Chol";?></td>
							<td ><?php echo "$Sodium";?></td>
							<td ><?php echo "$Carbohydrate";?></td>
                        </tr>
 
					
 <?php
 }
 else{
	 $flag=0;
	 ?>
	 <tr bgcolor="#009900" style='text-align:center;'>
                           <th style='height: 50px;text-align:center;'><a href=""><?php echo "$name";?><span>
						
							<table style='width:550px;table-layout:fixed;'>
							<tr ><b >	Product information</b><th rowspan="4"><img runat = 'server' src ="<?php echo $image;?>" id='coffeeTableimage2'> </th><th >Name :</th>
                            <td ><?php echo "$name";?></td></tr>
							
                        <tr>
                            <th>Price :</th>
                            <td><?php echo "$price";?></td>
                        </tr>
                        
                        <tr>
                            <th>Type : </th>
                            <td><?php echo "$type";?></td>
                        </tr>
                        
                        <tr>
                            <th>Size : </th>
                            <td><?php echo "$size";?></td>
                        </tr>
						
							
						</table></span></a></th>
							<td ><?php echo "$ServingSize";?></td>
							<td ><?php echo "$Calories";?></td>
							<td ><?php echo "$CalFromFat";?></td>
							<td ><?php echo "$TotalFat";?></td>
							<td ><?php echo "$SatFat";?></td>
							<td ><?php echo "$Chol";?></td>
							<td ><?php echo "$Sodium";?></td>
							<td ><?php echo "$Carbohydrate";?></td>
                        </tr>
 
	 <?php
 }
 }

 ?>
				
				</table>
				
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
