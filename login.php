
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
        <div class="center z-depth-2">    
                    <div class="row">    
                        <form method="post" action="check.php" class="col s12"">
                            <BR>                           
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">email</i>
                                    <input id="icon_prefix3" type="email" name=email required autocomplete="true">
                                    <label for="icon_prefix3">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">security</i>
                                    <input id="icon_prefix4" type="password" name="password" required>
                                    <label for="icon_prefix4">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <label style="float:left;margin-left: 30px;margin-bottom: 10px;padding-top:0px;"  >
                                    <input type="checkbox" onclick="passVisibility()" />
                                    <span>Show Password</span>
                                </label>
                            </div>
                            <div class="row">
                                <button class=" col s12 btn waves-effect waves-light btn-large   teal lighten-2 darken-3" type="submit" name="submit">
                                    <strong style="font-size: 1.7rem">Login</strong>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="fixed-action-btn">
                    <a class="btn-floating btn-large red pulse">
                        <i class="large material-icons">mode_edit</i>
                    </a>
                    <ul>
                        <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
                        <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
                        <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
                        <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                    </ul>
                </div>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.fixed-action-btn');
                var instances = M.FloatingActionButton.init(elems, {
                    direction: 'top'
                });
            });
            function passVisibility() {
                var x = document.getElementById("icon_prefix4");
                if (x.type === "password") {
                    x.type = "text";
                }
                else {
                    x.type = "password";
                }
            }
        </script>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js_m/materialize.min.js"></script>
    </body>
  </html>
        