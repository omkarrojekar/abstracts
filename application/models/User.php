<?php 
class User extends CI_Model
{
	public function index()
	{

	}

	public function register($userDetails)
	{
		//print_r(NOW()); exit();
		$addressLine2 = '';
		if($userDetails['address2'])
		{
			$addressLine2 = $userDetails['address2'];	
		}
		$loginCredential = rand(11111,99999);
		$firstName = $userDetails['fname'];
		$lastName = $userDetails['lname'];
		$email = $userDetails['email'];
		$contact = $userDetails['contact'];
		$age = $userDetails['age'];
		$gender = $userDetails['gender'];
		$address = $userDetails['address1']." ".$addressLine2;
		$city = $userDetails['city'];
		$state = $userDetails['state'];
		$counrty = $userDetails['country'];
		$zipcode = $userDetails['zipcode'];
		$hospital = $userDetails['institute'];
		$designation = $userDetails['designation'];
		$speciality = $userDetails['speciality'];
		$userName = $userDetails['username'];
		$password = password_hash($userDetails['password'],PASSWORD_DEFAULT);
		$registerDate = date('Y-m-d H:i:s');
		$randData = rand(111,999);


		$run = $this->db->insert('users',['loginid'=>$loginCredential,'fname'=>$firstName,'lastname'=>$lastName,'email'=>$email,'contact'=>$contact,'age'=>$age,'gender'=>$gender,'address'=>$address,'city'=>$city,'state'=>$state,'country'=>$counrty,'zipcode'=>$zipcode,'hospital'=>$hospital,'designation'=>$designation,'speciality'=>$speciality,'username'=>$userName,'password'=>$password,'registerdate'=>$registerDate,'randData'=>$randData]);
				//$run1 = $this->db->insert('user_session',['session'=>$id]);
				if($this->db->affected_rows()===1)
				{
					$authenticateDetails = array();
					$authenticateDetails['randData'] = $randData;
					$authenticateDetails['logincredentails'] = $loginCredential;
					return $authenticateDetails;
				}
				else
				{
					return 0;
				}
	}

	public function checkDetails($data1,$data2)
	{
		$sql = "SELECT * FROM `users` WHERE loginid = '$data1' AND randData = '$data2' ";
		$result = $this->db->query($sql);
		$row = $result->row();
		 if($row)
		 {
		 	$changePreferennces = $this->_change_preference($data1);
		 	if($changePreferennces == true)
		 	{
		 		return true;
		 	}
		 	else
		 	{
		 		return false;
		 	}
		 }
		 else
		 {
		 	return false;
		}
	}

	function _change_preference($data1)
	{
		$updateRandomData = $this->db->set('isregister', 1) //Update Register Status
								->where('loginid', $data1) //Condition
									->update('users');  //table name
		if($updateRandomData)
		{
			return true;	
		}
		else
		{
			return false;
		}
	}
		public function check_session_is_created()
		{
			 if(($this->session->userdata('userid')) && ($this->session->userdata('username')))
			 {
			 	return true;
			 	//reidrect('users', 'refresh');
			 }
			 else
			 {
			 	return false;
			 }
		}
	function check_Login_Details($loginDetails)
	{
		$username = $loginDetails['username'];
		$password = $loginDetails['password'];
		$checkWeatherUserNameExist = $this->_check_username_exist($username); //Will Check Weather User Is Exist With The Username Or Not
		if($checkWeatherUserNameExist == 1)
		{
			$checkWeatherUserNameAlreadyLoggedin = $this->_check_weather_user_loggedin($username); //Will Check Weather User Is Login or not
			if($checkWeatherUserNameAlreadyLoggedin == true)
			{
				$checkPassword = $this->_checkPassword($username,$password);
				if($checkPassword == true)
				{
					$changeLoginStatus = $this->_change_login_status($username);
					if($changeLoginStatus)
					{
						return true;
					}
					else
					{
						echo "Some Error Is There";
					}
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}

		}
		else
		{
			return $checkWeatherUserNameExist;
		}

	}
	public function check_email_exist($email)
	{
		$sql = "SELECT * FROM `users` WHERE email = '$email'";
			$result = $this->db->query($sql);
			$row = $result->row();
		 	if($row)
		 	{
		 		return true;
		 	}
		 	else
		 	{
		 		return false;
		 	}
	}


	public function check_username_exist($username)
	{
		$sql = "SELECT * FROM `users` WHERE username = '$username'";
			$result = $this->db->query($sql);
			$row = $result->row();
		 	if($row)
		 	{
		 		return true;
		 	}
		 	else
		 	{
		 		return false;
		 	}
	}
	public function check_email_registered($email)
	{
		$sql = "SELECT * FROM `users` WHERE email = '$email'";
			$result = $this->db->query($sql);
			$row = $result->row();
		 	if($row->isRegister == 1)
		 	{
		 		return true;
		 	}
		 	else
		 	{
		 		return false;
		 	}
	}

	public function check_weather_user_loggedin($username)
	{
		$sql = "SELECT * FROM `users` WHERE username = '$username'";
			$result = $this->db->query($sql);
			$row = $result->row();
		 	if($row->isLogin == 0)
		 	{
		 		return true;
		 	}
		 	else
		 	{
		 		return false;
		 	}
	}		

	function checkPassword($email,$password)
	{
		$sql = "SELECT * FROM `users` WHERE email = '$email'";
			$result = $this->db->query($sql);
			$row = $result->row();
			$counter = password_verify($password,$row->password);
		 	if($counter == 1)
		 	{
		 		return true;
		 	}
		 	else
		 	{
		 		return false;
		 	}
	}
	function change_login_status($username)
	{
		$updateLoginStatus = $this->db->set('isLogin', 1) //Update Register Status
								->where('username', $username) //Condition
									->update('users');  //table name
		if($updateLoginStatus)
		{
			return true;	
		}
		else
		{
			return false;
		}
	}

	function get_userdetails($email)
	{
		$sql = "SELECT * FROM `users` WHERE email = '$email'";
			$result = $this->db->query($sql);
			$row = $result->row();
			$userDetails = array();
			$userDetails['usename'] = $row->username;
			$userDetails['loginid'] = $row->loginid;
		 	return $userDetails;
	}



	function get_Basic_Details($email,$username)
	{
		$sql = "SELECT * FROM `users` WHERE username = '$username' AND email = '$email'";
			$result = $this->db->query($sql);
			$row = $result->row();
		 	if($row)
		 	{
		 		$basicDetails = array();
		 		$basicDetails['loginCredential'] = $row->loginid;
		 		$basicDetails['id'] = $row->id;
		 		return $basicDetails;
		 	}
		 	else
		 	{
		 		return false;
		 	}
	}

	public function update_Password($updatePasswordDetails)
	{
		$newPassword =  password_hash($updatePasswordDetails['password'],PASSWORD_DEFAULT);
		$loginID =  $updatePasswordDetails['loginid'];
		$id = ($updatePasswordDetails['id']/5);
		//print_r($id); exit();
		$updatePassword = $this->db->set('password', $newPassword) //Update Register Status
								->where('id', $id) //Condition
									->update('users');  //table name
		if($updatePassword)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}

 ?>
