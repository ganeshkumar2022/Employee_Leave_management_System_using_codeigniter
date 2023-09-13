<?php
class User_model extends CI_Model
{
	public function getUser($id)
	{
		$this->db->where('eid',$id);
		return $this->db->get("employee")->row();
	}
	public function get_leave()
	{
		return $this->db->get("create_leave")->result();
	}
	public function addEmployeeLeave($data)
	{
		$this->db->insert("emp_leave",$data);
		return true;
	}
	public function viewLeave($id)
	{
		$this->db->where("emp_id",$id);
		return $this->db->get("emp_leave")->result_array();
	}
	public function getDepartments()
	{
		return $this->db->get("department")->result();
	}
	public function update_profile($data,$id)
	{
		$this->db->where("eid",$id);
		$this->db->update("employee",$data);
		return true;
	}
	public function change_password($id,$password)
	{
		$this->db->where("eid",$id);
		$this->db->update("employee",array("password"=>$password));
		return true;
	}
}
?>
