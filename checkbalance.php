<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Check Balance</title>
</head>
<body>
    <h2>Check Account Balance</h2>
    <form method="POST">
        <label>Enter Account ID:</label>
        <input type="number" name="id" required>
        <button type="submit" name="check">Check</button>
    </form>

<?php
if(isset($_POST['check'])){
    $id=$_POST['id'];
    $sql="SELECT * FROM users WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo "<h3>Account Holder: ".$row['name']."</h3>";
        echo "<h3>Balance: ".$row['balance']."</h3>";
    } else {
        echo "<h3>No Account Found!</h3>";
    }
}
?>
</body>
</html>
