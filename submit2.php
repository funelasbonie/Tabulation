<?php
    include 'conn.php';
    session_start();   
    
    if(isset($_POST['submit'])){

        $scoreid = uniqid();
        $judgename = $_SESSION['user'];        
        $categid = $_POST['categid'];  
        $candid =  $_SESSION['candid'];     
        $score = $_POST['score'];

        foreach($score as $key => $s){
        $queryyy = mysqli_query($con, "INSERT INTO SCORES (SCORE_ID, JUDGE_NAME, CATEGORY_ID, CANDIDATE_ID, SCORE) 
                                                VALUES ('$scoreid', '$judgename', '$categid[$key]', '$candid', '$s')");
            if($queryyy){
                $queryyyy = mysqli_query($con, "DELETE FROM SCORES WHERE SCORE = '0.00'");                 
                        if($queryyyy){
                                $query2 = mysqli_query($con, "SELECT CANDIDATE_ID,SUM(SCORE) AS SCORE FROM SCORES WHERE CANDIDATE_ID = '".$_SESSION['candid']."' AND CATEGORY_ID = '".$categid[$key]."' ");
                                while($row2 = mysqli_fetch_array($query2)){
                                    $query3 = mysqli_query($con, "DELETE FROM RESULT WHERE CATEGORY_ID = '".$categid[$key]."' AND CANDIDATE_ID = '".$row2['CANDIDATE_ID']."' ");
                                    if($query3){
                                        $judgecount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM JUDGE WHERE JUDGE_ID != '1000'");
                                        $jrow = mysqli_fetch_array($judgecount);
                                        $score = $row2['SCORE'] / $jrow['CAN_COUNT'];
                                        $query4 = mysqli_query($con,"INSERT INTO RESULT (CATEGORY_ID, CANDIDATE_ID, FINAL_SCORE) VALUES ('$categid[$key]','$row2[CANDIDATE_ID]', '$score')");
                                        if($query4){ 
                                            $query41 = mysqli_query($con, "DELETE FROM RESULT WHERE CANDIDATE_ID = '0' AND FINAL_SCORE = '0.00'");
                                            if($query41){
                                                $query6 = mysqli_query($con, "SELECT CANDIDATE_ID,SUM(FINAL_SCORE) AS SCORE FROM RESULT WHERE CANDIDATE_ID = '".$_SESSION['candid']."' ");
                                                while($row4 = mysqli_fetch_array($query6)){
                                                    $query7 = mysqli_query($con, "DELETE FROM FINAL_RESULT WHERE CANDIDATE_ID = '".$row4['CANDIDATE_ID']."' ");
                                                    if($query7){
                                                        $query8 = mysqli_query($con,"INSERT INTO FINAL_RESULT (CANDIDATE_ID, SCORE) VALUES ('$row4[CANDIDATE_ID]', '$row4[SCORE]')");
                                                        if($query8){
                                                            $query81 = mysqli_query($con, "DELETE FROM FINAL_RESULT WHERE SCORE = '0.00'");
                                                            if($query81){ 
                                                                header('location:profile.php?id='.$_SESSION['candid'].'');        
                                                            }    
                                                        }
                                                    }
                                                }
                                            
                                            }
                                        }
                                    }
                                }
                            
                        } 
            }                                       
        }
        header('location:profile.php?id='.$_SESSION['candid'].'');   
    }
?>