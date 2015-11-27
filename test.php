<!DOCTYPE html>
<html lang="en">
  <head>
  
  </head>

  <body>

  

      <?php
  
        

      $user = 'tempstorage';
      $password = 'mothership()';
      $db = 'tempstorage';
      $host = '127.0.0.1';
      $port = 3306;


      $link = mysqli_init();
      if (!$link) {
          die('mysqli_init failed');
      }


      if (!$link->real_connect($host,$user,$password,$db,$port)) {
          die('Connect Error (' . mysqli_connect_errno() . ') '
                  . mysqli_connect_error());
      }

      
    $result = mysqli_query($link,"SELECT * FROM tempstorage.files");
    if (!$result) {
        die("Query to show fields from table failed");
    }

    $fields_num = mysqli_num_rows($result);

    echo "Number of Rows is $fields_num";

  mysqli_free_result($result);
?>





  </body>
</html>
