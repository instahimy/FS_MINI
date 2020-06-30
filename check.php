<?php
    session_start();
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $pass=$_POST['password'];
    
        $file = fopen("DB_Files/user.txt", "r");
        while(!feof($file))
        {  
            $lines=fgets($file);
            $arr=explode("|",$lines);
            $email_value=$arr[2];
            $pass_value=chop($arr[3]);
            
            // Check if the Email Entered  is Correct
            if ((strcmp($email,$email_value))==0)
            {
                //check if Password Matches
                if((strcmp($pass_value,$pass))==0)
                {
                    $_SESSION['email_name']=$email;
                    header('location:home.php');
                }
                else{
                    header('location:login.php');
                }
            }
        }    
        
        fclose($file);        

    }
?>