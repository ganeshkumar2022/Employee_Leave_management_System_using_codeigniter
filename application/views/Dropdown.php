
<div class="dropdown">
  <button type="button" class="float-right btn btn-primary mysel1 btn-lg" data-toggle="dropdown">
    <img src="<?=base_url('assets/image/admin.png')?>" style="height:50px;"><?=$user->firstname?> <?=$user->lastname?>&nbsp;&nbsp;<i class="fa-solid fa-angle-down small"></i>
  </button>
  <div class="dropdown-menu mysel2">
    <a class="dropdown-item" href="<?=base_url('user/update_profile')?>">Update profile</a>
    <a class="dropdown-item" href="<?=base_url('user/change_password')?>">Change password</a>
    <a class="dropdown-item" href="<?=base_url('user/logout')?>">Logout</a>
  </div>
</div>
