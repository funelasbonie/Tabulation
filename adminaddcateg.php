<?php

  include 'conn.php';
  
  if(isset($_POST['submit'])){    
  	$judquery = mysqli_query($con, "SELECT * FROM JUDGE ORDER BY JUDGE_ID DESC LIMIT 1");
  	$row = mysqli_fetch_array($judquery);
    
    $id = $row['JUDGE_ID'] + 1;
    $user = $_POST['user'];
    $pass = $_POST['pass'];
      
    $query = mysqli_query($con,"INSERT INTO JUDGE(JUDGE_ID,JUDGE_USERNAME,JUDGE_PASSWORD)VALUES('$id','$user','$pass')");
    if($query){
      header('location:adminsettings.php');
    }
    
  }

?>