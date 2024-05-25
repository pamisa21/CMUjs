<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
  
    public function index()
    {
        // echo "I am here2";
        $this->load->view('Users/index.html');
    }




    public function home()
    {
        $data['users_content'] = 'users/home';
        $this->load->view('Templates/sidebar.php');
		// $this->load->model('UsersModel');
		// $data['users'] =  $this->UsersModel->getUsers();
		$data['users'] = $this -> user_model-> get_users();
		// print_r($data['users']);

        $this->load->view($data['users_content'], $data);
        $this->load->view('Templates/sidebarfooter.php');
    }
    


    public function adduser() {   
        if ($this->input->post()) {
            $complete_name = $this->input->post('complete_name');          
            $email = $this->input->post('email');
            $pword = $this->input->post('password');
            $sex = $this->input->post('sex_value');
            $address = $this->input->post('address');
            $description = $this->input->post('description');
            $contact_num = $this->input->post('contact_num');
            $title = $this->input->post('title');
    
            if ($_FILES['profile_pic']['name']) {
                $config['upload_path'] = './public/assets/images/users/';
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
                'status' => $status,
                'address' => $address,
                'description' => $description,
                'contact_num' => $contact_num,
                'title' => $title,
                'description' => $description,
                'status' => 0
            );
            $inserted = $this->db->insert('evaluator', $data);
            if ($inserted) {
                $response = array('status' => 'success');
                redirect('users/home');
            } else {
                $response = array('status' => 'error', 'message' => 'Failed to add user.');
            }
            echo json_encode($response);
            return;
        }
        $data['users_content'] = 'users/adduser';
        $this->load->view($data['users_content'], $data);
    }
    












public function delete($userid) {
    // Load the User_model
    $this->load->model('User_model');

    // Call the delete_user method from the loaded model
    $deleteResult = $this->User_model->delete_user($userid);

    // Redirect to the 'users' page
    redirect('users/home');
}

