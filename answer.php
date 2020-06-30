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
    fclose($file)
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/jpg" href="logo.jpg">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <title>FS MINI</title>
        <link rel="shortcut icon" type="image/jpg" href="image/logo.jpg">
        <style>
            body{
                /*background-image: url(bg1.png);*/
                background-image: url(bg1.png); 
            } 
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
     
            .dropdown-css {
                position: relative;
                display: inline-block;
            }

            .dropdown-content-css {
              border-radius: 50px;
              margin-left: 60px;
              margin-top:4px;
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
        }
        </style>
        <script src="https://kit.fontawesome.com/ce07d5443f.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header >
            <nav class="navbar fixed-top navbar-expand-md navbar-info  scrolling-navbar" style="background-color:#ee6e73; box-shadow: -1px 3px 2px -2px rgba(0,0,0,.8);">
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
                                             Logout&nbsp;<i class="fas fa-sign-out-alt" style="color:crimson;font-size:14px"></i>
                                        </strong>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
            </nav>
        </header>
        <br><br><br>
            <div class="container-fluid">
                <div class="row">        
                    <!-- CHANNEL LIST START HERE -->
                    <div class="col-md-3 mt-3"> 
                        <div class="list-group">
                            <a HREF="home.php" type="button" class=" btn btn-success  btn-lg text-center" style="background-color:#00838f "  id="demo">
                                <strong style="letter-spacing: 1px;color: white"><i class="fas fa-arrow-circle-left"></i>&nbsp;Back to Dashboard</strong>
                            </a> 
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
                                        <td style="font-size: 19px;padding-left:30px;letter-spacing: 1px;color: " class="text-info">
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
                        </table><hr>
                        <button class=" btn btn-block btn-success btn-lg text-center" data-toggle="modal" data-target="#exampleModalCenter" style="box-shadow: 1px 3px 5px -2px rgba(0,100,0,.9);">
                            <strong>Reply here&nbsp; <i class="fas fa-comments"style="font-size:30px"></i></strong>
                        </button>

                        <!-- Question Model Box  -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            Post Your Answer
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
                                        <form action="reply.php" method="POST" class="was-validated" id="form_modal">
                                            <div class="mb-3">
                                                <textarea  name="reply_para" class="form-control is-invalid" id="validationTextarea" placeholder="Reply here....." rows="4" required></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-white">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" name="submit" form="form_modal"class="btn btn-success ">Post</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <br>
                    </div>
                    <div class="col-md-9 mt-3">
                    <!-- CHANNEL LIST END HERE.. -->
                    <?php
                        
                        // get the id of the question for which User wants to see the answer    

                        if (isset($_GET['id'])) 
                        {
                            $qstn_id = $_GET['id'];
                        }
                        else
                        {
                            $qstn_id=$_SESSION['clicked_qstn'];
                        }                         
                        $_SESSION['clicked_qstn']=$qstn_id;             
                        
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
                        $count_of_replies=0;

                        $arr=array();
                        $answer_fhand=fopen("DB_Files/replies.txt","r");
                        while(!feof($answer_fhand))
                        {
                            $lines_ans=fgets($answer_fhand);
                            if(!empty($lines_ans))
                            {
                                $arr_ans=explode("|",$lines_ans);
                                $questionID=$arr_ans[3];  
                                if(trim($questionID)==$qstn_id)
                                {
                                    array_push($arr,$lines_ans);
                                    // print_r($arr);
                                }
                            }
                                           
                        }
                        $arr=array_reverse($arr);
                        // print_r($arr);
                        // echo $arr[0];
                        // $arr=file("DB_Files/replies.txt");
                        $temp_count=0;
                        $i=$start_from;
                        $name_of_user='';
                        while(($temp_count<$results_per_page)&&($i<count($arr)))
                        {
                            if(!empty($arr[$i]))
                            {
                                $lines=$arr[$i];
                                $reply_array_line=explode("|",$lines);
                                $questionID=$reply_array_line[3];  
                                if(trim($questionID)==$qstn_id)
                                {
                                    $temp_count=$temp_count+1;
                                    // $count_of_replies=$count_of_replies+1;
                                    $user_id=chop($reply_array_line[2]);
                                    $reply_id=$reply_array_line[0];
                                    $reply_para=$reply_array_line[1];
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
                      
                        <div class="alert alert-success  " role="alert" style="box-shadow:2px 2px 3px -1px rgba(0,0,0,.8);">
                            <h4 class="alert-heading" style="letter-spacing: 1px;"><i class="fas fa-address-card" style="font-size: 23px"></i>
                                <?php
                                    echo $name_of_user;
                                ?>                                
                            </h4>
                            <hr>
                            <p class="mb-0" style="font-size: 16px">
                                <?php
                                    echo $reply_para;
                                ?>
                            </p>
                        </div>
                    <?php
                                }
                            }    
                            $i=$i+1;
                        }
                        if($temp_count==0)
                        {
                        ?>    
                            <script type="text/javascript">
                                    document.getElementById("demo").style.backgroundColor = "Crimson";
                                    document.getElementById("demo").style.borderColor = "Crimson";
                            </script>

                            <div class="card text-center p-3 mb-5 bg-white rounded py-5" style="box-shadow:2px 3px 5px -1px rgba(0,0,0,.8);">
                                <div class="card-body">
                                    <img src="https://previews.123rf.com/images/lkeskinen/lkeskinen1707/lkeskinen170708972/82453980-no-answer-rubber-stamp.jpg" height="250px" class="card-img-top" alt="...">
                                </div>
                            </div>    
                        
                        <?php
                        }
                        
                        ?>
                        <nav aria-label="Page navigation mt-0 ">
                            <ul class="pagination  justify-content-center  ">
                                <?php
                                    $K=0;
                                    $count_of_replies=0;
                                    while(($K<count($arr)))
                                    {
                                        if(!empty($arr[$K]))
                                        {
                                            $lines=$arr[$K];
                                            $reply_array_line=explode("|",$lines);
                                            $questionID=$reply_array_line[3];  
                                            if(trim($questionID)==$qstn_id)
                                            {
                                                $count_of_replies=$count_of_replies+1;
                                            }
                                        }
                                        $K=$K+1;
                                    }

                                    $total_page = ceil($count_of_replies/$results_per_page);
                                    
                                    // display the links to the pages
                                        for ($i=1;$i<=  $total_page;$i++)
                                        {
                                        ?>
                                            <li class="page-item">
                                                <?php 
                                                    echo "<a  href='answer.php?page=$i' class='page-link'>$i</a>"; 
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
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>            