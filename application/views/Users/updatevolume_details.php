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
        <?php if (!empty($volume)) : ?>
            <form method="post" action="<?php echo base_url('users/editVolume/'.$volume['volumeid']); ?>">
                <div class="user-form-group">
                    <label for="vol_name">Volume Name:</label>
                    <input type="text" id="vol_name" name="vol_name" value="<?php echo htmlspecialchars($volume['vol_name']); ?>">
                </div>
                <div class="user-form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description"><?php echo htmlspecialchars($volume['description']); ?></textarea>
                </div>
                
                <div class="user-form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="1" <?php echo ($volume['status'] == '1') ? 'selected' : ''; ?>>Published</option>
                        <option value="2" <?php echo ($volume['status'] == '2') ? 'selected' : ''; ?>>Unpublished</option>
                        <option value="3" <?php echo ($volume['status'] == '3') ? 'selected' : ''; ?>>Archived</option>
                    </select>
                </div>
                <button type="submit" class="submit-button">Submit</button>
            </form>
        <?php else : ?>
            <p>Volume not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
 