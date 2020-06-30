<?php 
    session_start();
    if(!isset($_SESSION['email_name']))
    {
        header('location:login.php');
    }
                            
    $email=$_SESSION['email_name'];
    $file = fopen("DB_Files/user.txt", "r");
    $name='';
    while(!feof($file))
    {  
        $lines=fgets($file);
        if(!empty($lines)){
            $arr=explode("|",$lines);
            $email_value=$arr[2];
            $name_value=($arr[1]);
            
            if((strcmp($email_value,$email))==0)
            {
                $name=$name_value;
            }    
        }
        
    }
    fclose($file);
?>
<!doctype html>
<html lang="en">
    <head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
        <style>
            .btn
            { 
                border-radius: 0; 
            }
            .navar_focus_logo{
                box-shadow: 0 0 10px 1px rgb(86, 8, 94,0.9);
            }
            .user_name{
                box-shadow: 0 0 5px 1px rgb(86, 8, 120,0.2);
            }
            body{
                background-image: url(bg1.png); 
            } 
            .view-answer{
                box-shadow: 0 0 20px 1px rgb(11, 20, 180 ,0.5) inset;
                border-color:MediumSeaGreen ;
                color:white;
                background-color: MediumSeaGreen; 
                border-radius: 50px;
            }  
            .dropdown-css {
                position: relative;
                display: inline-block;
            }

            .dropdown-content-css {
              border-radius: 5px;
              margin-left: 60px;
              margin-top:2px;
              display: none;
              position: absolute;
              background-color:HoneyDew;
              min-width: 100px;
              box-shadow: 2px 2px 5px 3px rgba(0,0,0,0.4);
              padding: 7px 16px;
              z-index: -1;
            }

            .dropdown-css:hover .dropdown-content-css {
              display: block;
            }
        </style>
        <script src="https://kit.fontawesome.com/ce07d5443f.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header >
            <nav class="navbar fixed-top navbar-expand-md navbar-info  scrolling-navbar" style="background-color: #ee6e73; box-shadow: -1px 3px 2px -2px rgba(0,0,0,.8);">
                  <a class="navbar-brand p-1 " href="home.php">
                    <img  class="rounded-circle navar_focus_logo" src="image/logo.jpg" height="40" alt="mdb logo">
                </a>
                    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item px-2">
                            <div class=" dropdown-css">
                                <button class="nav-link  rounded-pill  py-1 px-2  user_name" type="button" style="letter-spacing: .1rem;font-size: 16px;color: white;font-weight: bold; background-color: transparent;border: none;"> <i class="fas fa-home" style="color:"></i>
                                    <?php
                                        echo $name;
                                    ?>
                                </button>
                                <div class="dropdown-content-css">
                                    <a href="logout.php" class=" text-dark">
                                        <strong style="font-size: 14px">
                                            Logout&nbsp;<i class="fas fa-sign-out-alt" style="color:crimson;font-size: 14px"></i>  
                                        </strong>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
            </nav>
        </header>
        <br><br><br>

            <!-- Modal QSTN BOX -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                Ask Your Question
                                <strong class="text-info">
                                    <?php 
                                        echo $name;
                                    ?>
                                </strong> 
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-danger " aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <div class="container"> -->
                            <form action="question.php" method="POST" class="was-validated" id="form_modal">
                                <div class="mb-3">
                                    <!-- <label class="text-info" for="validationTextarea">Post Your question here</label> -->
                                    <textarea  name="para" class="form-control is-invalid" id="validationTextarea" placeholder="Post Your Question here....." rows="4" required></textarea>
                                </div>
                                

                                <div class="form-group">
                                    <select class="custom-select" name="option" required>
                                        <option value="">Select the Channel</option>
                                        <option value="1">Internships & Jobs</option>
                                        <option value="2">Web Development</option>
                                        <option value="3">App Development</option>
                                        <option value="4">Machine Learning</option>
                                        <option value="5">Big Data</option>
                                    </select>
                                </div>
                            


                            </form>
                        </div>
                        <div class="modal-footer bg-light">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="box-shadow: 2px 3px 5px -1px rgb(0,0,0 ,0.8) ;">Close</button>
                            <button type="submit" name="submit" form="form_modal"class="btn btn-success" style="box-shadow: 2px 3px 5px -1px rgb(0,0,0 ,0.8);">Post</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL QSTN BOX END HERE -->
            <div class="container-fluid">
                <div class="row">        
                    <!-- CHANNEL LIST START HERE -->
                    
                    <div class="col-md-3 mt-3" style="position:"> 
                        <div class="list-group">
                            <button type="button" class=" btn btn-teal btn-lg text-center" data-toggle="modal" data-target="#exampleModalCenter" style="background-color: #00897b">
                                <strong style="letter-spacing: 1px;color: white;font-size: 22px;padding-right:20px">Ask a Question  &nbsp;<i class="fas fa-comment-dots" style="margin-top: 6px;color:AliceBlue"></i></strong>
                            </button> 
                        </div>
                        <table class="table table-bordered " style="box-shadow: 1px 3px 5px -2px rgba(0,0,0,.5);">
                            <tbody>
                                
                                <?php 
                                    $file = fopen("DB_Files/channel.txt", "r");
                                    while(!feof($file))
                                    {  
                                        $lines=fgets($file);
                                        if(!empty($lines))
                                        {
                                            $arr=explode("|",$lines);
                                            $channel_name=$arr[1];
                                ?>  
                                    <tr>
                                        <td style="font-size: 19px;padding-left:30px;letter-spacing: 1px;color: Teal" class="">
                                            <?php
                                                echo $channel_name;
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                        }
                                    }
                                ?>    
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <div class="col-md-9 mt-3">
                    <!-- CHANNEL LIST END HERE.. -->
                    <?php
                                               
                        // define how many results you want per page
                        $results_per_page = 4;

                        // determine which page number visitor is currently on
                        
                        if (!isset($_GET['page']))
                        {
                            $page = 1;
                        } 
                        else 
                        {
                            $page = $_GET['page'];
                        }

                        // determine the sql LIMIT starting number for the results on the displaying page
                        $start_from = ($page-1)*$results_per_page;
                        
                        $arr=array();
                        $question_fhand=fopen("DB_Files/question.txt","r");
                        while(!feof($question_fhand))
                        {
                            $lines_que=fgets($question_fhand);
                            if(!empty($lines_que))
                            {
                                array_push($arr,$lines_que);
                            }           
                        }
                        $arr=array_reverse($arr);
                        // $arr=file("DB_Files/question.txt");
                        $temp_count=0;
                        $i=$start_from;
                        $name_of_user='';
                        while($temp_count<$results_per_page)
                        {
                            
                            if(!empty($arr[$i]))
                            {
                                $lines=$arr[$i];
                                $question_array_line=explode("|",$lines);
                                $user_id=chop($question_array_line[2]);
                                $question_id=$question_array_line[0];
                                $question_para=$question_array_line[1];  
                                $file_user = fopen("DB_Files/user.txt", "r");
                                while(!feof($file_user))
                                {  
                                    
                                    $lines_user=fgets($file_user);
                                    if(!empty($lines_user))
                                    {
                                        $arr_user=explode("|",$lines_user);
                                        $user_value=chop($arr_user[0]);
                                        if((strcmp($user_id, $user_value))==0)
                                        {
                                            $name_of_user=$arr_user[1];
                                            break;
                                        }    
                                    }
                                }    
                                fclose($file_user);
                    ?>
                      
                         <div class="alert alert-primary  " role="alert" style="box-shadow:2px 2px 3px -1px rgba(0,0,0,.8);">
                            <?php
                                echo "<a href='answer.php?id=$question_id' class='btn btn-outline-success  float-right view-answer' ><strong>view Answers</strong></a>";
                            ?>
                            <h4 class="alert-heading" style="letter-spacing: 1px;"><i class="fas fa-id-card "style="font-size: 23px"></i>
                                <?php
                                    echo $name_of_user;
                                ?>                                
                            </h4>
                            <hr>
                            <p class="mb-0" style="font-size: 16px">
                                <?php
                                    echo $question_para;
                                ?>
                            </p>
                        </div>
                    <?php
                            }
                            $i=$i+1;
                            $temp_count=$temp_count+1;

                        }
                        
                        ?>
                        <nav aria-label="Page navigation mt-0 " >
                            <ul class="pagination  justify-content-center ">
                                <?php

                                    // find out the number of results stored in database
                                        $linecount = 0;
                                        $handle = fopen("DB_Files/question.txt", "r");
                                        while(!feof($handle))
                                        {
                                            $line_temp = fgets($handle);
                                            $linecount++;
                                        }
                                        $linecount--;
                                    // determine number of total pages available
                                        $total_page = ceil($linecount/$results_per_page);
                                    // display the links to the pages
                                        for ($i=1;$i<=  $total_page;$i++)
                                        {
                                        ?>
                                            <li class="page-item">
                                                <?php 
                                                    echo "<a  href='home.php?page=$i' class='page-link'>$i</a>"; 
                                                ?>
                                            </li>
                                        <?php
                                        }
                                        ?>
                            </ul>
                        </nav>    
                    </div>
                </div>
            </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
    </body>
</html>            
                       