<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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
        <?php if (!empty($user)) : ?>
            <form>

            <div class="user-form-group">
                    <label for="profile_pic">Profile Picture:</label>
                    <img class="user-img" src="<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Picture">
                </div>
                <div class="user-form-group">
                    <label for="complete_name">Complete Name:</label>
                    <input type="text" id="complete_name" name="complete_name" value="<?php echo htmlspecialchars($user['complete_name']); ?>" readonly>
                </div>
                <div class="user-form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                </div>
                
                <div class="user-form-group">
                    <label for="status">Status:</label>
                    <input type="text" id="status" name="status" value="<?php echo ($user['status'] == 1) ? 'Active' : 'Not Active'; ?> " readonly>
                  
                </div>
                <div class="user-form-group">
                    <label for="date_created">Date Created:</label>
                    <input type="text" id="date_created" name="date_created" value="<?php echo htmlspecialchars($user['date_created']); ?>" readonly>
                </div>
                <div class="user-form-group user-radio-group">
                    <label>Sex:</label>
                    <label><input type="radio" name="sex" value="male" <?php echo ($user['sex'] == 1) ? 'checked' : ''; ?> readonly> Male</label>
                    <label><input type="radio" name="sex" value="female" <?php echo ($user['sex'] == 2) ? 'checked' : ''; ?> readonly> Female</label>
                </div>
                
            </form>
        <?php else : ?>
            <p>User not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>