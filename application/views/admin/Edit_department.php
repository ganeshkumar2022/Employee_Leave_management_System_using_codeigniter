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
	'Add Department successfully!',
	'success'
);
</script>";
}
if($this->session->flashdata("error_message"))
{
echo "<script>
Swal.fire(
	'Error!',
	'Error to add Department!',
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
<h3 class="font-weight-normal text-white p-4">Department Section&nbsp;&nbsp;&nbsp;
		<span style="font-size:16px;" class="text-dark font-weight-bold">Department / Add</span></h3>
	<div class="container-fluid">
	<div class="card my-2">
	<div class="card-body">
	<div class="text-center">
		<span class="text-danger">
			<?php
			if(isset($error))
			{
				echo $error;
			}
			?>
		</span>
		<span class="text-success">
		<?php
			if(isset($success))
			{
				echo $success;
			}
			?>
		</span>
	</div>
	<p>Please fill the form to add new department</p>
			<form action="" method="post" autocomplete="off">
		<div class="form-group">
			<label for="email">Department name:</label>
			<input type="text" class="form-control" value="<?=$department->department_name?>" name="department_name" placeholder="Enter Department name" required id="email">
		</div>
		<div class="form-group">
			<label for="pwd">Short form:</label>
			<input type="text" class="form-control" name="short_form" value="<?=$department->short_form?>" placeholder="Enter Short form" required id="pwd">
		</div>
		<div class="form-group">
			<label for="pwd">Code:</label>
			<input type="text" class="form-control" name="code" value="<?=$department->code?>" placeholder="Enter Code" required id="pwd">
		</div>
		<input type="submit" name="submit" class="btn btn-primary" value="UPDATE">
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
</body>
</html>
