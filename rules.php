<html>
	<head>
		<title>CODE WARS PRELIMS</title>
		<style>
			body {
				background-color:FFE4B5;
				}
		</style>
	</head>
	<body>
		<h1><center> WELCOME, <?php
			$pid1 = $_POST["pid1"]; 
			$pid2 = $_POST["pid2"];
			echo "$pid1 AND $pid2 !"?></center></h1>
		<br>
		<br>
		<h3> RULES: </h3>
		<br>
		<ul>
			<li> The prelims consists of 15 questions. </li>
			<li> Time given to you is 20 minutes. </li>
			<li> Questions consists of MCQ type and Fill in the Blanks type. </li>
			<li> Enter the answer in the text box below the question - the option (A, B, C or D) for MCQ type and the value for Fill in the Blanks type. </li>
			<li> Click on the submit button once you have finished and click on LEAVE THE PAGE. If the time runs out, you cannot modify your answers. Click on submit. </li>
			<li> You are not allowed to use your phone or any other electronic devices during the event. Please keep your phones in silent mode. </li>
			<li> If you are found indulging in any form of malpractice, you will be prevented from taking part in the rest of the event. </li>
			<li> The decision of the organizers is final. </li>
			<li> You are allowed ONE sheet of paper for rough work. Use it carefully. </li>
			<li> SCORING : +3 for right answer, -1 for wrong answer, 0 if left unanswered. </li>
		</ul>
		<br>
		<br>
		<h4> CLICK ON THE START BUTTON TO BEGIN YOUR SESSION. THE TIMER WILL START ONCE YOU CLICK ON THE BUTTON. </h4>
		<br>
		<br>
		<form action = "questions.php" method = "post">
			<?php
			$pid1 = $_POST["pid1"];
			echo "<input type = \"hidden\" name= \"pid1\" value = \"$pid1\">"; 
			$pid2 = $_POST["pid2"];
			echo "<input type = \"hidden\" name= \"pid2\" value = \"$pid2\">"; 
			$cname = $_POST["cname"];
			echo "<input type = \"hidden\" name= \"cname\" value = \"$cname\">"; 
			$cno = $_POST["cno"];
			echo "<input type = \"hidden\" name= \"cno\" value = \"$cno\">"; 
			
			$con=mysqli_connect("localhost","root","karthikp","codewars");
			if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			if($pid2 == "")
				$sql=mysqli_query($con,"insert into loggedin(pid1,pid2) values (\"$pid1\",null)");
			else
				$sql=mysqli_query($con,"insert into loggedin(pid1,pid2) values (\"$pid1\",\"$pid2\")");
			?>
			<center><input type = "submit" value = "START"></center>
		</form>
	</body>
</html>
