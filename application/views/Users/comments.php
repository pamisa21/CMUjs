<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volume Information</title>
</head>
<body>

<div class="comments-card-container">
    <?php foreach ($comments as $comments): ?>
        <div class="volume-card">
            <p>Comments: <?php echo $comments['comments']; ?></p>
            <p>Assign At: <?php echo $comments['assigned_id']; ?></p>
          
            
            <div class="comments-card-actions">
                <button>Edit</button>
                <button onclick="confirmDelete(<?php echo $comments['comment_id']; ?>)">Delete</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
<script>
    function confirmDelete(comment_id) {
        var result = confirm("Are you sure you want to delete this volume?");
        if (result) {
            window.location.href = 'delete_volume.php?id=' + comment_id;
        }
    }
    
   
</script>
</html>
