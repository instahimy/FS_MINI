<?php
	session_start();
	if(isset($_POST['submit']))
	{
		$question_para= $_POST['para'];
		$channel=$_POST['option'];
		$InputEmail=$_SESSION['email_name'];
		$user_id=0;
		
		//open file in read mode for checking Email Entered is present or not
		$file = fopen("DB_Files/user.txt", "r");
		while(!feof($file))
		{  
  			$lines=fgets($file);
  			if(!empty($lines))
  			{
	  			$arr=explode("|",$lines);
	  			$email_value=$arr[2];
	  			if ($InputEmail==$email_value)
	  			{
	  				$user_id=$arr[0];
	  				break; 
	  			}	
  			}
		}
		fclose($file);

		//Counting the number of lines in a file
		$linecount = 0;
		$handle = fopen("DB_Files/question.txt", "r");
		while(!feof($handle))
		{
  			$line_temp = fgets($handle);
  			$linecount++;
		}
		$index=$linecount;
		fclose($handle);
		
		// Opening file to Insert the value to the database
		$myfile = fopen("DB_Files/question.txt", "a+");
		if($myfile)
		{
			
			$str=$index."|".$question_para."|".$user_id."|".$channel."\n";
			fwrite($myfile, $str);  	
			header('location:home.php');
		}
	}
?>