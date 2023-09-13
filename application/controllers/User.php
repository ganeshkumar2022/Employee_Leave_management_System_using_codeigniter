<?php
class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("cookie");
		$this->load->model('user_model');
	}
	public function index()
	{
		
		if(get_cookie("eid")!="")
		{
		$id=get_cookie('eid');
		$leave=$this->user_model->get_leave();
		$user=$this->user_model->getUser($id);
		$this->load->view("employee_leave",array('user'=>$user,'leave'=>$leave));
		}
		else
		{
			redirect("home");
		}
	}
	public function view_leave()
	{
		if(get_cookie("eid")!="")
		{
		$id=get_cookie("eid");
		$user=$this->user_model->getUser($id);
		$emp=$this->user_model->viewLeave($id);
		$this->load->view("Leave_history",array("emp"=>$emp,'user'=>$user));
		}
		else
		{
			redirect("home");
		}
	}
	public function update_profile()
	{
		if(get_cookie("eid")!="")
		{
			$id=get_cookie("eid");
			$user=$this->user_model->getUser($id);
			$departments=$this->user_model->getDepartments();
			$this->load->view("update_profile",array('user'=>$user,'departments'=>$departments));
		}
		else
		{
			redirect("home");
		}
	}
	public function update_new_password()
	{
		$id=get_cookie("eid");
		$password=$this->input->post("password");
		$response=$this->user_model->change_password($id,$password);
		if($response==true)
		{
			$this->session->set_flashdata("success_message","Update password successfully");
			redirect("user/change_password");
		}
		else
		{
			$this->session->set_flashdata("error_message","Error to update password");
			redirect("user/change_password");
		}
	}
	public function change_password()
	{
		if(get_cookie("eid")!="")
		{
			$id=get_cookie("eid");
			$user=$this->user_model->getUser($id);
			$departments=$this->user_model->getDepartments();
			$this->load->view("change_password",array('user'=>$user,'departments'=>$departments));
		}
		else
		{
			redirect("home");
		}
	}
	public function update_employee_profile()
	{
		$id=get_cookie("eid");
		$data["firstname"]=$this->input->post("firstname");
		$data["lastname"]=$this->input->post("lastname");
		$data["email"]=$this->input->post("email");
		$data["gender"]=$this->input->post("gender");
		$data["dob"]=$this->input->post("dob");
		$data["contact"]=$this->input->post("contact");
		$data["country"]=$this->input->post("country");
		$data["address"]=$this->input->post("address");
		
		$response=$this->user_model->update_profile($data,$id);
		if($response==true)
		{
			$this->session->set_flashdata("success_message","Update leave successfully");
			redirect("user/update_profile");
		}
		else
		{
			$this->session->set_flashdata("error_message","Error to update leave");
			redirect("user/update_profile");
		}
	}
	public function add_leave()
	{
		$data["emp_id"]=get_cookie('eid');
		$data["start_date"]=$this->input->post("start_date");
		$data["end_date"]=$this->input->post("end_date");
		$data["leave_type"]=$this->input->post("leave_type");
		$data["description"]=$this->input->post("description");
		$response=$this->user_model->addEmployeeLeave($data);
		if($response==true)
		{
			$this->session->set_flashdata("success_message","Add leave successfully");
			redirect("user");
		}
		else
		{
			$this->session->set_flashdata("error_message","Error to add leave");
			redirect("user");
		}

	}
	public function logout()
	{
		delete_cookie("eid");
		redirect("home");
	}
}
?>
