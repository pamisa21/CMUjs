  <!DOCTYPE html>
  <html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {
      font-family: 'Quattrocento', serif;
      margin: 0;
      padding: 0;
  }
  #content {
      position: relative; 
      padding: 50px;
      z-index: -100;
  }
  .column {
      position: absolute;
      top: 60px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add box shadow */
  }

  .column-1 {
      left: 5%;
      width: calc(67% - 32px);
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
      right: 5%;
      width: calc(25% - 70px);
      padding: 10px;
      position: fixed;
      border: none;
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
    /* margin-left: 60px; */
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
    background-color: #138143;
    color: white;
  }
  .viewmore:hover {
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
      background-image: url('public/assets/images/book-bookmark-fill.png'); /* Replace 'public/assets/images/3177361-e391aca0.png' with the path to your volume icon */
      background-size: cover;
      margin-right: 15px;
      margin-top: 10PX; /* Adjust margin as needed */
  }

  .aricleLabel{
    font-size: 20px;
    font-weight: bold;
    color:#138143
  }
  </style>
  </head>
  <body>

  <div id="content">

<div class="column column-1">
    <?php foreach ($volumes as $volume): ?>
        <div class="card">
            <div class="images">
                <img src="public/assets/images/767.jpg" alt="" />
            </div>
            <div class="articlebio">
                <p class="Title"><?php echo $volume['vol_name']; ?></p>
                <p class="description"><?php echo $volume['description']; ?></p>
                <div class="buttoninfo">
                <button class="viewinfo" onclick="viewpublicvolume(<?php echo $volume['volumeid']; ?>)">
                    <span class="glyphicon glyphicon-eye-open iconeye" style="margin-right: 10px;"></span>
                    View Info
                </button>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="column column-2 small-volume">
    <h3 class="aricleLabel">List of Articles in Archie</h3>
    <div class="volume">
        <?php foreach ($volumes as $volume): ?>
            <div class="volumearticle">
                <h4><?php echo $volume['vol_name']; ?></h4>
                <ul class="articlelist">
                    <?php foreach ($volume['articles'] as $article): ?>
                        <li onclick="showArticle('<?php echo $article['title']; ?>')">
                            <span class="icon-volume"></span> <?php echo $article['title']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul> 
            </div>
        <?php endforeach; ?>
    </div>
</div>

</div>

<!-- The Modal -->
<div id="articleModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div id="modalContent">
      <!-- Article details will be loaded here dynamically -->
      <button id="modalCloseButton" class="viewmore">Close</button>
    </div>
  </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("articleModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];


    var closeButton = document.getElementById("modalCloseButton");

  
    function viewpublicvolume(volumeid) {
 
        fetch(`http://localhost:81/demo/pages/viewpublicvolume/${volumeid}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById("modalContent").innerHTML = data + document.getElementById("modalCloseButton").outerHTML;
            modal.style.display = "block";
        })
        .catch(error => console.error('Error:', error));
    }


    span.onclick = function() {
        modal.style.display = "none";
    }

  
    closeButton.onclick = function() {
        modal.style.display = "none";
    }


    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

  <script>
  // Function to handle the click event on list items
  function showArticle(volume) {
      // You can add logic here to dynamically load articles based on the selected volume
      alert("You clicked on Volume: " + volume);
  }
  </script>

  </body>
  </html>
