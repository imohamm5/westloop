<?php
$title = "WestLoopMart";
$content = '
        
        <h3>About</h3>
        <p>
            Check out whats new and get updates on promotions at your favorite Westloop Mart. 
			You can even win free food in our weekly contests. Started on October 10,2013 - WestLoop Mart has continued
            the successful journey of serving our customers with pleasure. Subs come in all sizes and shapes, fresh salads 	
            keep our customers in a great health.  			
        </p>

        <img src="Images/satisfaction.jpg" class="imgRight" />
        <h3>Mission</h3>
        <p>
            Delight every customer so they want to tell their friends about this great value through 
			fresh, delicious, made-to-order sandwiches, and an exceptional experience.
         </p>

         <img src="Images/banner.png" class="imgLeft" /><br>
         <div id="paraLeft">
		 <h3 >Description</h3>
         <p>
            Westloop Mart party trays are ideal for business meetings, birthdays, any special occasion. 
			Westloop Mart can cater sub sandwiches, pasta or even salads and desserts. Your local Westloop Mart 
			can suggest menu for your occasion.
			
			Each sub platter is freshly sliced with your choice of deli meats and freshly baked bread. 
			Each sub party tray is served with all the fresh veggies and condiments you need to dress your
			favorite subs.
			
			Call your local Westloop Mart today and let us help cater your next event! Big or small, 
			we cater it all! 
         </p>
		 </div>
		 '
		 
		 
		 
		 
		
		
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
		
    <link rel="stylesheet" type="text/css" href="Styles/Stylesheet.css" />
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

	 <script type ="text/javascript">
	 function Slider(){
	 
	 $(".slider #1").show("fade",1000);
     $(".slider #1").delay(2000).hide("fade",1000);
	 
	 var scount =$(".slider img").size();
	 var count =2;
	 setInterval(function(){
	 $(".slider #"+count).show("fade",1000);
	 $(".slider #"+count).delay(2000).hide("fade",1000);
	 
	 if(count==scount){
	 count=1;
	 }
	 else{
	 count=count+1;
	 }
	 },2000);
	 };

	 
	 </script>
	</head>
    <body onload="Slider();">
        
		
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
		<li id="visit-twitter" class="hovDown"><a class="sn" href="https://www.twitter.com/LoopMart" target="_blank" style="top: -50px;">Visit Twitter</a></li>
	</ul>
            </div>
			<!-- images are been refered from the google website-->
            <div class ="slider">
			<img id="1" src="/images/front.png" border="0" alt=""/>
			<img id="2" src="/images/img_grillers.png" border="0" alt=""/>
			<img id="3" src="/images/twisted_turkeyWeb_2.jpg" border="0" alt=""/>
			<img id="4" src="/images/WebFavoriteSubCombos.jpg" border="0" alt=""/>
			<img id="5" src="/images/smslider_classics3.jpg" border="0" alt=""/>
			</div>
            
  <div class="bgholder">	   
<div id="holder">
       
            <div id="content_area">
                <?php echo $content; ?>
            </div>
	</div>		
</div>

     

		<div id="sidebar">
                
            </div>
          
            <footer id="cFtr1">
			
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



		