public function view_details($userid) {
    $this->load->model('User_model');

    $data['user'] = $this->User_model->get_user_by_id($userid);
    if (!$data['user']) {
        show_404();
    }
    
    $this->load->view('users/user_details', $data); 
    $data['title'] = 'User Profile';
    
}
public function edituser($userid) {
    // Load the User_model
    $this->load->model('User_model');
    
    // Retrieve user data by user id
    $data['user'] = $this->User_model->get_user_by_id($userid);

    // Check if user data is retrieved
    if (!$data['user']) {
        show_404(); // User not found, show 404 page
    }

    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $userData = [
            'complete_name' => $this->input->post('complete_name'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status'), 
            'sex' => $this->input->post('sex'), 
            'description' => $this->input->post('description'), 
            'address' => $this->input->post('address'), 
        ];

        // Check if a new profile picture is uploaded   
        if (!empty($_FILES['profile_pic']['name'])) {
            $config['upload_path'] = './public/assets/images/users/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;  // 2MB limit
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('profile_pic')) {
                $data = $this->upload->data();
                $userData['profile_pic'] = $data['file_name'];
            } else {
                $error = $this->upload->display_errors();
                // Handle the upload error properly
                echo json_encode(['status' => 'error', 'message' => $error]);
                return;
            }
        }

        if ($this->User_model->editUser($userid, $userData)) {
            redirect('users/home');
        } else {
            // Handle edit failure
        }
    }

    $this->load->view('users/updateuser_details', $data); 
    $data['title'] = 'User Profile';
}





























    public function dashboard()
    {
        $data['users_content'] = 'users/dashboard';
        $this->load->view('Templates/sidebar.php');
	

        $this->load->view($data['users_content'], $data);
        $this->load->view('Templates/sidebarfooter.php');
    }



    public function authors()
    {
        $data['authors_content'] = 'users/authors';
        
        // Load the Author_Model
        $this->load->model('Author_Model');
        
        // Get data from the model
        $data['users'] = $this->Author_Model->get_authors();
    
        // Load views
        $this->load->view('Templates/sidebar.php');
        $this->load->view($data['authors_content'], $data);
        $this->load->view('Templates/sidebarfooter.php');
       
    }

    public function addauthor() {
        // Check if the request is a POST request
        if ($this->input->post()) {
            // Collect data from the POST request
            $complete_name = $this->input->post('complete_name');
            $email = $this->input->post('email');
            $pword = $this->input->post('pword');  // Consider hashing the password
            $contact_num = $this->input->post('contact_num');
            $title = $this->input->post('title');
            $sex = $this->input->post('sex');
            $address = $this->input->post('address');
            $description = $this->input->post('description');  // Fixed: was incorrectly set to 'address'
    
            // Initialize profile picture filename
            $profile_pic = 'noimage.jpg';  // Changed filename to 'noimage.jpg' for consistency
    
            // Check if a file was uploaded
            if (!empty($_FILES['profile_pic']['name'])) {
                $config['upload_path'] = './public/assets/images/users/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2048;  // 2MB limit
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('profile_pic')) {
                    $data = $this->upload->data();
                    $profile_pic = $data['file_name'];  // Only storing the filename
                } else {
                    $error = $this->upload->display_errors();
                    // Handle the upload error properly
                    echo json_encode(['status' => 'error', 'message' => $error]);
                    return;
                }
            }
    
            // Prepare data for insertion
            $data = array(
                'complete_name' => $complete_name,
                'email' => $email,
                'pword' => $pword,  // Consider encrypting this
                'sex' => $sex,
                'contact_num' => $contact_num,
                'profile_pic' => $profile_pic,
                'title' => $title,
                'address' => $address,
                'description' => $description,
                'status' => 0
            );
    
            // Insert data into the database
            $inserted = $this->db->insert('authors', $data);
            if ($inserted) {
                redirect('users/authors');  
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to add author.']);
                return;
            }
        } else {
            // If not a POST request, load the view
            $data['users_content'] = 'users/authors';
            $this->load->view($data['users_content'], $data);
        }
    }
    







    public function deleteauthor($auid) {
        // Load the Author_model
        $this->load->model('Author_model');
        
        // Call the deleteauthor method from the loaded model
        $deleteResult = $this->Author_model->deleteauthor($auid);
        
        // Redirect to the 'authors' page
        redirect('users/authors');
    }
    
    // public function view_authordetails($auid) {
    //     $this->load->model('Author_model');
        
    //     // Call the method from the model to get author details
    //     $data['author'] = $this->Author_model->get_author_by_id($auid);
    
    //     // Check if the author data is retrieved
    //     if (!$data['author']) {
    //         show_404();
    //     }
        
    //     // Load the view and pass the author data
    //     $this->load->view('users/authordetails', $data); 
    // }
    public function viewauthor_details($auid) {
        $this->load->model('Author_model');
    
        $data['author'] = $this->Author_model->get_author_by_id($auid);
        if (!$data['author']) {
            show_404();
        }
        
        $this->load->view('users/author/AuthorDetails', $data); 
        $data['title'] = 'User Profile';
        
    }
    
    

public function editAuthor($auid) {
    // Load the Author_model
    $this->load->model('Author_model');
    
    // Retrieve author data by author id
    $data['authors'] = $this->Author_model->get_author_by_id($auid);

    // Check if author data is retrieved
    if (!$data['authors']) {
        show_404(); // Author not found, show 404 page
    }

    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $userData = [
            'complete_name' => $this->input->post('complete_name'),
            'email' => $this->input->post('email'),
            'sex' => $this->input->post('sex'), 
            'contact_num' => $this->input->post('contact_num'),
            'title' => $this->input->post('title'), 
            'address' => $this->input->post('address'), 
            'description' => $this->input->post('description'), 
            'status' => $this->input->post('status'), 

        ];

        // Check if a new profile picture is uploaded   
        if (!empty($_FILES['profile_pic']['name'])) {
            // Handle profile picture upload
            // Update $userData['profile_pic'] with the new file name
        }

        if ($this->Author_model->editAuthor($auid, $userData)) {
            redirect('users/authors');
        } else {
            // Handle edit failure
        }
    }

    $this->load->view('users/author/updateauthor_details', $data); 
    $data['title'] = 'User Profile';
}


























    public function articlesub()
{
    $data['articlesub_content'] = 'users/articlesub';

    // Load the Articlesub_model
    $this->load->model('Articlesub_model');

    // Check if the model is loaded successfully
    if ($this->Articlesub_model) {
        // Get data from the model
        $data['articlesubs'] = $this->Articlesub_model->get_articlesub();

        // Load views
        $this->load->view('Templates/navbar.php');
        $this->load->view($data['articlesub_content'], $data);
        $this->load->view('Templates/footer.php');
    } else {
        // Handle model loading error
        echo "Error loading Articlesub_model";
    }
}


