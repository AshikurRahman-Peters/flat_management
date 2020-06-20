<?php

/**
 * 
 */
class Advance_model extends CI_Model
{
    public function __construct()
    {
        $this->branch_id = $this->session->userdata('branch_id');
    }
    
	 
}
