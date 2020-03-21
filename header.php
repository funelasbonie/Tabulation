<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="datetimepicker/jquery.datetimepicker.min.css" rel="stylesheet">
	<link href="css/stylesheet.css" rel="stylesheet" type="text/css">

	<script src="js/jquery-1.11.3-jquery.min.js"></script>     
	<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>

	<script src="package/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="package/dist/sweetalert2.min.css">

    <title>AUTabS</title>

    <style media="screen">
        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot');
            src: url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('css/bootstrap-3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons-halflingsregular') format('svg');
            }
        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button{
            -webkit-appearance:none;
        }
        input[type="number"]{
            -moz-appearance:textfield;
        }
        html {
            position: relative;
            min-height: 100%;
        }
        body {
        /* Margin bottom by footer height */
            margin-bottom: 60px;
        }
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */                     
        }
        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */
        .container .text-muted {
            margin: 20px 0;
        }

        .footer > .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        code {
            font-size: 80%;
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
            margin: 90px auto;
            border: 1px solid #888;
            width: 80%;            
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
        
    </style>
</head>
<body style="background-image: url(images/white.jpg);background-attachment: fixed">

    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="main.php?id=001"><span class="glyphicon glyphicon-user"></span>  Judge: <?php echo $_SESSION['user'];?></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">                    
                    <li><a href="main.php">Home</a></li>
                    <li><a href="Signout.php">Sign Out</a></li>   
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Nav header</li>
                                <li><a href="#">Separated link</a></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                    </li>-->
                </ul>                
            </div>
        </div>
    </nav>
    <br/><br/><br/><br/>
    

