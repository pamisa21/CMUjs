<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="<?php echo base_url('public/assets/js/ckeditor.js'); ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/modal.css'); ?>">
    <title>Article Details</title>

</head>
<body>
    <form action="<?php echo base_url('users/editArticle/'.$articles['articleid']); ?>" method="post">
        <div class="user-center">
            <?php if (!empty($articles)) : ?>
                <div class="user-form-group">
                    <label for="userid">Volume : </label>
                    <select id="volumeSelect" class="form-control" name="volumeid">
           
                    <?php foreach ($volumes as $volume): ?>

                                 <option value="<?php echo $volume['volumeid']; ?>" <?php if ($volume['volumeid'] == $articles['volumeid']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($volume['vol_name']); ?>
                        </option>

                    <?php endforeach; ?>
                </select>
                </div>

                <div class="user-form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($articles['title']); ?>">
                </div>
                <div class="user-form-group">
                    <label for="keywords">Keywords:</label>
                    <input type="text" id="keywords" name="keywords" value="<?php echo htmlspecialchars($articles['keywords']); ?>">
                </div>
                <div class="user-form-group">
                    <label for="abstract">Abstract:</label>
                    <textarea id="editor" name="abstract"><?=$articles['abstract'] ?></textarea>
                </div>

                <div class="user-form-group">
                    <label for="filename">Filename:</label>
                    <input type="text" id="filename" name="filename" value="<?php echo htmlspecialchars($articles['filename']); ?>">
                </div>
                <div class="user-form-group">
                    <label for="authorSelect">Select Author</label>
                    <select id="authorSelect" class="form-control" name="auid">
                        <option value="">Select an Author</option> 
                        <?php foreach ($authors as $author): ?>
                            <option value="<?php echo $author['auid']; ?>" <?php if ($author['auid'] == $articles['auid']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($author['complete_name']); ?>
                        </option>
                           
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="user-form-group">
                    <label for="doi">DOI:</label>
                    <input type="text" id="doi" name="doi" value="<?php echo htmlspecialchars($articles['doi']); ?>">
                </div>
                <div class="user-form-group">
                    <label for="published">Status:</label>
                    <select id="published" name="published">
                        <option value="0" <?php if ($articles['published'] == 0) echo 'selected'; ?>>Unpublished</option>
                        <option value="1" <?php if ($articles['published'] == 1) echo 'selected'; ?>>Published</option>
                    </select>
                </div>
                <input type="hidden" id="date_published_timestamp" name="date_published_timestamp" value="<?php echo ($articles['date_published'] !== null) ? $articles['date_published'] : ''; ?>">


               
                <div class="user-form-group">
                    <label for="date_published">Date Published:</label>
                    <select id="date_published" name="date_published" disabled>
                        <option value="1" <?php echo ($articles['date_published'] == null) ? 'selected' : ''; ?>>Not Yet Published</option>
                        <option value="0" <?php echo ($articles['date_published'] !== null) ? 'selected' : ''; ?>><?php echo ($articles['date_published'] !== null) ? $articles['date_published'] : 'Unpublished'; ?></option>
                    </select>
                </div>

            <?php else : ?>
                <p>Article details not found.</p>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="submit-button">Submit</button>
    </form>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var publishedSelect = document.getElementById("published");
        var datePublishedSelect = document.getElementById("date_published");
        var datePublishedTimestampInput = document.getElementById("date_published_timestamp");

        // Initially disable date_published if not Published
        if (publishedSelect.value !== "1") {
            datePublishedSelect.disabled = true;
        }

        // Event listener for published select change
        publishedSelect.addEventListener("change", function() {
            if (publishedSelect.value === "1") {
                datePublishedSelect.disabled = false;
                // Set current timestamp to date_published_timestamp
                var currentTimestamp = Math.floor(Date.now() / 1000); // Timestamp in seconds
                datePublishedTimestampInput.value = currentTimestamp;
            } else {
                datePublishedSelect.disabled = true;
                datePublishedTimestampInput.value = ''; // Clear timestamp if not published
            }
        });
    });
</script>
<script>
CKEDITOR.replace('editor1')
</script>

</html>
