<?php
    session_start();        
    $categid = $_GET['categid'];
    $_SESSION['admincategid'] = $categid;    
    $page = $_SESSION['admincategid'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AUTabS</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />   
    <link href="css/dashboard.css" rel="stylesheet" type="text/css">
      
    <script src="package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <link href="css/adminstyle.css" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot');
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
        }  
        div.sidebar{          
          border: 0px solid black;
        }
        ul.nav-sidebar li.active a{
          background-color: rgb(34,34,34);
          color: white;
        }   
        ul.nav-sidebar li.active a:hover{
          background-color: rgb(34,34,34);
          color: white;
        }     
        ul.nav-sidebar li a:hover{
          background-color: rgb(134,134,134);
          color: white;
        }         
    </style>
  </head>

  <body style="background-image: url(images/white.jpg);">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AUTabS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="adminsettings.php"><span class="glyphicon glyphicon-cog"></span>  Settings</a></li>        
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Acccount <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="index.php">Sign Out</a></li>                        
                    </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="<?php if($page == 'Overview'){echo 'active';}?>"><a href="adminmain.php"><span class="glyphicon glyphicon-th-large" style="padding-right: 10px"></span>Overview</a></li>
            <?php
              include 'conn.php';            
              $query = mysqli_query($con,"SELECT * FROM CATEGORY");
              while($row = mysqli_fetch_array($query)){
                echo '<li class="';
                      if($page == $row['CATEGORY_ID']){echo 'active';}
                echo '"><a class="a" href="adminscores.php?categid='.$row['CATEGORY_ID'].'"><span class="glyphicon glyphicon-file"  style="padding-right: 10px"></span>'.$row['CATEGORY_NAME'].'</a></li>                      
                      ';
              }
            ?>    
            <li class="<?php if($page == 'Judgescores'){echo 'active';}?>"><a  href="Judgescores.php?id=1001"><span class="glyphicon glyphicon-user"  style="padding-right: 10px"></span>Judge Scores</a></li>
            <li class="<?php if($page == 'Finalresult'){echo 'active';}?>"><a href="finalresult.php"><span class="glyphicon glyphicon-stats"  style="padding-right: 10px"></span>Final Result</a></li>
            
            
          </ul>
        </div>



        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image: url(images/white.jpg);background-attachment: fixed">
     
          <h2 class="page-header" style="border-bottom: 1px solid darkgray">
              <?php
                  include 'conn.php';
                  $query = mysqli_query($con, 'SELECT * FROM CATEGORY WHERE CATEGORY_ID = "'.$_SESSION['admincategid'].'" AND CATEGORY_TYPE = "JD"');
                  $row = mysqli_fetch_array($query);
                  echo $row['CATEGORY_NAME'];
                  if(mysqli_num_rows($query) != 0){
              ?>          
          </h2>     
          <div class="table-responsive col-sm-8" style="padding: 0">
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
                    <th style="text-align:center;width: 10%">RANK</th>
                    <th style="text-align:center;width: 10%">NO.</th>
                    <th colspan="2" style="text-align:center">CANDIDATE</th>    
                    <th style="text-align:center">SCORE</th>
                </tr>                     
                  <?php
                      include 'conn.php';

                      /*to process category results                
                          $query = mysqli_query($con, 'SELECT DISTINCT(CANDIDATE_ID) AS CANDIDATES FROM SCORES WHERE CATEGORY_ID = "'.$_SESSION['admincategid'].'"');
                              
                          while($row = mysqli_fetch_array($query)){

                              $queryy = mysqli_query($con, "SELECT CANDIDATE_ID,SUM(SCORE) AS SCORE FROM SCORES WHERE CANDIDATE_ID = '".$row['CANDIDATES']."' AND CATEGORY_ID = '".$_SESSION['admincategid']."' ");
                              while($row = mysqli_fetch_array($queryy)){
                                  $queryyy = mysqli_query($con, "DELETE FROM RESULT WHERE CATEGORY_ID = '$_SESSION[admincategid]' AND CANDIDATE_ID = '".$row['CANDIDATE_ID']."' ");
                                  if($queryyy){
                                      $queryyyyy = mysqli_query($con,"INSERT INTO RESULT (CATEGORY_ID, CANDIDATE_ID, FINAL_SCORE) VALUES ('$_SESSION[admincategid]','$row[CANDIDATE_ID]', '$row[SCORE]')");
                                      
                                  }
                                  
                              }
                          }
                       */
                        if(isset($_POST['male'])){
                          $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
                          $row2 = mysqli_fetch_array($querycount);
                          $judgecount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM JUDGE");
                          $row3 = mysqli_fetch_array($judgecount);
                          $queryyyyyy = mysqli_query($con, "SELECT *  FROM RESULT INNER JOIN CANDIDATE ON RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO
                                                          WHERE RESULT.CATEGORY_ID = '".$_SESSION['admincategid']."' AND CANDIDATE.CANDIDATE_GENDER = 'Male' ORDER BY FINAL_SCORE DESC LIMIT $row2[CAN_COUNT]");
                          $i = 1;
                          while($row = mysqli_fetch_array($queryyyyyy)){
                              echo '
                                  <tr>
                                      <td style="text-align:center"><br/><b>'.$i++.'</b></td>
                                      <td style="text-align:center"><br/>'.$row['CANDIDATE_NO'].'</td>
                                      <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" width="50" height="50" style="border-radius: 50px"></td>
                                      <td style="text-align:center"><br/>'.$row['CANDIDATE_NAME'].'</td>
                                      <td style="text-align:center"><br/>'.$row['FINAL_SCORE'].'</td>
                                  </tr>
                              ';
                          }      
                        }
                        elseif(isset($_POST['female'])){
                          $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
                          $row2 = mysqli_fetch_array($querycount);
                          $judgecount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM JUDGE");
                          $row3 = mysqli_fetch_array($judgecount);
                          $queryyyyyy = mysqli_query($con, "SELECT *  FROM RESULT INNER JOIN CANDIDATE ON RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO
                                                          WHERE RESULT.CATEGORY_ID = '".$_SESSION['admincategid']."' AND CANDIDATE.CANDIDATE_GENDER = 'Female' ORDER BY FINAL_SCORE DESC LIMIT $row2[CAN_COUNT]");
                          $i = 1;
                          while($row = mysqli_fetch_array($queryyyyyy)){
                              echo '
                                  <tr>
                                      <td style="text-align:center"><br/><b>'.$i++.'</b></td>
                                      <td style="text-align:center"><br/>'.$row['CANDIDATE_NO'].'</td>
                                      <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" width="50" height="50" style="border-radius: 50px"></td>
                                      <td style="text-align:center"><br/>'.$row['CANDIDATE_NAME'].'</td>
                                      <td style="text-align:center"><br/>'.$row['FINAL_SCORE'].'</td>
                                  </tr>
                              ';
                          }
                        }      
                        elseif(isset($_POST['all'])){
                          $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
                          $row2 = mysqli_fetch_array($querycount);
                          $judgecount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM JUDGE");
                          $row3 = mysqli_fetch_array($judgecount);
                          $queryyyyyy = mysqli_query($con, "SELECT *  FROM RESULT INNER JOIN CANDIDATE ON RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO
                                                          WHERE RESULT.CATEGORY_ID = '".$_SESSION['admincategid']."' ORDER BY FINAL_SCORE DESC LIMIT $row2[CAN_COUNT]");
                          $i = 1;
                          while($row = mysqli_fetch_array($queryyyyyy)){
                              echo '
                                  <tr>
                                      <td style="text-align:center"><br/><b>'.$i++.'</b></td>
                                      <td style="text-align:center"><br/>'.$row['CANDIDATE_NO'].'</td>
                                      <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" width="50" height="50" style="border-radius: 50px"></td>
                                      <td style="text-align:center"><br/>'.$row['CANDIDATE_NAME'].'</td>
                                      <td style="text-align:center"><br/>'.$row['FINAL_SCORE'].'</td>
                                  </tr>
                              ';
                          }
                        
                        }      
                        else{
                          $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
                          $row2 = mysqli_fetch_array($querycount);
                          $judgecount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM JUDGE");
                          $row3 = mysqli_fetch_array($judgecount);
                          $queryyyyyy = mysqli_query($con, "SELECT *  FROM RESULT INNER JOIN CANDIDATE ON RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO
                                                          WHERE RESULT.CATEGORY_ID = '".$_SESSION['admincategid']."' ORDER BY FINAL_SCORE DESC LIMIT $row2[CAN_COUNT]");
                          $i = 1;
                          while($row = mysqli_fetch_array($queryyyyyy)){
                              echo '
                                  <tr>
                                      <td style="text-align:center"><br/><b>'.$i++.'</b></td>
                                      <td style="text-align:center"><br/>'.$row['CANDIDATE_NO'].'</td>
                                      <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" width="50" height="50" style="border-radius: 50px"></td>
                                      <td style="text-align:center"><br/>'.$row['CANDIDATE_NAME'].'</td>
                                      <td style="text-align:center"><br/>'.$row['FINAL_SCORE'].'</td>
                                  </tr>
                              ';
                          }                      
                        }      
                  ?>            
              </table>   
            </div> 
          </div>

          <div class="table-responsive col-sm-4" style="padding-right: 0">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: rgb(34,34,34);color: lightgray">
                  <h3 class="panel-title">Top Male</h3>
                </div>
                <div class="panel-body" style="text-align:center">     
                  <?php
                      $queryyyyyy = mysqli_query($con, "SELECT *  FROM RESULT INNER JOIN CANDIDATE ON RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO
                      WHERE RESULT.CATEGORY_ID = '".$_SESSION['admincategid']."' AND CANDIDATE.CANDIDATE_GENDER = 'Male' ORDER BY FINAL_SCORE DESC LIMIT 1");
                      while($row = mysqli_fetch_array($queryyyyyy)){
                          echo '
                      <img src="'.$row['CANDIDATE_IMAGE'].'" width="100" height="100" style="border-radius: 50%">
                      <div style="padding-top:5px">
                        <h4>'.$row['CANDIDATE_NAME'].'</h4>
                        <h5>Score: <span class="label label-success">'.$row['FINAL_SCORE'].'</span></h5>
                      </div>
                      ';
                      }                                    
                  ?>         
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: rgb(34,34,34);color: lightgray">
                <h3 class="panel-title">Top Female</h3>
                </div>
                <div class="panel-body" style="text-align:center">     
                    <?php
                        $queryyyyyy = mysqli_query($con, "SELECT *  FROM RESULT INNER JOIN CANDIDATE ON RESULT.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO
                        WHERE RESULT.CATEGORY_ID = '".$_SESSION['admincategid']."' AND CANDIDATE.CANDIDATE_GENDER = 'Female' ORDER BY FINAL_SCORE DESC LIMIT 1");
                        while($row = mysqli_fetch_array($queryyyyyy)){
                            echo '
                        <img src="'.$row['CANDIDATE_IMAGE'].'" width="100" height="100" style="border-radius: 50%">
                        <div style="padding-top:5px">
                          <h4>'.$row['CANDIDATE_NAME'].'</h4>
                          <h5>Score: <span class="label label-success">'.$row['FINAL_SCORE'].'</span></h5>
                        </div>
                        ';
                        }                                    
                    ?>         
                </div>
            </div>
          </div>
        </div>
        <?php
        }
        else{ 
            $query2 = mysqli_query($con, 'SELECT * FROM CATEGORY WHERE CATEGORY_ID = "'.$_SESSION['admincategid'].'" AND CATEGORY_TYPE = "AD"');
            $row2 = mysqli_fetch_array($query2);
            if(mysqli_num_rows($query2)){                
                echo $row2['CATEGORY_NAME'];   
        ?>
<!--manual add--></h2>
        <div class="col-sm-6">
        <div style="text-align:center "><label>Female</label></div>
         <div class="table-responsive">      
            <table class="table table-striped">
               <tr style="background-color: rgb(34,34,34);color: lightgray">
                  <th>No.</th>
                  <th>Candidate</th>
                  <th colspan="3">Score</th>               
               </tr>            
               <?php
               
                  $query = mysqli_query($con, 'SELECT * FROM CANDIDATE WHERE CANDIDATE_GENDER = "female" ORDER BY CANDIDATE_ID ASC');                  
                  $i = 1;
                  while($row = mysqli_fetch_array($query)){
                     echo '
                     <form method="POST" action="adminsubmit.php?scandid='.$row['CANDIDATE_NO'].'">
                           <tr> 
                              <td>
                              <h4>'.$i++.'</h4>
                                 <input type="text" name="candid[]" value="'.$row['CANDIDATE_NO'].'" style="text-align:center;display: none">                        
                              </td>
                              <td>                                  
                                 <h5>'.$row['CANDIDATE_NAME'].'</h5>                     
                              </td>
                              <td style="width:15%">                              
                                 <input type="text" class="form-control" name="score[]" style="text-align:center" autocomplete="off"  required>
                              </td>
                              <td style="width:15%">                                    
                                 <input type="submit" name="submit" class="form-control btn btn-info">
                              </td>
                              <td  style="width:15%">                              
                                 <h4 style="color:red">';                                    
                                    $queryy = mysqli_query($con, 'SELECT * FROM SCORES WHERE JUDGE_NAME = "'.$_SESSION['adminid'].'" AND CATEGORY_ID = "'.$_SESSION['admincategid'].'" AND CANDIDATE_ID = "'.$row['CANDIDATE_NO'].'"');
                                    $row2 = mysqli_fetch_array($queryy);
                                    if(mysqli_num_rows($query) != 0)
                                    {
                                       echo $row2['SCORE'];
                                    }                                         
                           echo'</h4>
                              </td>
                           </tr>  
                     </form> 
                     ';               
                  }         
               ?>               
            </table>            
          </div>      
        </div>
        <div class="col-sm-6">
        <div style="text-align:center "><label>Male</label></div>
           <div class="table-responsive">      
              <table class="table table-striped">
                 <tr style="background-color: rgb(34,34,34);color: lightgray">
                    <th>No.</th>
                    <th>Candidate</th>
                    <th colspan="3">Score</th>               
                 </tr>            
                 <?php
                 
                 $query = mysqli_query($con, 'SELECT * FROM CANDIDATE WHERE CANDIDATE_GENDER = "male"  ORDER BY CANDIDATE_ID ASC');                  
                 $i = 1;
                    while($row = mysqli_fetch_array($query)){
                       echo '
                       <form method="POST" action="adminsubmit.php?scandid='.$row['CANDIDATE_NO'].'">
                             <tr> 
                                <td>
                                <h4>'.$i++.'</h4>
                                   <input type="text" name="candid[]" value="'.$row['CANDIDATE_NO'].'" style="text-align:center;display: none">                        
                                </td>
                                <td>                                  
                                   <h5>'.$row['CANDIDATE_NAME'].'</h5>                     
                                </td>
                                <td style="width:15%">                              
                                   <input type="text" class="form-control" name="score[]" style="text-align:center" autocomplete="off"  required>
                                </td>
                                <td style="width:15%">                                    
                                   <input type="submit" name="submit" class="form-control btn btn-info">
                                </td>
                                <td  style="width:15%">                              
                                   <h4  style="color:red">';                                    
                                      $queryy = mysqli_query($con, 'SELECT * FROM SCORES WHERE JUDGE_NAME = "'.$_SESSION['adminid'].'" AND CATEGORY_ID = "'.$_SESSION['admincategid'].'" AND CANDIDATE_ID = "'.$row['CANDIDATE_NO'].'"');
                                      $row2 = mysqli_fetch_array($queryy);
                                      if(mysqli_num_rows($query) != 0)
                                      {
                                         echo $row2['SCORE'];
                                      }                                         
                             echo'</h4>
                                </td>
                             </tr>  
                       </form> 
                       ';               
                    }         
                 ?>               
              </table>            
           </div>      
        </div>
      </div>
  </div>

<?php
}
}
?>

</body>
</html>
<?php
  include_once('adminfooter.php');
?>