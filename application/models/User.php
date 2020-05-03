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
        $this->load->library('encryption');
        $this->load->library('session');

        $this->db->where("email", $email);
        $query = $this->db->get("users");

        if ($query->num_rows() > 0) {
            foreach($query->result() as $row){
                if($password === $this->encryption->decrypt($row->password)){
                    if($row->status == 0){
                        $this->session->set_flashdata('error', 'Please confirm your account, verify your email!');
                        return false;
                    }else if($row->status == 1){
                        $session_data = array('id' => $row->id, 'email' => $row->email);
                        $this->session->set_userdata($session_data);
                        return true;
                    }else if($row->status == 9){
                        $this->session->set_flashdata('error', 'Your account is banned!');
                        return false;
                    }else{
                        $this->session->set_flashdata('error', 'There is a problem with your account!');
                        return false;
                    }
                }
            }
            $this->session->set_flashdata('error', 'Invalid email or password!');
            return false;
        }else{
            $this->session->set_flashdata('error', 'Invalid email or password!');
            return false;
        }
    }
}