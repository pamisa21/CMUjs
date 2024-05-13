<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="<?php echo base_url('public/assets/css/login.css'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form class="login-form">
    <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
        <button type="button" onclick="redirectToUsersView()">Login</button>
        </div>
    </form>
</div>

</body>
<script>
    function redirectToUsersView() {

        window.location.href = 'users';
    }
</script>
</html>
