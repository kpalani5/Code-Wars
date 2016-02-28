
<?php

//$system=$_COOKIE["magic"];
$system=1;
$mysqli = new mysqli('mysql.ssn.net',"sympo-cse","srinath@cse","sympo-cse",3306);
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$sql='select * from cw_magic where system ='.$system;
//echo $sql;
$res = $mysqli->query($sql);

$bot1="";
$bot2="";

$bot3="";

while($obj = $res->fetch_object())
{	
$bot1=$obj->pid1;
$bot2=$obj->pid2;
}
$sql='delete from cw_magic where system ='.$system;
$mysqli->query($sql);

?>


<html>
	<head>
		<title> CODE WARS LOGIN </title>
		<style>
			table {
					position: absolute;
					left: 500px;
					top: 175px;
				}
			h3 {
				position : absolute;
				top: 550px;
				color : red;
			}
			body {
				background-color:F0FFFF;
			}
		</style>
	</head>
	<body>
		<h1> <center> CODE WARS PRELIMS </center> </h1>
		<form action = "rules.php" method = "post">
			<table frame = box>
				<tr> <td> <br> </td> </tr>
				<tr> <br> </tr>
				<tr> <td> PARADIGM ID 1 : </td> <td> <input type = "text" name = "pid1" value="<?php echo $bot1; ?>" required> </td> </tr>
				<tr> <td> <br> </td> </tr>
				<tr> <td> PARADIGM ID 2 : </td> <td> <input type = "text" value="<?php echo $bot2; ?>" name = "pid2" > </td> </tr>
				<tr> <td> <br> </td> </tr>
				<tr> <td> CONTACT NAME : </td> <td> <input type = "text" name = "cname" required> </td> </tr>
				<tr> <td> <br> </td> </tr>
				<tr> <td> CONTACT NUMBER : </td> <td> <input type = "text" name = "cno" required> </td> </tr>
				<tr> <td> <br> </td> </tr>
				<tr> <td colspan=2> <center> <input type = "submit" value = "LOGIN"> </center> </td> </tr> 
				<tr> <br> </tr>
				<tr> <td> <br> </td> </tr>
			</table>
			<br>
			<h3> WARNING : Do not attempt to refresh the window or go back during your session. If you have done so, click on STAY ON THIS PAGE. If you LEAVE THE PAGE you cannot retake the quiz. </h3>
		</form>
	</body>
</html>
