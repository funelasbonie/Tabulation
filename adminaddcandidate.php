<?php

  include 'conn.php';
  
  if(isset($_POST['submit'])){

    $judquery = mysqli_query($con, "SELECT * FROM CANDIDATE ORDER BY CANDIDATE_ID DESC LIMIT 1");
    $row = mysqli_fetch_array($judquery);
      
    $id = $row['CANDIDATE_ID'] + 1;
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $target = "images/candidates/".basename($_FILES['image']['name']);     
    $desc = $_POST['desc'];
  
    $image = $_FILES['image']['name'];

    $query = mysqli_query($con,"INSERT INTO CANDIDATE(CANDIDATE_ID, CANDIDATE_NO, CANDIDATE_NAME, CANDIDATE_GENDER, CANDIDATE_IMAGE)
                                    VALUES('$id','$id','$name','$gender','$target')");
    if($query){
        header('location:adminsettings.php');
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'],$target)){ }
  }

?>