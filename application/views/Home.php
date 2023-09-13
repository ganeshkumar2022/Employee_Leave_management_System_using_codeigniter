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
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
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
	.mybtn-style
	{
		opacity:0.8;
		background-image:linear-gradient(to right,blue,blue,skyblue);
		color:white;
		transition:0.5s ease-out;
	}
	.mybtn-style:hover
	{
		opacity:1;
		background-image:linear-gradient(to right,skyblue,blue,blue);
		color:white;
	}
</style>
</head>
<body>
<div class="container">
<div class="row" >
<div class="col-md-6 text-center" style="margin-top:150px;">
<h3 class="text-uppercase">Employee Login</h3>
<p>Employee Leave management system</p>
<form action="<?=base_url('home/employee_login')?>" method="post" autocomplete="off">
<div style="position:relative;" class="pt-3">
<div class="input-group mb-3 input-group-sm">
    <input type="email" class="form-control form-control-lg" name="email" id="email" required>
	<div class="input-group-append">
       <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
    </div>
  </div>
  <span class="mycontent" style="position:absolute;color:gray;pointer-events:none;z-index:1;top:12px;left:5px;">Enter your email</span>
</div>

<div style="position:relative;" class="pt-3">
  <div class="input-group mb-3 input-group-sm">
    <input type="password" class="form-control form-control-lg" name="password" id="pass" required>
	<div class="input-group-append">
       <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
    </div>
  </div>
  <div>
  <span class="mycontent2" style="position:absolute;color:gray;pointer-events:none;z-index:1;top:12px;left:5px;">Enter your password</span>
</div>
  <p class="float-right"><a href="">Forgot password?</a></p>
	<p class="float-left"><input type="checkbox"> Remember me</p>
  </div>
  <button type="submit" class="btn btn-block btn-lg mybtn-style" style="border-radius:100px;">Login <i class="fa-solid fa-arrow-right"></i></button>
</form>
<span class="text-danger text-center my-2"><?=$this->session->flashdata('error')?></span>
<br>
<center><a href="<?=base_url('admin')?>" class="font-weight-bold text-decoration-none">Go to admin panel</a></center>
</div>

<div class="col-md-6">
<img src="<?=base_url('assets/image/emp3.png')?>" style="height:600px;width:100%;">
</div>

</div>
</div>
<script>
	$(document).ready(function(){
		$("#email").focus(function(){
			$(".mycontent").css("top","-10px");
			$(".mycontent").css("color","blue");
		});
		$("#email").blur(function(){
			if($(this).val()=="")
			{
			$(".mycontent").css("top","10px");
			$(".mycontent").css("color","gray");
			}
		});
		$("#pass").focus(function(){
			$(".mycontent2").css("top","-10px");
			$(".mycontent2").css("color","blue");
		});
		$("#pass").blur(function(){
			if($(this).val()=="")
			{
			$(".mycontent2").css("top","10px");
			$(".mycontent2").css("color","gray");
			}
		});
	});
</script>
</body>
</html>
