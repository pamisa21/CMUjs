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
        <?php if (!empty($volume)) : ?>
            <form>
                <div class="user-form-group">
                    <label for="volume_name">Volume Name:</label>
                    <input type="text" id="volume_name" name="volume_name" value="<?php echo htmlspecialchars($volume['vol_name']); ?>" readonly>
                </div>
                <div class="user-form-group">
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($volume['description']); ?>" readonly>
                </div>
                <div class="user-form-group">
                    <label for="created_at">Created At:</label>
                    <input type="text" id="created_at" name="created_at" value="<?php echo htmlspecialchars($volume['date_at']); ?>" readonly>
                </div>
               
                <div class="user-form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" disabled>
                        <option value="teacher" <?php echo ($volume['status'] == 1) ? 'selected' : ''; ?>>Publish</option>
                        <option value="student" <?php echo ($volume['status'] == 2) ? 'selected' : ''; ?>>UnPublish</option>
                        <option value="student" <?php echo ($volume['status'] == 3) ? 'selected' : ''; ?>>Archieve</option>
                    </select>
                </div>
            </form>
        <?php else : ?>
            <p>Volume not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>