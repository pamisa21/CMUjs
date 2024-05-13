<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('public/assets/css/register.css'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
<body>

<div class="register-container">
    <h2>Register</h2>
    <form class="register-form" method="post" action="register.php">
      
        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit">Register</button>
        </div>
    </form>
</div>

</body>
</html>
