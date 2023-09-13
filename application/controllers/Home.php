<?php
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("cookie");
		$this->load->model("home_model");
	}
	public function index()
	{
		if(get_cookie("eid")!="")
		{
			redirect("user");
		}
		else
		{
		$this->load->view("home");
		}
	}
	public function employee_login()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		if($user=$this->home_model->verify_login_email($email))
		{
			if($user->password==$password)
			{
				set_cookie("eid",$user->eid,3600);
				redirect("user");
			}
			else
			{
			   $this->session->set_flashdata("error","Incorrect Email or Password");
			   redirect("home");
			}
		}
		else
		{
			$this->session->set_flashdata("error","Email not exists");
			redirect("home");
		}
	}
}
?>

