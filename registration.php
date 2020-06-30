<?php
	session_start();
	if(isset($_POST['submit']))
	{
		$InputFName=$_POST['f_name'];
		$InputLName=$_POST['l_name'];
		$InputEmail=$_POST['email'];
		$InputPassword=$_POST['pass'];

		//open file in read mode for checking Email Entered is present or not
		$file = fopen("DB_Files/user.txt", "r");
		while(!feof($file))
		{  
  			$lines=fgets($file);
  			$arr=explode("|",$lines);
  			$email_value=$arr[2];
  			if ($InputEmail==$email_value)
  			{
  				 	fclose($file);
  				 	header('location:signup.php');
 	      			$_SESSION['email_used']="true";

  			}
		}
		fclose($file);

		//Counting the number of lines in a file
		$linecount = 0;
		$handle = fopen("DB_Files/user.txt", "r");
		while(!feof($handle))
		{
  			$line_temp = fgets($handle);
  			$linecount++;
		}
		$index=$linecount;
		fclose($handle);
		
		//Opening file to Insert the value to the database
		$myfile = fopen("DB_Files/user.txt", "a+");
		if($myfile)
		{
			
			$str=$index."|".$InputFName." ".$InputLName."|".$InputEmail."|".$InputPassword."\n";
			fwrite($myfile, $str);  	
			header('location:signup.php');
			$_SESSION['registered']="true";		
		}
	}
?>