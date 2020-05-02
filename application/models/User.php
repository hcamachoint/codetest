<?php

class User extends CI_Model
{
    function fetch_data(){
        $this->db->select("*");
        $this->db->from("users");
        return $this->db->get();
    }

    function fectch_single_data($id){
        $this->db->where("id", $id);
        return $this->db->get("users");
    }

    function insert_data($data){
        $this->db->insert("users", $data);
    }

    function updata_data($data, $id){
        $this->db->where("id", $id);
        $this->db->update("users", $data);
    }

    function delete_data($id){
        $this->db->where("id", $id);
        $this->db->delete("users");
    }

    function can_login($email, $password){
        //$this->load->library('encrypt');
        
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $query = $this->db->get("users");

        if ($query->num_rows() > 0) {
            foreach($query->result() as $row){$this->session->set_userdata('id', $row->id);}
            return true;
        }else{
            return false;
        }
    }
}