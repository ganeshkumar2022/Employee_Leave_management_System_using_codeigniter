<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee panel | View Leave History </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<?php
if($this->session->flashdata("success_message"))
{
echo "<script>
Swal.fire(
	'Success!',
	'Password updated successfully',
	'success'
);
</script>";
}
if($this->session->flashdata("error_message"))
{
echo "<script>
Swal.fire(
	'Error!',
	'Error to update password!',
	'error'
);
</script>";
}
?>
<div>
	<div style="width:80%;float:right;height:250vh;" class="bg-info show-hide">
	<?php
	include('topbar.php');
	?>
	<?php
	include('dropdown.php');
	?>
<h3 class="font-weight-normal text-white p-4">Change password&nbsp;&nbsp;&nbsp;
		<span style="font-size:16px;" class="text-dark font-weight-bold"></span></h3>
	<div class="container-fluid">
	<div class="card my-2">
	<div class="card-body">
	<form action="<?=base_url('user/update_new_password')?>" method="post" autocomplete="off">
		<div class="form-group">
			<label for="pwd">New Password:</label>
			<input type="password" class="form-control" name="password" placeholder="Enter password" required id="pwd">
		    <input type="checkbox" class="checkb mt-n2" onclick="fun()"> Show password
		
		</div>
		
		<button type="submit" class="btn btn-primary">Update password</button>
		</form>
</div>
</div>
    </div>
	</div>
	<div style="width:20%;position:fixed;" class="mylastclass">
	<?php
	include('leftbar.php');
	?>
    </div>
</div>
<script>
function fun()
{
x=document.getElementById("pwd");
if(x.type==="password")
{
	x.type="text";
}
else
{
	x.type="password";
}
}
</script>
</body>
</html>
