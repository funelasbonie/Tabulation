<?php

  include 'conn.php';
  
  if(isset($_POST['edit'])){      	

    $id = $_POST['id'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
      
    $query = mysqli_query($con, "UPDATE JUDGE SET JUDGE_USERNAME = '".$user."', JUDGE_PASSWORD = '".$pass."' WHERE JUDGE_ID = '".$id."'");
    if($query){
      header('location:adminsettings.php');
    }
    
  }
  elseif(isset($_POST['delete'])){      	

    $id = $_POST['id'];
      
    $query = mysqli_query($con, "DELETE FROM JUDGE WHERE JUDGE_ID = '".$id."'");
    if($query){
      header('location:adminsettings.php');
    }
    
  }

?>