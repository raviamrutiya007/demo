<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

   

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_Data'))
        { 
            redirect('login');
        }
        $this->load->model('CategoryModel');

    }
    public function index()
    {
        $this->load->view('add_category.php');
    }
    
    public function add_category(){
        $name = $this->input->post('name');
        if(!empty($name)){
            $data = array('name' => $name);
            $insert = $this->CategoryModel->insert($data);
            $reponse['msg'] = 'success';
            $reponse['data'] = $insert;
            
        }else{
            $reponse['msg'] = 'error';
        }
        echo json_encode($reponse);exit;
    }

    public function list(){
        $data['get_data'] =$this->CategoryModel->get_all_data();
        $data['session_data'] =$this->session->userdata("user_Data");

        if(!empty($data)){
            $this->load->view('list_category.php',$data);
        }
    }

    public function delete_category(){
        $id = $this->input->post('id');
        if(!empty($id)){
            $this->CategoryModel->delete($id);
            $reponse['msg'] = 'success';
            $reponse['data'] = $id;
        }else{
            $reponse['msg'] = 'error';

        }
        echo json_encode($reponse);exit;

    }

    public function get_category_data($id){
      
        if(!empty($id)){
            $data['cat_data'] = $this->CategoryModel->get_category($id);
            $this->load->view('edit_category.php', $data);
            
            
        }
    }

    public function edit_category(){
        $id = $this->input->post('id');
      
        $name = $this->input->post('name');
        if(!empty($id)){
            $data = array('name' => $name);
            $edit = $this->CategoryModel->edit_data($data,$id);
            $reponse['msg'] = 'success';
            $reponse['data'] = $edit;

        }

        echo json_encode($reponse);exit;

    }


   
}
