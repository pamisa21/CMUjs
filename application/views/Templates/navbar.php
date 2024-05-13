<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/cosmo/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/authorscard.css'); ?>">  
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/usercard.css'); ?>"> 
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/articlesub.css'); ?>">   
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/article.css'); ?>">   
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/volume.css'); ?>">   
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">UserManagement!</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="home">Users
            <span class="visually-hidden">(current)</span>
          </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" href="authors">Authors
            <span class="visually-hidden">(current)</span>
          </a>
        </li>    
        <li class="nav-item">
          <a class="nav-link active" href="articlesub">Articles Submission
            <span class="visually-hidden">(current)</span>
          </a>
        </li>   
        <li class="nav-item">
          <a class="nav-link active" href="home">Articles
            <span class="visually-hidden">(current)</span>
          </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" href="volume">Volume
            <span class="visually-hidden">(current)</span>
          </a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" href="comments">Comments
            <span class="visually-hidden">(current)</span>
          </a>
        </li> 
        <li class="nav-item" style="position:fixed; right: 3%;margin-left:10px">
          <a class="nav-link">Arram Pamisa</a>
          <p style="font-size: 5px;">Student </p> 
        </li>
      
      </ul>
   
    </div>
  </div>
</nav>
