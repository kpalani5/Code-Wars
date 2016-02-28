<html>
	<head>
		<title> CODE WARS PRELIMS </title>
		<style>
			body {
				background-color:FFE4B5;
			}
		</style>
	</head>
	<body>
		<?php
			$ans = $_POST["ans"];
			$qns = $_POST["qns"];
			$rtime = $_POST["d2"];
			echo "$rtime";
			$words = explode(':',$rtime);
			echo "<br><br>";
			$con=mysqli_connect("localhost","root","karthikp","codewars");
			if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$score = 0;
			echo "<center> <table border=1>";
			echo "<tr> <th> NUMBER </th> <th> QUESTION ID </th> <th> RESPONSE </th> <th> ANSWER </th> <th> RESULT </th> </tr>";
			for($x=0;$x<15;$x++) {
				$result = mysqli_query($con,"SELECT ans FROM questions where num=$qns[$x]");
				while($row = mysqli_fetch_array($result)) {
					$val=0;
					if($ans[$x] == "")
						$val = 0;
					else if ($ans[$x] == $row['ans'] || $ans[$x] == strtolower($row['ans']))
						$val = 3;
					else
						$val = -1;
					$score = $score + $val;
					$res = $row['ans'];
					$y = $x + 1;
					echo "<tr> <td> $y </td> <td> $qns[$x] </td> <td> $ans[$x] </td> <td> $res </td> <td> $val </td> </tr>";
				}
			}
			echo "</table> </center>";
			echo "<br><br><br>";
			echo "<center><h2>YOUR SCORE IS $score</h2></center>";
			$pid1 = $_POST["pid1"];
			$pid2 = $_POST["pid2"];				
			$cname = $_POST["cname"];
			$cno = $_POST["cno"];
			$sub = "Y";
			$rtime = $words[0] . "m" . $words[1] . "s";
			if($pid2 == "")
				$sql=mysqli_query($con,"insert into results(pid1,pid2,cname,cno,score,rtime,submitted) values (\"$pid1\",null,\"$cname\",\"$cno\",\"$score\",\"$rtime\",\"$sub\")");
			else
				$sql=mysqli_query($con,"insert into results(pid1,pid2,cname,cno,score,rtime,submitted) values (\"$pid1\",\"$pid2\",\"$cname\",\"$cno\",\"$score\",\"$rtime\",\"$sub\")");
			
		?>
	</body>
</html>