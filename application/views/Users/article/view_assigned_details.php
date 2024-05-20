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
 

    <?php if (!empty($article_assigned)) : ?>
 
        <?php foreach ($article_assigned as $assignment) : ?>
                   

        <div class="user-form-group">
            <label for="complete_name">Evaluator Complete Name:</label>
            <input type="text" id="complete_name" name="complete_name" value="<?php echo htmlspecialchars($assignment['complete_name']); ?>" readonly>
        </div>
        <?php endforeach; ?>

    <?php else : ?>
        <p>No assignments found for this article.</p>
    <?php endif; ?>
</div>
</body>
</html>
