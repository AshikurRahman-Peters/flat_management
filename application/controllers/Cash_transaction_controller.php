<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cash_transaction_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if ($access == '') {
            redirect("Login");
        }
        $this->load->model('Cash_transaction_model', 'cash_m');
    }

    ////////// Add Expense //////////

    public function add_account()
    {
        $data['get_expense'] = $this->cash_m->get_expense();
        $data['content'] = 'transaction/add_account';
        $this->load->view('layout', $data);
    }
    public function get_expense()
    {

        $query = $this->db->query("select * from tbl_expense_type where status= 'a' and branch_id= $this->branch_id")->result();

        echo json_encode($query);
    }
    public function expense_insert()
    {
        $data = json_decode($this->input->raw_input_stream);
        $accountCode = $this->cash_m->getAccountCode();
        $expense = array(
            'code' => $accountCode,
            'expense_name' => $data->expense_name,
            'description' => $data->description,
            'added_by' => $_SESSION['id'],
            'branch_id' => $_SESSION['branch_id'],
            'status' => 'a'
        );
        $result = $this->cash_m->addExpense($expense, $data);
        echo json_encode($result);
        echo json_encode("Successfully Added");
    }
    public function update_expense()
    {
        $data = json_decode($this->input->raw_input_stream);
        $expense = array(
            'description' => $data->description,
            'expense_name' => $data->expense_name
        );
        $result = $this->cash_m->updateExpense($expense, $data);
        echo json_encode($result);
        echo json_encode("Update Successfully");
    }

    public function getAccountCode()
    {
        $accountCode = $this->cash_m->getAccountCode();
        echo json_encode($accountCode);
    }

    public function deleteExpense()
    {

        $data = json_decode($this->input->raw_input_stream);

        $update = $this->db->query(
            "
            UPDATE tbl_expense_type
            SET status = 'd'
            WHERE tbl_expense_type.id = $data->expensess"
        );
        echo json_encode($update);
    }
    ///////// End add Expense ////////////


    //////// Start Cash transduction /////

    public function index()
    {
        $data['content'] = 'transaction/cash_transaction';
        $this->load->view('layout', $data);
    }
    public function getExpenseCode()
    {
        $accountCode = $this->cash_m->getExpenseCode();
        echo json_encode($accountCode);
    }
    public function account_expense_insert()
    {
        $data = json_decode($this->input->raw_input_stream);

        $accountCode = $this->cash_m->getExpenseCode();
        $expense = array(
            'code' => $accountCode,
            'description' => $data->description,
            'account_number' => $data->account_number,
            'taka' => $data->taka,
            'expense_by' => $_SESSION['id'],
            'branch_id' => $_SESSION['branch_id'],
            'status' => 'a',
            'date' => $data->date,
            'type' => $data->type,
        );
        $result = $this->cash_m->addAccountExpense($expense, $data);
        echo json_encode($result);
        // echo json_encode("Successfully Added");
    }
    public function account_update_expense()
    {
        $data = json_decode($this->input->raw_input_stream);

        $expense = array(
            'description' => $data->description,
            'account_number' => $data->account_number,
            'taka' => $data->taka,
            'date' => $data->date,
            'type' => $data->type
        );
        $result = $this->cash_m->updateAccountExpense($expense, $data);
        echo json_encode($result);
        echo json_encode("Update Successfully");
    }
    public function get_account_expense()
    {
        $result = $this->db->query("
        select tbl_building_expense.*,tbl_expense_type.expense_name  from tbl_building_expense 
        INNER JOIN tbl_expense_type on tbl_building_expense.type = tbl_expense_type.id
        where tbl_building_expense.status='a' and tbl_building_expense.branch_id= $this->branch_id")->result();
        echo json_encode($result);
    }
    public function deleteAccountExpense()
    {
        $data = json_decode($this->input->raw_input_stream);

        $update = $this->db->query(
            "
            UPDATE tbl_building_expense
            SET status = 'd'
            WHERE tbl_building_expense.expense_id = $data->expense_id"
        );
        echo json_encode($update);
    }
    public function update_service()
    {
        $data = json_decode($this->input->raw_input_stream);

        $unit_payments = $data->unit_payment;
        $serviceData = $data->serviceData;
        $update = array(
            "paid_amount" => $unit_payments->paid_amount,
            "account_number" => $unit_payments->account_number,
            "description" => $unit_payments->description,
            "due_amount" => $unit_payments->paid_amount - $serviceData[0]->fld_total,
            "fld_status" => 'a',
            "collection_date" => date('Y-m-d'),
            "collected_by" => $_SESSION['id'],
        );
        $result = $this->cash_m->update_service($update, $data);

        echo json_encode($result);
    }
    public function update_rent()
    {
        $data = json_decode($this->input->raw_input_stream);
        $unit_payments = $data->unit_payment;
        $rentData = $data->rentData;

        $update = array(
            "paid_amount" => $unit_payments->paid_amount,
            "account_number" => $unit_payments->account_number,
            "description" => $unit_payments->description,
            "due_amount" => $unit_payments->paid_amount - $rentData[0]->fld_total,
            "fld_status" => 'a',
            "collection_date" => date('Y-m-d'),
            "collection_by" => $_SESSION['id'],
        );
        $update_rent = $this->cash_m->update_rent($update, $data);
        echo json_encode($update_rent);
    }

    public function InsertAdvance()
    {
        $data = json_decode($this->input->raw_input_stream);

        $query = $this->db->query("select unit_id from tbl_advance")->row();

        if ($data->unit_id == $query) {
            echo ("already added");
        } else {
            $advance = array(
                'description' => $data->description,
                'account_number' => $data->account_number,
                'total_advance' => $data->total_advance,
                'added_by' => $_SESSION['id'],
                'branch_id' => $_SESSION['branch_id'],
                'status' => 'a',
                'entry_date' => $data->date,
                'unit_id' => $data->selectedUnit
            );
            $result = $this->cash_m->addAdvance($advance, $data);
            echo json_encode($result);
        }
    }
    public function get_advance()
    {

        $query = $this->db->query("
        select * from tbl_advance 
        INNER join tbl_unit on tbl_advance.unit_id = tbl_unit.id 
        where tbl_advance.status= 'a' and tbl_advance.branch_id= $this->branch_id")->result();
        echo json_encode($query);
    }
    public function AdvanceDelete()
    {
        $data = json_decode($this->input->raw_input_stream);

        $query = $this->db->query("
        UPDATE tbl_advance SET status = 'd' where Advance_id = ? ", $data->Advance_id->Advance_id)->result();
        echo json_encode($query);
    }
}
