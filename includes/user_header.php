<?php
include("../includes/db.php");

// Check whether the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}

// Get username from session
$username = $_SESSION['user'];

// Fetch user's name from database
$query = "SELECT name FROM users WHERE username='$username'";
$headerResult = mysqli_query($conn, $query);

if ($headerResult && mysqli_num_rows($headerResult) > 0) {
    $headerUser = mysqli_fetch_assoc($headerResult);
    $name = $headerUser['name'];
}
?>

<div class="header">
    <h2>Welcome, <?php echo $name; ?></h2>
</div>