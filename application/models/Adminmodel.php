<?php 
	class Adminmodel extends CI_Model
{
	public function index()
	{

	}

	public function check_username_valid_or_not($username)
	{
		$sql = "SELECT * FROM `admin` WHERE username = '$username'";
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

	public function check_password($username,$password)
	{
		$sql = "SELECT * FROM `admin` WHERE username = '$username' AND password = '$password'";
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
	public function get_admin_id($username)
	{
		$sql = "SELECT * FROM `admin` WHERE username = '$username'";
		$result = $this->db->query($sql);
		$row = $result->row();
		$adminId = $row->id;
		return $adminId;
	}

	public function get_all_abstract()
	{
		//$z = "SELECT abstarct.`id`,abstarct.`title`,abstarct.`type`,abstarct.`category`,abstarct.`loginid`,abstarct.`date`, users.`username`,users.`fname`,users.`lastname` FROM `abstarct`, `users` WHERE abstarct.`loginid` = users.`loginid`  AND abstarct.`status` = 1 ";

		//$query = $this->db->query("SELECT * FROM `abstarct` WHERE status = 1");
		$query = $this->db->query("SELECT abstarct.`id`,abstarct.`title`,abstarct.`type`,abstarct.`category`,abstarct.`loginid`,abstarct.`date`,abstarct.`lastupdate`,abstarct.`seenByAdmin`, users.`username`,users.`fname`,users.`lastname` FROM `abstarct`, `users` WHERE abstarct.`loginid` = users.`loginid`  AND abstarct.`status` = 1");
    	return $query->result();
	}

	public function get_count_of_registered_users()
	{
		$sql = "SELECT COUNT(*) AS total FROM users WHERE `isRegister` = 1 AND `status`= 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		$count = $row->total;
		return $count;
	}

	public function get_count_of_loggedin_users()
	{
		$sql = "SELECT COUNT(*) AS total FROM users WHERE `isLogin` = 1 AND `status`= 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		$count = $row->total;
		return $count;
	}


	public  function get_count_of_pending_register_users()
	{
		$sql = "SELECT COUNT(*) AS total FROM users WHERE `isRegister` = 0 AND `status`= 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		$count = $row->total;
		return $count;
	}

	public function get_count_of_all_abstract()
	{
		$sql = "SELECT COUNT(*) AS total FROM `abstarct` WHERE `status`= 1";
		$result = $this->db->query($sql);
		$row = $result->row();
		$count = $row->total;
		return $count;

	}

	public function change_seenByAdmin_status_of_abstract($abstractId)
	{
		$updateAbstract = $this->db->set('seenByAdmin', 'yes'); //Update Register Status
									$this->db->where('id', $abstractId); //Condition
									$this->db->update('abstarct');  //table name
		if($updateAbstract)
		{
			return true;
		}
		else
		{
			return false;
		}
	}


	public function get_username($userId)
	{
		//print_r($userId); exit();
		$sql = "SELECT `username` FROM `users` WHERE `loginid`= '$userId'";
		$result = $this->db->query($sql);
		$row = $result->row();
		return $row->username;
	}

	public function view_abstract($abstractId)
	{
		$query = $this->db->query("SELECT * FROM `abstarct` WHERE id = '$abstractId' AND  status = 1");
		return $query->result();
	}


	public function check_session_is_created()
		{
			 if($this->session->userdata('userid'))
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