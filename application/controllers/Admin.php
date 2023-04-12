<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel');

    }
    public function index()
    {
        $this->load->view('form.php');
    }

    // public function add()
    // {

    //     if ($this->input->post()) {
    //         $rules = array(
    //             array(
    //                 'field' => 'name',
    //                 'label' => 'Contact Name',
    //                 'rules' => 'required',
    //             ),
    //             array(
    //                 'field' => 'number',
    //                 'label' => 'Contact Number',
    //                 'rules' => 'required',
    //                 'errors' => array(
    //                     'required' => 'You must provide a %s.',
    //                 ),
    //             ),
    //             array(
    //                 'field' => 'email',
    //                 'label' => 'Email Address',
    //                 'rules' => 'required',
    //             ),
    //         );

    //         $this->form_validation->set_rules($rules);

    //         if ($this->form_validation->run() == false) {
    //             $this->load->view('form.php');

    //         } else {
    //             $name = $this->input->post('name');
    //             $number = $this->input->post('number');
    //             $email = $this->input->post('email');

    //             $insert_array = array(
    //                 'name' => $name,
    //                 'email' => $email,
    //                 'number' => $number,
    //             );
    //             $insert = $this->Admin_model->save($insert_array);
    //             redirect(base_url('admin'));
    //         }
    //     }else{
    //         redirect(base_url('admin'));
    //     }

    // }

    public function list(){
        $data['get_data'] = $this->Admin_model->get_data();
        $this->load->view('list.php',$data);
    }

    public function delete($id){
        if(!empty($id)){
            $a = $this->Admin_model->delete($id);
            redirect(base_url('list'));
        }
    }

    public function edit($id){
        if(!empty($id)){
            $data['user_data'] = $this->Admin_model->get_data_single($id);
            $this->load->view('edit.php',$data);
        }
    }

    public function update(){
        if ($this->input->post()) {
            $id = $this->input->post('id');

            $rules = array(
                array(
                    'field' => 'name',
                    'label' => 'Contact Name',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'number',
                    'label' => 'Contact Number',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => 'You must provide a %s.',
                    ),
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email Address',
                    'rules' => 'required',
                ),
            );

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == false) {
                $this->load->view('edit.php');

            } else {
                $name = $this->input->post('name');
                $number = $this->input->post('number');
                $email = $this->input->post('email');

                $update_array = array(
                    'name' => $name,
                    'email' => $email,
                    'number' => $number,
                );
                $insert = $this->Admin_model->update_data($update_array,$id);
                redirect(base_url('list'));
            }
        }else{
            redirect(base_url('admin'));
        }

    }
}
