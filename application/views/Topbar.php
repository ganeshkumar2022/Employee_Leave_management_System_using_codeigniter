<div class="card">
	<div class="card-body">
		<a><i class="fa-solid fa-x text-secondary toggle-class" style="font-size:20px;"></i></a>
		<a href=""><i class="fa-solid fa-bell text-secondary float-right" style="font-size:20px;"></i></a>
    </div>
</div>
<script>
	$(document).ready(function(){
		$(".toggle-class").click(function(){
			if($(".show-hide").width()=="1079.19" || $(".show-hide").width()=="1092.8")
			{
			$(".show-hide").css("width","100%");
			$(".mylastclass").css("margin-left","-20%");
			}
			else
			{
			$(".show-hide").css("width","80%");
			$(".mylastclass").css("margin-left","0%");
			}
		});
	});
</script>
