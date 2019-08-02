<?php


class SellerBuyerModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function addSellerBuyer($data)
	{
		if($this->db->insert('BuyerSeller',$data))
			return true;
		return false;
	}

}
