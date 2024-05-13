<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/css/modal.css'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Article</title>
</head>
<body>
    <form action="<?php echo base_url('users/assignarticle/' . $articles['articleid']); ?>" method="post">
        <div class="user-center">
            <?php if (!empty($articles)) : ?>
                <div class="user-form-group">
                    <label for="userid">Evaluator : </label>
                    <select id="userid" name="userid" required>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?php echo $user['userid']; ?>" <?php if ($user['userid'] == $articles['userid']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($user['complete_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- <div class="user-form-group">
                    <label for="userid">Volume : </label>
                    <select id="volumeSelect" class="form-control" name="volumeid">
           
                    <?php foreach ($volumes as $volume): ?>
                        <option value="<?php echo $volume['volumeid']; ?>" <?php if ($volume['volumeid'] == $articles['volumeid']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($volume['vol_name']); ?>
                        </option>
                        
                    <?php endforeach; ?>
                </select>
                </div> -->

                <!-- <div class="user-form-group">
                    <label for="authorSelect">Select Author</label>
                    <select id="authorSelect" class="form-control" name="auid">
                        <option value="">Select an Author</option> 
                        <?php foreach ($authors as $author): ?>
                            <option value="<?php echo $author['auid']; ?>" <?php if ($author['auid'] == $articles['auid']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($author['author_name']); ?>
                        </option>
                           
                        <?php endforeach; ?>
                    </select>
                </div> -->
                
            <?php else : ?>
                <p>Article not found.</p>
            <?php endif; ?>
            
            <?php if (isset($error)): ?>
                <p class="error"><?php echo $error; ?></p>
            <?php endif; ?>

        </div>
        <button type="submit" class="submit-button">Submit</button>
    </form>
</body>
</html>
