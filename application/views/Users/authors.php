<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Authors</title>
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
            padding: 8px;
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
        width: 120px; 
        height: 35px;
        border-radius: 5px;
        background-color:#138143 ;
        color:white;
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
    </style>
</head>
<body>

<div class="container">
    <div class="title">
        <h2>Manage Users</h2>
        <h4>April 30, 2024</h4>
        <div class="add-button">
            <button onclick="openModal()">Add User</button>
        </div>
    </div>  

    <div class="Table">
         <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author Name</th>
                <th>Sex</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $author): ?>
                <tr>
                    <td><?php echo $author['title']; ?></td>
                    <td><?php echo $author['author_name']; ?></td>
                    <td><?php echo $author['sex'] == 1 ? 'Male' : 'Female'; ?></td>
                    <td><?php echo $author['email']; ?></td>
                    <td><?php echo $author['contact_num']; ?></td>
                    <td class="action">
                        <!-- <a href="#" class="viewbutton" id="view_<?php echo $author['auid']; ?>" onclick="getAuthorDetails(<?php echo $author['auid']; ?>)">
                        <span class="glyphicon glyphicon-eye-open iconeye" style="margin-right: 10px;"></span>
                        </a> -->
                        <a href="#" class="viewbutton" id="view_<?php echo $author['auid']; ?>" onclick="getAuthorDetails(<?php echo $author['auid']; ?>)">
                        <span class="glyphicon glyphicon-eye-open iconeye" style="margin-right: 10px;"></span>
                        </a>
                        <a href="#" class="editButton" id="edit<?php echo $author['auid']; ?>" onclick="editAuthor(<?php echo $author['auid']; ?>)"><span class="glyphicon glyphicon-pencil icon" style="margin-right: 15px;"></span></a>
                        <a href="#" class="deleteButton" id="delete_<?php echo $author['auid']; ?>" onclick="deleteauthor(<?php echo $author['auid']; ?>)"><span class="glyphicon glyphicon-trash icondelete" style="margin-right: 10px;"></span></a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>

<div id="authorDetailsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeAuthorDetailsModal()">&times;</span>
        <div id="AuthorDetails" class="form-container">
            <!-- User details will be displayed here -->
        </div>
    </div>
</div>

<div id="editauthorModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeeditauthorModal()">&times;</span>
        <div id="updateauthorDetails" class="form-container">
            <!-- User details will be displayed here -->
        </div>
    </div>
</div>
</body>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="form-container">
            <form method="POST" action="<?php echo site_url('users/editAuthor'); ?>" enctype="multipart/form-data" class="form-horizontal form-material">
                <div class="form-group">
                    <label for="profilePicInput" style="margin-bottom: 20px;">Profile Picture</label>
                    <input id="profilePicInput" class="center form-control-file" type="file" name="profile_pic" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="author_name" class="form-control form-control-line" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control form-control-line" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <input type="number" name="contact_num" class="form-control form-control-line" placeholder="Enter your Phone Number">
                </div>
                <div class="form-group">
                <label>Sex:</label>
                    <label><input type="radio" name="sex" value="male" onclick="setSexValue(1)"> Male</label>
                    <label><input type="radio" name="sex" value="female" onclick="setSexValue(2)"> Female</label>
                    <input type="hidden" id="sexValue" name="sex">
                </div>
                <div class="form-group">
                <label for="title">Title:</label>
                <select name="title" id="title" class="form-control">
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Dr.">Dr.</option>
                </select>

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
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
    
</script>

<script>
    function setSexValue(value) {
        document.getElementById("sexValue").value = value;
    }
</script>
<script>
    
    
    function get_author_by_id(auid) {
            window.location.href = `http://127.0.0.1:5500/users/viewauthor_details/${auid}`
        
    }  

</script>
<!-- <script>
    function getAuthorDetails(auid) {
    

    window.location.href = `http://127.0.0.1:5500/users/view_authordetails/${auid}`; 
}   
</script> -->

<script>
    function getAuthorDetails(auid) {
        // Make an AJAX request to fetch user details
        fetch(`http://127.0.0.1:5500/users/viewauthor_details/${auid}`)
            .then(response => response.text())
            .then(html => {
                // Display user details in the modal
                document.getElementById('AuthorDetails').innerHTML = html;
                // Show the modal
                document.getElementById('authorDetailsModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching author details:', error));
    }

    function closeUserDetailsModal() {
        document.getElementById('authorDetailsModal').style.display = 'none';
    }
</script>
<script>
    function closeAuthorDetailsModal() {
        document.getElementById('authorDetailsModal').style.display = 'none';
    }
    function deleteauthor(auid) {
        if (confirm('Are you sure you want to delete this Author?')) {
            window.location.href = `http://127.0.0.1:5500/users/deleteauthor/${auid}`
        }
    }
    //   function editAuthor(auid) {
    //     if (confirm('Are you sure you want to edit this author?')) {
    //         window.location.href = `http://127.0.0.1:5500/users/editauthor/${auid}`
    //     }
    // }   
</script>
<script>
    function editAuthor(auid) {
        // Make an AJAX request to fetch user details
        fetch(`http://127.0.0.1:5500/users/editAuthor/${auid}`)
            .then(response => response.text())
            .then(html => {
                // Display user details in the modal
                document.getElementById('updateauthorDetails').innerHTML = html;
                // Show the modal
                document.getElementById('editauthorModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching author details:', error));
    }

    function closeeditauthorModal() {
        document.getElementById('editauthorModal').style.display = 'none';
    }
</script>
</html>
