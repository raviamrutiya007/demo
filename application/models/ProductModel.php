<?php

class ProductModel extends CI_Model {

    protected $table = 'products';


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
         ->join('category', 'products.category_id = category.id','left');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return ;
    }

    public function get_produts($id){
        return $this->db->get_where($this->table, array('id' => $id))
        ->row();
    }

    public function edit_data($data,$id){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
}