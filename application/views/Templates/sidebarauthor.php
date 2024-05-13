<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/sidebar.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/usercard.css'); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/article.css'); ?>"> 
</head>
<body>
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>CMUJS</h3>
        </div>
        <ul class="list-unstyled components">
            <li class="list-item">
                <a class="nav-link"  href="dashboard" >
                    <i class="glyphicon glyphicon-dashboard"></i>
                    Dashboard
                </a>
            </li>
          
            <li>
                <a class="nav-link"  href="article">
                    <i class="glyphicon glyphicon-duplicate"></i>
                    Article
                </a>
            </li>
            <li> 
                <a  class="nav-link"  href="library">
                    <i class="	glyphicon glyphicon-folder-open"></i>
                    My Submission
                </a>
            </li>
            <li> 
                <a  class="nav-link"  href="account">
                    <i class="glyphicon glyphicon-pencil"></i>
                    Manage My Account
                </a>
            </li>
         

            <li class="logout" style="margin-top: 100px;">
                <a  class="nav-link"  href="logout">
                    <i class="glyphicon glyphicon-log-out"></i>
                    Logout
                </a>
            </li>
        </ul>
    </nav>

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    

<script>

const currentURL = window.location.href;
const navLinks = document.getElementsByClassName('nav-link')

for(var i = 0; i < navLinks.length; i++){
    const linkUrl = navLinks[i].getAttribute('href');
    if(currentURL.indexOf(linkUrl) !== -1){
        navLinks[i].classList.add('active');
    }
}
</script>


</body>

 