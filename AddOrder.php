<?php

require ("Model/Credentials.php");


//Output page data
$title = 'WestLoopMart';


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
			
			echo "<script>window.open('AddOrder.php','_self')</script>";
		
		}
	}
}

?>
