<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            font-family: 'Quattrocento', serif;
            margin: 0;
            padding: 0;
        }

        #content {
            padding: 70px;
            padding-left: 50px;
        }

        h3 {
            font-size: 48px;
            margin-bottom: 10px;
            font-family: 'Quattrocento', serif;
        }

        h3 span.first-line {
            color: #138143;
        }

        h3 span.second-line {
            color: #083B0A;
        }

        p {
            color: #666;
            font-size: 16px;
            margin-bottom: 30px;
        }

        button {
            background-color: #138143;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            font-family: 'Quattrocento Sans', sans-serif;
            border-radius: 13px;
            width: 160px;
            height: 45px;
            margin-top: 5px;
        }

        button:hover {
            background-color: black;
        }

        footer {
            color: #083B0A;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .image-container {
            text-align: center;
            margin-top: 50px;
            position: absolute;
            right: 150px;
            top:120px
        }

        .image-container img {
            width: 400px; /* Adjust width as needed */
            height: auto; /* Maintain aspect ratio */
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div id="content">

        <h3><span class="first-line">CMU Knowledge Hub:</span><br><span class="second-line">Central Mindanao University's <br>
         Article Repository</span></h3>
        <p>Uniting Knowledge, Inspiring Progress, and Empowering Minds for a Brighter Future. <BR>CMU Journal of Science publishes quality research outputs in the field of natural sciences,<BR>mathematics, engineering, and social sciences from local, national, and international contributors.</p>
        <div>
            <button onclick="openModal('loginModal')">Get Started!</button>
        </div>

        <!-- Image Container -->
        <div class="image-container">
            <img src="public/assets/images/Illustration.png" alt="Illustration">
        </div>
    </div>

    <footer>
        &copy; 2024 Your Website
    </footer>
</body>

</html>
