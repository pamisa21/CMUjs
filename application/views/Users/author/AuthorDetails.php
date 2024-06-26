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
                    <label for="complete_name">Author Name:</label>
                    <input type="text" id="complete_name" name="complete_name" value="<?php echo htmlspecialchars($author['complete_name']); ?>" readonly>
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
                <div class="user-form-group">
                    <label for="description">Authors Description:</label>
                    <input type="text" id="description" name="description" value="<?php echo htmlspecialchars($author['description']); ?>" readonly>
                </div>                
                <div class="user-form-group">
                    <label for="address">Authors Address></label>
                    <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($author['address']); ?>" readonly>
                </div>
                <div class="user-form-group">
                    <label for="status">Authors status</label>
                    <?php
                    $status = $author['status']; // Assuming $author['status'] contains the status value
                    $statusText = ($status == 1) ? 'ACTIVE' : 'NOTACTIVE';
                    ?>
                    <input type="text" id="status" name="status" value="<?php echo htmlspecialchars($statusText); ?>" readonly>
                </div>

                        
            </form>
        <?php else : ?>
            <p>Author not found.</p>
        <?php endif; ?>
    </div>

</body>
</html>
