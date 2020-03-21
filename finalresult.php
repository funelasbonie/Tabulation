<?php
    $page = 'Finalresult';
    include_once('adminheader.php');    
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header" style="border-bottom: 1px solid darkgray">Final Result</h2>    
    <div class="table-responsive col-sm-12" style="padding: 0">
    <button class="btn btn-default btn-xs" id="print" style="float:right;"><span class="glyphicon glyphicon-print"></span>  Print</button>
        <form method="POST">
          <ul class="nav nav-tabs" role="tablist">
            
              <li role="presentation" class="active" style="padding-right: 2px;width: 10%"><button name="all"style="width:100%;background-color: rgb(245,245,245);padding: 7px;border: 1px solid lightgray;border-bottom: 0px;border-radius: 5px 5px 0px 0px">All</button></li>
              <li role="presentation" class="active" style="padding-right: 2px;width: 10%"><button name="male" style="width:100%;background-color: rgb(245,245,245);padding: 7px;border: 1px solid lightgray;border-bottom: 0px;border-radius: 5px 5px 0px 0px">Male</button></li>
              <li role="presentation" class="active" style="padding-right: 2px;width: 10%"><button name="female"style="width:100%;background-color: rgb(245,245,245);padding: 7px;border: 1px solid lightgray;border-bottom: 0px;border-radius: 5px 5px 0px 0px">Female</button></li>          
          </ul> 
        </form>
        <br/>
        <div class="pcontent">
        <table class="table table-striped table-hover table-bordered">          
        <tr style="background-color:rgb(34,34,34);color: lightgray">
                <th style="text-align:center;width: 7%">RANK</th>
                <th style="text-align:center;width: 7%">NO.</th>
                <th colspan="2" style="text-align:center">NAME</th>
                <?php
                    $query = mysqli_query($con, "SELECT * FROM CATEGORY");                                        
                    while($row = mysqli_fetch_array($query)){
                        echo '<th style="text-align:center;width: 7%">'.$row['CATEGORY_NAME'].'</th>';   
                    }
                ?>                 
                <th style="text-align:center">TOTAL</th>
            </tr>
                   
                <?php
                    include 'conn.php';

                    /*to process final results
                    $query = mysqli_query($con, 'SELECT DISTINCT(CANDIDATE_ID) AS CANDIDATES FROM RESULT');
                        
                    while($row = mysqli_fetch_array($query)){

                        $queryy = mysqli_query($con, "SELECT CANDIDATE_ID,SUM(FINAL_SCORE) AS SCORE FROM RESULT WHERE CANDIDATE_ID = '".$row['CANDIDATES']."' ");
                        while($row = mysqli_fetch_array($queryy)){
                            $queryyy = mysqli_query($con, "DELETE FROM FINAL_RESULT WHERE CANDIDATE_ID = '".$row['CANDIDATE_ID']."' ");
                            if($queryyy){
                                $queryyyyy = mysqli_query($con,"INSERT INTO FINAL_RESULT (CANDIDATE_ID, SCORE) VALUES ('$row[CANDIDATE_ID]', '$row[SCORE]')");
                            }
                            
                        }
                    }
                    */

                    if(isset($_POST['male'])){
                        $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
                        $row2 = mysqli_fetch_array($querycount);
                        $queryyyyyy = mysqli_query($con, "SELECT * FROM FINAL_RESULT INNER JOIN CANDIDATE ON FINAL_RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO AND CANDIDATE.CANDIDATE_GENDER = 'Male' ORDER BY FINAL_RESULT.SCORE DESC LIMIT $row2[CAN_COUNT]");
                        $querycount = mysqli_query($con, "SELECT COUNT(*)AS JUDGE_COUNT FROM JUDGE");
                        $row2 = mysqli_fetch_array($querycount);
                        $i = 1;
                        while($row = mysqli_fetch_array($queryyyyyy)){
                            echo '
                                <tr>
                                <td style="text-align:center"><br/><b>'.$i++.'</b></td>
                                <td style="text-align:center"><br/>'.$row['CANDIDATE_NO'].'</td>
                                <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" width="50" height="50" style="border-radius: 50px"></td>
                                <td style="text-align:center"><br/>'.$row['CANDIDATE_NAME'].'</td>';
                                
                                    $catquery = mysqli_query($con, "SELECT DISTINCT(CATEGORY_ID)AS CAT_ID FROM CATEGORY");
                                    while($catrow = mysqli_fetch_array($catquery)){
                                        $resquery = mysqli_query($con, "SELECT * FROM RESULT WHERE CANDIDATE_ID = '".$row['CANDIDATE_NO']."' AND CATEGORY_ID = '".$catrow['CAT_ID']."'");
                                        if(mysqli_num_rows($resquery) != 0){
                                        while($resrow = mysqli_fetch_array($resquery)){
                                            echo '<td style="text-align:center"><br/>'.$resrow['FINAL_SCORE'].'</td>'; 
                                        }
                                        }
                                        else{
                                            echo '<td style="text-align:center"><br/></td>'; 
                                        }
                                    }
                                echo '
                                <td style="text-align:center"><br/>'.$row['SCORE'].'</td>
                                </tr>
                            ';
                        }
                    }
                    elseif(isset($_POST['female'])){
                         $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
                        $row2 = mysqli_fetch_array($querycount);
                        $queryyyyyy = mysqli_query($con, "SELECT * FROM FINAL_RESULT INNER JOIN CANDIDATE ON FINAL_RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO AND CANDIDATE.CANDIDATE_GENDER = 'Female' ORDER BY FINAL_RESULT.SCORE DESC LIMIT $row2[CAN_COUNT]");
                        $querycount = mysqli_query($con, "SELECT COUNT(*)AS JUDGE_COUNT FROM JUDGE");
                        $row2 = mysqli_fetch_array($querycount);
                        $i = 1;
                        while($row = mysqli_fetch_array($queryyyyyy)){
                            echo '
                                <tr>
                                <td style="text-align:center"><br/><b>'.$i++.'</b></td>
                                <td style="text-align:center"><br/>'.$row['CANDIDATE_NO'].'</td>
                                <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" width="50" height="50" style="border-radius: 50px"></td>
                                <td style="text-align:center"><br/>'.$row['CANDIDATE_NAME'].'</td>';
                                
                                    $catquery = mysqli_query($con, "SELECT DISTINCT(CATEGORY_ID)AS CAT_ID FROM CATEGORY");
                                    while($catrow = mysqli_fetch_array($catquery)){
                                        $resquery = mysqli_query($con, "SELECT * FROM RESULT WHERE CANDIDATE_ID = '".$row['CANDIDATE_NO']."' AND CATEGORY_ID = '".$catrow['CAT_ID']."'");
                                        if(mysqli_num_rows($resquery) != 0){
                                        while($resrow = mysqli_fetch_array($resquery)){
                                            echo '<td style="text-align:center"><br/>'.$resrow['FINAL_SCORE'].'</td>'; 
                                        }
                                        }
                                        else{
                                            echo '<td style="text-align:center"><br/></td>'; 
                                        }
                                    }
                                echo '
                                <td style="text-align:center"><br/>'.$row['SCORE'].'</td>
                                </tr>
                            ';
                        }
                    }
                    elseif(isset($_POST['all'])){
                         $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
                        $row2 = mysqli_fetch_array($querycount);
                        $queryyyyyy = mysqli_query($con, "SELECT * FROM FINAL_RESULT INNER JOIN CANDIDATE ON FINAL_RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO ORDER BY FINAL_RESULT.SCORE DESC LIMIT $row2[CAN_COUNT]");
                        $querycount = mysqli_query($con, "SELECT COUNT(*)AS JUDGE_COUNT FROM JUDGE");
                        $row2 = mysqli_fetch_array($querycount);
                        $i = 1;
                        while($row = mysqli_fetch_array($queryyyyyy)){
                            echo '
                                <tr>
                                <td style="text-align:center"><br/><b>'.$i++.'</b></td>
                                <td style="text-align:center"><br/>'.$row['CANDIDATE_NO'].'</td>
                                <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" width="50" height="50" style="border-radius: 50px"></td>
                                <td style="text-align:center"><br/>'.$row['CANDIDATE_NAME'].'</td>';
                                
                                    $catquery = mysqli_query($con, "SELECT DISTINCT(CATEGORY_ID)AS CAT_ID FROM CATEGORY");
                                    while($catrow = mysqli_fetch_array($catquery)){
                                        $resquery = mysqli_query($con, "SELECT * FROM RESULT WHERE CANDIDATE_ID = '".$row['CANDIDATE_NO']."' AND CATEGORY_ID = '".$catrow['CAT_ID']."'");
                                        if(mysqli_num_rows($resquery) != 0){
                                        while($resrow = mysqli_fetch_array($resquery)){
                                            echo '<td style="text-align:center"><br/>'.$resrow['FINAL_SCORE'].'</td>'; 
                                        }
                                        }
                                        else{
                                            echo '<td style="text-align:center"><br/></td>'; 
                                        }
                                    }
                                echo '
                                <td style="text-align:center"><br/>'.$row['SCORE'].'</td>
                                </tr>
                            ';
                        }
                    }
                    else{
                         $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
                        $row2 = mysqli_fetch_array($querycount);
                        $queryyyyyy = mysqli_query($con, "SELECT * FROM FINAL_RESULT INNER JOIN CANDIDATE ON FINAL_RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO ORDER BY FINAL_RESULT.SCORE DESC LIMIT $row2[CAN_COUNT]");
                        $querycount = mysqli_query($con, "SELECT COUNT(*)AS JUDGE_COUNT FROM JUDGE");
                        $row2 = mysqli_fetch_array($querycount);
                        $i = 1;
                        while($row = mysqli_fetch_array($queryyyyyy)){
                            echo '
                                <tr>
                                <td style="text-align:center"><br/><b>'.$i++.'</b></td>
                                <td style="text-align:center"><br/>'.$row['CANDIDATE_NO'].'</td>
                                <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" width="50" height="50" style="border-radius: 50px"></td>
                                <td style="text-align:center"><br/>'.$row['CANDIDATE_NAME'].'</td>';
                                
                                    $catquery = mysqli_query($con, "SELECT DISTINCT(CATEGORY_ID)AS CAT_ID FROM CATEGORY");
                                    while($catrow = mysqli_fetch_array($catquery)){
                                        $resquery = mysqli_query($con, "SELECT * FROM RESULT WHERE CANDIDATE_ID = '".$row['CANDIDATE_NO']."' AND CATEGORY_ID = '".$catrow['CAT_ID']."'");
                                        if(mysqli_num_rows($resquery) != 0){
                                        while($resrow = mysqli_fetch_array($resquery)){
                                            echo '<td style="text-align:center"><br/>'.$resrow['FINAL_SCORE'].'</td>'; 
                                        }
                                        }
                                        else{
                                            echo '<td style="text-align:center"><br/></td>'; 
                                        }
                                    }
                                echo '
                                <td style="text-align:center"><br/>'.$row['SCORE'].'</td>
                                </tr>
                            ';
                        }
                    }
                ?>
            
        </table>
        </div>
    </div>
    <div class="table-responsive col-sm-4" style="padding-right: 0;display: none">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: rgb(34,34,34);color: lightgray">
            <h3 class="panel-title">Top</h3>
            </div>
            <div class="panel-body" style="text-align:center">     
                <?php
                    $queryyyyyy = mysqli_query($con, "SELECT *  FROM FINAL_RESULT INNER JOIN CANDIDATE ON FINAL_RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO
                    ORDER BY FINAL_RESULT.SCORE DESC LIMIT 4");
                    $querycount = mysqli_query($con, "SELECT COUNT(*)AS JUDGE_COUNT FROM JUDGE");
                    $row2 = mysqli_fetch_array($querycount);
                    while($row = mysqli_fetch_array($queryyyyyy)){
                        echo '
                        
                    <img src="'.$row['CANDIDATE_IMAGE'].'" width="100" height="100" style="border-radius: 50%">
                    <div style="padding-top:5px">
                        <h4>'.$row['CANDIDATE_NAME'].'</h4>
                        <h5>Score: <span class="label label-success">'.$row['SCORE'] / $row2['JUDGE_COUNT'].'</span></h5>
                    </div>
                    <hr/>
                    ';
                    }                                    
                ?>         
            </div>
        </div>
    </div>
</div>
<?php
    include_once('adminfooter.php');
?>