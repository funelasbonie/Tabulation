<?php  
   include_once('header.php');      
   $candid = $_GET['id'];   
   $_SESSION['candid'] = $candid;   
   //$page = $_SESSION['categid'];   
?>
<div class="container">
    <div style="background-color: white;">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <?php
            include 'conn.php';
            $query = mysqli_query($con, "SELECT * FROM CANDIDATE WHERE CANDIDATE_NO = '".$_SESSION['candid']."'");
            $row = mysqli_fetch_array($query);
                echo '<div class="col-md-8 col-sm-12 col-xs-12" style="padding: 10px;">           
                        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0">
                            <h2>Candidate</h2> 
                            <hr style="border-bottom: 1px solid darkgray"/>
                            <div>
                                <div class="col-md-4 col-sm-5 col-xs-12">
                                    <img src="'.$row['CANDIDATE_IMAGE'].'" class="col-xs-" width="220" height="220" style="border-radius: 50%">
                                </div>
                                <div class="col-md-8 col-sm-7 col-xs-12">
                                    <label>No.:</label><br/>
                                    <label style="font-size: 40px">'.$row['CANDIDATE_NO'].'</label><br/>
                                    <label>Name:</label><br/>
                                    <label style="font-size: 40px">'.$row['CANDIDATE_NAME'].'</label>
                                </div>                        
                            </div>
                        </div>                        
                                            
                    </div>';            
        ?>   
                    <div class="col-md-4 col-sm-6 col-xs-12" style="padding: 10px 10px 60px 10px;">                        
                       <h2>Scores</h2> 
                       <hr style="border-bottom: 1px solid darkgray"/>
                       <?php
                            //INNER JOIN CATEGORY ON SCORES.CATEGORY_ID = CATEGORY.CATEGORY_ID 
                             $queryy = mysqli_query($con, 'SELECT * FROM SCORES INNER JOIN CATEGORY ON SCORES.CATEGORY_ID = CATEGORY.CATEGORY_ID WHERE JUDGE_NAME = "'.$_SESSION['user'].'" AND CANDIDATE_ID = "'.$_SESSION['candid'].'"');
                             while($row2 = mysqli_fetch_array($queryy))                            
                             {
                                echo '<div style="padding: 5px; background-color: rgb(34,34,34); color: white"><span class="glyphicon glyphicon-file" style="padding-right: 10px"></span>'.$row2['CATEGORY_NAME'].'
                                <label style="float: right">'.$row2['SCORE'].'</label> 
                                </div>
                                <br/>                                                            
                                ';
                             }     
                        ?>                    
                        <form method="POST" action="submit2.php">
                        <?php                                                    
                            $query2 = mysqli_query($con, 'SELECT * FROM CATEGORY WHERE CATEGORY_ID NOT IN(SELECT CATEGORY_ID FROM SCORES WHERE JUDGE_NAME = "'.$_SESSION['user'].'" AND CANDIDATE_ID = "'.$_SESSION['candid'].'") AND CATEGORY_TYPE="JD"');
                            while($row2 = mysqli_fetch_array($query2)){
                                echo '
                                      <div style="padding: 5px; background-color: rgb(34,34,34); color: white"><span class="glyphicon glyphicon-file" style="padding-right: 10px"></span>'.$row2['CATEGORY_NAME'].'</div>
                                      <input type="number" class="form-control" name="categid[]" value="'.$row2['CATEGORY_ID'].'" style="display: none">
                                      <input type="number" class="form-control" name="categid2[]" value="'.$row2['CATEGORY_ID'].'" style="display: none">
                                      <div style="padding:5px 0px">
                                        <input type="number" class="form-control" name="score[]" min="'.$row2['MIN_SCORE'].'" 
                                        max="'.$row2['MAX_SCORE'].'" placeholder="'.$row2['MIN_SCORE'].' - '.$row2['MAX_SCORE'].'">
                                      </div><br/>';
                            }
                        ?>           
                        <div>
                        <?php 
                            if(mysqli_num_rows($query2) != 0){
                                echo '<input type="submit" class="form-control btn btn-info" name="submit" value="Submit" style="float: right">';
                            }
                            else{
                                
                            }
                        ?>
                        
                        </div>
                        </form>      
                    </div>
                    
        </div>
    </div>    
</div>

<?php
    include_once('footer.php');      
?>