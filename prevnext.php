<?php
    session_start();
    include_once('conn.php');    

    if(isset($_POST['next'])){        
        $id = $_POST['candid'] + 1;        
        $query = mysqli_query($con, "SELECT * FROM CANDIDATE");
        $num = mysqli_num_rows($query);
        if($id > $num){
            header('location:main.php?id='.$_SESSION['categid'].'&cid='.$num.'');
        }        
        else{
            header('location:main.php?id='.$_SESSION['categid'].'&cid='.$id.'');
        }
        
     }
    if(isset($_POST['prev'])){        
        $id = $_POST['candid'] - 1;
        if($id == 0){
            header('location:main.php?id='.$_SESSION['categid'].'&cid=1');
        }
        else{
            header('location:main.php?id='.$_SESSION['categid'].'&cid='.$id.'');
        }
        
     }
?>