<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="datetimepicker/jquery.datetimepicker.min.css" rel="stylesheet">	

	<script src="js/jquery-1.11.3-jquery.min.js"></script> 
	<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>

	<script src="package/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="package/dist/sweetalert2.min.css">

    <title>AUTabS</title>    
    <style>
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
            width: 30%;            
        }

        .form-group{
            width: 30%;
            margin: auto;
        }

        .animate {
            -webkit-animation: animatezoom 0.4s;
            animation: animatezoom 0.4s
        }

        
        @media screen and (max-width: 60.5em){
            .form-group{
                width: 50%;
            }
        }
        
        @media screen and (max-width: 37.5em) {
            .form-group{
                width: 70%;
            }
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
<body>

    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container">
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
                    <li style="padding-top:9px"><button class="btn btn-info" onclick="javascript:showmodal();"><span class="glyphicon glyphicon-user"></span>  Admin</button></li>                                        
                </ul>                
            </div>
        </div>
    </nav>
    <br/><br/><br/><br/>
    


<div class="container">
    <form method="POST" action="signin.php">
        <div class="form-group">
            <h2>Sign In</h2>
            <hr style="border-bottom: 1px solid darkkgray"/>
            <div>
                <div><label>Username</label></div>
                <input type="text" class="form-control" name="user" autocomplete="off" required> 
            </div>
            <div>
                <div><label>Password</label></div>
                <input type="password" class="form-control" name="pass"  required>
            </div>
            <br/>
            <div>                    
                <input type="submit" class="btn btn-success" value="Log in" name="submit" style="background-color:rgb(34,34,34);float:right">
            </div>
        </div>
    </form>
</div>

<div id="id01" class="modal">
    <form class="modal-content animate" id="form" method="POST" action="adminsignin.php" enctype="multipart/form-data"><!-- importante to sa upload -->
          
            <div style="float: right;"> 
                <span class="glyphicon glyphicon-remove" id="closemodal" onclick="javascript:hidemodal();" style="cursor: pointer;"></span>
            </div>
            <h2>Admin</h2>
            <hr style="border-bottom: 1px solid darkkgray"/>
            <div>
                <div><label>Username</label></div>
                <input type="text" class="form-control" name="user" autocomplete="off"  required>
            </div>
            <div>
                <div><label>Password</label></div>
                <input type="password" class="form-control" name="pass"  required>
            </div>
            <br/>
            <div>                    
                <input type="submit" class="btn btn-success" value="Log in" name="submit" style="background-color:rgb(34,34,34);float:right">
            </div>
            <br/><br/>
    </form>
</div>

</body>
</html>

<script src="js/jquery-1.11.3-jquery.min.js"></script> 
<script>window.jQuery || document.write('<script src="css/bootstrap-3.3.7/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="css/bootstrap-3.3.7/docs/dist/js/bootstrap.min.js"></script>

<script>
    function showmodal(){
        document.getElementById("id01").style.display="block";
    }

    function hidemodal(){
        document.getElementById("id01").style.display="none";
    }  

    var modal = document.getElementById('id01');

    window.onclick = function(event) {
        if(event.target == modal) {
            modal.style.display = "none";
        } 
     }
</script>




