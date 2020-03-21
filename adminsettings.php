<?php
    include_once('adminheader.php');
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image: url(images/white.jpg);background-attachment: fixed">
    <div>
        <?php
            $judgecount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM JUDGE WHERE JUDGE_ID != '1000'");
            $jrow = mysqli_fetch_array($judgecount);
            echo '<p style="float: right;padding-top: 10px">Item:<label>' .$jrow['CAN_COUNT'];
            echo '</label></p>'
        ?>
        <h2 class="page-header" style="border-bottom: 1px solid darkgray">
            Judges
            <button class="btn btn-default" onclick="javascript:showmodal();">Add New</button>        
        </h2>
        
    </div>

    <!--Judges-->    	
    <div style="padding:0;width: 40%">            	        
    	<div class="table-responsive">
    	    <table class="table table-striped table-hover table-bordered">          
                <tr>
                    <th style="text-align:center;">ID</th>
                    <th style="text-align:center;">Username</th>
                    <th style="text-align:center">Password</th>                                    
                    <th style="text-align:center">Action</th>                                    
                </tr>   
                <?php
                $queryyyyyy = mysqli_query($con, "SELECT *  FROM JUDGE WHERE JUDGE_ID != '1000'");                          
                            while($row = mysqli_fetch_array($queryyyyyy)){                          		
                                echo '
                                    <tr onclick="javascript:showmodal2();showRow1(this);">                                      
                                        <td style="text-align:center;width:5%">'.$row['JUDGE_ID'].'</td>                                      
                                        <td style="text-align:center">'.$row['JUDGE_USERNAME'].'</td>
                                        <td style="text-align:center">'.$row['JUDGE_PASSWORD'].'</td>
                                        <td style="text-align:center"><a style="cursor: pointer">Modify</a></td>                                                                            
                                    </tr>
                                ';
                            }               
                ?>                
           </table>
       </div>
    </div>
    <br/>
    <!--Candidates-->    
    <div>
        <?php
            $judgecount = mysqli_query($con, "SELECT COUNT(*)AS CAN_COUNT FROM CANDIDATE WHERE CANDIDATE_ID != '0'");
            $jrow = mysqli_fetch_array($judgecount);
            echo '<p style="float: right;padding-top: 10px">Item:<label>' .$jrow['CAN_COUNT'];
            echo '</label></p>'
        ?>
        <h2 class="page-header" style="border-bottom: 1px solid darkgray">
            Candidates
            <button class="btn btn-default" onclick="javascript:showmodal3();">Add New</button>
        </h2>
    </div>
    <div style="padding:0;width: 100%">    	
    	<div class="table-responsive">
    	<table class="table table-striped table-hover table-bordered">          
            <tr>
                <th style="text-align:center">Image</th>                           
                <th style="text-align:center;">No.</th>                
                <th style="text-align:center;">Name</th>
                <th style="text-align:center">Gender</th>                                                    
                <th style="text-align:center">Action</th>                                    
            </tr>   
            <?php
			$queryyyyyy = mysqli_query($con, "SELECT *  FROM CANDIDATE WHERE CANDIDATE_ID != '0'");                          
                          while($row = mysqli_fetch_array($queryyyyyy)){                          		
                              echo '
                                  <tr onclick="javascript:showmodal4();showRow2(this);">                                      
                                      <td style="text-align:center"><img src="'.$row['CANDIDATE_IMAGE'].'" witdh="40" height="40" style="border-radius: 50px"></td>   
                                      <td style="text-align:center;width:5%;padding-top: 18px">'.$row['CANDIDATE_NO'].'</td>                                                                                
                                      <td style="text-align:center;padding-top: 18px">'.$row['CANDIDATE_NAME'].'</td>
                                      <td style="text-align:center;padding-top: 18px">'.$row['CANDIDATE_GENDER'].'</td>                                                                                                                                                     
                                      <td style="text-align:center;padding-top: 18px"><a style="cursor: pointer">Modify</a></td>  
                                  </tr>
                              ';
                          }               
            ?>
            
           </table>
        </div>
    </div>
    <br/>
    <!--Category-->  
    <h2 class="page-header" style="border-bottom: 1px solid darkgray">
    	Category
        <button class="btn btn-default" onclick="javascript:showmodal5();">Add New</button>
    </h2>
    <div style="padding:0;width: 100%">    	
    	<div class="table-responsive">
    	<table class="table table-striped table-hover table-bordered">          
            <tr>
                <th style="text-align:center">ID</th>                           
                <th style="text-align:center">Name</th>                           
                <th style="text-align:center;">Percentage</th>                
                <th style="text-align:center;">Type</th>
                <th style="text-align:center">Min</th>                                                    
                <th style="text-align:center">Max</th>                                    
                <th style="text-align:center">Action</th>                                    
            </tr>   
            <?php
			$queryyyyyy = mysqli_query($con, "SELECT *  FROM CATEGORY");                          
                          while($row = mysqli_fetch_array($queryyyyyy)){                          		
                              echo '
                                  <tr onclick="javascript:showmodal6();showRow3(this);">                                                                            
                                      <td style="text-align:center;width:5%">'.$row['CATEGORY_ID'].'</td>                                                                                
                                      <td style="text-align:center;">'.$row['CATEGORY_NAME'].'</td>
                                      <td style="text-align:center;">'.$row['CATEGORY_PERC'].'</td>
                                      <td style="text-align:center;">'.$row['CATEGORY_TYPE'].'</td>
                                      <td style="text-align:center;">'.$row['MIN_SCORE'].'</td>
                                      <td style="text-align:center;">'.$row['MAX_SCORE'].'</td>
                                      <td style="text-align:center"><a style="cursor: pointer">Modify</a></td>  
                                  </tr>
                              ';
                          }               
            ?>
            
           </table>
        </div>
    </div>
    

    <!-- modal for add judge -->
	<div id="id01" class="modal">
        <form class="modal-content animate" id="form" method="POST" action="adminaddadmin.php" enctype="multipart/form-data"><!-- importante to sa upload -->
            
                <div style="float: right;"> 
                    <span class="glyphicon glyphicon-remove" id="closemodal" onclick="javascript:hidemodal();" style="cursor: pointer;"></span>
                </div>
                <h3>Add Judge</h3>
                <hr/>
                <div>
                    <div><label>Username</label></div>
                    <input type="text" class="form-control" name="user" autocomplete="off"  required>
                </div>
                <div>
                    <div><label>Password</label></div>
                    <input type="text" class="form-control" name="pass" autocomplete="off" required>
                </div>
                <br/>
                <div>                    
                    <input type="submit" class="form-control btn btn-default" value="Save" name="submit" style="width: 30%; float: right">
                </div>            
                <br/><br/>
        </form>
    </div>

    <!-- modal for update delete judge -->
    <div id="id02" class="modal">
        <form class="modal-content animate" id="form" method="POST" action="admineditadmin.php" enctype="multipart/form-data"><!-- importante to sa upload -->
            
                <div style="float: right;"> 
                    <span class="glyphicon glyphicon-remove" id="closemodal" onclick="javascript:hidemodal();" style="cursor: pointer;"></span>
                </div>
                <h3>Modify Judge</h3>
                <hr/>
                <div>
                    <div><label>ID</label></div>
                    <input type="text" class="form-control" id="id" name="id" autocomplete="off"  required readonly>
                </div>
                <div>
                    <div><label>Username</label></div>
                    <input type="text" class="form-control" id="user" name="user" autocomplete="off"  required>
                </div>
                <div>
                    <div><label>Password</label></div>
                    <input type="text" class="form-control" id="pass" name="pass" autocomplete="off" required>
                </div>
                <br/>
                <div>                
                    <div><input type="submit" class="form-control btn btn-default" value="Delete" name="delete" style="width: 30%; float: right;margin-left: 5px"></div>                          
                    <div><input type="submit" class="form-control btn btn-default" value="Update" name="edit" style="width: 30%; float: right"></div>
                </div>                
                
                <br/><br/>
        </form>
    </div>

    <!-- modal for add candidate -->
    <div id="id03" class="modal">
        <form class="modal-content animate" id="form" method="POST" action="adminaddcandidate.php" enctype="multipart/form-data"><!-- importante to sa upload -->
            
                <div style="float: right;"> 
                    <span class="glyphicon glyphicon-remove" id="closemodal" onclick="javascript:hidemodal();" style="cursor: pointer;"></span>
                </div>
                <h3>Add Candidate</h3>
                <hr/>               
                <div>
                    <div><label>Name</label></div>
                    <input type="text" class="form-control" name="name" autocomplete="off"  required>
                </div>   
                <div>
                    <div><label>Gender</label></div>                    
                    <select class="form-control" name="gender" required>
                        <option>---</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Group</option>
                    </select>
                </div>                
                <div>
                    <div><label>Image</label></div>
                    <input type="file" class="form-control" name="image" autocomplete="off"  required>
                </div>                               
                <br/>
                <div>                    
                <input type="submit" class="form-control btn btn-default" value="Save" name="submit" style="width: 30%; float: right">
                </div>       
                <br/><br/>     
        </form>
    </div>

     <!-- modal for update delete cand -->
    <div id="id04" class="modal">
        <form class="modal-content animate" id="form" method="POST" action="admineditcandidate.php" enctype="multipart/form-data"><!-- importante to sa upload -->
            
                <div style="float: right;"> 
                    <span class="glyphicon glyphicon-remove" id="closemodal" onclick="javascript:hidemodal();" style="cursor: pointer;"></span>
                </div>
                <h3>Modify Candidate</h3>
                <hr/>
                <div>
                    <div><label>ID</label></div>
                    <input type="text" class="form-control" id="candid" name="candid" autocomplete="off"  required readonly>
                </div>               
                <div>
                    <div><label>Name</label></div>
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off"  required>
                </div>   
                <div>
                    <div><label>Gender</label></div>                    
                    <select class="form-control" id="gender" name="gender" required>
                        <option>---</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Group</option>
                    </select>
                </div>                
                <div>
                    <div><label>Image</label></div>
                    <input type="file" class="form-control" id="image" name="image" autocomplete="off">
                </div>   
                <br/> 
                <div>                
                    <div><input type="submit" class="form-control btn btn-default" value="Delete" name="delete" style="width: 30%; float: right;margin-left: 5px"></div>                          
                    <div><input type="submit" class="form-control btn btn-default" value="Update" name="edit" style="width: 30%; float: right"></div>
                </div>                             
                <br/><br/>
                         
        </form>
    </div>
    <div id="id05" class="modal">
        <form class="modal-content animate" id="form" method="POST" action="adminaddceteg.php" enctype="multipart/form-data"><!-- importante to sa upload -->
            
                <div style="float: right;"> 
                    <span class="glyphicon glyphicon-remove" id="closemodal" onclick="javascript:hidemodal();" style="cursor: pointer;"></span>
                </div>
                <h3>Add Category</h3>
                <hr/>
                <div>
                    <div><label>Name</label></div>
                    <input type="text" class="form-control" name="catname" autocomplete="off"  required>
                </div>
                <div>
                    <div><label>Percentage</label></div>
                    <input type="text" class="form-control" name="catperc" autocomplete="off"  required>
                </div>
                <div>
                    <div><label>Type</label></div>
                    <input type="text" class="form-control" name="catname" autocomplete="off"  required>
                </div>
                <div>
                    <div style="width: 47%;float: left">
                        <div><label>Min Score</label></div>
                        <input type="text" class="form-control" name="catmin" autocomplete="off"  required>
                    </div>
                    <div style="width: 47%;float: right;">
                        <div><label>Max Score</label></div>
                        <input type="text" class="form-control" name="catmax" autocomplete="off"  required>
                    </div>
                    
                </div>
                
                <div style="">                    
                    <input type="submit" class="form-control btn btn-default" value="Save" name="submit" style="width: 30%; float: right;margin-top: 20px;margin-bottom: 50px">
                </div>            
                <br/><br/><br/><br/><br/><br/>
        </form>
    </div>

</div>
<?php
    include_once('adminfooter.php');
?>