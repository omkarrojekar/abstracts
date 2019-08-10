<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->model('User');
		$isSessionCreated = $this->User->check_session_is_created();
		if($isSessionCreated)
		{
			redirect('users/dashboard');
		}
		else
		{
			$this->load->view('layout/header');
			$this->load->view('public/user/login');
			$this->load->view('layout/footer');
		}
	}

	//User Registration Page
	public function registration()
	{
		$this->load->view('layout/header');
		$this->load->view('public/user/registrationPage');
		$this->load->view('layout/footer');
	}
	//
	public function register()
	{
		//print_r($userDetails);
		$this->form_validation->set_rules('fname','First Name','required');
		$this->form_validation->set_rules('lname','Last Name','required');
		$this->form_validation->set_rules('email','Email Address','required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('contact','Contact Number','required');
		$this->form_validation->set_rules('age','Age','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('address1','Address Line 1','required');
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('country','Country','required');
		$this->form_validation->set_rules('zipcode','Zipcode','required');
		$this->form_validation->set_rules('institute','Institute/Hospital','required');
		$this->form_validation->set_rules('designation','Designation','required');
		$this->form_validation->set_rules('speciality','Speciality','required');
		$this->form_validation->set_rules('username','Username','required|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('confirmpassword','Confirm Password','required');
		$userDetails = $this->input->post();
		$this->load->model('User');
		$isUserRegistered = $this->User->register($userDetails);
		if($isUserRegistered == 0)
		{
			//$this->session->set_flashdata('not_send', "There Is Some Problem to get the details so please check your deatils properly.");
			//	redirect('users/registration');
		}
		else
		{
				$this->send_confirmation_mail_to_user($isUserRegistered);
			//	$this->session->set_flashdata('email_sent', "We have received your details to confirm registration we have sent you email on your email  so please check your email id");
				//redirect('users/registration');
		}
		
	}

	//message send to user email address with confirmation link
	public function send_confirmation_mail_to_user($isUserRegistered)
	{

			$this->load->view('layout/header');
			$this->load->view('public/user/verficationlink',$isUserRegistered);
			$this->load->view('layout/footer');	
	}

	//after clicking on link provided via email 
	public function confirmregistration()
	{
		$data1 = $this->uri->segment(3);
		$data2 = $this->uri->segment(4);
		$this->load->model('User');
		$check_Weather_Details_Correct = $this->User->checkDetails($data1,$data2);
		if($check_Weather_Details_Correct == true)
		{
			$this->session->set_flashdata('verification_complete', "your verification is completed you can login Now thank you");
			redirect('users/registration');
		}
		else
		{
			$this->session->set_flashdata('verification_incomplete', "your verification is Not completed Please check your email Again");
			redirect('users/registration');
		}
		//echo $data1;
	}


	public function forgotpassword()
	{

			$this->load->view('layout/header');
			$this->load->view('public/user/forgetpassword');
			$this->load->view('layout/footer');		
	}
	//
	public function forgot_password()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('username','Username','required');
		$userDetails = $this->input->post();
		$email = $userDetails['email'];
		$username = $userDetails['username'];
		$this->load->model('User');
		$checkWeatherEmailExist = $this->User->check_email_exist($email);
		if($checkWeatherEmailExist == true)
		{
			$checkWeatherUserNameExist = $this->User->check_email_exist($email);
				if($checkWeatherUserNameExist == true)
				{
					$checkWeatherUserRegistered = $this->User->check_email_registered($email);
					if($checkWeatherUserRegistered == true)
					{
						$getBasicDetailsOfUser = $this->User->get_Basic_Details($email,$username);
						$this->send_forgot_password_link_to_user($getBasicDetailsOfUser);
						//	$this->session->set_flashdata('forget_pass_email_sent', "We have received your details to confirm registration we have sent you email on your email  so please check your email id");
						//redirect('users/forgotpassword');
					}
					else
					{
						$this->session->set_flashdata('not_registered', "The User Is not Registered here please check your email ID we have sent you confirmation Email check it then try to login");
							redirect('users');		
					}
				}
				else
				{
					$this->session->set_flashdata('user_not_exist', "The Username which you have entered is not exist please enter corrent one!!");
					redirect('users/forgotpassword');
				}
		}
		else
		{
			$this->session->set_flashdata('no_such_email', 'The Email You Entered Is Not Exist Please Enter Valid Email');
			redirect('users/forgotpassword');
		}
	}

	//
	public function send_forgot_password_link_to_user($getBasicDetailsOfUser)
	{
		$this->load->view('layout/header');
		$this->load->view('public/user/forgetpasswordlink',$getBasicDetailsOfUser);
		$this->load->view('layout/footer');
	}

	public function changepasswordpage()
	{
		$this->load->view('layout/header');
		$this->load->view('public/user/updatepassword');
		$this->load->view('layout/footer');	
	}

	public function updatepassword()
	{
		$updatePasswordDetails = $this->input->post();
		$this->load->model('User');
		$isPasswordUpdate = $this->User->update_Password($updatePasswordDetails);
		if($isPasswordUpdate == true)
		{
				$this->session->set_flashdata('password_change_success', 'Congrats!!!! Your Password Has Been Changed!!!!');
				redirect('users/forgotpassword');
		}
		else
		{
			$this->session->set_flashdata('password_change_failed', 'There Is Some Error');
				redirect('users/forgotpassword');
		}
		//print_r($updatePasswordDetails);
	}
	//
	public function login()
	{
		$this->form_validation->set_rules('email','Email Address','required');
		$this->form_validation->set_rules('password','Password','required');
		$loginDetails = $this->input->post();
		$email = $loginDetails['email'];
		$password = $loginDetails['password'];
		$this->load->model('User');

		$checkWeatherUserNameExist = $this->User->check_email_exist($email);
		{
			if($checkWeatherUserNameExist == true)
			{
				$checkWeatherUserRegistered = $this->User->check_email_registered($email);
				if($checkWeatherUserRegistered == true)
				{
						$checkPassword = $this->User->checkPassword($email,$password);
						if($checkPassword == true)
							{
								$changeLoginStatus = $this->User->change_login_status($email);
								if($changeLoginStatus == True)
								{
									$getUserDetails = $this->User->get_userdetails($email);
									//print_r($getUserName)
									$this->session->set_userdata('userid',$getUserDetails['loginid']);
									$this->session->set_userdata('username',$getUserDetails['usename']);
									//$session = $this->session->userID;
									//echo "email is =    ".$this->session->userID;;
									//echo "DashBoard";
									redirect('users/dashboard');
									//welcome_screen();
								}
							else
							{
								$this->session->set_flashdata('other_error', "There Might Be Network Issue Please Try Again");
								redirect('users');		 
							}
						}
						else
						{
							$this->session->set_flashdata('wrong_password', "The Password which you have entered is Not  Correct if you have forgot password then click on Forget Password Below");
							redirect('users');
						}
				
				} 
				else
				{
						$this->session->set_flashdata('not_registered', "The User Is not Registered here please check your email ID we have sent you confirmation Email check it then try to login");
							redirect('users');		
				}
			}
			else
			{
				$this->session->set_flashdata('user_not_exist', "The Username which you have entered is not exist please enter corrent one!!");
				redirect('users');
			}
		}
		//$isLoginDetailsCorrect = $this->User->check_Login_Details($loginDetails);
	}
	//
	public function dashboard()
	{
		$this->load->model('User');
		$isSessionCreated = $this->User->check_session_is_created();
		if($isSessionCreated)
		{
			$this->load->model('Usersabstract');
			$abstract['type'] = $this->Usersabstract->get_type();
			$abstract['category'] = $this->Usersabstract->get_category();
			$this->load->view('layout/header');
			$this->load->view('public/user/dashboard', $abstract);
			$this->load->view('layout/footer');
		}
		else
		{
			redirect('users', 'refresh');
		}
	}

	//
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users');	
	}


}
