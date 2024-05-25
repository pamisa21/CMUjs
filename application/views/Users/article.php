<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Article</title>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/managearticle.css'); ?>">
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            position: absolute;
            top:120px;
            left: 18%;
            font-family: poppins;
            font-size: 12px;
           
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
            .assign{
                color: blue;
            }

    </style>
</head>
<body>

<div class="container">
    <div class="title">
        <h2>Manage Article</h2>
        <h4>April 30, 2024</h4>
        <div class="add-button">
            <!-- Floating "Add User" button -->
            <button onclick="openModal()">Add Article</button>
        </div>
    </div>
    <div class="Table">
        <table>
            <thead>
                <tr>
                    <th>Volume</th>
                    <th>Title</th>
                    <th>Keywords</th>
                    <th>File</th>
                    <!-- <th>Abstract</th> -->
                    <th>Author</th>
                    <th>DOI</th>
                    <th>Status</th>
                    <th>Assign</th>
                    <td class="action" style="width: 200px">

                </tr>
            </thead>
            <tbody>
                <?php foreach ($article as $article): ?>
                <tr>
                    <td><?php echo $article['vol_name']; ?></td>
                    <td><?php echo $article['title']; ?></td>
                    <td><?php echo $article['keywords']; ?></td>
                    <td>
                        <?php if (!empty($article['filename'])): ?>
                            <a href="<?php echo base_url('public/assets/files/' . $article['filename']); ?>" target="_blank">
                                <img src="<?php echo base_url('public/assets/files/pdficon.png'); ?>" alt="PDF" width="40" height="40">
                            </a>
                        <?php else: ?>
                            No file uploaded
                        <?php endif; ?>
                    </td>
                    <!-- <td><?php echo $article['filename']; ?></td> -->
                    <td><?php echo $article['complete_name']; ?></td>
                    <td><?php echo $article['doi']; ?></td>
                    <td>
                        <?php
                        $status = $article['published'];
                        echo $status == 1 ? '<span class="publish-status">Publish</span>' : '<span class="unpublish-status">Unpublish</span>';
                        ?>
                    </td>
                    <td>
                        <?php
                        $assign = $article['assign'];
                        echo $assign == 1 ? '<span class="assign">Assign</span>' : '<span class="unpublish-status">Not Yet Assign</span>';
                        ?>
                    </td>
                    <td>
                        <a href="#" class="viewbutton" id="view_<?php echo $article['articleid']; ?>" onclick="getArticleDetails(<?php echo $article['articleid']; ?>)" title="View Details">
                            <span class="glyphicon glyphicon-eye-open iconeye" style="margin-right: 15px;margin-bottom: 15px;"></span>
                        </a>
                        <a href="#" class="editButton" id="edit_<?php echo $article['articleid']; ?>" onclick="editArticle(<?php echo $article['articleid']; ?>)" title="Edit Article">
                            <span class="glyphicon glyphicon-pencil icon" style="margin-right: 15px;"></span>
                        </a>
                        <a href="#" class="deleteButton" id="delete_<?php echo $article['articleid']; ?>" onclick="deletearticle(<?php echo $article['articleid']; ?>)" title="Delete Article">
                            <span class="glyphicon glyphicon-trash icondelete" style="margin-right: 15px;"></span>
                        </a>
                        <a href="#" class="assignbutton" id="assign_<?php echo $article['articleid']; ?>" onclick="assignArticle(<?php echo $article['articleid']; ?>)" title="Assign Article">
                            <span class="glyphicon glyphicon-send icon" style="margin-right: 15px;"></span>
                        </a>
                        <?php if ($article['assign'] == 1): ?>
                            <a href="#" class="viewAssign" id="viewas<?php echo $article['articleid']; ?>" onclick="viewassign(<?php echo $article['articleid']; ?>)" title="View Assign Article">
                                <span class="glyphicon glyphicon glyphicon-list-alt" style="margin-right: 10px;"></span>
                            </a>
                            <a href="#" class="manageassign" id="manageassign<?php echo $article['articleid']; ?>" onclick="manageassign(<?php echo $article['articleid']; ?>)" title="Manage Assign Article">
                                <span class="glyphicon glyphicon glyphicon-cog" style="margin-right: 5px;"></span>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div id="articleDetailsModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeArticleDetailsModal()">&times;</span>
        <div id="articledetails" class="form-container">
            <!-- User details will be displayed here -->
        </div>
    </div>
</div>

<div id="editarticleModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeeditarticleModal()">&times;</span>
        <div id="updatearticleDetails" class="form-container">
            <!-- User details will be displayed here -->
        </div>
    </div>
</div>

<div id="assignarticleModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeassignarticleModal()">&times;</span>
        <div id="updateassingarticle" class="form-container">
           
        </div>
    </div>
</div>
<div id="viewassigmodal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeviewassigmodal()">&times;</span>
        <div id="viewassingarticle" class="form-container">
           
        </div>
    </div>
</div>

</body>


