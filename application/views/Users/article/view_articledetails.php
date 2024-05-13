<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/modal.css'); ?>">
    <title>Article Details</title>
    
</head>
<body>
    <div class="user-center">
        <?php if (!empty($article)) : ?>
            <div class="user-form-group">
                <label for="volumeid">Volume Name:</label>
                <input type="text" id="volumeid" name="volumeid" value="<?php echo htmlspecialchars($article['vol_name']); ?>" readonly>
            </div>
            <div class="user-form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" readonly>
            </div>
            <div class="user-form-group">
                <label for="keywords">Keywords:</label>
                <input type="text" id="keywords" name="keywords" value="<?php echo htmlspecialchars($article['keywords']); ?>" readonly>
            </div>
            <div class="user-form-group">
                <label for="abstract">Abstract:</label>
                <input type="text" id="abstract" name="abstract" value="<?php echo htmlspecialchars($article['abstract']); ?>" readonly>
            </div>
            <div class="user-form-group">
                <label for="filename">Filename:</label>
                <input type="text" id="filename" name="filename" value="<?php echo htmlspecialchars($article['filename']); ?>" readonly>
            </div>
            <div class="user-form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" id="author_name" name="author_name" value="<?php echo htmlspecialchars($article['author_name']); ?>" readonly>
            </div>
            <div class="user-form-group">
                <label for="doi">DOI:</label>
                <input type="text" id="doi" name="doi" value="<?php echo htmlspecialchars($article['doi']); ?>" readonly>
            </div>
            <div class="user-form-group">
                <label for="published">Published:</label>
                <input type="text" id="published" name="published" value="<?php echo ($article['published'] == '1') ? 'Published' : 'UnPublished'; ?>" readonly>
            </div>
            <div class="user-form-group">
                <label for="date_published">Date Published:</label>
                <input type="text" id="date_published" name="date_published" value="<?php echo htmlspecialchars($article['date_published']); ?>" readonly>
            </div>
        <?php else : ?>
            <p>Article details not found.</p>
        <?php endif; ?>
    </div>
</body>
</html> 