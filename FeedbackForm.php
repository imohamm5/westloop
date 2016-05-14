<?php 
$title= "FeedBackForm";
$content = '
<body background=/Images/Burger_bg.jpg >
<h2>We would Love Your Feedback</h2>
<img alt="" src="images/feedback.jpg"><p>Have a question or comment for WestLoopMart? Need additional information? <br/>
Fill out the form below, and we will get back to you at our earliest convenience!</p>
<form method="post" action="EmailProcess.php"> 
   Name: <input type="text" name="name" required="required">
   <br><br>
   E-mail: <input type="email" name="email" required="required">
   <br><br>
   Phone: <input type="text" name="phone" required="required">
   <br><br>
   Comment: <textarea name="comment" rows="5" cols="55" required="required"></textarea>
   <br><br>
   <br><br>
   <input type="reset" name="Reset" value="Reset">
   <input type="submit" name="submit" value="Submit"> 
</form>
</body>
';
include 'Template.php';
?>

