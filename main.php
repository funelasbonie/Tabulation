<?php  
   include_once('header.php');      
?>
<div class="container" >
   <!--<div style="float:right;margin-right:50px"><b>Official Tabulator: PHINMA Araullo University </b><img style="position:absolute;right:10;top:65px" src="images/s.png" height="50" width="50"></div>-->
   
  
   <div style="background-color: white;">
      <div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 30px">
      <?php
         include 'conn.php';
         $query = mysqli_query($con, "SELECT * FROM CANDIDATE WHERE CANDIDATE_ID != '0'");
         while($row = mysqli_fetch_array($query)){
            echo '<div class="col-md-4 col-sm-6 col-xs-12" style="text-align:center;padding: 10px">                     
                     <div style="background-color:white; border-radius: 10px;padding: 15px;cursor: pointer" onclick=location.href="profile.php?id='.$row['CANDIDATE_NO'].'">
                     <span class="badge" style="position: absolute;left: 25px; font-size: 15px;border-radius: 10px">'.$row['CANDIDATE_NO'].'</span>
                     <br/>
                     <img src="'.$row['CANDIDATE_IMAGE'].'" width="170" height="170" style="border-radius: 50%">
                     <div style="padding-top: 10px">
                        <h4>'.$row['CANDIDATE_NAME'].'</h4>
                     </div>
                     </div>
                  </div>';
         }
      ?>   
      </div>   
   </div>  
   <!-- <div id="id01" class="modal">
        <div class="modal-content animate" id="form" method="POST" enctype="multipart/form-data">
                         
                <h3>Welcome to AUTabs</h3>
                <hr/>
                <div>                    
                    <button class="btn btn-default" onclick="javascript:hidemodal();">Proceed</button>
                </div>                            
        </div>
    </div> -->
</div>

<?php
   include_once('footer.php');  
?>