<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<style>
 body {
    font-family: 'Quattrocento', serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;

}
.content {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
 


}

.column {
    position: absolute;
    top: 60px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add box shadow */
}

.column-1 {
    left: 18%;
    width: calc(60% - 32px);
    padding: 10px;
    border: none;
    display: flex;
    flex-wrap: wrap; 
    justify-content: space-between; 
    position: fixed;
    border: none;
    top: 15%;
    transform: translateZ(0); 
    overflow-y: auto; 
    max-height: 75vh;
}
.column-1::-webkit-scrollbar {
    width: 8px; 
}

.column-1::-webkit-scrollbar-track {
    background: transparent; 
}

.column-1::-webkit-scrollbar-thumb {
    background:green; 
}

.column-1::-webkit-scrollbar-thumb:hover {
    background: #138143; 
}

.column-1 .card {
    width: calc(33.33% - 32px); 
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 16px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
}

@media (max-width: 768px) {
    .column-1 .card {
        width: calc(50% - 16px);
    }
}

@media (max-width: 700px) {
    .column-1 .card {
        width: calc(100% - 20px); 
    }
}

.images img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin-top: 2px;
}

.column-2 {
    right: 4%;
    width: calc(22% - 70px);
    padding: 10px;
    position: fixed;
    border: none;
    top: 15%;
    transform: translateZ(0); 
    overflow-y: auto; 
    max-height: 63vh;
}

.column-2::-webkit-scrollbar {
    width: 8px; 
}

.column-2::-webkit-scrollbar-track {
    background: transparent; 
}

.column-2::-webkit-scrollbar-thumb {
    background:green; 
}

.column-2::-webkit-scrollbar-thumb:hover {
    background: #138143;
}


.small-volume {
    font-size: 12px;
}

.card {
    width: 100%; 
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 16px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.card h4, .card p {
    margin: 8px 0;
}
.profile {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}
.author-img {
    width: 40px; /* Adjust size as needed */
    height: 40px; /* Adjust size as needed */
    border-radius: 50%; /* Make the image round */
    margin-right: 12px;
}

.author-info {
    display: flex;
    flex-direction: column;
}

.author-name {
    font-weight: bold;

}

.author-position {
    color: grey;
    margin-top: 4px; /* Adjust the margin as needed */
}
.articlebio {
  font-family: 'Quattrocento', serif;
  margin-bottom: 10px;
}
.Title {
  font-weight: bold;
  font-size: 23px;
}
.subtitle {
  color: gray;
  margin-top: -2px;
}
.description {
  color: gray;
}
.buttoninfo {
  margin-top: 20px;
  /* margin-left: 30px; */
  border-radius: 50px;
  
}
.viewinfo {
  border-radius: 10px;
  height: 25px;
  background-color: white;
  color: #138143;
}
.viewinfo:hover {
  border-radius: 10px;
  height: 25px;
  background-color: black;
  color: white;
}
.viewmore {
  border-radius: 10px;
  height: 25px;
  background-color: white;
  color: #138143;
}
.viewmore:hover {
  border-radius: 10px;
  height: 25px;
  background-color: black;
  color: white;
}
.viewcheck{
  border-radius: 10px;
  height: 25px;
  background-color: white;
  color: #138143;  
}
.viewcheck:hover {
  border-radius: 10px;
  height: 25px;
  background-color: black;
  color: white;
}
.articlelist li {
    margin-bottom: 10px; /* Adjust margin as needed */
    list-style-type: none;
    color: #138143;
    font-size: 16px;
}

.icon-volume {
    display: inline-block;
    width: 20px; 
    height: 20px;
    background-image: url('/public/assets/images/book-bookmark-fill.png'); /* Replace 'public/assets/images/3177361-e391aca0.png' with the path to your volume icon */
    background-size: cover;
    margin-right: 15px;
    margin-top: 10PX; /* Adjust margin as needed */
}

.aricleLabel{
  font-size: 20px;
  font-weight: bold;
  color:#138143
}
h4{
    color: red;
}
.title {
    color:#138143;
    position: absolute;
    top: 10px;
    text-align: left;
    left: 28rem;

    font-weight: 500;
  }
  
  h2 {
    font-size: 30px;
    font-weight:bold;
  }
  
 .title h4 {
    font-size: 11px;
  }
  /* .icons {
    position: relative;
    left: 100%;
  } */
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

<div class="content">
    <div class="title">
    <h2>Assign Article</h2>
    <h4>April 30, 2024</h4>
     </div>
    <div class="column column-1" >
    <?php
      foreach ($articles as $article):
        if ($article['published'] == 0): 
            ?>
            <div class="card">
                <div class="profile">
                    <img class="author-img" src="/public/assets/images/767.jpg" alt="Author Profile Image">
                    <div class="author-info">
                        <p class="author-name"><?php echo $article['auid']; ?></p>
                        <p class="author-position" style="margin-top:-2px">Faculty</p>
                    </div>
                </div>
    
                <div class="images">
                    <img src="/public/assets/images/767.jpg" alt="Article Image">
                </div> <!-- Fixed closing tag for the div "images" -->
                <div class="articlebio">
                    <p class="Title"><?php echo $article['title']; ?></p>
                    <p class="subtitle">SubTitle</p>
                    <p class="description"><?php echo $article['keywords']; ?></p>
                    <div class="buttoninfo">
                        <button class="viewinfo">View Info?</button>
                        <button class="viewmore">View More?</button>
                        <button class="viewcheck"   onclick="openModal()">Check</button>
 
                      
                        
                    </div>
                </div>
            </div>
            <?php
        endif;
    endforeach;
    
            ?>
    </div>
    
    <div class="column column-2 small-volume">
        <h3 class="aricleLabel"> List of Assign Article</h3>
        <div class="volume">
            <div class="volumearticle">
              <h4> Pendings</h4>
              <ul class="articlelist">
              <?php foreach ($articles as $article): ?>
                      <?php if ($article['published'] == 0 && $article['userid'] == 1): ?>
                              <li onclick="showArticle('<?php echo $article['title']; ?>')">
                                  <span class="icon-volume"></span> <?php echo $article['title']; ?>
                              </li>
                          <?php endif; ?>
                      <?php endforeach; ?>
              </ul> 
            </div>
            <div class="volumearticle">
              <h4> Published </h4>
              <ul class="articlelist">
              <?php foreach ($articles as $article): ?>
                      <?php if ($article['published'] == 1 && $article['userid'] == 1): ?>
                              <li onclick="showArticle('<?php echo $article['title']; ?>')">
                                  <span class="icon-volume"></span> <?php echo $article['title']; ?>
                              </li>
                          <?php endif; ?>
                      <?php endforeach; ?>
              </ul> 
            </div>
            <div class="volumearticle">
              <h4> Rejected </h4>
              <ul class="articlelist">
              <?php foreach ($articles as $article): ?>
                          <?php if ($article['published'] == 3 && $article['userid'] == 1): ?>
                              <li onclick="showArticle('<?php echo $article['title']; ?>')">
                                  <span class="icon-volume"></span> <?php echo $article['title']; ?>
                              </li>
                          <?php endif; ?>
                      <?php endforeach; ?>
              </ul> 
            </div>
        </div>
    </div>
</div>



</body>
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
// Function to handle the click event on list items
function showArticle(volume) {
    // You can add logic here to dynamically load articles based on the selected volume
    alert("You clicked on Volume: " + volume);
}
function openModal() {
        document.getElementById('myModal').style.display = 'block';
        // document.getElementById('userDetailsModal').style.display = 'none';
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
</script>



</html>
