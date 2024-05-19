<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/manageusers.css'); ?>">
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            position: absolute;
            top:120px;
            left: 20%;
            font-family: poppins;
            
           
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .add-button {
            position: fixed;
            /* bottom: 20px; */
            right: 150px;
            z-index: 999;
            top: 50px;
            
        }
       .add-button button {
        width: 120px; 
        height: 35px;
        border-radius: 5px;
        }
        .add-button button:hover {
       
        background-color:#138143 ;
        color:white;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 5%;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
            font-family: poppins;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 65%;
            font-family: poppins;
            border-radius: 10px;
          
        }
        .close {
            color: #083B0A ;
            width: 50px; 
            height: 40px; 
            font-size: 50px;
            line-height: 40px; 
            text-align: center; 
            cursor: pointer; 
            font-weight: bolder;
            font-family: poppins;
        }    
        .close:hover {
            color: #083B0A ;
            width: 50px; 
            height: 40px; 
            font-size: 50px;
            line-height: 40px; 
            text-align: center; 
            cursor: pointer; 
            font-weight: bolder;
            font-family: poppins;
        }       
   

        .btn.btn-primary {
            background-color: #083B0A ;
            color: #fff;
            border: 1px solid #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 17px;
            cursor: pointer;
            position: relative;
            margin-left: 35%;
            width: 250px;
            text-align: center;
            font-family: poppins;
            margin-top: 20px;
            
        }

        .btn.btn-primary:hover {
            background-color: #138143;
            border-color: #0056b3;
            color: #fff;
        }
        .Active {
        color: blue;
        background-color: none;
        }

        .not-active {
            color: red;
        }
        .action{
            margin-left: 20px;
                
        }
        .icon {
            color: blue; 
        }
        .icondelete {
            color: red; 
        }
        .iconeye{
            margin-left: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">
        <h2>Manage Users</h2>
        <h4>April 30, 2024</h4>
        <div class="add-button">
            <button onclick="openModal()">Add Evaluator</button>
        </div>
    </div>
    
    <div class="Table">
        <table>
            <thead>
                <tr>
                    <th>Complete Name</th>
                    <th>Email</th>
                    
                    <th>Sex</th>
                    <th>Status</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['complete_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                   
                    <td><?php echo $user['sex'] == 1 ? 'Male' : 'Female'; ?></td>
                    <td class="<?php echo $user['status'] == 1 ? 'Active' : 'not-active'; ?>">
                    <?php echo $user['status'] == 1 ? 'Active' : 'Not Active'; ?>
                     </td>

                     <td class="action">
                     <a href="#" class="viewbutton" id="view_<?php echo $user['userid']; ?>" onclick="getUserDetails(<?php echo $user['userid']; ?>)">
                        <span class="glyphicon glyphicon-eye-open iconeye" style="margin-right: 10px;"></span>
                     </a>
                        <a href="#" class="editButton" id="edit<?php echo $user['userid']; ?>" onclick="editUser(<?php echo $user['userid']; ?>)"><span class="glyphicon glyphicon-pencil icon" style="margin-right: 15px;"></span></a>
                        <a href="#" class="deleteButton" id="delete_<?php echo $user['userid']; ?>" onclick="deleteUser(<?php echo $user['userid']; ?>)"><span class="glyphicon glyphicon-trash icondelete" style="margin-right: 10px;"></span></a>
                    </td>



                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>

<div id="userDetailsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeUserDetailsModal()">&times;</span>
        <div id="userDetails" class="form-container">
            <!-- User details will be displayed here -->
        </div>
    </div>
</div>

<div id="edituserModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeedituserModal()">&times;</span>
        <div id="updateuserDetails" class="form-container">
            <!-- User details will be displayed here -->
        </div>
    </div>
</div>
</body>

<!-- Modal for adding users -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="form-container">
            <form method="POST" action="<?php echo site_url('users/adduser'); ?>" enctype="multipart/form-data" class="form-horizontal form-material">
                <div class="form-group">
                    <label for="profilePicInput">Profile Picture</label>
                    <input id="profilePicInput" class="center form-control-file" type="file" name="profile_pic" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="complete_name" class="form-control form-control-line" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control form-control-line" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control form-control-line" placeholder="Enter your password">
                </div>
                <div class="form-group">
                <label>Sex:</label>
                <label><input type="radio" name="sex" value="male" onclick="setSexValue(1)"> Male</label>
                <label><input type="radio" name="sex" value="female" onclick="setSexValue(2)"> Female</label>
                <input type="hidden" id="sexValue" name="sex_value">

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    // Function to open the modal
    function openModal() {
        document.getElementById('myModal').style.display = 'block';
        // document.getElementById('userDetailsModal').style.display = 'none';
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
    
    function deleteUser(userid) {
        if (confirm('Are you sure you want to delete this user?')) {
            window.location.href = `http://127.0.0.1:5500/users/delete/${userid}`
        }
    }
    function get_user_by_id(userid) {
            window.location.href = `http://127.0.0.1:5500/users/view_details/${userid}`
        
    }   
    // function editUser(userid) {
    //     if (confirm('Are you sure you want to edit this user?')) {
    //         window.location.href = `http://127.0.0.1:5500/users/edituser/${userid}`
    //     }
    // }   
</script>
<script>
    function setSexValue(value) {
    document.getElementById("sexValue").value = value;
    }



</script>

<script>
    function getUserDetails(userid) {
        // Make an AJAX request to fetch user details
        fetch(`http://127.0.0.1:5500/users/view_details/${userid}`)
            .then(response => response.text())
            .then(html => {
                // Display user details in the modal
                document.getElementById('userDetails').innerHTML = html;
                // Show the modal
                document.getElementById('userDetailsModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching user details:', error));
    }

    function closeUserDetailsModal() {
        document.getElementById('userDetailsModal').style.display = 'none';
    }
</script>

<script>
    function editUser(userid) {
        // Make an AJAX request to fetch user details
        fetch(`http://127.0.0.1:5500/users/edituser/${userid}`)
            .then(response => response.text())
            .then(html => {
                // Display user details in the modal
                document.getElementById('updateuserDetails').innerHTML = html;
                // Show the modal
                document.getElementById('edituserModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching user details:', error));
    }

    function closeedituserModal() {
        document.getElementById('edituserModal').style.display = 'none';
    }
</script>
</html>
