<?php
$page = 'Overview';
include_once('adminheader.php');    
?>
<!DOCTYPE html>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image: url(images/white.jpg);background-attachment: fixed">
      <h2 class="page-header" style="border-bottom: 1px solid darkgray">Leaderboard</h2>
      <div class="row placeholders">
        <?php
          //include 'salingkit.php';

          $queryyyyyy = mysqli_query($con, "SELECT * FROM FINAL_RESULT INNER JOIN CANDIDATE ON FINAL_RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO ORDER BY FINAL_RESULT.SCORE DESC LIMIT 4");
          $querycount = mysqli_query($con, "SELECT COUNT(*)AS JUDGE_COUNT FROM JUDGE");
          $row2 = mysqli_fetch_array($querycount);
          while($row = mysqli_fetch_array($queryyyyyy)){
            echo '
              <div class="col-xs-6 col-sm-3 placeholder">
                <img src="'.$row['CANDIDATE_IMAGE'].'" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                <h4>'.$row['CANDIDATE_NAME'].'</h4>
                <span class="text-muted">Score: '.$row['SCORE'].'</span>
              </div>                      
            ';
          }
        ?>
      </div>
      <h2 class="page-header"  style="border-bottom: 1px solid darkgray">Category</h2>
      <div class="row">
          <?php
            include 'conn.php';
            
            $query = mysqli_query($con, "SELECT DISTINCT(CATEGORY_ID) AS CAT_ID, CATEGORY_NAME FROM CATEGORY");

            while($row = mysqli_fetch_array($query))
            {        
              echo '
                  <div class="col-sm-4">  
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background-color: rgb(34,34,34);color: lightgray">
                        <h3 class="panel-title">'.$row['CATEGORY_NAME'].'</h3>
                      </div>
                      <div class="panel-body">  
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>NAME</th>
                              <th>SCORE</th>
                            </tr>
                      ';
                      $queryy = mysqli_query($con, 'SELECT *  FROM RESULT INNER JOIN CANDIDATE ON RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO
                                                WHERE RESULT.CATEGORY_ID = "'.$row['CAT_ID'].'" ORDER BY FINAL_SCORE DESC LIMIT 3');
          
                      while($roww = mysqli_fetch_array($queryy))
                      {
                        echo '<tr>
                                <td>                                
                                ' .$roww['CANDIDATE_NAME'].                            
                                '</td>
                                <td>'.$roww['FINAL_SCORE'].'</td>
                              </tr>
                        ';
                      }        
                      
                    echo  '
                          </table>
                      </div>
                      </div>
                  </div>
                </div>                 
                    '  
                    ;
            }
          ?>
      </div>
    </div>
                     
<?php
    include_once('adminfooter.php');
?>

