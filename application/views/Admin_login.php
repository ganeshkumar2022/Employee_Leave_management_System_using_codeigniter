<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee Leave Management System</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
<style>
	input[type=email],input[type=password]
	{
		border:none;
		border-bottom:1px solid lightgray;
	}
	.input-group-text
	{
		background-color:white;
		border-color:white;
		border-bottom:1px solid lightgray;
	}
	input[type=email]:focus
	{
		outline:none;
		border-bottom:1px solid lightgray;
		box-shadow:none;
		background-color:transparent;
	}
	input[type=password]:focus
	{
		outline:none;
		border-bottom:1px solid lightgray;
		box-shadow:none;
		background-color:transparent;
	}
	form
	{
		padding:20px;
		background-color:white;
	}
	.sub-btn
	{
		background-color:lightgray;
		border-radius:100px;
	}
	.sub-btn:hover
	{
		background-color:rgb(0,123,255);
		color:white;
	}

	
</style>
</head>
<body class="bg-secondary">
<div class="container">
<div class="row" >
<div class="col-md-6 offset-md-3 text-center" style="margin-top:100px;">
<div class="bg-primary text-white">
<br>
<h3 class="text-uppercase">Admin Panel</h3>
<p>Employee Leave management system</p>
<br>
<br>
</div>
<form action="<?=base_url('admin/login_verify')?>" method="post" id="basic-form" autocomplete="off">

<p class="text-danger"><?=$this->session->flashdata('error')?></p>
<p class="text-success"><?=$this->session->flashdata('success')?></p>
<div style="position:relative;" class="pt-3">
<div class="input-group mb-3 input-group-sm">
    <div class="input-group-prepend">
       <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
    </div>
    <input type="email" id="email" name="email" class="form-control em myemail form-control-lg" required><br>
  </div>
  <span class="mycontent" style="position:absolute;color:gray;pointer-events:none;z-index:1;top:17px;left:30px;">Enter your email</span>
  </div>
<div style="position:relative;" class="pt-3">
  <div class="input-group mb-3 input-group-sm">
  <div class="input-group-append">
       <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
    </div>   
  <input type="password" id="pass" name="password" class="form-control mypassword pw form-control-lg" required>
  </div>
  <span class="mycontent2" style="position:absolute;color:gray;pointer-events:none;z-index:1;top:17px;left:30px;">Enter your password</span>
</div>
  <button type="submit" class="btn sub-btn btn-block btn-lg">Login <i class="fa-solid fa-arrow-right"></i></button>
</form>
<br>
<center><a href="<?=base_url('home')?>" class="font-weight-bold text-decoration-none">Go Back</a></center>
</div>


</div>
</div>
<script>
	$(document).ready(function(){
		$("#email").focus(function(){
			$(".mycontent").css("top","-17px");
			$(".mycontent").css("color","blue");
		});
		$("#email").blur(function(){
			if($(this).val()=="")
			{
			$(".mycontent").css("top","17px");
			$(".mycontent").css("color","gray");
			}
		});
		$("#pass").focus(function(){
			$(".mycontent2").css("top","-17px");
			$(".mycontent2").css("color","blue");
		});
		$("#pass").blur(function(){
			if($(this).val()=="")
			{
			$(".mycontent2").css("top","17px");
			$(".mycontent2").css("color","gray");
			}
		});
	});
</script>
</body>
</html>