<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="form-container">
            <form method="POST" action="<?php echo site_url('users/addarticle'); ?>" class="form-horizontal form-material" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="profilePicInput" style="margin-bottom: 20px;">PDF File</label>
                    <input id="profilePicInput" class="center form-control-file" type="file" name="filename" accept="application/pdf" required>
                </div>

                <div class="form-group">
                    <label for="articleNameInput">Article Name</label>
                    <input id="articleNameInput" class="form-control" type="text" name="title" placeholder="Enter article name">
                </div>
                <div class="form-group">
                    <label for="keywordsInput">Keywords</label>
                    <input id="keywordsInput" class="form-control" type="text" name="keywords" placeholder="Enter keywords">
                </div>
                <div class="form-group">
                    <label for="abstractInput">Abstract</label>
                    <textarea id="abstractInput" class="form-control" name="abstract" placeholder="Enter abstract"></textarea>
                </div>      
                <div class="form-group">
                    <label for="doiInput">DOI</label>
                    <input id="doiInput" class="form-control" type="text" name="doi" placeholder="Enter DOI">
                </div>
                <div class="form-group">
                    <label for="volumeSelect">Select Volume</label>
                    <select id="volumeSelect" class="form-control" name="volumeid">
                        <option value="">Select a Volume</option> 
                        <?php foreach ($volumes as $volume): ?>
                         
                                <option value="<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></option>
                           
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="authorSelect">Select Author</label>
                    <select id="authorSelect" class="form-control" name="auid">
                        <option value="">Select an Author</option> 
                        <?php foreach ($authors as $author): ?>                      
                            <option value="<?php echo $author['auid']; ?>"><?php echo $author['complete_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
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
    function deletearticle(articleid) {
        if (confirm('Are you sure you want to delete this Article?')) {
            window.location.href = `http://localhost:81/demo/users/deletearticle/${articleid}`
        }
    }
</script>
<!-- <script>
    function getArticleDetails(articleid) {
    

    window.location.href = `http://localhost:81/demo/users/getArticleDetails/${articleid}`; 
}   
</script> -->
<script>
    function getArticleDetails(articleid) {

        fetch(`http://localhost:81/demo/users/getArticleDetails/${articleid}`)
            .then(response => response.text())
            .then(html => {

                document.getElementById('articledetails').innerHTML = html;
  
                document.getElementById('articleDetailsModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching Article details:', error));
    }

    function closeArticleDetailsModal() {
        document.getElementById('articleDetailsModal').style.display = 'none';
    }
     
    function get_article_by_id(articleid) {
            window.location.href = `http://localhost:81/demo/users/view_articledetails/${articleid}`
        
    } 
    // function editArticle(articleid) {
    //     if (confirm('Are you sure you want to edit this Article?')) {
    //         window.location.href = `http://localhost:81/demo/users/editarticle/${articleid}`
    //     }
    // }   
</script>

<script>
    function editArticle(articleid) {
        // Make an AJAX request to fetch user details
        fetch(`http://localhost:81/demo/users/editarticle/${articleid}`)
            .then(response => response.text())
            .then(html => {
                // Display user details in the modal
                document.getElementById('updatearticleDetails').innerHTML = html;
                // Show the modal
                document.getElementById('editarticleModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching Article details:', error));
    }

    function closeeditarticleModal() {
        document.getElementById('editarticleModal').style.display = 'none';
    }
</script>
<!-- <script>
     function assignArticle(articleid) {
        if (confirm('Are you sure you want to Assign Article?')) {
            window.location.href = `http://localhost:81/demo/users/updateassingarticle//${articleid}`
        }assignarticle
    }  
</script> -->
<script>
    function assignArticle(articleid) {
        // Make an AJAX request to fetch user details
        fetch(`http://localhost:81/demo/users/assignarticle/${articleid}`)
            .then(response => response.text())
            .then(html => {
                // Display user details in the modal
                document.getElementById('updateassingarticle').innerHTML = html;
                // Show the modal
                document.getElementById('assignarticleModal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching Article details:', error));
    }

    function closeassignarticleModal() {
        document.getElementById('assignarticleModal').style.display = 'none';
    }


    function viewassign(articleid) {
        if (confirm('Are you sure you want to View Assign  Article?')) {
            window.location.href = `http://localhost:81/demo/users/viewassign/${articleid}`
        }
    }   


    function viewassign(articleid) {
        fetch(`http://localhost:81/demo/users/viewassign/${articleid}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('viewassingarticle').innerHTML = html;

                document.getElementById('viewassigmodal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching Article details:', error));
    }
    function closeviewassigmodal() {
        document.getElementById('viewassigmodal').style.display = 'none';
    }



    function manageassign(articleid) {
        if (confirm('Are you sure you want to Manage?')) {
            window.location.href = `http://localhost:81/demo/users/manageassign/${articleid}`
        }
    }   



    
    function manageassign(articleid) {
        fetch(`http://localhost:81/demo/users/manageassign/${articleid}`)
            .then(response => response.text())
            .then(html => {
                document.getElementById('manageassingarticle').innerHTML = html;

                document.getElementById('manageassigmodal').style.display = 'block';
            })
            .catch(error => console.error('Error fetching Article details:', error));
    }
    function closemanageassigmodal() {
        document.getElementById('manageassigmodal').style.display = 'none';
    }

</script>

</html>

<div id="manageassigmodal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closemanageassigmodal()">&times;</span>
        <div id="manageassingarticle" class="form-container">
           
        </div>
    </div>
</div>
