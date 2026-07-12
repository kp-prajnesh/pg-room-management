<?php
include '../includes/db.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Payment</title>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

<h2>Add Payment</h2>


<form method="POST" action="insert_payment.php">


<label>User Name</label>
<select name="user_id" id="user_id">

<option value="">Select User</option>

<?php

$query = "SELECT * FROM users";

$result = mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
?>

<option value="<?php echo $row['id']; ?>">
<?php echo $row['name']; ?>
</option>

<?php
}

?>

</select>


<br><br>


<label>Room</label>

<input type="text" id="room_no" readonly>


<input type="hidden" name="room_id" id="room_id">


<br><br>


<label>Amount</label>

<input type="text" 
name="amount" 
id="amount" 
readonly>


<br><br>


<label>Issue Date</label>

<input type="date" 
name="issue_date" 
id="issue_date" 
readonly>


<br><br>


<label>Due Date</label>

<input type="date" 
name="due_date" 
id="due_date" 
readonly>


<br><br>


<label>Pay Date</label>

<input type="date" name="pay_date">


<br><br>


<label>Status</label>

<select name="status">

<option value="Unpaid">Unpaid</option>

<option value="Paid">Paid</option>

</select>


<br><br>


<button type="submit">
Add Payment
</button>


</form>



<script>


// Fetch room and amount after selecting user

$("#user_id").change(function(){

let user_id=$(this).val();


$.ajax({

url:"fetch_user_room.php",

method:"POST",

data:{user_id:user_id},

success:function(data){

let result=JSON.parse(data);


$("#room_no").val(result.room_no);

$("#room_id").val(result.room_id);

$("#amount").val(result.rent);


}

});


});




// Issue and Due Date

let today=new Date();


let issueDate=new Date(
today.getFullYear(),
today.getMonth()+1,
0
);


let dueDate=new Date(
today.getFullYear(),
today.getMonth()+2,
0
);



$("#issue_date").val(
issueDate.toISOString().split('T')[0]
);


$("#due_date").val(
dueDate.toISOString().split('T')[0]
);



</script>


</body>
</html>