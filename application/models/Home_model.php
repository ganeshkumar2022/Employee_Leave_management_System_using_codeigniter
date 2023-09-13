<?php
class Home_model extends CI_Model
{
	public function verify_login_email($email)
	{
		$this->db->where('email',$email);
		return $this->db->get('employee')->row();
	}
}
?>
