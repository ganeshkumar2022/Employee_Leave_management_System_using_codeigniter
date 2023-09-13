<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin panel</title>
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
</head>
<body>
<?php
if($this->session->flashdata("success_message"))
{
echo "<script>
Swal.fire(
	'Success!',
	'Registration Success!',
	'success'
);
</script>";
}
if($this->session->flashdata("error_message"))
{
echo "<script>
Swal.fire(
	'Error!',
	'Error to register!',
	'error'
);
</script>";
}
?>
<div>
	<div style="width:80%;float:right;height:100vh;" class="bg-info show-hide">
	<?php
	include('topbar.php');
	?>
	<?php
include('ad.php');
?>
<h3 class="font-weight-normal text-white p-4">Dashboard&nbsp;&nbsp;&nbsp;
		<span style="font-size:16px;" class="text-dark font-weight-bold">Home / Admin's Dashboard</span></h3>
	<div class="container-fluid">
<div class="row">
	<div class="col-sm-4">
		<div class="card my-2">
			<div class="card-body"><p class="font-weight-bold">Leave types</p> <?=$leave_types?></div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card my-2">
			<div class="card-body"><p class="font-weight-bold">Employees</p> <?=$employees?></div>
		</div>
	</div>
	<div class="col-sm-4 ">
		<div class="card my-2">
			<div class="card-body"><p class="font-weight-bold">Departments</p> <?=$departments?></div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card my-2">
			<div class="card-body"><p class="font-weight-bold">Pending Application</p> <?=$pending?></div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card my-2">
			<div class="card-body"><p class="font-weight-bold">Declined Application</p> <?=$declined?></div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card my-2">
			<div class="card-body"><p class="font-weight-bold">Approved Application</p> <?=$approved?></div>
		</div>
		</div>
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
</body>
</html>