// article 




public function article()
{
    $data['article_content'] = 'users/article';
    $this->db->order_by('title', 'ASC');
    // Load the Article_model
    $this->load->model('Article_model');

    // Check if the model is loaded successfully
    if ($this->Article_model) {
        // Get data from the model
        $data['article'] = $this->Article_model->get_article();
        $data['volumes'] = $this->Article_model->get_volumes();
        $data['authors'] = $this->Article_model->get_authors(); 
        $data['users'] = $this->  Article_model->get_article(); 

        // Check if there's any data in volumes and authors
        if (empty($data['volumes']) || empty($data['authors'])) {
            // Handle the case when no volumes or authors are found
            // You might want to show an error message or redirect to a different page
            // For now, let's just echo a message for debugging
            echo "No volumes or authors found!";
            return;
        }
    
        // Load views
        $this->load->view('Templates/sidebar.php');
        $this->load->view($data['article_content'], $data);
        $this->load->view('Templates/sidebarfooter.php');
    } else {
        // Handle model loading error
        echo "Error loading Article_model";
    }
}

public function addarticle() {   
    $this->load->model('Article_model');

    $data['volumes'] = $this->Article_model->get_volumes();
    $data['authors'] = $this->Article_model->get_authors();
    $data['users'] = $this->Article_model->get_users(); 

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
            'auid' => $this->input->post('auid'), 
            'published' => 0,
            'assign' => 0,
        ];

        // Check if a file was uploaded
        if (!empty($_FILES['filename']['name'])) {
            $config['upload_path'] = './public/assets/files';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 2048;  // 2MB limit
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('filename')) {
                $fileData = $this->upload->data();
                $filename = $fileData['file_name'];  
                // Assign the filename to the article data
                $articleData['filename'] = $filename;
            } else {
                $error = $this->upload->display_errors();
                // Log the error for debugging
                error_log('File upload error: ' . $error);
                // Handle the upload error properly
                echo json_encode(['status' => 'error', 'message' => $error]);
                return;
            }
        }

        // Insert data into database
        if ($this->db->insert('articles', $articleData)) {
            redirect('users/article');
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add article.']);
        }
    }

    // Load views
    $this->load->view('Templates/sidebar.php');
    $this->load->view('users/add_article', $data); 
    $this->load->view('Templates/sidebarfooter.php');
}





public function deletearticle($articleid) {
    $this->load->model('Article_model');
    $deleteResult = $this->Article_model->deletearticle($articleid);
    redirect('users/article');
}


public function getArticleDetails($articleid) {
    $this->load->model('Article_model');
    $data['article'] = $this->Article_model->get_article_by_id($articleid);

    if (!$data['article']) {
        show_404();
    }
    $data['title'] = 'Article'; 
    $this->load->view('users/article/view_articledetails', $data);
}




public function editArticle($articleid) {

    $this->load->model('Article_model');
  
    $data['articles'] = $this->Article_model->get_article_by_id($articleid);
    $data['volumes'] = $this->Article_model->get_volumes(); 
    $data['authors'] = $this->Article_model->get_authors();

    if (!$data['articles']) {
        show_404(); 
    }


    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $userData = [
            'title' => $this->input->post('title'),
            'keywords' => $this->input->post('keywords'),
            'abstract' => $this->input->post('abstract'),
            'doi' => $this->input->post('doi'),
            'volumeid' => $this->input->post('volumeid'),
            'auid' => $this->input->post('auid'),
            'published' =>  $this->input->post('published'),
            'date_published' => ($this->input->post('published') == 1) ? date('Y-m-d H:i:s') : NULL,
        ];

        
        if ($this->Article_model->editArticle($articleid, $userData)) {
            redirect('users/article');
        } else {
            $data['error'] = 'Error Editing article.';
        }
    }

    $this->load->view('users/article/updatearticle_details', $data); 
    
}
public function viewassign($articleid) {
    $this->load->model('Article_model');
    $data['article_assigned'] = $this->Article_model->viewassign($articleid);

    if (empty($data['article_assigned'])) {
        show_404();
    }

    $data['title'] = 'Assigned Articles'; 
    $this->load->view('users/article/view_assigned_details', $data);
}





