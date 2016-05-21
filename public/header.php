
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="Andrew, Frank and Zach">
        <link rel="icon" href="favicon.ico">

        <title>LeadLocal</title>

        <!-- JQuery CDN-->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<script type="text/javascript" src="../public/js/bootstrap-clockpicker.min.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script> 

        <!-- Bootstrap CDN-->  
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 
        <!-- JS CDN-->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../public/js/bootstrap-formhelpers.js"></script>

        <!-- Custom styles for this template -->
	    <link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>  
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Cookie"  type="text/css">
		<link rel="stylesheet" href="../public/css/bootstrap-clockpicker.min.css" type="text/css">
		<link rel="stylesheet" href="../public/css/bootstrap-formhelpers.css">
		<link rel="stylesheet" href="../public/css/calender1.css" >
		<link rel="stylesheet" href="../public/css/footer-distributed-with-contact-form.css">
		<link rel="stylesheet" href="../public/css/header-login-signup.css">
		<link rel="stylesheet" href="../public/css/jumbotron.css" >  
	    <link rel="stylesheet" href="../public/css/index.css">
		
    </head>

    <body>
        <header class="header-login-signup">
	        <div class="header-limiter">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		            <a href="javascript:history.back()"><!--<i class="fa fa-mail-reply bigicon"></i>-->
						<img class="img-responsive" src="../public/img/retina/arrow_left@2x.png" alt="back" /></a>
                </div>
		        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		            <div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<a href="index.php"><img class="img-responsive" src="../public/img/retina/house@2x.png"></a>
						</div>
			            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <a href="Login.php"><img class="img-responsive" src="../public/img/retina/star@2x.png" ></a>
			            </div>	
			            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">	
			                <a href="menu.php" ><img  class="img-responsive"  src="../public/img/retina/photos_polaroid@2x.png" ><b class="caret"></b></a>
                        </div>	
		            </div>
                </div>    
	        </div>
            <script type="text/javascript">
                var JWT = localStorage.getItem("jwt");
                $("#jwt").val(JWT);
                $("#postForm").ajaxSubmit({url: '../src/CacheManager.php', type: 'post'})
            </script>
        </header>