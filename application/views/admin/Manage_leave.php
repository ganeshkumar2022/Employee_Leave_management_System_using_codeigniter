<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin panel</title>
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
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
<style>
	table th:nth-child(2)
	{
		display:none;
	}
	table td:nth-child(2)
	{
		display:none;
	}
</style>
</head>
<body>
<div>
	<div style="width:80%;height:140vh;float:right;" class="bg-info show-hide">
	<?php
	include('topbar.php');
	?>
<?php
include('ad.php');
?>
<form action="" method="post" autocomplete="off">
<h3 class="font-weight-normal text-white p-4">Manage Leave&nbsp;&nbsp;&nbsp;
		<span style="font-size:16px;" class="text-dark font-weight-bold">Home / Manage leave</span></h3>
	<div class="container-fluid">
		<div class="container py-2" style="background-color:lightgray;">
		<div class="row">

			<div class="col-md-12">
				<h3>Employee details</h3>
				    <ul class="list-unstyled">
						<li>Name : <?=$leave->firstname." ".$leave->lastname?></li>
						<li>Employee ID : <?=$leave->employee_id?></li>
						<li>Leave type : <?=$leave->leave_type?></li>
						<li>Leave status : <?=$leave->status?></li>
						<li>description : <?=$leave->description?></li>
						<li>Apply time : <?=$leave->status?></li>
						<li>Change status :
						<select class="form-control w-50" name="status" id="sel1" required>
							<option value="">---Choose status --</option>
							<option value="Pending">Pending</option>
							<option value="Approved">Approved</option>
							<option value="Declined">Declined</option>
						</select>
						</li>
						<li><input type="submit" class="btn btn-primary mt-2" name="submit"></li>
                    </ul>
			</div>
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
