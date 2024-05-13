<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
    
    public function index()
    {
    $data['page_content'] = 'Pages/home'; // Set the page content variable
    $this->load->view('Pages/template', $data); // Pass $data to the view
    }


    public function about()
    {
        $data['page_content'] = 'Pages/about';
        $this->load->view('Pages/template', $data);
    }
	// public function article()
	// {
    //     $data['page_content'] = 'Pages/particle';
    //     $this->load->view('Pages/template', $data);
    // }
	public function archieved()
	{
        $data['page_content'] = 'Pages/archieved';
        $this->load->view('Pages/template', $data);
    }

	// public function login()
	// {
    //     $data['page_content'] = 'Pages/loginpage';
    //     $this->load->view('Pages/template', $data);
    // }
	// public function register()
	// {
    //     $data['page_content'] = 'Pages/signuppage';
    //     $this->load->view('Pages/template', $data);
    // }
   

    public function particle()
    {
        $data['page_content'] = 'Pages/particle';
        $this->load->model('Particle_model');
        
        $data['articles'] = $this->Particle_model->get_particle();

        

       
        $this->load->view('Templates/header.php', $data);
        $this->load->view($data['page_content'], $data);
        $this->load->view('Templates/footer.php');
    }
    
		
    }
// public function authors()
//     {
//         $data['authors_content'] = 'users/authors';
        
//         // Load the Author_Model
//         $this->load->model('Author_Model');
        
//         // Get data from the model
//         $data['users'] = $this->Author_Model->get_authors();
    
//         // Load views
//         $this->load->view('Templates/sidebar.php');
//         $this->load->view($data['authors_content'], $data);
//         $this->load->view('Templates/sidebarfooter.php');
       
//     }




  
