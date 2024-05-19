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

    public function assign()
    {
        $this->load->view('Templates/sidebarevaluator.php');

        $this->load->model('Evaluatorarticle_Model');
    
        // Fetch articles assigned to the evaluator with userid = 1
        $data['articles'] = $this->Evaluatorarticle_Model->get_article_by_userid(1);
    
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