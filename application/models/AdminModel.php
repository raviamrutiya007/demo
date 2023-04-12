<?php

class AdminModel extends CI_Model {
    protected $table = 'data';


    public  function save($data){
        return $this->db->insert($this->table, $data);

    }

    public function get_data(){
        return $this->db->get($this->table)
                        ->result();
    }

    public function delete($id){
        $this->db->where('id',$id);
         $this->db->delete($this->table);
    }

    public function get_data_single($id){
        return $this->db->get_where($this->table, array('id' => $id))
        ->row();
    }
    
    public function update_data($data,$id){
        $this->db->where('id', $id);
        $this->db->update($this->table,$data);
    }   
}