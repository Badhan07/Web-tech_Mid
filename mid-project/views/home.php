<?php
  session_start();
   if (count($_SESSION)===0)
   {
     header("Location:Logout.php");
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=>, initial-scale=1.0">
    <title>Home</title>
</head>
<?php
       include "header.php";
    ?>
<body>
<h2>Home Page:</h2>
<center><a href="home.php">Home</a> &nbsp &nbsp <a href="Profile.php">Profile</a>&nbsp &nbsp <a href="changePassword.php">Change Password</a>&nbsp &nbsp</a>&nbsp &nbsp <a href="ReportFile.php">Report File</a>&nbsp  &nbsp<a href="Logout.php">Logout</a></center>    <br>

   <center><h2>Welcome</h2></center>
   <?php
   echo "<center>";
   echo "<p>";
   echo "<h3>";
   echo $_SESSION['username'] ;
   echo "</h3>";
   echo"</p>";
   echo "</center>";
   

   ?>
</body>
<?php
       include "footer.php";
    ?>
</html>