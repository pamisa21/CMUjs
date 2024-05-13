
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>User Information</title>
    <style>
        body {
            font-family: 'Quattrocento', serif;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 120px;
            padding-left: 50px;
            
        }
        
        h3 {
            margin-top: -10px;
            text-align: center;
            position: relative;
            margin-left: 50px;
            
        }
        
        .volume-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-bottom: 20px;
            margin-top: 20px
          
        }

        .user-card {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 10px;
            margin-right: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px
        }

        .user-card p {
            margin: 5px 0;
        }

    </style>
</head>
<body>

<div class="content"> 
    <?php 
    // Initialize an array to store articles grouped by volume
    $articlesByVolume = array();

    // Group articles by volume
    foreach ($articles as $article) {
        $volumeName = $article['vol_name'];
        if (!isset($articlesByVolume[$volumeName])) {
            $articlesByVolume[$volumeName] = array();
        }
        $articlesByVolume[$volumeName][] = $article;
    }

    // Display articles grouped by volume
    foreach ($articlesByVolume as $volumeName => $volumeArticles): ?>
        <div class="volume-group">
            <h3>Volume Names: <?php echo $volumeName; ?></h3>
            <?php foreach ($volumeArticles as $article): ?>
                <div class="user-card-container">
                    <div class="user-card">
                        <p>Title: <?php echo $article['title']; ?></p>
                        <p>Keywords : <?php echo $article['keywords']; ?></p>
                        <p>File Name: <?php echo $article['filename']; ?></p>
                        <p>Abstract: <?php echo $article['abstract']; ?></p>
                        <p>Published: <?php echo $article['published']; ?></p>
                        <p>Date Of Publish: <?php echo $article['date_published']; ?></p>
                        <p>DOI: <?php echo $article['doi']; ?></p>
                        
                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

</div>
</body>
</html>
