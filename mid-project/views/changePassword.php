<?php
    session_start();
    if (count($_SESSION)===0)
    {
      header("location:Logout.php");
    }
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Change Password </title>

</head>
 <?php
       include "header.php";
    ?>
<body>
	<h2>Reset Password Page:</h2>

  <center><a href="home.php">Home</a> &nbsp &nbsp <a href="Profile.php">Profile</a>&nbsp &nbsp <a href="changePassword.php">Change Password</a>&nbsp &nbsp</a>&nbsp &nbsp <a href="ReportFile.php">Report File</a>&nbsp  &nbsp<a href="Logout.php">Logout</a></center>
    <br>

	


  <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" method="POST">
  	<fieldset>
  		<legend><h2>Change Password</h2></legend>
  Previous Password:<input type="text"name="previousPassword"Placeholder="Previous Password"><br>
 <br>
  New Password:<input type="text"name="newPassword"Placeholder="New Password"><br>
  <br>
  <input type="submit"value="Submit">
</fieldset>
  </form>

  <?php
  include "../controllers/changePasswordAction.php";
  ?>
   
    
<br><br>
	
</body>
<?php
       include "footer.php";
    ?>
</html>