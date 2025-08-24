<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" type="text/css" href="css/customer.css">
</head>
<body>
    <h2>Add New Customer</h2>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Balance:</label>
        <input type="number" name="balance" required><br>
        <button type="submit" name="submit">Add Customer</button>
    </form>

<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $balance=$_POST['balance'];

    $sql="INSERT INTO users (name,email,balance) VALUES ('$name','$email','$balance')";
    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Customer Added Successfully'); window.location='customer.php';</script>";
    } else {
        echo "Error: ".$sql."<br>".mysqli_error($conn);
    }
}
?>
</body>
</html>
