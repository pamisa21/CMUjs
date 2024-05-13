<?php
$userId = 5; // Assuming you want to set the user ID to 1

if (isset($userId)) {
    $redirectPage = 'home.php'; 
    header("Location: $redirectPage");
    exit();
} else {
    echo "User ID not provided.";
}
?>
