<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
/* Add your existing CSS here */
.content {
    position: relative; 
    margin-left: 40px;
    margin-top: 80px;
    z-index: -100;
}
.column {
    position: absolute;
    top: 70px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add box shadow */
}

.column-1 {
    left: 5%;
    width: calc(65% - 30px);
    padding: 10px;
    border: none;
    display: flex;
    flex-wrap: wrap; 
    justify-content: space-between; 
    position: fixed;
    border: none;
    top: 20%;
    transform: translateZ(0); 
    overflow-y: auto; 
    max-height: 75vh;
}

.column-1 .card {
    width: calc(33.33% - 32px); /* 33.33% width for each card */
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 16px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    box-sizing: border-box; /* Include padding and border in the width calculation */
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
@media (max-width: 768px) {
    .column-1 .card {
        width: calc(50% - 16px); /* 50% width for each card on smaller screens */
    }
}

@media (max-width: 576px) {
    .column-1 .card {
        width: calc(100% - 16px); /* 100% width for each card on even smaller screens */
    }
}

.images img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin-top: 2px;
}

.column-2 {
    right: 5%;
    width: calc(25% - 90px);
    padding: 10px;
    position: fixed;
    border: none; 
    top:20%;
    top: 20%;
    transform: translateZ(0); 
    overflow-y: auto; 
    max-height: 50vh;
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
    
  border-radius: 50px;
  
}
.viewinfo {
  border-radius: 10px;
  height: 25px;
  background-color: black;
  color: white;
  width: 200px;
}
.viewinfo:hover {
  border-radius: 10px;
  height: 25px;
  background-color: white;
  color: black;
}
.viewmore {
  border-radius: 10px;
  height: 25px;
  background-color: #138143;
  color: white;
}
.viewmore:hover {
  border-radius: 10px;
  height: 25px;
  background-color: black;
  color: white;
}

#volumeList li {
    margin-bottom: 10px; /* Adjust margin as needed */
    list-style-type: none;
    color: #138143;
    font-size: 16px;
}

.icon-volume {
    display: inline-block;
    width: 20px; 
    height: 20px;
    background-image: url('public/assets/images/book-bookmark-fill.png'); /* Replace 'public/assets/images/3177361-e391aca0.png' with the path to your volume icon */
    background-size: cover;
    margin-right: 15px;
    margin-top: 10PX; /* Adjust margin as needed */
}

.volumelabel{
  font-size: 20px;
  font-weight: bold;
  color:#138143
}
.doi {
    font-size: 12px;
    color: blue;
    text-decoration-line: underline;
}
.Volname{
    color: #138143;
    text-align: left;
    margin-top: -100px;
}

.modal {
    display: none; 
    position: fixed; 
    z-index: 1000; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%; 
    border-radius: 8px; 
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}.viewinfo{
    margin-left: 20px;
}
</style>
</head>
<body>
    
<div class="content">
    
    <div class="column column-1">
        <?php foreach ($articles as $article): ?>
        <!-- <h1 class="Volume"><?php echo $article['vol_name']; ?></h1> -->
        <div class="card">
            <div class="profile">
          
                <img class="author-img" src="<?php echo file_exists('/public/assets/images/users/' . $article['profile_pic']) ? base_url('./public/assets/images/users/' . $article['profile_pic']) : base_url('./public/assets/images/users/noimage.png'); ?>" alt="Profile Picture" style="width: 40px; height: 40px; border-radius: 50%;">
                <div class="author-info">
                    <p class="author-name"><?php echo $article['complete_name']; ?></p>
                    <p class="author-position" style="margin-top:-2px"><?php echo $article['email']; ?></p>
                </div>
            </div>
            <div class="images">
                <img src="public/assets/images/767.jpg" alt="">
            </div>
           
            <div class="articlebio">
                <p class="Title"><?php echo $article['title']; ?></p>
                <p class="doi"><a href="<?php echo $article['doi']; ?>"><?php echo $article['doi']; ?></a></p>
                <p class="Volname"><?php echo $article['vol_name']; ?></p>
                <p class="description"><?php echo $article['keywords']; ?></p>
                <?php if (!empty($article['filename'])): ?>
                            <a href="<?php echo base_url('public/assets/files/' . $article['filename']); ?>" target="_blank">
                                <img src="<?php echo base_url('public/assets/files/pdficon.png'); ?>" alt="PDF" width="40" height="40">
                            </a>
                        <?php else: ?>
                            No file uploaded
                        <?php endif; ?>
                <div class="buttoninfo">
                    
                <button class="viewinfo" onclick="viewpublicarticle(<?php echo $article['articleid']; ?>)">
                    <span class="glyphicon glyphicon-eye-open iconeye" style="margin-right: 10px;"></span>
                    View Info
                </button>

                </div>
            </div>
        </div>
        <br>
        <?php endforeach; ?>
    </div>
    <div class="column column-2 small-volume">
        <h3 class="volumelabel">List of Pubished Volume</h3>
        <div class="volume">
            <ul id="volumeList">
                <?php foreach ($volumes as $volume): ?>
                <li onclick="showArticle('<?php echo $volume['vol_name']; ?>')">
                    <span class="icon-volume"></span> <?php echo $volume['vol_name']; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="articleModal" class="modal">
  <div class="modal-content">
    <!-- <span class="close">&times;</span> -->
    <div id="modalContent">
      <!-- Article details will be loaded here dynamically -->
      <button id="modalCloseButton" class="viewmore"></button>
    </div>
  </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("articleModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get the close button inside the modal content
    var closeButton = document.getElementById("modalCloseButton");

    // When the user clicks the button, open the modal 
    function viewpublicarticle(auid) {
        // Fetch article details using AJAX or Fetch API
        fetch(`http://localhost:81/demo/pages/viewpublicarticle/${auid}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById("modalContent").innerHTML = data + document.getElementById("modalCloseButton").outerHTML;
            modal.style.display = "block";
        })
        .catch(error => console.error('Error:', error));
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks on the close button inside the modal content, close the modal
    closeButton.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


</body>
</html>
