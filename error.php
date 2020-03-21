<?php
    include 'conn.php';
    session_start();
    
    if(isset($_POST['submit'])){
        
        $scoreid = uniqid();
        $judgename = $_SESSION['user'];
        $categid = $_SESSION['categid'];
        $candid = $_POST['candid'];
        $score = $_POST['score'];

        foreach($score as $key => $s){
        //mayproblema
        $query = mysqli_query($con, 'SELECT * FROM SCORES WHERE JUDGE_NAME = "'.$judgename.'" AND CATEGORY_ID = "'.$categid.'" AND CANDIDATE_ID = "'.$candid[$key].'"');
                                         

       

            

            if(mysqli_num_rows($query) >= 1){

                /*foreach($candid as $key => $c){
                    $queryy = mysqli_query($con, "UPDATE SCORES SET SCORE = '".$score[$key]."' WHERE JUDGE_NAME = '".$judgename."' AND CATEGORY_ID = '".$categid."'
                                              AND CANDIDATE_ID = '".$candid."' ");

                    if($queryy){
                        header('location:main.php?id='.$_SESSION['categid'].'');
                    }                        

                }*/

                header('location:main.php?id='.$_SESSION['categid'].'');                        

                

            }
            else{

                /*foreach($candid as $key => $c){
                    $queryyy = mysqli_query($con, "INSERT INTO SCORES (SCORE_ID, JUDGE_NAME, CATEGORY_ID, CANDIDATE_ID, SCORE) 
                    VALUES ('$scoreid', '$judgename', '$categid', '$c', '$score[$key]')");    
                    if($queryyy){

                    $queryyyy = mysqli_query($con, "DELETE FROM SCORES WHERE SCORE = ' '");                 

                    if($queryyyy){
                    header('location:main.php?id='.$_SESSION['categid'].'');                        
                    }                    
                    }
                    else{

                    }
                }*/

                header('location:index.php');
                
                
            }

        }            
           
    }
  
?>