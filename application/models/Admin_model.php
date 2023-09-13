<?php
class Admin_model extends CI_Model
{
	public function verifyEmail($email)
	{
		$this->db->where('email',$email);
		return $this->db->get('admin')->row();
	}
	public function add_employee($data)
	{
		$this->db->insert('employee',$data);
		return true;
	}
	public function add_department($data)
	{
		$this->db->insert('department',$data);
		return true;
	}
	public function get_employees()
	{
		$this->db->order_by("eid","desc");
		return $this->db->get('employee')->result();
	}
	public function get_departments()
	{
		$this->db->order_by("did","desc");
		return $this->db->get('department')->result();
	}
	public function get_leaves()
	{
		$this->db->order_by("lid","desc");
		return $this->db->get('create_leave')->result();
	}
	public function deleteEmployee($id)
	{ 
		$this->db->where('eid',$id);
		$this->db->delete("employee");
	}
	public function deleteDepartment($id)
	{
		$this->db->where('did',$id);
		$this->db->delete("department");
	}
	public function deleteLeave($id)
	{
		$this->db->where('lid',$id);
		$this->db->delete("create_leave");
	}
	public function get_employee($id)
	{
		return $this->db->where('eid',$id)->get('employee')->row();
	}
	public function get_department($id)
	{
		return $this->db->where('did',$id)->get('department')->row();
	}
	public function get_leave($id)
	{
		return $this->db->where('lid',$id)->get('create_leave')->row();
	}
	public function edit_department($data,$id)
	{
		$this->db->where('did',$id);
		$this->db->update("department",$data);
		return true;
	}
	public function edit_employee($data,$id)
	{
		$this->db->where('eid',$id);
		$this->db->update("employee",$data);
		return true;
	}
	public function edit_leave($data,$id)
	{
		$this->db->where('lid',$id);
		$this->db->update("create_leave",$data);
		return true;
	}
	public function add_create_leave($data)
	{
		$this->db->insert('create_leave',$data);
		return true;
	}
	public function getPendingLeaves()
	{
		$this->db->select("*");
		$this->db->from("employee");
		$this->db->join("emp_leave","employee.eid=emp_leave.emp_id");
		$this->db->where("status","Pending");
		$query=$this->db->get();
		return $query->result();

	}
	public function getApprovedLeaves()
	{
		$this->db->select("*");
		$this->db->from("employee");
		$this->db->join("emp_leave","employee.eid=emp_leave.emp_id");
		$this->db->where("status","Approved");
		$query=$this->db->get();
		return $query->result();

	}
	public function getDeclinedLeaves()
	{
		$this->db->select("*");
		$this->db->from("employee");
		$this->db->join("emp_leave","employee.eid=emp_leave.emp_id");
		$this->db->where("status","Declined");
		$query=$this->db->get();
		return $query->result();

	}
	public function Updatepass($password,$id)
	{
		$this->db->where("id",$id);
		$this->db->update("admin",array("password"=>$password));
		return true;
	}
	public function getAdmin($id)
	{
		$this->db->where("id",$id);
		return $this->db->get("admin")->row();
	}
	public function getLeaveHistory()
	{
		$this->db->select("*");
		$this->db->from("employee");
		$this->db->join("emp_leave","employee.eid=emp_leave.emp_id");
		$query=$this->db->get();
		return $query->result();
	}
	public function get_emp_leave($leave_id)
	{
		$this->db->select("*");
		$this->db->from("employee");
		$this->db->join("emp_leave","employee.eid=emp_leave.emp_id");
		$this->db->where("elid",$leave_id);
		$query=$this->db->get();
		return $query->row();
	}
	public function change_status($status,$leave_id)
	{
		$this->db->where("elid",$leave_id);
		$this->db->update("emp_leave",array("status"=>$status));
		return true;

	}

	//count start
	public function count_leave_types()
	{
		$query=$this->db->get("create_leave");
		return $query->num_rows();
	}
	public function count_employees()
	{
		$query=$this->db->get("employee");
		return $query->num_rows();
	}
	public function count_departments()
	{
		$query=$this->db->get("department");
		return $query->num_rows();
	}
	public function count_pending()
	{
		$this->db->where("status","Pending");
		$query=$this->db->get("emp_leave");
		return $query->num_rows();
	}
	public function count_approved()
	{
		$this->db->where("status","Approved");
		$query=$this->db->get("emp_leave");
		return $query->num_rows();
	}
	public function count_declined()
	{
		$this->db->where("status","Declined");
		$query=$this->db->get("emp_leave");
		return $query->num_rows();
	}
	//count end
}
?>
