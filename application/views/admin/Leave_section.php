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
<h3 class="font-weight-normal text-white p-4">Leave Section&nbsp;&nbsp;&nbsp;
		<span style="font-size:16px;" class="text-dark font-weight-bold">Home / Manage Type</span></h3>
	<div class="container-fluid">
		<div class="container py-2" style="background-color:lightgray;">
		  <center>
		     <a class="btn btn-danger" href="<?=base_url('admin/add_leave')?>">Add new Leave Type</a>
          </center>
		<div class="row">
			<div class="col-md-12">
				    
			<table id="example" class="table table-striped table-sm table-bordered" style="width:100%">
        <thead class=thead-dark>
            <tr>
                <th>Leave type</th>
				<th></th>
                <th>Description</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
<?php
foreach($employees as $employee)
{
?>
            <tr>
                <td><span class="my-dpt"></span>&nbsp;&nbsp;<?=$employee->leave_type?></td>
			<td></td>
            <td><?=$employee->description?><br>
			<span class="edit-opt" style="display:none;">
			   <a href="<?=base_url('admin/edit_leave/'.$employee->lid)?>"><i class="fa-regular fa-pen-to-square" style="color: #16df37;"></i></a>
			   <a href="<?=base_url('admin/delete_leave/'.$employee->lid)?>"><i class="fa-solid fa-circle-xmark" style="color: #ed230c;"></i></a>
            </span>
		    </td>
                <td><?=$employee->created_at?></td>
            </tr>
<?php
}
?>
        </tbody>
    </table>
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
<script>
$(document).ready(function(){
    $('#example').DataTable();
    $('<i class="fa-solid fa-circle-plus myplus" style="color: #20b123;"></i>').insertBefore(".my-dpt");
	$(".myplus").click(function(){
		if($(this).hasClass("fa-circle-plus"))
		{
		    $(this).removeClass("fa-circle-plus");
		    $(this).addClass("fa-circle-minus").css("color","red");
		}
		else
		{
			$(this).removeClass("fa-circle-minus");
		    $(this).addClass("fa-circle-plus").css("color","#20b123");
		}
		$(this).parent().next().next().find(".edit-opt").toggle();
	});
});
</script>
</body>
</html>
