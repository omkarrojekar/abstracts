<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userabstract extends CI_Controller {

	public function index()
	{
		//$this->load->view('welcome_message');
	}

	public function submit()
	{
		$this->form_validation->set_rules('title','Abstract Title','required');
		$this->form_validation->set_rules('category','Abstract Category','required');
		$this->form_validation->set_rules('type','Abstract Type','required');
		//$this->form_validation->set_message('check_default', 'You need to select something other than the default');
		$this->form_validation->set_rules('authores','Abstract Authores','required');
		$this->form_validation->set_rules('background','Abstract Background','required');
		$this->form_validation->set_rules('method','Abstract Method','required');
		$this->form_validation->set_rules('result','Abstract Result','required');
		$this->form_validation->set_rules('conclusion','Abstract Conclusion','required');
		if($this->form_validation->run())
		{
			$folderName = $this->session->username;
			$this->createFolder($folderName);
			//print_r("HOLA"); exit();
				$config = array(
				'upload_path' => './upload/'.$folderName,
				'allowed_types' => 'jpg|jpeg|png',
				'max-size' =>10000,
				'filename' => $this->input->post('file')
			);
			$this->load->library('upload', $config);
			$abstractData = $this->input->post();
			$this->load->model('Usersabstract');
			$uploadFile =  $this->upload->do_upload('file');
			if($uploadFile)
			{	
				//$fileName = $this->upload->filename;
				$data = $this->upload->data();
				$fileName = $data['file_name'];
				//print_r($data); exit();
				$saveAbstract = $this->Usersabstract->save_abstract($abstractData,$fileName);
				if($saveAbstract)
				{
					$this->session->set_flashdata('abstract_stored', "Thank you, your abstract is been stored!!");
					redirect('users/dashboard');
				}
				else
				{
					$this->session->set_flashdata('abstract_not_stored', "Your abstract is not stored please try again!!");
					redirect('users/dashboard');
				}
			}
			else
			{
				$this->session->set_flashdata('file_not_uploaded', "The File which you selected is not uploaded please try again with proper file format!!");
					redirect('users/dashboard');
				//print_r(array('error' => $this->upload->display_errors()));
			}
			//$getUserName = $this->Usersabstract->save_abstract($abstractData);
			//print_r($abstractData);
			}
		else
		{
			$this->load->model('Usersabstract');
			$abstract['type'] = $this->Usersabstract->get_type();
			$abstract['category'] = $this->Usersabstract->get_category();
			$this->load->view('layout/header');
			$this->load->view('public/user/dashboard',$abstract);
			$this->load->view('layout/footer');	
		}
	}

	public function createFolder($folderName)
	{
		if (!is_dir('upload/'.$folderName))
			{
 				 mkdir('./upload/' . $folderName, 7777, TRUE);
			}
	}

	public function allabstract()
	{
		$this->load->model('User');
		$isSessionCreated = $this->User->check_session_is_created();
		if($isSessionCreated)
		{
			$this->load->model('Usersabstract');
			$allAbstract['allAbstract'] = $this->Usersabstract->see_all_abstract();
			//print_r($allAbstract); exit();
			$this->load->view('layout/header');
			$this->load->view('public/user/allabstract',$allAbstract);
			$this->load->view('layout/footer');
		}
		else
		{
			redirect('users','refresh');
		}
	}

	public function singleview()
	{
		$this->load->model('User');
		$isSessionCreated = $this->User->check_session_is_created();
		if($isSessionCreated)
		{
				$abstractID = ($this->uri->segment(3)/50);
				$userID = ($this->uri->segment(4)/3);
				$this->load->model('Usersabstract');
				$checkAbstarctISAvailable = $this->Usersabstract->check_weather_abstract_available($abstractID,$userID);
				if($checkAbstarctISAvailable)
				{
					$singleAbstract['singleAbstract'] = $this->Usersabstract->see_single_abstract($abstractID,$userID);
					$this->load->view('layout/header');
					$this->load->view('public/user/singleabstract',$singleAbstract);
					$this->load->view('layout/footer');	
				}
				else
				{
					$this->no_abstract();
				}
		}
		else
		{
			redirect('users','refresh');
		}
	
		
		//echo "Single View  ".$abstractID." hola  ".$userID;
	}
	public function edit()
	{
		$this->load->model('User');
		$isSessionCreated = $this->User->check_session_is_created();
		if($isSessionCreated)
		{
			$abstractID = ($this->uri->segment(3)/50);
			$userID = ($this->uri->segment(4)/3);
			$this->load->model('Usersabstract');
			$checkAbstarctISAvailable = $this->Usersabstract->check_weather_abstract_available($abstractID,$userID);
			if($checkAbstarctISAvailable)
			{
				$editAbstract['editAbstract'] = $this->Usersabstract->see_single_abstract($abstractID,$userID);
				$editAbstract['type'] = $this->Usersabstract->get_type();
				$editAbstract['category'] = $this->Usersabstract->get_category();
				$this->load->view('layout/header');
				$this->load->view('public/user/editabstract',$editAbstract);
				$this->load->view('layout/footer');	
			}
			else
			{
				$this->no_abstract();
			}
		}
		else
		{
			redirect('users','refresh');	
		}
	}

	public function delete()
	{
		$this->load->model('User');
		$isSessionCreated = $this->User->check_session_is_created();
		if($isSessionCreated)
		{
			$abstractID = ($this->uri->segment(3)/50);
			$userID = ($this->uri->segment(4)/3);
			$this->load->model('Usersabstract');
			$checkAbstarctISAvailable = $this->Usersabstract->check_weather_abstract_available($abstractID,$userID);
			if($checkAbstarctISAvailable)
			{
				$deleteAbstract = $this->Usersabstract->delete_single_abstract($abstractID,$userID);
				if($deleteAbstract)
				{
					$this->session->set_flashdata('delete_successfully', "The Abstract Has been deleted Successfully!!");
					redirect('userabstract/allabstract','refresh');
				}
				else
				{
					$this->session->set_flashdata('not_delete', "The Abstract Not deleted Please Try again!!");
					redirect('userabstract/allabstract','refresh');		
				}
			}
			else
			{
				$this->no_abstract();
			}			
		}
		else
		{
			redirect('users','refresh');	
		}
	}

	public function no_abstract()
	{
		$this->session->set_flashdata('no_such_abstract', "The Abstract Is not available!!");
		redirect('userabstract/allabstract');	
	}

	public function updateabstract()
	{
		$updateDetails = $this->input->post();
		$abstractID = $updateDetails['abstractID'];
		$userID = $updateDetails['userID'];
		$this->form_validation->set_rules('title','Abstract Title','required');
		$this->form_validation->set_rules('category','Abstract Category','required');
		$this->form_validation->set_rules('type','Abstract Type','required');
		//$this->form_validation->set_message('check_default', 'You need to select something other than the default');
		$this->form_validation->set_rules('authores','Abstract Authores','required');
		$this->form_validation->set_rules('background','Abstract Background','required');
		$this->form_validation->set_rules('method','Abstract Method','required');
		$this->form_validation->set_rules('result','Abstract Result','required');
		$this->form_validation->set_rules('conclusion','Abstract Conclusion','required');
		if($this->form_validation->run())
		{
	    	 
	    	 $this->load->model('Usersabstract');
	        $saveAbstract = $this->Usersabstract->update_abstract($updateDetails);
	        if($saveAbstract)
	        {
	          $this->session->set_flashdata('abstract_updated', "Thank you, your abstract is been Updated!!");
	          redirect('userabstract/allabstract','refresh'); 
	        }
	        else
	        {
	          $this->session->set_flashdata('abstract_not_updated', "Your abstract is not Updated please try again!!");
	          redirect('userabstract/allabstract'); 
	        }
		}
		else
		{
			//$this->edit();
			$this->load->model('Usersabstract');
			$editAbstract['editAbstract'] = $this->Usersabstract->see_single_abstract($abstractID,$userID);
			$editAbstract['type'] = $this->Usersabstract->get_type();
			$editAbstract['category'] = $this->Usersabstract->get_category();
			$this->load->view('layout/header');
			$this->load->view('public/user/editabstract',$editAbstract);
			$this->load->view('layout/footer');	
		}
	}

	public function changeimage()
	{
		$abstractID = ($this->uri->segment(3)/50);
		$userID = ($this->uri->segment(4)/3);
		$oldImage = $this->uri->segment(5);
		$data = array();
		$data['abstractID'] = $abstractID;
		$data['userID'] = $userID;
		$data['oldImage'] = $oldImage;
		$this->load->view('layout/header');
		$this->load->view('public/user/changeimage',$data);
		$this->load->view('layout/footer');	
	}
	public function updateimage()
	{
		$folderName = $this->session->username;
		$updateDetails = $this->input->post();
		//print_r($updateDetails); exit();
		$this->createFolder($folderName);
		$config = array(
        'upload_path' => './upload/'.$folderName,
        'allowed_types' => 'jpg|jpeg|png',
        'max-size' =>5000,
        'filename' => $this->input->post('file')
      );
		$this->load->library('upload', $config);
		//$updateDetails = $this->input->post();
		$this->load->model('Usersabstract');
	    $uploadFile =  $this->upload->do_upload('file');
	    if($uploadFile)
	      { 
	        //$fileName = $this->upload->filename;
	        $data = $this->upload->data();
	        $fileName = $data['file_name'];
	        //print_r($data); exit();
	        $saveAbstract = $this->Usersabstract->update_abstract_image($updateDetails,$fileName);
	        if($saveAbstract)
	        {
	          $this->session->set_flashdata('immage_updated', "Thank you, your image is been Updated!!");
	          redirect('userabstract/allabstract','refresh'); 
	        }
	        else
	        {
	          $this->session->set_flashdata('image_not_updated', "Your image is not Updated please try again!!");
	          redirect('userabstract/allabstract'); 
	        }
	      }
	      else
	      {
	       $this->session->set_flashdata('updated_file_not_uploaded', "The File which you selected is not uploaded please try again with proper file format OR Select a File!!");
	         redirect('userabstract/allabstract'); 
	        //print_r(array('error' => $this->upload->display_errors()));
	      }
	}
		
}
