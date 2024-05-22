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
        <?php if (!empty($authors)) : ?>
            <form method="post" action="<?php echo base_url('users/editAuthor/'.$authors['auid']); ?>" enctype="multipart/form-data">
                <!-- <div class="user-form-group">
                    <label for="profile_pic">Profile Picture:</label>
                    <img class="user-img" src="<?php echo htmlspecialchars($authors['profile_pic']); ?>" alt="Profile Picture">
                    <input type="file" id="profile_pic" name="profile_pic">
                </div> -->
                <div class="user-form-group">
                    <label for="complete_name">Author Complete Name:</label>
                    <input type="text" id="complete_name" name="complete_name" value="<?php echo htmlspecialchars($authors['complete_name']); ?>">
                </div>
                <div class="user-form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($authors['email']); ?>">
                </div>
                
                <div class="user-form-group">
                    <label for="contact_num">Contact Number:</label>
                    <input type="text" id="contact_num" name="contact_num" value="<?php echo htmlspecialchars($authors['contact_num']); ?>">
                </div>

                <div class="user-form-group">
                    <label for="description">Authors Description</label>
                    <textarea id="description" name="description" rows="4" cols="50"><?php echo htmlspecialchars($authors['description']);?></textarea>
                </div>


                <div class="user-form-group">
                    <label for="address">Authors Address></label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($authors['address']); ?>">
                </div>
                
                <div class="user-form-group">
                    <label for="title">Title:</label>
                    <select id="title" name="title">
                         <option value="Mr." <?php echo ($authors['title'] == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
                         <option value="Mrs." <?php echo ($authors['title'] == 'Mrs.') ? 'selected' : ''; ?>>Mrs.</option>
                         <option value="Dr." <?php echo ($authors['title'] == 'Dr.') ? 'selected' : ''; ?>>Dr.</option>

                    </select>
                </div>

                <div class="user-form-group">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="1" <?php echo ($authors['status'] == 1) ? 'selected' : ''; ?>>Active</option>
                    <option value="0" <?php echo ($authors['status'] == 0) ? 'selected' : ''; ?>>Not Active</option>
                </select>
                </div>


                <div class="user-form-group user-radio-group">
                    <label>Sex:</label>
                    <label><input type="radio" name="sex" value="1" <?php echo ($authors['sex'] == 1) ? 'checked' : ''; ?>> Male</label>
                    <label><input type="radio" name="sex" value="2" <?php echo ($authors['sex'] == 2) ? 'checked' : ''; ?>> Female</label>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        <?php else : ?>
            <p>Author not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
