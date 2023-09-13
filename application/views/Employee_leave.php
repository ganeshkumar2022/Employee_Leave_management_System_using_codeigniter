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
	'Leave Application Submitted!',
	'success'
);
</script>";
}
if($this->session->flashdata("error_message"))
{
echo "<script>
Swal.fire(
	'Error!',
	'Error to submit a Leave application!',
	'error'
);
</script>";
}
?>
<div>
	<div style="width:80%;float:right;height:160vh;" class="bg-info show-hide">
	<?php
	include('topbar.php');
	?>
	<?php
	include('dropdown.php');
	?>
<h3 class="font-weight-normal text-white p-4">Apply For Leave Days&nbsp;&nbsp;&nbsp;
		<span style="font-size:16px;" class="text-dark font-weight-bold">Leave Form</span></h3>
	<div class="container-fluid">
	<div class="card my-2">
	<div class="card-body">
	<h4>Employee Leave Form</h4>
	<p>Please fill the form Below</p>
			<form action="<?=base_url('user/add_leave')?>" method="post" autocomplete="off">
		<div class="form-group">
			<label for="email">Starting date:</label>
			<input type="date" class="form-control" name="start_date" required id="email">
		</div>
		<div class="form-group">
			<label for="email">End date:</label>
			<input type="date" class="form-control" name="end_date" required id="email">
		</div>
		<div class="form-group">
  <label for="sel1">Your Leave type:</label>
  <select class="form-control" id="sel1" required name="leave_type">
    <option value="">Choose leave type</option>
	<?php
	foreach($leave as $leave)
	{
		?>
		<option value="<?=$leave->leave_type?>"><?=$leave->leave_type?></option>
		<?php
	}
	?>
  </select>
</div>
		<div class="form-group">
			<label for="comment">Description your Conditions:</label>
			<textarea class="form-control" rows="5" id="comment" name="description" required placeholder="Describe your conditions"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">SUBMIT</button>
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
	$(document).ready(function(){
		var a=$(".mysel1").outerWidth();
		$(".mysel2").css("width",a);
	});
</script>
</body>
</html>
