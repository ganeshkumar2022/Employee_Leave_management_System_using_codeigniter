<ul class="nav mynav flex-column">
<li class="nav-item">
    <img src="<?=base_url('assets/image/logo.png')?>" class="img-fluid">
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('admin/dashboard')?>"><i class="fa-solid fa-gauge"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('admin/employee_section')?>"><i class="fa-solid fa-address-card"></i>&nbsp;&nbsp;&nbsp;Employee section</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('admin/department_section')?>"><i class="fa-solid fa-table-cells-large"></i>&nbsp;&nbsp;&nbsp;Department section</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?=base_url('admin/leave_section')?>"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;&nbsp;Leave types</a>
  </li>
  <li class="nav-item">
    <a class="nav-link menu_sub" style="cursor:pointer;"><i class="fa-solid fa-toolbox"></i>&nbsp;&nbsp;&nbsp;Manage Leave
		<i class="fa-solid mt-1 fa-angle-down float-right myrights"></i>
	  </a>
  </li>
	<div class="emp-leave" style="display:none;">
	<li class="nav-item">
    <a class="nav-link ml-4" href="<?=base_url('admin/pending')?>"><i class="fa-solid fa-spinner"></i>&nbsp;&nbsp;&nbsp;Pending</a>
  </li>
	<li class="nav-item">
    <a class="nav-link ml-4" href="<?=base_url('admin/approved')?>"><i class="fa-solid fa-check-double"></i>&nbsp;&nbsp;&nbsp;Approved</a>
  </li>
	<li class="nav-item">
    <a class="nav-link ml-4" href="<?=base_url('admin/declined')?>"><i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;&nbsp;Declined</a>
  </li>
	<li class="nav-item">
    <a class="nav-link ml-4" href="<?=base_url('admin/leave_history')?>"><i class="fa-solid fa-clock-rotate-left"></i>&nbsp;&nbsp;&nbsp;Leave History</a>
  </li>
</div>
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('admin/logout')?>"><i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;&nbsp;&nbsp;Logout</a>
  </li>

</ul>
<script>
	$(document).ready(function(){
		$(".menu_sub").click(function(){
			if($(".myrights").hasClass("fa-angle-down"))
			{
				$(".myrights").removeClass("fa-angle-down");
				$(".myrights").addClass("fa-angle-up");
			}
			else
			{
				$(".myrights").removeClass("fa-angle-up");
				$(".myrights").addClass("fa-angle-down");
			}
			$(".emp-leave").toggle("slow");
		});
	});
</script>
