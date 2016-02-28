<?php
if(isset($_POST["submit"])){
echo "boo";
$no=$_POST['Sysno'];
setcookie("magic",$no,  time() + (10 * 365 * 24 * 60 * 60) );
}
?>
<html>
<body>
<form class="form-4" style="" method="post" action="">
   <h1>Magic</h1>
   <p>
       <label for="bot1">System No</label>
       <input type="text" name="Sysno" placeholder="sys NO" value="Sysno" required >
   </p>

 <p>
       <input type="submit" name="submit">
   </p>   
</body>



