<?php

/**
 * 
 */
class Cash_transaction_model extends CI_Model
{
	public function __construct()
	{
		$this->branch_id = $this->session->userdata('branch_id');
	}

	public function get_expense()
	{

		$query = $this->db->query(
			" select * from tbl_expense_type where status= 'a'
			"
		);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	 ////////// Add Expense //////////

	public function addExpense($expense){
		$query = $this->db->insert('tbl_expense_type', $expense);
		return $query;
	}
	public function updateExpense($expense, $data){
		$this->db->where('id',$data->id);
		$query = $this->db->update('tbl_expense_type', $expense);
		return $query;
	}

	public function getAccountCode()
	{
		$accountCode = "A00001";
        $lastCustomer = $this->db->query("select * from tbl_expense_type order by id desc limit 1");
        if($lastCustomer->num_rows() != 0){
            $newCustomerId = $lastCustomer->row()->id + 1;
            $zeros = array('0', '00', '000', '0000');
            $accountCode = 'A' . (strlen($newCustomerId) > count($zeros) ? $newCustomerId : $zeros[count($zeros) - strlen($newCustomerId)] . $newCustomerId);
		}
		return $accountCode;
	}
	 ////////// End Add Expense //////////

	 public function addAccountExpense($expense){
		$query = $this->db->insert('tbl_building_expense', $expense);
		return $query;
	}

	 public function getExpenseCode()
	 {
		 $accountCode = "A00001";
		 $lastCustomer = $this->db->query("select * from tbl_building_expense where status='a' order by expense_id desc limit 1");
		 if($lastCustomer->num_rows() != 0){
			 $newCustomerId = $lastCustomer->row()->expense_id + 1;
			 $zeros = array('0', '00', '000', '0000');
			 $accountCode = 'A' . (strlen($newCustomerId) > count($zeros) ? $newCustomerId : $zeros[count($zeros) - strlen($newCustomerId)] . $newCustomerId);
		 }
		 return $accountCode;
	 }
	 public function updateAccountExpense($expense, $data){
		$this->db->where('expense_id',$data->expense_id);
		$query = $this->db->update('tbl_building_expense', $expense);
		return $query;
	}
	public function update_service($update, $data)
    {
		$service = $data->serviceData;
	
      $this->db->where('service_month_id', $service[0]->service_month_id);
      $this->db->where('id', $service[0]->id);
      $query = $this->db->update('tbl_service_transaction', $update);
      if ($query) {
        return $query;
      } else {
        return false;
      }
    }
	public function update_rent($update, $data)
    {
		$rent = $data->rentData;
	
      $this->db->where('service_month_id', $rent[0]->service_month_id);
      $this->db->where('id', $rent[0]->id);
      $query = $this->db->update('tbl_rent_transaction', $update);
      if ($query) {
        return $query;
      } else {
        return false;
      }
	}
	public function addAdvance($expense){
		$query = $this->db->insert('tbl_advance', $expense);
		return $query;
	}

}

