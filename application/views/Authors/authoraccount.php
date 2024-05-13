<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<style>

body {
    font-family: 'Quattrocento', serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;

}
.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
    background-color: #f4f4f4;


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
  
  h4 {
    font-size: 11px;
  }


.profile-body{
margin: 100px;

}

.profile {
margin-top: -45px;
margin-left: auto;
margin-right: auto;
border-radius: 25px;
background-color: transparent;
border:black 1px;
box-shadow: 2px 2px 5px 0px rgba(150, 150, 150, 0.5);

width: 70%;
padding: 20px;
z-index: 0;
}

.socialmedia {
    text-align: center;
}

.photo {
    margin: 25px;

}

.image--cover {
    width: 170px;
    height: 170px;
    border: #fff 3px solid;
    border-radius: 50%;
    object-fit: cover;
    object-position: center;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: auto;
    margin-top: -40px;    
}

.username,
.name,
.email,
.locationname,
.descricao {
    text-align: center;
    font-family: 'Roboto', sans-serif;
    padding: 0;
    margin: 1px;
}

.username {
 
    font-size: 20pt;
    margin: 2px
}

.name {
    font-size: 14pt;
}

.email {
    font-size: 14pt;
    margin: 2px
}
.locationname {
    font-size: 10pt;
    margin: 2px
}

.descricao {
    border-top: #969696 solid 1px;
    padding: 10px;
    font-size: 11pt;
    margin: 5px;
}

.button-facebook,
.button-instagram,
.button-twitter,
.button-whatsapp {
    padding: 5px;
    font-size: 30pt;
}
.button-facebook {
    color: #3C5A99;
}
.button-instagram {
  color: #893dc2;
}
.button-twitter {
    color: #1DA1F2;
}
.button-whatsapp {
    color: #4AC959;
}

#rating-stars {
    margin: 4px;
}

#rating-stars .stars {
    display: inline-flex;
  }
  #rarate-input {
    pointer-events: none;
  }
  #rating-stars .rate-input {
    position: absolute;
    left: -9999px;
  }
  #rating-stars label {
    cursor: pointer;
    padding: 1px;
    font-size: 20pt;
  }
  #rating-stars .star-icon {
    color: orange;
  }

  #rating-stars .rate-input:checked ~ .star-label .star-icon {
    color: #999;
  }
  #rating-stars .stars:hover .star-label .star-icon {
    color: orange;
  }
  #rating-stars .rate-input:hover ~ .star-label .star-icon {
    color: #999;
  }
  .cardcontainer {
      display: flex;
      justify-content: flex-start; 
      left: 15rem;
      width: 100%; 
      position: relative;
    }
    .button {
        text-align: center;
        margin-bottom:10px;
        margin-top: 20px;
    
    }
    .button button {
        border-radius: 5px;
        width: 150px;
        height: 35px;
        background-color: black ;
        color: white;
    }
    .button button:hover {
        background-color: #138143 ;
        color: white;
    }
</style>
<body>
    <body>

<div class="container">
  <div class="title">
    <h2>Author Information</h2>
    <h4>April 30, 2024</h4>
  </div>
  <div class="cardcontainer">
    <div class="profile-body">
      <div class="photo">
        <img src="https://content-static.upwork.com/uploads/2014/10/01073427/profilephoto1.jpg" class="image--cover">
      </div>
      <div class="profile">
        <!-- Displaying author's name -->
        <h2 class="name"><?php echo $authors['author_name']; ?></h2>
        <!-- Displaying author's location -->
        <h3 class="locationname"><i class="fas fa-map-marker-alt"></i> <?php echo $authors['address']; ?></h3>
        <!-- Displaying author's email -->
        <h3 class="email"><i class="fas fa-envelope-square"></i> <?php echo $authors['email']; ?></h3>
        <!-- Displaying author's description -->
        <p class="descricao"><?php echo $authors['description']; ?></p>

        <!-- Social media links -->
        <div class="socialmedia">
          <a href="#" class="button-facebook"><i class="fab fa-facebook-square"></i></a>
          <a href="#" class="button-instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="button-twitter"><i class="fab fa-twitter-square"></i></a>
          <a href="#" class="button-whatsapp"><i class="fab fa-whatsapp-square"></i></a>
        </div>

        <!-- Edit Profile button -->
        <div class="button">
          <button>Edit Profile</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>