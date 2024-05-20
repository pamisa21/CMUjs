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
            z-index: 1; 
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
            
            .input-group select {
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
            .Usertype {
                margin-top: 20px;
                justify-content: center;
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
        <h2>Login as:</h2>
        <div class="Usertype">
            <input type="radio" id="author" name="user_type" value="author" onchange="openModal('authorLoginModal')" required>
            <label for="author">User</label>
            
            <input type="radio" id="evaluator" name="user_type" value="evaluator" onchange="openModal('evaluatorLoginModal')" required>
            <label for="evaluator">Evaluator</label>
        </div>
    </div>
</div>


<div id="authorLoginModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal('authorLoginModal')">&times;</span>
        <h2>Login as User</h2>
        <form action="./users" method="POST">
            <div class="input-group">
                <label for="authorEmail">Email:</label>
                <input type="email" id="authorEmail" name="email" required>
            </div>
            <div class="input-group">
                <label for="authorPassword">Password:</label>
                <input type="password" id="authorPassword" name="password" required>
            </div>
            <div class="forgot">
                <h4>Forgot Password</h4>
            </div>
            <button type="submit" class="save-button">Login</button>
        </form>
    </div>
</div>


<div id="evaluatorLoginModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal('evaluatorLoginModal')">&times;</span>
        <h2>Login as Evaluator</h2>
        <form action="./users" method="POST">
            <div class="input-group">
                <label for="evaluatorEmail">Email:</label>
                <input type="email" id="evaluatorEmail" name="email" required>
            </div>
            <div class="input-group">
                <label for="evaluatorPassword">Password:</label>
                <input type="password" id="evaluatorPassword" name="password" required>
            </div>
            <div class="forgot">
                <h4>Forgot Password</h4>
            </div>
            <button type="submit" class="save-button">Login</button>
        </form>
    </div>
</div>




<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('registerModal')">&times;</span>
        <h2>Register</h2>
        <div class="form-container">
            <form id="registerForm" method="POST" enctype="multipart/form-data" class="form-horizontal form-material">
                <div class="input-group">
                    <label for="profilePicInput">Profile Picture</label>
                    <input id="profilePicInput" class="center form-control-file" type="file" name="profile_pic" accept="image/*">
                </div>
                <div class="input-group">
                    <label>Complete Name : </label>
                    <input type="text" name="complete_name" class="form-control form-control-line" placeholder="Enter your full name">
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control form-control-line" placeholder="Enter your email">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control form-control-line" placeholder="Enter your password">
                </div>

                <div class="input-group">
                    <label>Contact Number</label>
                    <input type="number" name="contact_num" class="form-control form-control-line" placeholder="Enter your Contact Number">
                </div>

                <div class="input-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control form-control-line" placeholder="Enter your Address">
                </div>

                <div class="input-group">
                    <label>Self Description</label>
                    <input type="text" name="description" class="form-control form-control-line" placeholder="Enter your Description">
                </div>

                <div class="form-group">
                    <label>ROLES:</label>
                    <input type="radio" name="role" value="author" onclick="setRoleValue(1); setAction();"> User/Author
                    <input type="radio" name="role" value="evaluator" onclick="setRoleValue(2); setAction();"> Evaluator
                    <input type="hidden" id="rolevalue" name="rolevalue">
                </div>

                <div class="input-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        setAction(); // Ensure action is set when the page loads
    });

    function setAction() {
       if (roleElement) {
            var roleValue = roleElement.value;
            var formAction = roleValue === 'author' ? "<?php echo site_url('Register/registerauthor'); ?>" : "<?php echo site_url('Register/registerevaluator'); ?>";
            document.getElementById('registerForm').action = formAction;
            console.log("Form action set to: " + formAction);
        }
    }

    function setRoleValue(value) {
        document.getElementById('rolevalue').value = value;
    }
</script>
   
    


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

<script>
    function selectUserType() {
        var userType = document.querySelector('input[name="user_type"]:checked').value;
        if (userType === "author" || userType === "evaluator") {
            document.getElementById("emailInput").style.display = "block";
        } else {
            document.getElementById("emailInput").style.display = "none";
        }
    }
</script>