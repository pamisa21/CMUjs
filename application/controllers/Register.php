<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


    public function registerevaluator () {   
        if ($this->input->post()) {
            $complete_name = $this->input->post('complete_name');          
            $email = $this->input->post('email');
            $pword = $this->input->post('password');
            $sex = $this->input->post('sex_value'); 
            $contact_num = $this->input->post('contact_num'); 
            $address = $this->input->post('address'); 
            $description = $this->input->post('description'); 

            
            if ($_FILES['profile_pic']['name']) {
                $config['upload_path'] = './assets/images/users/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('profile_pic')) {
                    $data = $this->upload->data();
                    $profile_pic = $data['file_name'];
                } else {
                    $profile_pic = 'noimages.jpg';
                }
            } else {
                $profile_pic = 'noimages.jpg';
            }
            $status = 1;
            $data = array(
                'complete_name' => $complete_name,
                'email' => $email,
                'pword' => $pword,
                'sex' => $sex,
                'profile_pic' => $profile_pic,
                'status' => 0,
                'contact_num' => $contact_num,
                'address' => $address,
                'description' => $description,
            );
            $inserted = $this->db->insert('evaluator', $data);
            if ($inserted) {
                $response = array('status' => 'success');
                redirect('./');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to add user.');
            }
            echo json_encode($response);
            return;
        }
        $data['users_content'] = 'Register/register';
        $this->load->view($data['users_content'], $data);
    }		
    
    public function registerauthor () {   
        if ($this->input->post()) {
            $complete_name = $this->input->post('complete_name');          
            $email = $this->input->post('email');
            $pword = $this->input->post('password');
            $sex = $this->input->post('sex_value'); 
            $contact_num = $this->input->post('contact_num'); 
            $address = $this->input->post('address'); 
            $description = $this->input->post('description'); 

            
            if ($_FILES['profile_pic']['name']) {
                $config['upload_path'] = './assets/images/users/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('profile_pic')) {
                    $data = $this->upload->data();
                    $profile_pic = $data['file_name'];
                } else {
                    $profile_pic = 'noimages.jpg';
                }
            } else {
                $profile_pic = 'noimages.jpg';
            }
            $status = 1;
            $data = array(
                'complete_name' => $complete_name,
                'email' => $email,
                'pword' => $pword,
                'sex' => $sex,
                'profile_pic' => $profile_pic,
                'status' => 0,
                'contact_num' => $contact_num,
                'address' => $address,
                'description' => $description,
            );
            $inserted = $this->db->insert('authors', $data);
            if ($inserted) {
                $response = array('status' => 'success');
                redirect('./');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to add user.');
            }
            echo json_encode($response);
            return;
        }
        $data['users_content'] = 'Register/register';
        $this->load->view($data['users_content'], $data);
    }		
}