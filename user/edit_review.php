<?php
include '../includes/db.php';
include '../includes/session.php';

$user_id = $_SESSION['id'];

$id = $_GET['id'];

$query = "SELECT * FROM reviews 
          WHERE id='$id' AND user_id='$user_id'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if(!$row)
{
    echo "<script>
            alert('Review not found.');
            window.location='reviews.php';
          </script>";
    exit();
}

if(isset($_POST['update']))
{
    $rating = $_POST['rating'];
    $review = mysqli_real_escape_string($conn, $_POST['review']);

    $update = "UPDATE reviews SET 
               rating='$rating',
               review='$review'
               WHERE id='$id' 
               AND user_id='$user_id'";

    if(mysqli_query($conn, $update))
    {
        echo "<script>
                alert('Review updated successfully.');
                window.location='reviews.php';
              </script>";
    }
    else
    {
        echo "<script>
                alert('Update failed.');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Review</title>
</head>

<body>

<h2>Edit Review</h2>

<form method="POST">

<label>Rating</label><br>

<select name="rating" required>

<option value="5" <?php if($row['rating']==5) echo "selected"; ?>>
⭐⭐⭐⭐⭐ Excellent
</option>

<option value="4" <?php if($row['rating']==4) echo "selected"; ?>>
⭐⭐⭐⭐ Very Good
</option>

<option value="3" <?php if($row['rating']==3) echo "selected"; ?>>
⭐⭐⭐ Good
</option>

<option value="2" <?php if($row['rating']==2) echo "selected"; ?>>
⭐⭐ Fair
</option>

<option value="1" <?php if($row['rating']==1) echo "selected"; ?>>
⭐ Poor
</option>

</select>

<br><br>

<label>Review</label><br>

<textarea name="review" rows="5" cols="40" required><?php echo $row['review']; ?></textarea>

<br><br>

<input type="submit" name="update" value="Update Review">

</form>

</body>
</html>