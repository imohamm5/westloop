<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login & Registration System</title>

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
    <body background='/Images/menu-bck.jpg'>
        
          
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
	
		
            <div id="content_area2">
              <form method="post" enctype="multipart/form-data" >
<table align="center"  border="1" class="additem">
<tr >
<th colspan='2' align="center" bgcolor='#4CAF50' >ADD A NEW PRODUCT <br><br></th>
</tr>
<tr><th>Enter Item Name</th>
<td><input type="text" name="name" placeholder="Enter Item Name" required /></td>
</tr>
<tr><th>Select Type</th>
<td><select name="type"  ><option>Select Type </option>
<option value="coldsubs">Coldsubs</option>
<option value="hotfood">Hotfood</option>
<option value="soup&side">Soup And Side</option>
<option value="beverages">Beverages</option>
</select></td></td>
</tr>
<tr><th>Enter Price</th>
<td><input type="text" name="price" placeholder="Enter Price" required /></td>
</tr>
<tr><th>Select size</th>
<td><select name="size"  ><option>Select size </option>
<option value="Small">Small</option>
<option value="Medium">Medium</option>
<option value="Large">Large</option>
</select></td>
</tr>
<tr><th>Upload Image</th>
<td><input type="file" name="userfile"/></td>
</tr>
<tr><th>Serving Size</th>
<td><input type="text" name="servingsize" placeholder="Enter Serving size" required /></td>
</tr>
<tr><th>Calories</th>
<td><input type="text" name="Calories" placeholder="Enter Calories" required /></td>
</tr>
<tr><th>Cal From Fat</th>
<td><input type="text" name="CalFromFat" placeholder="Enter CalFromFat" required /></td>
</tr>
<tr><th>TotalFat</th>
<td><input type="text" name="TotalFat" placeholder="Enter TotalFat" required /></td>
</tr>
<tr><th>SatFat</th>
<td><input type="text" name="SatFat" placeholder="Enter SatFat" required /></td>
</tr>
<tr><th>Cholesterol</th>
<td><input type="text" name="Chol" placeholder="Enter Cholestrol" required /></td>
</tr>
<tr><th>Sodium</th>
<td><input type="text" name="Sodium" placeholder="Enter Sodium" required /></td>
</tr>
<tr><th>Carbohydrate</th>
<td><input type="text" name="Carbohydrate" placeholder="Enter Carbohydrate" required /></td>
</tr>

<tr>
<td colspan='2' align='center'><button id="button2" type="submit" name="btn-signup">Submit</button></td>
</tr>
</table>
</form>
			  
            </div>
        <?php
 require ("Model/Credentials.php");
mysql_connect($host, $user, $passwd) or die(mysql_error);
        mysql_select_db($database);
if(isset($_POST['btn-signup']))
{
 $name=$_POST['name'];
 $type =$_POST['type'];
 $price =$_POST['price'];
 $size =$_POST['size'];
 $uploaddir = 'images/Coffee/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
$servingsize=$_POST['servingsize'];
$Calories =$_POST['Calories'];
$CalFromFat =$_POST['CalFromFat'];
$TotalFat =$_POST['TotalFat'];
$SatFat =$_POST['SatFat'];
$Chol =$_POST['Chol'];
$Sodium =$_POST['Sodium'];
$Carbohydrate =$_POST['Carbohydrate'];




 if(mysql_query("INSERT INTO menu(name,type,price,size,image,servingsize,Calories,CalFromFat,TotalFat,SatFat,Chol,Sodium,Carbohydrate) VALUES('$name','$type','$price','$size','$uploadfile','$servingsize','$Calories','$CalFromFat','$TotalFat','$SatFat','$Chol','$Sodium','$Carbohydrate')"))
 {

  ?>
        <script>alert('Product Added successfully  ');</script>
		<script>window.open('AddProductByAdmin.php','_self')</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('error while Inserting the product ...');</script>
		<script>window.open('AddProductByAdmin.php','_self')</script>
        <?php
 }
}
?>
            <div id="contentsidebardeleteProd4">
			<br><br><br><br><br><br>
			<div id="sidebar_title">Categories </div>
             <ul id="sidebar_text"><li><a href="CustomerOrderDetails.php" style='text-decoration:none;'>Order Details </a><br><br><br></li>
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
