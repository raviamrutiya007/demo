<?php

class LoginModel extends CI_Model {

    protected $table = 'user';


    public function insert($data){
        return $this->db->insert($this->table,$data);
    }

    public function get_category_data(){
        return $this->db->get('category')
        ->result_array();
    }

    public function get_all_data(){
        $this->db->select('products.*, category.name as category_name')
         ->from('products')
         ->join('category', 'products.category_id = category.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return ;
    }

    public function get_user($where){
        return $this->db->where($where)
        ->get($this->table)
        ->result();
    }

    public function edit_data($data,$id){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
}