<?php

class SellerBuyer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	}

	public function addSellerBuyer()
	{
		//Load the Seller Buyer Registration View Here
		$this->load->view('seller-buyer/add-seller-buyer');
	}

	public function storeSellerBuyer()
	{
		$this->form_validation->set_rules('mail','Mail','required');
		$this->form_validation->set_rules('company','Company','required');
		$this->form_validation->set_rules('password','Password','requiredfirst-name');
		$this->form_validation->set_rules('first-name','First Name','required');
		$this->form_validation->set_rules('last-name','Last Name','required');
		$this->form_validation->set_rules('type','User Type','required|greater_than[0]',array('greater_than'=>'Please select user type'));
		if(empty($_FILES['image']['name']))
			$this->form_validation->set_rules('image','Image','required');
		$this->form_validation->set_rules('phone','Phone','required|max_length[12]|min_length[12]',array('max_length'=>"Phone number must be of 10 digits",'min_length'=>"Phone number must be of 10 digits"));
		$this->form_validation->set_rules('country-code','Country Code','required|max_length[2]|min_length[2]',array('max_length'=>"Country code must be 2 digits",'min_length'=>"Country code must be 2 digits"));
		if($this->form_validation->run()==false)
		{
			$this->Add();
		}
		else
		{
			$password=md5($this->input->post('password'),'sbprf');
			//Data Array that is to be inserted into database
			$dataBundler=array(
			'Mail'=>$this->input->post('mail'),
			'Website'=>$this->input->post('website'),
			'Company'=>$this->input->post('company'),
			'Country'=>$this->input->post('country'),
			'Password'=>$password,
			'PostalCode'=>$this->input->post('postal-code'),
			'City'=>$this->input->post('city'),
			'Fax'=>$this->input->post('fax'),
			'FirstName'=>$this->input->post('first-name'),
			'LastName'=>$this->input->post('last-name'),
			'Mobile'=>$this->input->post('mobile'),
			'Phone'=>$this->input->post('phone'),
			'Image'=>$imageName,
			'MemberShip'=>$this->input->post('membership'),
			'Status'=>0,
			'Keywords'=>$this->input->post('keywords'),
			'Type'=>$this->input->post('type'),
			'CreatedBy'=>1,
			'UpdatedBy'=>1
			);

			if($this->SellerBuyer->addSellerBuyer($dataBundler))
			{
				$this->session->set_tempdata('success','Registered successfully! Wait for approval',1);
				redirect('');
			}
			else
			{

			}

		}
	}

	public function Edit()
	{

	}

	public  function Update()
	{

	}

	public function Delete()
	{

	}

	public  function GetAll()
	{

	}

	public function GetSingle()
	{

	}

	public function ChangeStatus()
	{

	}
}
