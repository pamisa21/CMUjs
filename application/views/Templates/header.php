<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Quattrocento;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #FFFFFF;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            margin-left: 20px;
            margin-right: 20px;
        }

        .navbar a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            margin-top: 20px;
            font-size: 15px;
        }
        .navbar a:hover {
            text-decoration: underline;
            text-decoration-color: #138143;
            text-underline-offset: 7px;
        }
        .navbar .active {
            text-decoration: underline;
            text-decoration-color: #138143;
            text-underline-offset: 7px;
            font-weight: bold;
        }
        .center-links {
            display: flex;
            justify-content: center; 
            align-items: center; 
            flex-grow: 1; 
            margin-left: 100px;
        }
        .navbar-brand {
             margin-right: auto;
             display: flex;
             align-items: center;
             margin-left: 40px;
            }

            .logo-container {
                margin-right: 10px;
                margin-top: 10px;
            }

            .brand-text {
                position: relative;
                top:-6px;
                font-size: 20px;
                color: #083B0A;
                font-weight: bold;
            }
            .brand-text:hover {
                position: relative;
                top:-6px;
                font-size: 20px;
               
                font-weight: bold;
                text-decoration: none;
            }
        .right-buttons {
            margin-right: 100px;
            margin-top: 10px;
        }
        .login{
            background-color: #138143;
            color: #FFFFFF;
            font-family: Quattrocento;
            font-weight: regular;
            font-size: 16px;
            width: 120px;
            height: 35px;
            border-radius: 10px;
            margin-right: 40px;
            text-align: center;
            cursor: pointer; /* Add cursor style */
        }
        .login:hover{
            background-color: black;
        }
        .register{
            background-color: #083B0A;
            color: #FFFFFF;
            font-family: Quattrocento;
            font-weight: regular;
            font-size: 16px;
            width: 120px;
            text-align: center;
            height: 35px;
            border-radius: 10px;
            margin-right: 35px;
            cursor: pointer; /* Add cursor style */
        }
        .register:hover{
            background-color: black;
        }

        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px; /* Location of the box */
            font-family: Quattrocento;
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 40%; /* Could be more or less, depending on screen size */
            border-radius: 10px;
            font-family: Quattrocento;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            font-family: Quattrocento;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        /* Additional styling for the input fields and save button */
            .input-group {
                margin-bottom: 20px;
            }

            .input-group label {
                display: block;
                margin-bottom: 5px;
                color: #333;
                font-weight: bold;
                font-family: Quattrocento;
            }

            .input-group input {
                width: 94%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin-left: 10px;
                margin-right: 10px;
                font-family: Quattrocento;
                
            }

            .save-button {
            background-color: #138143;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            display: block; /* or inline-block if you want it to be inline with text */
            margin: 0 auto; /* This centers the button horizontally */
            width: 50%;
            margin-bottom: 20px;
            margin-top: 20px;
            font-family: Quattrocento;
            font-weight: bold;
         
            
        }


            .save-button:hover {
                background-color: #0a6e36;
            }
            .forgot{
                text-align: right;
                margin-right: 22px;
                font-size: 15px;
                color: red;
                font-weight: regular;
            }

    </style>
</head>
<body>

<nav class="navbar">
    <a class="navbar-brand" href="#">
        <div class="logo-container">
            <img src="public/assets/images/Logo.png" alt="Cmujs Logo" height="30">
        
        <span class="brand-text">CMUJS</span>
        </div>
    </a>
    <div class="center-links">
        <a class="<?php echo $this->uri->segment(1) == '' ? 'active' : ''; ?>" href="./">Home</a>
        <a class="<?php echo $this->uri->segment(1) == 'particle' ? 'active' : ''; ?>" href="./particle">Article</a>
        <a class="<?php echo $this->uri->segment(1) == 'archieved' ? 'active' : ''; ?>" href="./archieved">Archieved</a>
    </div>
    <!-- Added buttons section -->
    <div class="right-buttons">
        <button onclick="openModal('loginModal')" class="login">Login</button>
        <button onclick="openModal('registerModal')" class="register">Register</button>

    </div>
</nav>

<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('loginModal')">&times;</span>
        <!-- Your login form content here -->
        <h2>Login</h2>
        <form action="./users" method="POST">
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="forgot">
                <h4>Forget Password</h4>
            </div>
            <button type="submit" class="save-button">Login</button>
        </form>
    </div>
</div>

<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('registerModal')">&times;</span>
        <!-- Your registration form content here -->
        <h2>Register</h2>
        <form action="./" method="POST">
            <div class="input-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="save-button">Register</button>
        </form>
    </div>
</div>

<!-- JavaScript to show/hide the modal -->
<script>
    // Function to open the modal
    function openModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "block";
    }

    // Function to close the modal
    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = "none";
    }

    
</script>
