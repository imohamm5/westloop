
<html>
<head>
<script type="text/javascript">

function mover(img1)
{
document.getElementById("img1").style.height="250px";
document.getElementById("img1").style.width="300px";
}
function mout(img1)
{
document.getElementById("img1").style.height="170px";
document.getElementById("img1").style.width="100px";
}
</script>
</head>

<?php
		   function connect()
		   {
			  $dbhost='localhost';
			  $dbuser='root';
			  $dbpass='';
			  $conn= mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql'.mysql_error());
			  $dbname='test';
			  mysql_select_db($dbname);
			  return $conn;
		   }
?>

<body bgcolor="#0a1936">

<?php
$c=connect();
$query2="select images from styles";
$sql=mysql_query($query2);
$result2=mysql_num_rows($sql);  //25
$query="select path from styles "; //0 to 6
$result=mysql_query($query);									
echo '<table border="1" align="center" width="55%" height="60%" BORDERCOLOR="#C6C6C6" >';
	for($r=1;$r<=3;$r++)
	{
	  echo '<tr>';
	  for($d=1;$d<=3;$d++)
	  {
		 $obj=mysql_fetch_object($result);
		 $imageSrc=$obj->path;
		 $cimage="/images/".$obj->path;
		
		
echo '<td  border="1" width="15px" height="25px" id="img1" name="img1">
<img onmouseover="mover(img1)" onmouseout="mout(img1)" width="170px" height="100px" src='.$cimage.'>

</td>';
	  }	   
	  echo '</tr>';
	}
echo'</table>';

  ?>																	  
</body>
</html>
