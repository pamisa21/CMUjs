<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Details</title>
    <style>
        .user-center {
            margin-left: 10%;
            margin-top: 3%;
            display: grid;
            grid-template-columns: 1fr;
            grid-row-gap: 20px;
        }

        .user-form-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-column-gap: 20px;
        }

        .user-form-group label {
            margin-bottom: 5px;
          
        }

        .user-form-group input[type="text"],
        .user-form-group input[type="email"],
        .user-form-group select {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 10px;
        }

        .user-img {
            max-width: 100px;
            height: auto;
            margin-bottom: 10px;
        }

        .user-radio-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-radio-group label {
            margin-right: 20px;
        }
    </style>
</head>

<body>
    <div class="user-center">
        <?php if (!empty($author)) : ?>
            <form>
                <div class="user-form-group">
                    <label for="profile_pic">Profile Picture:</label>
                    <img class="user-img" src="<?php echo htmlspecialchars($author['profile_pic']); ?>" alt="Profile Picture">
                </div>
                <div class="user-form-group">
                    <label for="author_name">Author Name:</label>
                    <input type="text" id="author_name" name="author_name" value="<?php echo htmlspecialchars($author['author_name']); ?>" readonly>
                </div>
                <div class="user-form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($author['email']); ?>" readonly>
                </div>
                <div class="user-form-group">
                    <label for="contact_num">Contact Number:</label>
                    <input type="text" id="contact_num" name="contact_num" value="<?php echo htmlspecialchars($author['contact_num']); ?>" readonly>
                </div>
                <div class="user-form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($author['title']); ?>" readonly>
                </div>
                <div class="user-form-group">
                    <label for="sex">Sex:</label>
                    <input type="text" id="sex" name="sex" value="<?php echo ($author['sex'] == 'male') ? 'Male' : 'Female'; ?>" readonly>
                </div>
            </form>
        <?php else : ?>
            <p>Author not found.</p>
        <?php endif; ?>
    </div>

</body>
</html>