public function assignarticle($articleid) {
    $this->load->model('Article_model');

    $data['articles'] = $this->Article_model->get_article_by_id($articleid);
    $data['volumes'] = $this->Article_model->get_volumes(); 
    $data['authors'] = $this->Article_model->get_authors();

    if (!$data['articles']) {
        show_404(); 
    }

    $data['users'] = $this->Article_model->get_users();

    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $userids = $this->input->post('userid');
        if ($this->Article_model->assign_articles($articleid, $userids)) {
            redirect('users/article');
        } else {
            $data['error'] = 'Error assigning article.';
        }
    }

    $this->load->view('users/article/updateassingarticle', $data);  
}


public function manageassign($articleid) {
    $this->load->model('Article_model');
    $data['article_assigned'] = $this->Article_model->manageassign($articleid);
    $data['users'] = $this->Article_model->get_users();
    $data['articleid'] = $articleid; // Pass the article ID to the view

    if (empty($data['article_assigned'])) {
        show_404();
    }

    $data['title'] = 'Assigned Articles'; 
    $this->load->view('users/article/manageassign', $data);
}


    public function delete_assignment($auid) {
        
        $this->load->model('Article_model');
        
       
        $deleteResult = $this->Article_model->delete_assignment($auid);

        redirect('users/article#');
    }
    

    public function editAssignArticle($articleid) {
        $this->load->model('Article_model');
        $userid = $this->input->post('userid');
        
        if ($userid) {
            // Assuming $userid is already an array, if not, convert it to an array
            if (!is_array($userid)) {
                $userid = [$userid];
            }
            
            $this->Article_model->assign_articles($articleid, $userid);
        }
        
        redirect('users/article'); // Redirect to a suitable page after update
    }
    


//volume
public function volume()
{
    $data['volume_content'] = 'users/volume';

    // Load the Volume_Model
    $this->load->model('Volume_Model');

    // Check if the model is loaded successfully
    if ($this->Volume_Model) {
        // Get data from the model
        $data['volumes'] = $this->Volume_Model->get_volumes();

        // Load views
        $this->load->view('Templates/sidebar.php');
        $this->load->view($data['volume_content'], $data);
        $this->load->view('Templates/sidebarfooter.php');
    } else {
    
        echo "Error loading Volume_Model";
    }
}

public function addvolume() {   
    if ($this->input->post()) {
        $vol_name = $this->input->post('vol_name');
        $description = $this->input->post('description');
        $status = $this->input->post('status'); 

        $data = array(
            'vol_name' => $vol_name,
            'description' => $description,
            'status' => 2,
        );

        $inserted = $this->db->insert('volume', $data);
        if ($inserted) {
            $response = array('status' => 'success');
            redirect('users/volume'); 
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to add volume.');
        }
        echo json_encode($response);
        return;
    }
    $data['users_content'] = 'users/authors';
    $this->load->view($data['users_content'], $data);
}

public function deletevolume($volumeid) {
    $this->load->model('Volume_model');
    $deleteResult = $this->Volume_model->delete_volume($volumeid);
    redirect('users/volume');
}


public function view_volumedetails($volumeid) {
    $this->load->model('Volume_Model');
    $data['volume'] = $this->Volume_Model->get_volume_by_id($volumeid);

    if (!$data['volume']) {
        show_404();
    }
    $this->load->view('users/volumedetails', $data);
    $data['title'] = 'Volume';
}






public function editVolume($volumeid) {

    $this->load->model('Volume_model');

    $data['volume'] = $this->Volume_model->get_volume_by_id($volumeid);

    if (!$data['volume']) {
        show_404(); 
    }


    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        $userData = [
            'vol_name' => $this->input->post('vol_name'),
            'description' => $this->input->post('description'),
            'status' => $this->input->post('status'), 

        ];

        
        if ($this->Volume_model->editVolume($volumeid, $userData)) {
            redirect('users/volume ');
        } else {
      
        }
    }

 
    $this->load->view('users/updatevolume_details', $data); 
    $data['title'] = 'User Profile';
    
}





















public function comments()
{
    $data['comments_content'] = 'users/comments';

    // Load the Volume_Model
    $this->load->model('Comments_Model');

    // Check if the model is loaded successfully
    if ($this->Comments_Model) {
        // Get data from the model
        $data['comments'] = $this->Comments_Model->get_comments();

        // Load views
        $this->load->view('Templates/navbar.php');
        $this->load->view($data['comments_content'], $data);
        $this->load->view('Templates/footer.php');
    } else {
        // Handle model loading error
        echo "Error loading Volume_Model";
    }
}










}
