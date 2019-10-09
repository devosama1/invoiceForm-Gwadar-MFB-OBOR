
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Obortunity Voucher Creator - Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet" />

</head>

<body class="login-page sidebar-collapse">

    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(assets/img/bg7.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" name="form" method="post" action=""  >
                        <div class="header header-primary text-center">
                            <div class="logo-container" style="width:100px;">
                                <img src="assets/img/oss.png" alt="">
                            </div>
                        </div>
                        <div class="content">
                        
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input id="e" name="e" type="email" class="form-control" placeholder="Email..." required />
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons objects_key-25"></i>
                                </span>
                                <input id="p" name="p" type="password" placeholder="Password..." class="form-control" required />
                            </div>
                        </div>
                        <div class="footer text-center">
                            <input type="submit" value="Login" class="btn btn-primary btn-round btn-lg btn-block" name="submit" />  
                            
                           
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>

    </div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="   assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>

<?php

if(isset($_POST["submit"])){ 
    $user=$_POST['e'];  
    $pass=$_POST['p']; 
    $con=mysqli_connect("localhost","root","hYcdR8VxTAIV","oborlogin");
    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

    $sql="SELECT email,pass FROM oborLogin";
    
    if ($result=mysqli_query($con,$sql))
      {
      // Fetch one and one row
      while ($row=mysqli_fetch_row($result))
        {
            if($user == $row[0] && $pass == $row[1])
            {
                //header("Location:voucher.php");
                //echo $row["email"]."----".$row["pass"];
                $_SESSION["favcolor"] = "green";
                echo "<script>window.location = 'v.php';</script>";
            }
        }
          echo "<script>alert('Username and Password is incorrect');</script>";
   
      // Free result set
      mysqli_free_result($result);
    }

    mysqli_close($con);
    }
?>