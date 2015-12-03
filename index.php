<?php
  session_start();  // Session is started to support Session Variables
  if(@$_SESSION['pass']==1) // pass can only be 1 if pcheck cannot find a passcode match in the database
  // Also the previous session variable is preceded with @ to suppress an error 
  // The Error is for undeclared index being used
  {  
    ?>
      <script> window.alert("Wrong Passcode, Please Try Again") </script> 
      <!-- Using a js script for popup message, indicating wrong passcode -->
    <?php
  }
  $_SESSION["pass"]=0; // pass is set to 0
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>TempStore</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ts.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  </head>
  <body>
    
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- Bootstrap demands elements be placed inside a container class, class center block is used to center with bootstrap -->

    <div class="container">
      <div class="center-block">
        <h1>TempStore</h1>
      </div>
    </div>

    <br>
    <br>
    
    <div class="container">
      <div class="center-block">
        <form action="pcheck.php" method="post" role="form"> <!-- The Contents of the form are sent to pcheck.php -->
          <div class="form-group"> <!-- We use this for bootstrap -->
            <br>
            <input type="password" name="ps" class="form-control" placeholder="Enter Passcode">
          </div>
          <button type="submit" class="btn btn-block btn-info">Submit</button>
        </form>
      </div>
    </div>

    <div class ="navbar navbar-inverse navbar-fixed-bottom"> <!-- This is the footer  -->
      <div class = "container">
        <p class="navbar-text"> © Johann Nishant 2015 </p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>