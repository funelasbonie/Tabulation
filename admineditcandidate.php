<?php

  include 'conn.php';
  
  if(isset($_POST['edit'])){      	

    $id = $_POST['candid'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $target = "images/candidates/".basename($_FILES['image']['name']);         
      
    $query = mysqli_query($con, "UPDATE CANDIDATE SET CANDIDATE_NAME = '".$name."', CANDIDATE_GENDER = '".$gender."', CANDIDATE_IMAGE = '".$target."' WHERE CANDIDATE_ID = '".$id."'");
    if($query){
      header('location:adminsettings.php');
    }
    if (move_uploaded_file($_FILES['image']['tmp_name'],$target)){ }
  }
  elseif(isset($_POST['delete'])){      	

    $id = $_POST['candid'];
      
    $query = mysqli_query($con, "DELETE FROM CANDIDATE WHERE CANDIDATE_ID = '".$id."'");
    if($query){
      header('location:adminsettings.php');
    }
    
  }

?>