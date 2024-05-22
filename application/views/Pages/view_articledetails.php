<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Details</title>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/modal.css');?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .article-container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .article-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .article-container .article-section {
            margin-bottom: 20px;
        }

        .article-container .article-section label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .article-container .article-section p {
            margin: 0;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            color: #333;
        }

        .article-container .article-section .readonly {
            background-color: #e9ecef;
        }

        .article-container .status {
            color: #28a745;
            font-weight: bold;
        }

        .article-container .status.unpublished {
            color: #dc3545;
        }
        .readonly{
            width: 100%;
            height: 700px;
        }
    </style>
</head>
<body>
    <div class="article-container">
        <h1><?php echo htmlspecialchars($article['title']);?></h1>
        <img class="author-img" src="<?php echo file_exists('./public/assets/images/users/' . $article['profile_pic']) ? base_url('./public/assets/images/users/' . $article['profile_pic']) : base_url('./public/assets/images/users/noimage.png'); ?>" alt="Profile Picture" style="width: 40px; height: 40px; border-radius: 50%;">
                <div class="author-info">
                    <p class="author-name"><?php echo $article['complete_name']; ?></p>
                    <p class="author-position" style="margin-top:-2px"><?php echo $article['email']; ?></p>
                </div>
        <h3><?php echo htmlspecialchars($article['doi']);?> </h3>
        <p><?php echo htmlspecialchars($article['date_published']);?></p> <p style="font-size:10px">Date Pubished</p>
        <div class="images">
                <img src="public/assets/images/767.jpg" alt="">
            </div>
        <?php if (!empty($article)) :?>
            <div class="article-section">
                <label for="volumeid"><?php echo htmlspecialchars($article['vol_name']);?></label>
              
            </div>

            <div class="article-section">
            <label for="abstract">Abstract:</label>
            <p id="abstract" class="readonly">
                <?php 
                    echo htmlspecialchars(word_limiter($article['abstract'], 500)); // Limiting to 20 words
                ?>
            </p>
        </div>

        <div>
        <?php if (!empty($article['filename'])): ?>
                            <a href="<?php echo base_url('public/assets/files/' . $article['filename']); ?>" target="_blank">
                                <img src="<?php echo base_url('public/assets/files/pdficon.png'); ?>" alt="PDF" width="100" height="100">
                            </a>
                        <?php else: ?>
                            No file uploaded
                        <?php endif; ?>
        </div>
        <?php else :?>
            <p>Article details not found.</p>
        <?php endif;?>
    </div>
</body>
</html>
