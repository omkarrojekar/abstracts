<?php 
class Usersabstract extends CI_Model
{
	public function index()
	{

	}

	public function get_type()
	{
		$query = $this->db->query('SELECT `type` FROM `type` WHERE 1');
    	return $query->result();
	}

	public function get_category()
	{
		$query = $this->db->query('SELECT `category` FROM `category` WHERE 1');
    	return $query->result();
	}

	public function save_abstract($abstractData,$fileName)
	{	
		$uploadDate = date('Y-m-d H:i:s');
		$title = $abstractData['title'];
		$category = $abstractData['category'];
		$type = $abstractData['type'];
		$authors = $abstractData['authores'];
		$background = $abstractData['background'];
		$method = $abstractData['method'];
		$result = $abstractData['result'];
		$conclusion = $abstractData['conclusion'];
		//$imageupload = $abstractData['abstractImage'];

		$run = $this->db->insert('abstarct',['loginid'=>$this->session->userid,'title'=>$title,'category'=>$category,'type'=>$type,'authors'=>$authors,'background'=>$background,'method'=>$method,'result'=>$result,'conclusion'=>$conclusion,'imageupload'=>$fileName,'date'=> $uploadDate]);
		if($run)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function see_all_abstract()
	{
		$userid = $this->session->userid;
		$query = $this->db->query("SELECT * FROM `abstarct` WHERE loginid = '$userid' AND status = 1");
		//print_r($query->result()); exit();
    	return $query->result();
	}


	public function check_weather_abstract_available($abstractID,$userID)
	{
		//print_r($userID); exit();
		$sql = "SELECT * FROM `abstarct` WHERE id = '$abstractID' AND loginid = '$userID'";
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


	public function see_single_abstract($abstractID,$userID)
	{
		$query = $this->db->query("SELECT * FROM `abstarct` WHERE id = '$abstractID' AND loginid = '$userID' AND status = 1");
		//print_r($query->result());
		return $query->result();
	}


	public function update_abstract($updateDetails)
	{
		//print_r($updateDetails); exit();
		$updateDate = date('Y-m-d H:i:s');
		$abstractID = $updateDetails['abstractID'];
		$title = $updateDetails['title'];
		$category = $updateDetails['category'];
		$type = $updateDetails['type'];
		$authors = $updateDetails['authores'];
		$background = $updateDetails['background'];
		$method = $updateDetails['method'];
		$result = $updateDetails['result'];
		$conclusion = $updateDetails['conclusion'];
		$updateAbstract = $this->db->set('title', $title); //Update Register Status
									$this->db->set('category', $category); //Update Register Status
									$this->db->set('type', $type); //Update Register Status
									$this->db->set('authors', $authors); //Update Register Status
									$this->db->set('background', $background); //Update Register Status
									$this->db->set('method', $method); //Update Register Status
									$this->db->set('result', $result); //Update Register Status
									$this->db->set('conclusion', $conclusion); //Update Register Status
									$this->db->set('lastupdate', $updateDate); //Update Register Status
									set('seenByAdmin', 'no');
									$this->db->where('id', $abstractID); //Condition
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

public function update_abstract_image($updateDetails,$fileName)
{
	$updateDate = date('Y-m-d H:i:s');
	$abstractID = $updateDetails['abstractID'];
	//print_r($abstractID); exit();
	$updateAbstract = $this->db->set('imageupload', $fileName); //Update Register Status
					  $this->db->set('lastupdate', $updateDate); //Update Register Status
					  $this->db->where('id', $abstractID); //Condition
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

	public function delete_single_abstract($abstractID,$userID)
	{
		$changeStatusOfAbstract = $this->db->set('status', 0) //Update Register Status
								->where('id', $abstractID) //Condition
									->update('abstarct');  //table name
		if($changeStatusOfAbstract)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
