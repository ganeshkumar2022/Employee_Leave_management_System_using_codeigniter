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
<h3 class="font-weight-normal text-white p-4">Manage Leave&nbsp;&nbsp;&nbsp;
		<span style="font-size:16px;" class="text-dark font-weight-bold">Home / Pending</span></h3>
	<div class="container-fluid">
		<div class="container py-2" style="background-color:lightgray;">
		<div class="row">
			<div class="col-md-12">
				    
			<table id="example" class="table table-striped table-sm table-bordered" style="width:100%">
        <thead class=thead-dark>
            <tr>
                <th>Name</th>
                <th>Employee Id</th>
                <th>description</th>
                <th>Leave type</th>
				<th>Applied on</th>
                <th>Current status</th>
                <th>Manage</th>
            </tr>
        </thead>
        <tbody>
<?php
foreach($pending as $pending)
{
?>
            <tr>
                <td><span class="my-dpt"></span>&nbsp;&nbsp;<?=$pending->firstname." ".$pending->lastname?></td>
                <td><?=$pending->employee_id?></td>
                <td><?=$pending->description?></td>
                <td><?=$pending->leave_type?></td>
                <td><?=$pending->Apply_time?></td>
                <td><?=$pending->status?></td>
				<td><a class="btn btn-secondary" href="<?=base_url('admin/manage_leave/'.$pending->elid)?>">View Details</a></td>
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
    //$('<i class="fa-solid fa-circle-plus myplus" style="color: #20b123;"></i>').insertBefore(".my-dpt");
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
