<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluators extends CI_Controller {
  
    public function index()
    {
        // echo "I am here2";
        $this->load->view('Evaluators/index.html');
    }



    public function dashboard ()
    {
        // echo "I am here2";
        $this->load->view('Templates/sidebarevaluator.php');
        $this->load->view('Evaluators/dashboard');

    }

   
    public function Assign ()
    {
        $data['evaluatorrarticle_content'] = 'Evaluators/report';
        $this->load->view('Templates/sidebarevaluator.php');
        
        // Load the model
        $this->load->model('evaluatorarticle_model');
    
        // Fetch articles where auid is equal to 1
        $data['articles'] = $this->evaluatorarticle_model->get_article_by_userid();
    
        // Pass data to the view
        $this->load->view('Evaluators/report', $data);
    }




    public function account ()
    {
        $this->load->view('Templates/sidebarevaluator.php');
    
        // Load the Authoraccount_Model
        $this->load->model('evaluatoraccount_model');
        
        // Get data from the model for author with ID 1
        $data['users'] = $this->evaluatoraccount_model->get_users_by_id(1);
    
        // Load the view with the specific author data
        $this->load->view('Evaluators/account', $data);
    }

    

}