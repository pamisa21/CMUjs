<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>articlesub Information</title>
</head>
<body>

<div class="articlesub-card-container">
    <?php foreach ($articlesubs as $articlesub): ?>
        <div class="articlesub-card">
            <p>Authors ID: <?php echo $articlesub['auid']; ?></p>
            <p>Title: <?php echo $articlesub['title']; ?></p>
            <p>File Name: <?php echo $articlesub['filename']; ?></p>
            <p>Submission Status: <?php echo $articlesub['submission']; ?></p>
            <p>Date Submited: <?php echo $articlesub['date_submitted']; ?></p>
            <p>Payement Status: <?php echo $articlesub['payement']; ?></p>
            <p>Date Of Payement: <?php echo $articlesub['date_paid']; ?></p>
            
            
            <div class="articlesub-card-actions">
                <button>Edit</button>
                <button onclick="confirmDelete(<?php echo $articlesub['submission_id']; ?>)">Delete</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>






















<script>
    function confirmDelete(submission_id) {
        var result = confirm("Are you sure you want to delete this articlesub?");
        if (result) {
            window.location.href = 'delete_articlesub.php?id=' + submission_id;
        }
    }

    // Example of passing PHP variable to JavaScript
    var articlesubData = <?php echo json_encode($articlesubs); ?>;
    console.log(articlesubData);
</script>

</html>
