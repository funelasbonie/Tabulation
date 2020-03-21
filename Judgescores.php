<?php
    $page = 'Judgescores';
    include_once('adminheader.php');        
    $page2 = $_GET['id'];
    $judgeque = mysqli_query($con,"SELECT * FROM JUDGE WHERE JUDGE_ID = '$page2'");
    $judgerow = mysqli_fetch_array($judgeque);
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="page-header" style="border-bottom: 1px solid darkgray">Judge Scores</h2> 
    <form method="POST">
        <ul class="nav nav-tabs" role="tablist">
            <?php
                
                include 'conn.php';

                $query = mysqli_query($con, 'SELECT * FROM JUDGE WHERE JUDGE_ID!="1000"');

                while($row = mysqli_fetch_array($query)){
                    echo '<li role="presentation" class="
                    ';
                    if($page2 == $row['JUDGE_ID']){ echo 'active';}
                    echo'
                    "><a style="color:black" href="judgescores.php?id='.$row['JUDGE_ID'].'">'.$row['JUDGE_USERNAME'].'</a></li>';
                }
            ?>
        </ul>    
    </form>
    <br/>
    <table class="table table-striped table-hover table-bordered">          
        <tr style="background-color: rgb(34,34,34);color: white">            
            <th style="text-align:center;width: 7%">NO.</th>
            <th style="text-align:center">NAME</th>
            <?php
                $query = mysqli_query($con, "SELECT * FROM CATEGORY WHERE CATEGORY_TYPE = 'JD'");                                        
                while($row = mysqli_fetch_array($query)){
                    echo '<th style="text-align:center;width: 12%">'.$row['CATEGORY_NAME'].'</th>';   
                }
            ?>                             
        </tr>
        <?php
            $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
            $row2 = mysqli_fetch_array($querycount);
            $queryyyyyy = mysqli_query($con, "SELECT DISTINCT(SCORES.CANDIDATE_ID) AS CANDIDATE_NO,CANDIDATE.CANDIDATE_NAME FROM SCORES INNER JOIN CANDIDATE ON CANDIDATE.CANDIDATE_ID = SCORES.CANDIDATE_ID
                                              WHERE JUDGE_NAME = '".$judgerow['JUDGE_USERNAME']."' ORDER BY CANDIDATE.CANDIDATE_NO ASC LIMIT $row2[CAN_COUNT]");
            $querycount = mysqli_query($con, "SELECT COUNT(*)AS JUDGE_COUNT FROM JUDGE");
            $row2 = mysqli_fetch_array($querycount);
            
            while($row = mysqli_fetch_array($queryyyyyy)){
                echo '
                    <tr>                    
                    <td style="text-align:center">'.$row['CANDIDATE_NO'].'</td>                    
                    <td style="text-align:center">'.$row['CANDIDATE_NAME'].'</td>';                    
                        $catquery = mysqli_query($con, "SELECT DISTINCT(CATEGORY_ID)AS CAT_ID FROM CATEGORY WHERE CATEGORY_ID != '0' AND CATEGORY_TYPE = 'JD'");
                        while($catrow = mysqli_fetch_array($catquery)){
                            $resquery = mysqli_query($con, "SELECT * FROM SCORES WHERE CANDIDATE_ID = '".$row['CANDIDATE_NO']."' AND CATEGORY_ID = '".$catrow['CAT_ID']."' AND JUDGE_NAME = '".$judgerow['JUDGE_USERNAME']."'");
                            if(mysqli_num_rows($resquery) != 0){
                            while($resrow = mysqli_fetch_array($resquery)){
                                echo '<td style="text-align:center">'.$resrow['SCORE'].'</td>'; 
                            }
                            }
                            else{
                                echo '<td style="text-align:center"></td>'; 
                            }
                        }
                    echo '                    
                    </tr>
                ';
            }
        ?>
    </table>
                

</div>
<?php
    include_once('adminfooter.php');
?>