<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="icon" type="" href="images/favicon.ico"/>
    <title> GIT </title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- custome stylesheet -->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet">
    <!-- custome stylesheet -->

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ropa+Sans&display=swap" rel="stylesheet">

    <style type="text/css">
    	body{
				 /* background-image: linear-gradient(to bottom , #248ea9 40%, #fafdcb 40%); Standard syntax (must be last) */
				 background-image: url("<?php echo base_url('assets/images/kls.jpg');?>");
				 background-attachment: fixed;
				  background-repeat: no-repeat;
				  background-size:cover;
				  overflow-y: none;
				  font-family: 'Ropa Sans', sans-serif;
    	}
    	.main{
    		height: 400px;
			margin-top: 5em; 
			background-color:#212529;
			border:solid 0.5px #fff;
			opacity: 80%;
		}
		.main label{
			color:#ffffff;
		}
    	form{
    		margin: 0px;
    		padding: 0px;
    	}

    </style>


</head>
<body>
	<div class="container d-flex justify-content-center">
		<div class="col-md-3 form-control main">
			<div class="lobo text-center">
				<img class="m-4" src="<?php echo base_url('assets/images/logo.jpeg');?>" width="110">
			</div> 
			<?php echo form_open("Locker"); ?>
				<div class="m-2">
					<label for="username">Username</label>
					<input type="text" class="form-control form-control-sm" placeholder="Username" id="username" name="username">
				</div>
				<div class="m-2">
					<label for="password">Password</label>
					<input type="password" class="form-control form-control-sm" placeholder="Password" id="password" name="pass">
				</div>
			
				<div class="m-2 text-center">
					<button type="submit" name="login" class="btn btn-sm col-md-8 mt-2 btn-outline-warning">Sign-In</button>
				</div><hr/>

				<div class="text-center" style="margin-top: -20px;">
					<a style=" color:#ffc107;" href="<?php echo base_url('locker/userVerification');?>">Forget Password</a>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</body>