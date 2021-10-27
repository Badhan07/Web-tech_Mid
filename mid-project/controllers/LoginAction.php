   <?php

		$handle = fopen("data.json", "r");
		$data = fread($handle, filesize("data.json"));
	?>


	<?php
        
		$explode = explode("\n", $data);


	
	?>


	<?php

		$arr= array();
		for ($i = 0; $i < count($explode)-1; $i++)
		{
			$json=json_decode(($explode[$i]));
			array_push($arr, $json);
		}
	?>
  
	<?php

		if($_SERVER['REQUEST_METHOD'] === "POST" and count($_REQUEST)>0)
		{
			$bool=false;
			$index="";
			$username=$_POST['username'];
			
			for($k = 0;$k< count($arr); $k++)
			{
				if(($_POST['username'] === $arr[$k]-> username) and ($_POST['password'] === $arr[$k]-> password) )
				{
					$bool=true;
					$index=$k;
					
				}

             
			}
			//$firstName=$arr[$index]->firstName;
           /* $lastName=$arr[$index]->lastName;
            $gender=$arr[$index]->gender;
            $date=$arr[$index]->dateOfBirth;
            $religion=$arr[$index]->religion;
            $presentAddress=$arr[$index]->presentAddress;
            $permanentAddress=$arr[$index]->permanentAddress;
            $phone=$arr[$index]->phone;
            $email=$arr[$index]->email;
            $personalWebsiteLink=$arr[$index]->personalWebsiteLink;*/
           

			if ($bool)
			{
				session_start();
                 $_SESSION['username']=$username;
                 $_SESSION['firstName']=$arr[$index]->firstName;
                 $_SESSION['lastName']=$arr[$index]->lastName;
                 $_SESSION['gender']= $arr[$index]->gender;
                 $_SESSION['dateOfBirth']= $arr[$index]->dateOfBirth;
                 $_SESSION['religion']=$arr[$index]->religion;
                 $_SESSION['presentAddress']=$arr[$index]->presentAddress;
                 $_SESSION['permanentAddress']=$arr[$index]->permanentAddress;
                 $_SESSION['phone']=$arr[$index]->phone;
                 $_SESSION['email']=$arr[$index]->email;
                 $_SESSION['personalWebsiteLink']=$arr[$index]->personalWebsiteLink;
				header("Location:home.php");
			}

			else {
				echo "Login failed.";
				echo"<br>";
				echo "Please fill up the form properly";
			}

		}

	?>
    
    
