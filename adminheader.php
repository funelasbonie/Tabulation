<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AUTabS</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="datetimepicker/jquery.datetimepicker.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet" type="text/css">

    <script src="js/jquery-1.11.3-jquery.min.js"></script> 
    <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>

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
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: none;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            padding: 30px;
            background-color: #fefefe;
            margin: 72px 90px auto 600px;
            border: 1px solid #888;
            width: 30%;            
        }

        .animate {
            -webkit-animation: animatezoom 0.4s;
            animation: animatezoom 0.4s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)} 
            to {-webkit-transform: scale(1)}
        } 

        @keyframes animatezoom {
            from {transform: scale(0)} 
            to {transform: scale(1)}
        }

        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot');
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
        }      
    </style>
  </head>

  <body style="background-image: url(images/white.jpg);background-attachment: fixed">

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
            <li class="<?php if($page == 'Overview'){echo 'active';}?>"><a href="adminmain.php"><span class="glyphicon glyphicon-th-large" style="padding-right: 10px"></span>  Overview</a></li>
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