
<?php 
    session_start();
?>
<!DOCTYPE html>
    <html>
        <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css_m/materialize.min.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style type="text/css">
            body{
                background-image: url(https://img.freepik.com/free-vector/abstract-blue-geometric-shapes-background_1035-17545.jpg?size=626&ext=jpg);
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
                background-size: cover;
            }
            .center {
                margin: auto;
                width: 50%;
                border: 1px solid dodgerBlue;
                padding: 10px;
            }
            .img1 {
                border-radius: 150px;
                cursor: pointer;
                margin: 20px;
            }

            .img1:hover {
                box-shadow: 0 0 10px 1px rgb(86, 8, 94,0.9);
            }
            .alert {
                padding: 17px;
                background-color: transparent;
                color: white;
                opacity: 1;
                transition: opacity 0.6s;
                margin-bottom: 15px;
                border-radius: 50px;
            }

            .alert.success {color: #4CAF50;}
            .alert.info {background-color: #2196F3;}
            .alert.warning {background-color: #ff9800;}

            .closebtn {
                margin-left: 15px;
                color: black;
                font-weight: bold;
                float: right;
                font-size: 28px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }

            .closebtn:hover {
                color: DodgerBlue;
            }
        </style>
    </head>

    <body>
<nav>
            <div class="nav-wrapper" style="height: auto">
                <a href="index.html" class="brand-logo">
                    <img class="img1" src="image/logo.jpg" width="30%" height="auto" alt="" >
                </a>
            </div>
        </nav>
        <br><br>
        <div class="container ">    
                <?php
                    //$checking=$_SESSION['email_used'];
                    if(isset($_SESSION['email_used']))
                    {
                        ?>
                        <div class="alert z-depth-3 ">
                            <span class="closebtn">&times;</span>  
                            <center Style="font-size:17px;letter-spacing:2px;color:#dd2c00;">
                                <strong>Email Used..!!!! Please try to register With Different EmailID</strong>
                            </center>
                        </div>
                        <?php
                            unset($_SESSION['email_used']);
                            
                    }
                    //$checking=$_SESSION['registered'];
                    else if (isset($_SESSION['registered']))
                    {
                        ?>
                        <div class="alert success z-depth-3">
                            <span class="closebtn">&times;</span>  
                            <center Style="font-size:17px;letter-spacing:2px;color:#dd2c00;">
                                <strong>Successfully Registered..!!! Please, <a href="login.php">CLICK HERE</a> to Login</strong>
                            </center>
                        </div>

                        <?php
                            unset($_SESSION['registered']);
                    }
                ?>
        </div>  
        <div class="center z-depth-2">    
                    <div class="row">    
                        <form method="post" action="registration.php" class="col s12" onsubmit="return validation()">
                            <div class="row">
                                <div class="input-field col s10 ">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input  id="icon_prefix1" type="text" name="f_name" autocomplete="true">
                                    <label for="icon_prefix1">First Name</label>
                                    <span id="Spanname"> </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s10 ">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input  id="icon_prefix2" type="text" name="l_name" autocomplete="true" >
                                    <label for="icon_prefix2">Last Name</label>
                                    <span id="Spanlastname"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s10">
                                    <i class="material-icons prefix">email</i>
                                    <input id="icon_prefix3" type="email" name=email autocomplete="true">
                                    <label for="icon_prefix3">Email</label>
                                    <span id="Spanemail" class="text-danger font-weight-bold"> </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s10">
                                    <i class="material-icons prefix">security</i>
                                    <input id="icon_prefix4" type="password" name="pass">
                                    <label for="icon_prefix4">Password</label>
                                    <span id="Spanpassword" class="text-danger font-weight-bold"> </span>
                                </div>
                            </div>
                            <button class="btn waves-effect waves-light btn-large" type="submit" name="submit">
                                <strong style="font-size: 1.3rem;letter-spacing: 2px">Submit</strong>
                            </button>
                        </form>
                    </div>
                </div>
      <script type="text/javascript">
            var close = document.getElementsByClassName("closebtn");
            var i;
            for (i = 0; i < close.length; i++) {
                close[i].onclick = function(){
                    var div = this.parentElement;
                    div.style.opacity = "0";
                    setTimeout(function(){ div.style.display = "none"; }, 600);
                }
            }
      </script>>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js_m/materialize.min.js"></script>
    </body>
  </html>
        