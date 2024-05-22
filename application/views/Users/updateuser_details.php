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

        .submit-button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="user-center">
        <?php if (!empty($user)) : ?>
            <form method="post" action="<?php echo base_url('users/edituser/'.$user['userid']); ?>">

                <div class="user-form-group">
                    <label for="complete_name">Complete Name:</label>
                    <input type="text" id="complete_name" name="complete_name" value="<?php echo htmlspecialchars($user['complete_name']); ?>">
                </div>
                <div class="user-form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                </div>
                <div class="user-form-group">
                    <label for="description">Authors Description:</label>
                    <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($user['description']); ?>" >
                </div>                
                <div class="user-form-group">
                    <label for="address">Authors Address></label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($user['address']); ?>" >
                </div>
                <div class="user-form-group">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="1" <?php echo ($user['status'] == 1) ? 'selected' : ''; ?>>Active</option>
                    <option value="2" <?php echo ($user['status'] == 2) ? 'selected' : ''; ?>>Not Active</option>
                </select>
                </div>


                <div class="user-form-group user-radio-group">
                    <label>Sex:</label>
                    <label><input type="radio" name="sex" value="1" <?php echo ($user['sex'] == 1) ? 'checked' : ''; ?>> Male</label>
                    <label><input type="radio" name="sex" value="2" <?php echo ($user['sex'] == 2) ? 'checked' : ''; ?>> Female</label>
                </div>
                
                <button type="submit" class="submit-button">Submit</button>
            </form>
        <?php else : ?>
            <p>User not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
