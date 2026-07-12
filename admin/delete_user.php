<?php
include("../includes/admin_session.php");
include("../includes/db.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        header("Location: manage_users.php");
        exit();
    }
    else
    {
        echo "Failed to delete user.";
    }
}
?>