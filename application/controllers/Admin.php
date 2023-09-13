<?php
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}
	public function index()
	{
		$this->load->view('admin_login');
	}
	public function login_verify()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($user=$this->admin_model->verifyEmail($email))
		{
			if($password== base64_decode($user->password))
			{
			$this->session->set_flashdata("success","Login successfully");
			$this->session->set_userdata('aid',$user->id);
			redirect("admin/dashboard");
			}
			else
			{
			$this->session->set_flashdata("error","Email or pasword incorrect");
			redirect("admin");
			}
		}
		else
		{
			$this->session->set_flashdata("error","Email or pasword incorrect");
			redirect("admin");
		}
		
	}
	public function dashboard()
	{
		$data["leave_types"]=$this->admin_model->count_leave_types();
		$data["employees"]=$this->admin_model->count_employees();
		$data["departments"]=$this->admin_model->count_departments();
		$data["pending"]=$this->admin_model->count_pending();
		$data["approved"]=$this->admin_model->count_approved();
		$data["declined"]=$this->admin_model->count_declined();
		$this->load->view("admin/dashboard",$data);
	}
	public function employee_section()
	{
		$employees=$this->admin_model->get_employees();
		$this->load->view("admin/employee_section",array("employees"=>$employees));
	}
	public function department_section()
	{
		$employees=$this->admin_model->get_departments();
		$this->load->view("admin/department_section",array("employees"=>$employees));
	}
	public function leave_section()
	{
		$employees=$this->admin_model->get_leaves();
		$this->load->view("admin/leave_section",array("employees"=>$employees));
	}
	public function add_employee()
	{
		$departments=$this->admin_model->get_departments();
		$this->load->view("admin/add_employee",array('departments'=>$departments));
	}
	public function add_department()
	{
		$this->load->view("admin/add_department");
	}
	public function add_leave()
	{
		$this->load->view("admin/add_leave");
	}
	public function verify_add_leave()
	{
		$data["leave_type"]=$this->input->post('leave_type');
		$data["description"]=$this->input->post('description');
		$response=$this->admin_model->add_create_leave($data);
		if($response==true)
		{
			$this->session->set_flashdata("success_message","Create Leave type successfully");
			redirect("admin/add_leave");
		}
		else
		{
			$this->session->set_flashdata("error_message","Error to create leave type");
			redirect("admin/add_leave");
		}
	}
	public function verify_add_employee()
	{
		$data["employee_id"]=$this->input->post('employee_id');
		$data["firstname"]=$this->input->post('firstname');
		$data["lastname"]=$this->input->post('lastname');
		$data["email"]=$this->input->post('email');
		$data["department"]=$this->input->post('department');
		$data["gender"]=$this->input->post('gender');
		$data["dob"]=$this->input->post('dob');
		$data["contact"]=$this->input->post('contact');
		$data["country"]=$this->input->post('country');
		$data["address"]=$this->input->post('address');
		$data["city"]=$this->input->post('city');
		$data["password"]=$this->input->post('password');

		$response=$this->admin_model->add_employee($data);
		if($response==true)
		{
			$this->session->set_flashdata("success_message","register success");
			redirect("admin/add_employee");
		}
		else
		{
			$this->session->set_flashdata("error_message","Error to register");
			redirect("admin/add_employee");
		}
	}
	public function verify_add_department()
	{
		$data["department_name"]=$this->input->post('department_name');
		$data["short_form"]=$this->input->post('short_form');
		$data["code"]=$this->input->post('code');
		$response=$this->admin_model->add_department($data);
		if($response==true)
		{
			$this->session->set_flashdata("success_message","Department added successfully");
			redirect("admin/add_department");
		}
		else
		{
			$this->session->set_flashdata("error_message","Error to add department");
			redirect("admin/add_department");
		}
	}
	public function pending()
	{
		$pending=$this->admin_model->getPendingLeaves();
		$this->load->view("admin/pending",array("pending"=>$pending));
	}
	public function approved()
	{
		$pending=$this->admin_model->getApprovedLeaves();
		$this->load->view("admin/approved",array("pending"=>$pending));
	}
	public function declined()
	{
		$pending=$this->admin_model->getDeclinedLeaves();
		$this->load->view("admin/declined",array("pending"=>$pending));
	}
	public function leave_history()
	{
		$pending=$this->admin_model->getLeaveHistory();
		$this->load->view("admin/leave_history",array("pending"=>$pending));
	}

	public function delete_employee($id)
	{
		$this->admin_model->deleteEmployee($id);
		redirect("admin/employee_section");
	}
	public function delete_department($id)
	{
		$this->admin_model->deleteDepartment($id);
		redirect("admin/department_section");
	}
	public function delete_leave($id)
	{
		$this->admin_model->deleteLeave($id);
		redirect("admin/leave_section");
	}
	public function edit_employee($id)
	{
		$success=$error="";
		$departments=$this->admin_model->get_departments();
		$employee=$this->admin_model->get_employee($id);
		if($this->input->post('submit'))
		{
		$data["employee_id"]=$this->input->post('employee_id');
		$data["firstname"]=$this->input->post('firstname');
		$data["lastname"]=$this->input->post('lastname');
		$data["email"]=$this->input->post('email');
		$data["department"]=$this->input->post('department');
		$data["gender"]=$this->input->post('gender');
		$data["dob"]=$this->input->post('dob');
		$data["contact"]=$this->input->post('contact');
		$data["country"]=$this->input->post('country');
		$data["address"]=$this->input->post('address');
		$data["city"]=$this->input->post('city');
		$data["password"]=$this->input->post('password');
			$response=$this->admin_model->edit_employee($data,$id);
			if($response==true)
			{
				$success="Employee details updated successfully";
				header("Refresh:2");
			}
			else
			{
				$error="Error to Update Employee details";
			}

		}
		$this->load->view('admin/edit_employee',array('employee'=>$employee,'departments'=>$departments,'success'=>$success,'error'=>$error));
	}
	public function edit_department($id)
	{
		$success=$error="";
		$employee=$this->admin_model->get_department($id);
		if($this->input->post('submit'))
		{
			$data["department_name"]=$this->input->post('department_name');
			$data["short_form"]=$this->input->post('short_form');
			$data["code"]=$this->input->post('code');
			$response=$this->admin_model->edit_department($data,$id);
			if($response==true)
			{
				$success="Department updated successfully";
				header("Refresh:2");
			}
			else
			{
				$error="Error to Update department";
			}

		}
		
		$this->load->view('admin/edit_department',array('department'=>$employee,'success'=>$success,'error'=>$error));
	}
	public function edit_leave($id)
	{
		$success=$error="";
		$employee=$this->admin_model->get_leave($id);
		if($this->input->post('submit'))
		{
			$data["leave_type"]=$this->input->post('leave_type');
			$data["description"]=$this->input->post('description');
			$response=$this->admin_model->edit_leave($data,$id);
			if($response==true)
			{
				$success="Leave type updated successfully";
				header("Refresh:2");
			}
			else
			{
				$error="Error to Update Leave type";
			}

		}
		
		$this->load->view('admin/edit_leave',array('leave'=>$employee,'success'=>$success,'error'=>$error));
	}
	public function manage_leave($id)
	{
		$leave_id=$id;
		$get_emp_leave=$this->admin_model->get_emp_leave($leave_id);
		$this->load->view("admin/manage_leave",array("leave"=>$get_emp_leave));
		if($this->input->post("submit"))
		{
			$status=$this->input->post("status");
			$response=$this->admin_model->change_status($status,$leave_id);
			if($response==true)
			{
				echo "<script>alert('Response changed successfully');</script>";
			}
			else
			{
				echo "<script>alert('Error to change response');</script>";
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata("aid");
		redirect("admin");
	}
	public function change_password()
	{
		
		$this->load->view("admin/change_password");
		if($this->input->post("update"))
		{
			$password=base64_encode($this->input->post("password"));
			$id=$this->session->userdata("aid");
			$response=$this->admin_model->Updatepass($password,$id);
			if($response==true)
			{
				echo "<script>alert('Password updated successfully');</script>";
			}
			else
			{
				echo "<script>alert('Error to update a password');</script>";
			}
		}
	}
	
}
?>
