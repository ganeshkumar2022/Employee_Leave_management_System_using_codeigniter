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
	<div style="width:80%;float:right;" class="bg-info show-hide">
	<?php
	include('topbar.php');
	?>
<?php
include('ad.php');
?>
<h3 class="font-weight-normal text-white p-4">Add Employee Section&nbsp;&nbsp;&nbsp;
		<span style="font-size:16px;" class="text-dark font-weight-bold">Employee / Add</span></h3>
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
	<p>Please fill the form to add Employee details</p>
			<form action="" method="post" autocomplete="off">
		<div class="form-group">
			<label for="email">Employee Id:</label>
			<input type="text" class="form-control" value="<?=$employee->employee_id?>" name="employee_id" placeholder="Enter Employee Id" required id="email">
		</div>
		<div class="form-group">
			<label for="pwd">First name:</label>
			<input type="text" class="form-control" name="firstname" value="<?=$employee->firstname?>" placeholder="Enter Firstname" required id="pwd">
		</div>
		<div class="form-group">
			<label for="pwd">Last name:</label>
			<input type="text" class="form-control" name="lastname" value="<?=$employee->lastname?>" placeholder="Enter Lastname" required id="pwd">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="text" class="form-control" name="email" value="<?=$employee->email?>" placeholder="Enter Email" required id="pwd">
		</div>
		<label>Preferred Department:</label>
		<select name="department" class="custom-select" required>
		    <option selected value="">Choose Department</option>
		    <?php
			foreach($departments as $department)
			{
				?>
				<option value="<?=$department->department_name?>" <?php if($department->department_name==$employee->department) { echo "selected"; } ?>><?=$department->department_name?></option>
				<?php
			}
			?>
	    </select>

		<label>Gender:</label>
		<select name="gender" class="custom-select" required>
		    <option selected value="">Choose Gender</option>
		    <option value="male" <?php if($employee->gender=="male") { echo "selected"; } ?>>Male</option>
		    <option value="female" <?php if($employee->gender=="female") { echo "selected"; } ?>>Female</option>
		    <option value="others" <?php if($employee->gender=="others") { echo "selected"; } ?>>Others</option>
	    </select>
		<div class="form-group">
			<label for="pwd">D.O.B:</label>
			<input type="date" class="form-control" name="dob" value="<?=$employee->dob?>" required placeholder="Enter D.O.B" id="pwd">
		</div>
		<div class="form-group">
			<label for="pwd">Contact Number:</label>
			<input type="text" class="form-control" maxlength="10" value="<?=$employee->contact?>" pattern="^[0-9]*$" name="contact" required placeholder="Enter Contact number" id="pwd">
		</div>
		<div class="form-group">
			<label for="pwd">Country:</label>
			<input type="text" class="form-control" name="country" required value="<?=$employee->country?>" placeholder="Enter Country" id="pwd">
		</div>
		<div class="form-group">
		     <label for="comment">Address:</label>
		     <textarea class="form-control" rows="5" id="comment" name="address" required placeholder="Enter your address"><?=$employee->address?></textarea>
        </div>
		<div class="form-group">
			<label for="pwd">City:</label>
			<input type="text" class="form-control" name="city" value="<?=$employee->city?>" required placeholder="Enter City" id="pwd">
		</div>
		
		<div class="form-group">
			<label for="pwd">Password for Employee login:</label>
			<div class="input-group mb-3">
			<input type="password" class="form-control" name="password" value="<?=$employee->password?>" required placeholder="Enter password" id="password">
		  <div class="input-group-append">
		  <span class="input-group-text"><i class="fa-solid fa-lock" id="mylock" onclick="show_password()"></i></span>
		  </div>
	    </div>
		</div>
		<input type="submit" class="btn btn-primary" name="submit" value="UPDATE">
		</form>
<script>
	function show_password()
	{
		let temp=document.getElementById("password");
		let lock=document.getElementById("mylock");
		if(temp.type==="password")
		{
			temp.type="text";
			lock.classList.remove("fa-lock");
			lock.classList.add("fa-lock-open");

		}
		else
		{
			temp.type="password";
			lock.classList.remove("fa-lock-open");
			lock.classList.add("fa-lock");
		}
	}
</script>
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
