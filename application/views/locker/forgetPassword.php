<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<link rel="icon" type="" href="images/favicon.ico"/>
    <title> EMPARE AGARBATTI </title>
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
				 background-image: url("images/back1.jpg");
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
				<img class="m-4" src="<?php echo base_url('assets/image/logo.png');?>" width="110">
			</div> 
			<form class="form" action="" method="post" id="varify_form">
				<div class="m-2">
					<label for="username">Enter Member Id</label>
					<input type="text" class="form-control form-control-sm" placeholder="Member Id" id="userid" name="username">
				</div>
				<div class="m-2">
					<label for="username">Enter Username</label>
					<input type="text" class="form-control form-control-sm" placeholder="Member Name" id="username" name="username">
				</div>
				<div class="m-2 text-center">
					<button type="button" id="verify_user" class="btn btn-sm col-md-8 mt-2 btn-outline-primary">Next</button>
				</div>
			</form>


			<!-- OTP Fprm -->
			<form class="form" action="" method="post"  id="varify_otp">
				<div class="m-2">
					<label for="username">Enter OTP</label>
					<input type="text" class="form-control form-control-sm" placeholder="Enter Otp" id="otp" name="username">
				</div>
				
				<div class="m-2 text-center">
					<button type="button" id="clickotp" class="btn btn-sm col-md-8 mt-2 btn-outline-primary">Next</button>
				</div><hr/>
			</form>

			<!-- Change Password-->
			<form class="form" action="" method="post"  id="change_pass">
				<div class="m-2">
					<label for="username">Type Password</label>
					<input type="text" class="form-control form-control-sm" placeholder="Password" id="pass1" name="username">
				</div>
				<div class="m-2">
					<label for="username">Type Password</label>
					<input type="text" class="form-control form-control-sm" placeholder="Re-Enter Password" id="pass2" name="username">
				</div>
				
				<div class="m-2 text-center">
					<button type="button" id="update_password" class="btn btn-sm col-md-8 mt-2 btn-outline-primary">submit</button>
				</div><hr/>
			</form>
		</div>
	</div>
</body>


<script type="text/javascript">
	$(document).ready(function(){
		$('#varify_otp').hide();
		$('#change_pass').hide();
		$('#verify_user').click(function(){
			var user_id=$('#userid').val();
			var username=$('#username').val();
			$.ajax({
                type:"post",
                url:"<?php echo base_url('locker/userVerify'); ?>",
                data:{
                  action : "verify_user",
                  username : username,
                  user_id : user_id
                },
                success:function(data){
                	if(data=="true"){
                		$('#varify_form').hide();
						$('#varify_otp').fadeIn();
						$('#change_pass').hide();
                	}else{
                		$('#userid').val('');
                		$('#username').val('');
                	}
                }
              });
		});


		$('#clickotp').click(function(){
			var otp=$('#otp').val();
			$.ajax({
                type:"post",
                url:"<?php echo base_url('locker/otpVerify'); ?>",
                data:{
                  otp : otp
                },
                success:function(data){
                	if(data=="true"){
                		alert("Create New Password...");
                		$('#varify_form').hide();
						$('#varify_otp').hide();
						$('#change_pass').fadeIn();
                	}else{
                		alert("Wrong Otp...!");
                		$('#varify_form').fadeIn();
						$('#varify_otp').hide();
						$('#change_pass').hide();
                	}
                }
              });
		});

		$('#update_password').click(function(){
			var userid=$('#userid').val();
			var pass1=$('#pass1').val();
			var pass2=$('#pass2').val();
			if(pass1==pass2)
			{
				$.ajax({
                type:"post",
                url:"<?php echo base_url('locker/updatePass'); ?>",
                data:{
                  pass : pass1,
                  userid : userid
                },
                success:function(data){
					//alert(data);
                		alert("Password Updated");
                		window.location='<?php echo base_url('locker/'); ?>';
                }
              });
			}
			else{
				alert("Password Wrong..!");
			}
		});



	});

</script>
