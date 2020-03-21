<?php  
   include_once('adminheader.php');        
   $categid = $_GET['id'];
   $_SESSION['judgeegid'] = $categid;       
?>
<div class="container-fluid">
      <div class="row">
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image: url(images/white.jpg)">
<ul class="nav nav-tabs" role="tablist">
      <?php
         
         include 'conn.php';

         $query = mysqli_query($con, 'SELECT * FROM JUDGE');

         while($row = mysqli_fetch_array($query)){
            echo '<li role="presentation" class="
            ';
            if($page == $row['JUDGE_USERNAME']){ echo 'active';}
            echo'
            "><a style="color:black" href="judgeresult.php?id='.$row['JUDGE_USERNAME'].'">'.$row['JUDGE_USERNAME'].'</a></li>';
         }
      ?>
   </ul>   
   <table class="table table-striped table-hovered table-bordered">          
        <tr style="background-color:rgb(34,34,34);color: lightgray">                
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
                 $querycount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE");
                 $row2 = mysqli_fetch_array($querycount);
                 $queryyyyyy = mysqli_query($con, "SELECT * FROM SCORES INNER JOIN CANDIDATE ON SCORES.CANDIDATE_ID = CANDIDATE.CANDIDATE_NO WHERE JUDGE_NAME = '".$categid."'");
                 $querycount = mysqli_query($con, "SELECT COUNT(*)AS JUDGE_COUNT FROM JUDGE");
                 $row2 = mysqli_fetch_array($querycount);
                 $i = 1;
                 while($row = mysqli_fetch_array($queryyyyyy)){
                     echo '
                         <tr>                         
                         <td style="text-align:center"><br/>'.$row['CAN_GCODE'].'</td>
                         <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" width="50" height="50" style="border-radius: 50px"></td>
                         <td style="text-align:center"><br/>'.$row['CANDIDATE_NAME'].'</td>';
                         
                             $catquery = mysqli_query($con, "SELECT DISTINCT(CATEGORY_ID)AS CAT_ID FROM CATEGORY");
                             while($catrow = mysqli_fetch_array($catquery)){
                                 $resquery = mysqli_query($con, "SELECT * FROM SCORES WHERE CANDIDATE_ID = '".$row['CANDIDATE_NO']."' AND CATEGORY_ID = '".$catrow['CAT_ID']."'");
                                 if(mysqli_num_rows($resquery) != 0){
                                 while($resrow = mysqli_fetch_array($resquery)){
                                     echo '<td style="text-align:center"><br/>'.$resrow['SCORE'].'</td>'; 
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
            ?>
                    </table>
   </div>

   </div>
</div>