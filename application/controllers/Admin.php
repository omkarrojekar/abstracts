<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->model('Adminmodel');
		$isSessionCreated = $this->Adminmodel->check_session_is_created();
		if($isSessionCreated)
		{
			redirect('admin/dashboard');
		}
		else
		{
			$this->load->view('layout/header');
			$this->load->view('public/admin/adminlogin');
			$this->load->view('layout/footer');
		}
	}


	public function login()
	{
		$adminLoginCredentials = $this->input->post();
		$username = $adminLoginCredentials['username'];
		$password = $adminLoginCredentials['password'];
		$this->load->model('Adminmodel');
		$checkAdminUsername = $this->Adminmodel->check_username_valid_or_not($username);
		if($checkAdminUsername)
		{
			$checkPassword = $this->Adminmodel->check_password($username,$password);
			if($checkPassword)
			{
				$getAdminId = $this->Adminmodel->get_admin_id($username);
				$this->session->set_userdata('userid',$getAdminId);
				redirect('admin/dashboard');
			}
			else
			{
				$this->session->set_flashdata('wrong_password', "Invalid Password!!");
				redirect('admin');
			}
		}
		else
		{
			$this->session->set_flashdata('wrong_username', "Username you have entered is not valid please enter valid Username!!");
			redirect('admin');
		}
		//print_r($adminLoginCredentials);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');	
	}

	public function dashboard()
	{
		$this->load->model('Adminmodel');
		$isSessionCreated = $this->Adminmodel->check_session_is_created();
		if($isSessionCreated)
		{
			$getAllAbstract['getAllAbstract'] = $this->Adminmodel->get_all_abstract();
			$getAllAbstract['counOfRegisteredUsers'] = $this->Adminmodel->get_count_of_registered_users();
			$getAllAbstract['counOfPendingRegisterUsers'] = $this->Adminmodel->get_count_of_pending_register_users();
			$getAllAbstract['countOfAbstracts'] = $this->Adminmodel->get_count_of_all_abstract();
			$getAllAbstract['counOfLoggedInUsers'] = $this->Adminmodel->get_count_of_loggedin_users();
			$this->load->view('public/admin/layout/header');
			$this->load->view('public/admin/dashboard',$getAllAbstract);
			$this->load->view('public/admin/layout/footer');
		}
		else
		{
			redirect('admin', 'refresh');
		}
	}

	public function viewabstract()
	{
		$this->load->model('Adminmodel');
		$isSessionCreated = $this->Adminmodel->check_session_is_created();
		if($isSessionCreated)
		{
			$abstractId = ($this->uri->segment(3)/1250);
			$userId = ($this->uri->segment(4)/250);
			$this->load->model('Usersabstract');
			$checkAbstarctISAvailable = $this->Usersabstract->check_weather_abstract_available($abstractId,$userId);
			if($checkAbstarctISAvailable)
			{
				$this->load->model('Adminmodel');
				$changeSeenByAdminstatus = $this->Adminmodel->change_seenByAdmin_status_of_abstract($abstractId);
				if($changeSeenByAdminstatus)
				{
					$absttractData['absttractData'] = $this->Adminmodel->view_abstract($abstractId);
					$absttractData['userName'] = $this->Adminmodel->get_username($userId);
					$this->load->view('public/admin/layout/header');
					$this->load->view('public/admin/singleview',$absttractData);
					$this->load->view('public/admin/layout/footer');	
				}
				else
				{
					$this->session->set_flashdata('problem_to_load_abstract', "There Is A Network error please Try again!!");
					redirect('admin/dashboard', 'refresh');
				}
			}
			else
			{
				$this->session->set_flashdata('no_such_abstract', "The Abstract Is not available!!");
				redirect('admin/dashboard', 'refresh');
			}
			
		}
		else
		{
			redirect('admin', 'refresh');
		}
	}

}
