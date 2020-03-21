<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />   	

	<script src="js/jquery-1.11.3-jquery.min.js"></script> 
	<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>

	<script src="package/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="package/dist/sweetalert2.min.css">
</head>
<script>
		function error(){
				swal({
 					title: 'Unknown User',
  					type: 'error',
  					showCancelButton: false,
      				confirmButtonColor: 'rgb(28,146,72)',
     				cancelButtonColor: '#d33',
  					confirmButtonText: 'Ok'
					}).then((result) => {
	     				if (result.value) {
    						window.location.href= 'index.php';
 						}
					})
				}
	</script>
<body>
</body>
<html>
<?php
    include 'conn.php';
    session_start();

    if(isset($_POST['submit'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $query = mysqli_query($con, 'SELECT * FROM ACCOUNTS WHERE USERNAME = "'.$user.'" AND PASSWORD = "'.$pass.'"');

        if($row = mysqli_fetch_array($query)){
            $_SESSION['loggedin'] = true;
            $_SESSION['adminid'] = $row['ACCT_ID'];            
                header('location:adminmain.php');
        }
        else{
            $_SESSION['loggedin'] = false;
            echo "<script>error();</script>";
        }
    }
  
?>