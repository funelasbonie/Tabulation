<?php
    include 'conn.php';
    session_start();
    $scandid = $_GET['scandid'];
    $_SESSION['scandid'] = $scandid;
    
    if(isset($_POST['submit'])){
        
        $scoreid = uniqid();
        $judgename = $_SESSION['user'];
        $categid = $_SESSION['categid'];
        $candid = $_POST['candid'];
        $score = $_POST['score'];

        $query = mysqli_query($con, 'SELECT * FROM SCORES WHERE JUDGE_NAME = "'.$judgename.'" AND CATEGORY_ID = "'.$categid.'" AND CANDIDATE_ID = "'.$_SESSION['scandid'].'"');
                                         
        if(mysqli_num_rows($query) >= 1){
            foreach($candid as $key => $c){
                $queryy = mysqli_query($con, "UPDATE SCORES SET SCORE = '".$score[$key]."' WHERE JUDGE_NAME = '".$judgename."' AND CATEGORY_ID = '".$categid."'
                                            AND CANDIDATE_ID = '".$_SESSION['scandid']."' ");

                if($queryy){$query1 = mysqli_query($con, 'SELECT DISTINCT(CANDIDATE_ID) AS CANDIDATES FROM SCORES WHERE CATEGORY_ID = "'.$_SESSION['categid'].'"');
                            
                    while($row1 = mysqli_fetch_array($query1)){
              
                        $query2 = mysqli_query($con, "SELECT CANDIDATE_ID,SUM(SCORE) AS SCORE FROM SCORES WHERE CANDIDATE_ID = '".$row1['CANDIDATES']."' AND CATEGORY_ID = '".$_SESSION['categid']."' ");
                        while($row2 = mysqli_fetch_array($query2)){
                            $query3 = mysqli_query($con, "DELETE FROM RESULT WHERE CATEGORY_ID = '$_SESSION[categid]' AND CANDIDATE_ID = '".$row2['CANDIDATE_ID']."' ");
                            if($query3){
                                //equ
                                $judgecount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM JUDGE WHERE JUDGE_ID != '1000'");
                                $jrow = mysqli_fetch_array($judgecount);
                                $score = $row2['SCORE'] / $jrow['CAN_COUNT'];
                                $query4 = mysqli_query($con,"INSERT INTO RESULT (CATEGORY_ID, CANDIDATE_ID, FINAL_SCORE) VALUES ('$_SESSION[categid]','$row2[CANDIDATE_ID]', '$score')");
                                
                                if($query4){
                                    $query5 = mysqli_query($con, 'SELECT DISTINCT(CANDIDATE_ID) AS CANDIDATES FROM RESULT');
              
                                    while($row3 = mysqli_fetch_array($query5)){
              
                                        $query6 = mysqli_query($con, "SELECT CANDIDATE_ID,SUM(FINAL_SCORE) AS SCORE FROM RESULT WHERE CANDIDATE_ID = '".$row3['CANDIDATES']."' ");
                                        while($row4 = mysqli_fetch_array($query6)){
                                            $query7 = mysqli_query($con, "DELETE FROM FINAL_RESULT WHERE CANDIDATE_ID = '".$row4['CANDIDATE_ID']."' ");
                                            if($query7){
                                                $query8 = mysqli_query($con,"INSERT INTO FINAL_RESULT (CANDIDATE_ID, SCORE) VALUES ('$row4[CANDIDATE_ID]', '$row4[SCORE]')");
                                                if($query8){
                                                    header('location:main.php?id='.$_SESSION['categid'].'');
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

        else{
            foreach($candid as $key => $c){
                $queryyy = mysqli_query($con, "INSERT INTO SCORES (SCORE_ID, JUDGE_NAME, CATEGORY_ID, CANDIDATE_ID, SCORE) 
                                                VALUES ('$scoreid', '$judgename', '$categid', '$c', '$score[$key]')");    
                if($queryyy){
                    $queryyyy = mysqli_query($con, "DELETE FROM SCORES WHERE SCORE = ' '");                 
                    if($queryyyy){$query1 = mysqli_query($con, 'SELECT DISTINCT(CANDIDATE_ID) AS CANDIDATES FROM SCORES WHERE CATEGORY_ID = "'.$_SESSION['categid'].'"');
                            
                        while($row1 = mysqli_fetch_array($query1)){
                  
                            $query2 = mysqli_query($con, "SELECT CANDIDATE_ID,SUM(SCORE) AS SCORE FROM SCORES WHERE CANDIDATE_ID = '".$row1['CANDIDATES']."' AND CATEGORY_ID = '".$_SESSION['categid']."' ");
                            while($row2 = mysqli_fetch_array($query2)){
                                
                                $query3 = mysqli_query($con, "DELETE FROM RESULT WHERE CATEGORY_ID = '$_SESSION[categid]' AND CANDIDATE_ID = '".$row2['CANDIDATE_ID']."' ");
                                if($query3){
                                    //equ
                                    $judgecount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM JUDGE");
                                    $jrow = mysqli_fetch_array($judgecount);
                                    $score = $row2['SCORE'] / $jrow['CAN_COUNT'];
                                    $query4 = mysqli_query($con,"INSERT INTO RESULT (CATEGORY_ID, CANDIDATE_ID, FINAL_SCORE) VALUES ('$_SESSION[categid]','$row2[CANDIDATE_ID]', '$score')");
                                    
                                    if($query4){
                                        $query5 = mysqli_query($con, 'SELECT DISTINCT(CANDIDATE_ID) AS CANDIDATES FROM RESULT');
                  
                                        while($row3 = mysqli_fetch_array($query5)){
                  
                                            $query6 = mysqli_query($con, "SELECT CANDIDATE_ID,SUM(FINAL_SCORE) AS SCORE FROM RESULT WHERE CANDIDATE_ID = '".$row3['CANDIDATES']."' ");
                                            while($row4 = mysqli_fetch_array($query6)){
                                                $query7 = mysqli_query($con, "DELETE FROM FINAL_RESULT WHERE CANDIDATE_ID = '".$row4['CANDIDATE_ID']."' ");
                                                if($query7){
                                                    $query8 = mysqli_query($con,"INSERT INTO FINAL_RESULT (CANDIDATE_ID, SCORE) VALUES ('$row4[CANDIDATE_ID]', '$row4[SCORE]')");
                                                    if($query8){
                                                        header('location:main.php?id='.$_SESSION['categid'].'');        
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
                else{

                }
            }        
        }         
    }
  
?>