<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Volumes</title>
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
            .publish-status {
                color: green; /* Example styling for publish status */
            }

            .unpublish-status {
                color: red; /* Example styling for unpublish status */
            }

            .archive-status {
                color: gray; /* Example styling for archive status */
            }

    </style>
</head>
<body>

<div class="container">
    <div class="title">
        <h2>Manage Volumes</h2>
        <h4>April 30, 2024</h4>
        <div class="add-button">
        <button onclick="openModal()">Add volumes</button>
        </div>
    </div>
    <div class="Table">
    <table>
            <thead>
                <tr>
                    <th>volumes Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($volumes as $volumes): ?>
                    <tr>
                        <td><?php echo $volumes['vol_name']; ?></td>
                        <td><?php echo $volumes['description']; ?></td>
                        
                        <td>
                            <?php
                            $status = $volumes['status'];
                            if ($status == 1) {
                                echo '<span class="publish-status">Publish</span>';
                            } elseif ($status == 2) {
                                echo '<span class="unpublish-status">Unpublish</span>';
                            } else {
                                echo '<span class="archive-status">Archive</span>';
                            }
                            ?>
                        </td>


                   
                        <td class="action" style="width: 150px">

            
                        <a href="#" class="viewbutton" id="view_<?php echo $volumes['volumeid']; ?>" onclick="getVolumeDetails(<?php echo $volumes['volumeid']; ?>)">
                        <span class="glyphicon glyphicon-eye-open iconeye" style="margin-right: 10px;"></span>
                        </a>
                        <!-- <a href="#" class="viewbutton" id="view_<?php echo $volumes['volumeid']; ?>" onclick="getAuthorDetails(<?php echo $volumes['volumeid']; ?>)">
                        <span class="glyphicon glyphicon-eye-open iconeye" style="margin-right: 10px;"></span>
                     </a> -->
                     <a href="#" class="editButton" id="edit<?php echo $volumes['volumeid']; ?>" onclick="editVolume(<?php echo $volumes['volumeid']; ?>)"><span class="glyphicon glyphicon-pencil icon" style="margin-right: 15px;"></span></a>
                        <a href="#" class="deleteButton" id="delete_<?php echo $volumes['volumeid']; ?>" onclick="deletevolume(<?php echo $volumes['volumeid']; ?>)">
                        <span class="glyphicon glyphicon-trash icondelete" style="margin-right: 10px;"></span></a>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div id="volumeDetailsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeVolumeDetailsModal()">&times;</span>
        <div id="volumedetails" class="form-container">
            <!-- User details will be displayed here -->
        </div>
    </div>
</div>

<div id="editvolumeModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeeditvolueModal()">&times;</span>
        <div id="updatevolumeDetails" class="form-container">
            <!-- User details will be displayed here -->
        </div>
    </div>
</div>


</body>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="form-container">
            <form method="POST" action="<?php echo site_url('users/addvolume'); ?>" class="form-horizontal form-material">
                <div class="form-group">
                    <label for="volumeNameInput">volumes Name</label>
                    <input id="volumeNameInput" class="form-control" type="text" name="vol_name" placeholder="Enter volumes name">
                </div>
                <div class="form-group">
                    <label for="descriptionInput">Description</label>
                    <textarea id="descriptionInput" class="form-control" name="description" placeholder="Enter description"></textarea>
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
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
    function deletevolume(volumeid) {
        if (confirm('Are you sure you want to delete this volumes?')) {
            window.location.href = `http://localhost:81/demo/users/deletevolume/${volumeid}`
        }
    }
</script>
<!-- <script>
    function getVolumeDetails(volumeid) {
    

    window.location.href = `http://localhost:81/demo/users/view_volumedetails/${volumeid}`; 
}   
</script> -->
<script>
    function getVolumeDetails(volumeid) {
        // Make an AJAX request to fetch user details
        fetch(`http://localhost:81/demo/users/view_volumedetails/${volumeid}`)
            .then(response => response.text())
            .then(html => {
                // Display user details in the modal
                document.getElementById('volumedetails').innerHTML = html;
                // Show the modal
                document.getElementById('volumeDetailsModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching volumes details:', error));
    }

    function closeVolumeDetailsModal() {
        document.getElementById('volumeDetailsModal').style.display = 'none';
    }
     
    function get_volume_by_id(volumeid) {
            window.location.href = `http://localhost:81/demo/users/view_volumedetails/${volumeid}`
        
    } 
     function editVolume(volumeid) {
        if (confirm('Are you sure you want to edit this volumes?')) {
            window.location.href = `http://localhost:81/demo/users/editvolume/${volumeid}`
        }
    }   
</script>
<script>
    function editVolume(volumeid) {

        fetch(`http://localhost:81/demo/users/editvolume/${volumeid}`)
            .then(response => response.text())
            .then(html => {

                document.getElementById('updatevolumeDetails').innerHTML = html;

                document.getElementById('editvolumeModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching volumes details:', error));
    }

    function closeeditvolueModal() {
        document.getElementById('editvolumeModal').style.display = 'none';
    }
</script>
</html>

