<?php
$emailSubject='Feedback';
$webMaster="imran.mohammedcse@gmail.com";

$emailField = $_POST['email'];
$nameField = $_POST['name'];
$phoneField = $_POST['phone'];
$commentField = $_POST['comment'];

$body = <<<EOD
<br><hr><br>
Name : $nameField <br>
Email : $emailField <br>
Phone : $phoneField <br>
Comments : $commentField <br>
EOD;
$headers = "From : $emailField\r\n";
$headers .="Content-type:text/html\r\n";
$sucess=1; #mail($webMaster, $emailSubject, $body,$headers);
if($sucess) {
	echo '<body background="/Images/Burger_bg.jpg"> <h3 id="successMsg">Thank you '.$nameField.' for your interest ! your email will be answered very soon !</h3></body>';

} else {	
	die('Failure:Oops Email was not sent please try it later!');
}
$title="WestLoop Mart - Thanks and Regards !";
$content="";
include 'Template.php';


?>