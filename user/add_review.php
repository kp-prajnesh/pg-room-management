<?php
session_start();

include '../includes/db.php';

if(!isset($_SESSION['id']))
{
    echo "<script>
            alert('Please login first');
            window.location='../login.php';
          </script>";
    exit();
}

$user_id = $_SESSION['id'];
?>

<!DOCTYPE html>
<html> 
<head>
    <title>Add Review</title>
    <style>
        body{
            font-family:Arial;
            margin:20px;
        }
        form{
            width:500px;
        }
        label{
            font-weight:bold;
        }
        select, textarea{
            width:100%;
            padding:10px;
            margin-top:5px;
            margin-bottom:15px;
        }
        textarea{
            height:120px;
            resize:none;
        }
        input[type=submit]{
            background:#28a745;
            color:white;
            padding:10px 20px;
            border:none;
            cursor:pointer;
            border-radius:5px;
        }
    </style>
</head>

<body>

<h2>Add Review</h2>

<form method="POST">

    <label>Rating</label>

    <select name="rating" required>
        <option value="">Select Rating</option>
        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
        <option value="4">⭐⭐⭐⭐ Very Good</option>
        <option value="3">⭐⭐⭐ Good</option>
        <option value="2">⭐⭐ Fair</option>
        <option value="1">⭐ Poor</option>
    </select>

    <label>Review</label>

    <textarea
        name="review"
        placeholder="Write your review..."
        required></textarea>

    <input type="submit" name="submit" value="Submit Review">

</form>

</body>
</html>


