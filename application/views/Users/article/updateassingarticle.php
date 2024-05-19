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
                    <label for="userid">Evaluator(s): </label>
                    <select id="userid" name="userid[]" multiple required>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?php echo $user['userid']; ?>" <?php if (in_array($user['userid'], array_column($users, 'userid'))) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($user['complete_name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

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
