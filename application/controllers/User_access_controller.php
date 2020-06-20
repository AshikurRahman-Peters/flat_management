<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_access_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->branch_id = $this->session->userdata('branch_id');
        $access = $this->session->userdata('id');
        if($access == '' ){
            redirect("Login");
        }
        $this->load->model('User_access_model', 'user_m');
    }
    public function index()
    {
        // $data['get_all_floor'] = $this->renter_m->get_all_floor();
        $data['alluser'] = $this->user_m->alluser();
        $data['content'] = 'user/user_access';
        $this->load->view('layout', $data);
    }
    public function menu_access($id)
    {
        $data['select_report'] = $this->user_m->select_report($id);
        $data['alluser'] = $this->user_m->alluser();
        $data['content'] = 'menu_access';
        $this->load->view('layout', $data);
    }
    public function userInsert(){

        $data=array(
            'user_name'=>$this->input->post('user_name'),
            'email'=>$this->input->post('email'),
            'password'=>md5($this->input->post('password')),
            'status'=>'a',
            'type'=>'u',
            'added_by'=>$_SESSION['id'],
            'branch_id'=>$_SESSION['branch_id']
        );
        $result=$this->user_m->addUser($data);
           
            if ($result) {
                $this->session->set_flashdata('msg', 'User Added Successfully');
                redirect('User_access');
            }else{
                    $this->session->set_flashdata('msg', 'User Not Added');
                    redirect('User_access');
            }
         }

         public function edit($id){
            $data['title']='Update user';
            $data['alluser'] = $this->user_m->alluser();
            $data['selectonerow']= $this->user_m->selectOnerow($id);
            $data['content']='user/edit_user_access';
            $this->load->view('layout', $data);
        }
        public function update(){
            // extract($_POST);
        
             $data = array(
                'user_name'=>$this->input->post('user_name'),
                'email'=>$this->input->post('email'),
                'password'=>md5($this->input->post('password'))
                   
         );
             
           $id = $this->input->post("id",true);
           $result=$this->user_m->update($id,$data);
    
            if($result){
                $this->session->set_flashdata('msg', 'Updated Successfully');
                redirect('User_access');
            }else{
                $this->session->set_flashdata('msg', 'Updated Failed....');
                redirect('User_access');
            }
    
        }
    
    	public function delete($id){
            $data=array('status'=>'d');
            $result=$this->user_m->delete($id,$data);
    
            if ($result) {
                   $this->session->set_flashdata('msg', 'Deleted Successfully');
                   redirect('User_access');
               }else{
                       $this->session->set_flashdata('msg', 'Deleted Faild....');
                       redirect('User_access');
               }
        }
        public function add_user_access(){

            $Data = json_decode($this->input->raw_input_stream);
            $id = $Data->id;
            $createString = Join(',',$Data->access);
     
            $data =array(
                'menu_name' => $createString
            );
            $result=$this->user_m->update($id,$data);
            echo json_encode($result);
            echo json_encode("Successfully Added");
        }
        public function get_menu()
        {
            $data = json_decode($this->input->raw_input_stream);
           $id = $data->id;
            $data = $this->db->query("
            SELECT menu_name FROM tbl_user WHERE id = $id and status = 'a'
            ")->result();
            echo json_encode($data);
        }
 
         


    }

