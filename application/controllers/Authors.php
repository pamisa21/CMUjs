<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller {
  
    public function index()
    {
        // echo "I am here2";
        $this->load->view('Authors/index.html');
    }



    public function Dashboard ()
    {
        // echo "I am here2";
        $this->load->view('Templates/sidebarauthor.php');
        $this->load->view('Authors/Authordashboard');

    }
    public function Article()
    {
        $data['authorarticle_content'] = 'Authors/Article';
        $this->load->view('Templates/sidebarauthor.php');
        
        // Load the model
        $this->load->model('authorarticle_model');
    
        // Fetch articles where auid is equal to 1
        $data['articles'] = $this->authorarticle_model->get_article();
    
        // Pass data to the view
        $this->load->view('Authors/authorarticle', $data);
    }
    

    public function addarticle() {   
        $this->load->model('Article_model');
    
        $data['volumes'] = $this->Article_model->get_volumes();
        $data['authors'] = $this->Article_model->get_authors();
        $data['users'] = $this->Article_model->get_users(); 
        $data['volumes'] = $this->Article_model->get_volumes();
    
        if (empty($data['volumes']) || empty($data['authors'])) {
            echo "No volumes or authors found!";
            return;
        }
    
        if ($this->input->post()) {
            // Retrieve form data
            $articleData = [
                'title' => $this->input->post('title'),
                'keywords' => $this->input->post('keywords'),
                'abstract' => $this->input->post('abstract'),
                'doi' => $this->input->post('doi'),
                'volumeid' => $this->input->post('volumeid'),
                'auid' => 1,
                'published' => 0,
                'file' => 0,
                'assign' => 0,
                
            ];
    
            // Insert data into database
            if ($this->db->insert('articles', $articleData)) {
                redirect('http://127.0.0.1:5500/Authors/article');

            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to add article.']);
            }
        }
    
        // Load views
        $this->load->view('Templates/sidebarauthor.php');
        $this->load->view('Authors/authorarticle');
        $this->load->view('Templates/sidebarfooter.php');
    }













































    public function account()
    {
        $this->load->view('Templates/sidebarauthor.php');
    
        // Load the Authoraccount_Model
        $this->load->model('authoraccount_model');
        
        // Get data from the model for author with ID 1
        $data['authors'] = $this->authoraccount_model->get_author_by_id(1);
    
        // Load the view with the specific author data
        $this->load->view('Authors/authoraccount', $data);
    }
    

















    public function library ()
    {
        $data['authorarticle_content'] = 'Authors/Article';
        $this->load->view('Templates/sidebarauthor.php');
        
        // Load the model
        $this->load->model('authorarticle_model');
    
        // Fetch articles where auid is equal to 1
        $data['articles'] = $this->authorarticle_model->get_article_by_auid();
    
        // Pass data to the view
        $this->load->view('Authors/library', $data);
    }
    
    

}