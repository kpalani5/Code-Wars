<html>
	<head>
		<title> CODE WARS PRELIMS </title>
		
		<style type = "text/css">
			pre {
			font-family: "Times New Roman", Times, serif;
			}
			
			body {
				background-color:F0FFFF;
			}
			
			hr {
				background-color: red;
				height : 2px;
				position : relative;
				right : 60px;
			}
			
			#timer {
				border: 2px solid;
				color : blue;
				font-size: 60px;
				
				position : fixed;
			}
			
			#maindiv{
				position : relative;
				left:60px;
			}
			
			#txt {
				height : 30px;
				width : 200px;
			}
			
		</style>
		
		<script type = "text/javascript">
			var myEvent = window.attachEvent || window.addEventListener;
			var chkevent = window.attachEvent ? 'onbeforeunload' : 'beforeunload'; 

			myEvent(chkevent, function(e) { 
				var confirmationMessage = 'If you have clicked the submit button and want to submit, click LEAVE THIS PAGE. Otherwise STAY ON THIS PAGE';  
				(e || window.event).returnValue = confirmationMessage;
				return confirmationMessage;
			});
		 
		var seconds=20
		var minute=0
		document.Quiz.d2.value='30' 

	function display(){ 
		if (seconds<=0){ 
			seconds=60
			minute-=1 
		} 
		if (minute<=-1){

			var myForm = document.forms.Quiz;
			var myControls = myForm.elements['ans[]'];
			for (var i = 0; i < myControls.length; i++) {
				var aControl = myControls[i];
				aControl.disabled=true;
			}
			seconds=0 
			minutes+=1 
			
		}		 
		else 
			seconds-=1 
		if(seconds<10)
			document.Quiz.d2.value=minute+" : 0"+seconds 
		else
			document.Quiz.d2.value=minute+" : "+seconds
		setTimeout("display()",1000) 
	} 
	
	function enable() {
		var myForm = document.forms.Quiz;
			var myControls = myForm.elements['ans[]'];
			for (var i = 0; i < myControls.length; i++) {
				var aControl = myControls[i];
				aControl.disabled=false;
			}
	}
	
	function remtime() {
		return document.Quiz.d2.value;
	}
</script>
	</head>
	
	<body onload="display()">
	<h1> <center> CODE WARS </center> </h1>
	<form action="result.php" method = "POST" onsubmit="enable()" id="Quiz" name="Quiz">
	<div align="center">
		<input type="text" size="8" name="d2" id="timer">
	</div>
		<br>
		<div id="maindiv">
		<?php
			
			function qn_check($qns,$n) {
				$ln=count($qns)-1;
				for($x=0;$x<$ln;$x++) {
					if($qns[$x] == $n)
						return true;
				}
				return false;
			}
			
			$qns[0]=rand(52,85);
			for($i=1;$i<5;$i++) {
				$qns[$i] = rand(52,85);
				while (qn_check($qns,$qns[$i])) {
					$qns[$i] = rand(52,85);
				}
			}
			
			$qns[5]=rand(26,51);
			for($i=6;$i<10;$i++) {
				$qns[$i] = rand(26,51);
				while (qn_check($qns,$qns[$i])) {
					$qns[$i] = rand(26,51);
				}
			}
			
			$qns[10]=rand(1,25);
			for($i=11;$i<15;$i++) {
				$qns[$i] = rand(1,25);
				while (qn_check($qns,$qns[$i])) {
					$qns[$i] = rand(1,25);
				}
			}
			
			
			$con=mysqli_connect("localhost","root","karthikp","codewars");
			if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			?>
			
			
			<?php
			for($x=0;$x<15;$x++) {
				$y = $x + 1;
				echo "$y. ";
				$result = mysqli_query($con,"SELECT * FROM questions where num=$qns[$x]");
				while($row = mysqli_fetch_array($result)) {
					echo "<strong><pre>";
					echo $row['qn'];
					echo "</pre></strong>";
					echo "<br>";
					
					if($row['opt1']!="")
					{
					echo "<u><p><strong> OPTIONS </strong></p></u>";
					echo "<pre>A. ";
					echo $row['opt1'];
					echo "</pre>";
					//echo "<br>";
					}
					if($row['opt2']!="")
					{
					echo "<pre>B. ";
					echo $row['opt2'];
					echo "</pre>";
					//echo "<br>";
					}
					if($row['opt3']!="")
					{
					echo "<pre>C. ";
					echo $row['opt3'];
					echo "</pre>";
					//echo "<br>";
					}
					if($row['opt4']!="")
					{
					echo "<pre>D. ";
					echo $row['opt4'];
					echo "</pre>";
					echo "<br>";
					}
					echo "<strong><br>Type your answer here: </strong>";
					if($row['opt4']!="")
						echo "<input type = \"text\" name=\"ans[]\" id=\"txt\" autocomplete=\"off\" maxlength=\"1\">";
					else
						echo "<input type = \"text\" name=\"ans[]\" id=\"txt\" autocomplete=\"off\">";
					$qval = $qns[$x];
					echo "<input type = \"hidden\" name=\"qns[]\" value=\"$qval\">";
					echo "<hr><br>";
				}
			}
			$pid1 = $_POST["pid1"];
			echo "<input type = \"hidden\" name= \"pid1\" value = \"$pid1\">"; 
			$pid2 = $_POST["pid2"];
			echo "<input type = \"hidden\" name= \"pid2\" value = \"$pid2\">"; 
			$cname = $_POST["cname"];
			echo "<input type = \"hidden\" name= \"cname\" value = \"$cname\">"; 
			$cno = $_POST["cno"];
			echo "<input type = \"hidden\" name= \"cno\" value = \"$cno\">"; 
			echo "<center><input type = \"submit\" value=\"SUBMIT\"></center>";
			echo "</form>";
			
			mysqli_close($con);
		?>
		</div>
	</body>
</html>