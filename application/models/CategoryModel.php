<?php

class CategoryModel extends CI_Model {

    protected $table = 'category';


    public function insert($data){
        return $this->db->insert('category',$data);
    }

    public function get_all_data(){
        return $this->db->get($this->table)
        ->result();
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return ;
    }

    public function get_category($id){
        return $this->db->get_where($this->table, array('id' => $id))
        ->row();
    }

    public function edit_data($data,$id){
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
}