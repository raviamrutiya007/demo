<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

   

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_Data'))
        { 
            redirect('login');
        }
        $this->load->library('upload');
        $this->load->library("session");

        $this->load->model('ProductModel');

    }
    public function index()
    {
        $data['cat_data'] = $this->ProductModel->get_category_data();
       
        $this->load->view('add_product.php',$data);
    }
    
    public function add_product(){
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $category = $this->input->post('category');
        $data = array('name' => $name,'description' => $description,'price' => $price,'category_id' => $category);
      
        if(isset($_FILES['image'])){
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'gif|jpg|png';
            if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('image')) {
                echo $this->upload->display_errors();exit;
            } else {
                $data['image'] = $_FILES["image"]["name"];
            }
        }
      
      
        $insert = $this->ProductModel->insert($data);
        if($insert){
            redirect(base_url('Product/list_products'));
        }
    }

    public function list_products(){
        
        $data['get_data'] =$this->ProductModel->get_all_data();
        $data['session_data'] =$this->session->userdata("user_Data");
        
        if(!empty($data)){
            $this->load->view('list_product.php',$data);
        }
    }

    public function delete_product(){
        $id = $this->input->post('id');
        if(!empty($id)){
            $this->ProductModel->delete($id);
            $reponse['msg'] = 'success';
            $reponse['data'] = $id;
        }else{
            $reponse['msg'] = 'error';

        }
        echo json_encode($reponse);exit;

    }

    public function get_product_data($id){
      
        if(!empty($id)){
            $data['cat_data'] = $this->ProductModel->get_category_data();

            $data['pr_data'] = $this->ProductModel->get_produts($id);
            $this->load->view('edit_product.php', $data);
            
            
        }
    }

    public function edit_product(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $category = $this->input->post('category');
        $data = array('name' => $name,'description' => $description,'price' => $price,'category_id' => $category);
      
        if(isset($_FILES['image'])){
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'gif|jpg|png';
            if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('image')) {
                echo $this->upload->display_errors();
            } else {
                $data['image'] = $_FILES["image"]["name"];
            }
        }

        if(!empty($id)){
            $edit = $this->ProductModel->edit_data($data,$id);
            $reponse['msg'] = 'success';
            $reponse['data'] = $edit;

        }

        redirect(base_url('Product/list_products'));

    }


   
}
