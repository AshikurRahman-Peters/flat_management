<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin_m');
    }
    public function login()
    {
        $data['title'] = 'Admin Login Page';
        $this->load->view('login', $data);
    }

    public function login_in()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {


            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $password = md5($pass);

            $result = $this->admin_m->user_login($email, $password);



            if ($result) {

                $data = array(
                    'id'  => $result[0]['id'],
                    'username'  => $result[0]['username'],
                    'email'     => $result[0]['email'],
                    'branch_id' => $result[0]['branch_id'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('msg', 'Email or Password not match');
                $this->load->view('login');
            }
        } else {
            $this->load->view('login');
        }
    }
    public function set_branch()
    {  
        // $branch_id = isset($_POST['branch_id']) ? $_POST['branch_id'] : '';
        
        $branch_id=$this->input->post('Branch_id');
      
        $result = $this->admin_m->set_branch($branch_id);
            if ($result) {

                $data = array( 
                    'branch_id' => $result[0]['branch_id']
                );
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('msg', 'Email or Password not match');
                $this->load->view('login');
            }
        
    }

    public function dashboard()
    {
        if (!$_SESSION['id']) {
            redirect('admin');
        }
        $data['title'] = 'Dashboard';
        $this->load->view('welcome_message', $data);
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['branch_id']);
        redirect('login');
    }
}
