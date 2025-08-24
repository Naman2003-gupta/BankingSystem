<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Passbook</title>
</head>
<body>
    <h2>Check Passbook</h2>
    <form method="POST">
        <label>Enter Account ID:</label>
        <input type="number" name="id" required>
        <button type="submit" name="check">Show</button>
    </form>

<?php
if(isset($_POST['check'])){
    $id=$_POST['id'];
    $sql="SELECT * FROM transaction WHERE sender IN (SELECT name FROM users WHERE id=$id) 
          OR receiver IN (SELECT name FROM users WHERE id=$id) ORDER BY datetime DESC";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        echo "<table border='1'>
                <tr><th>Sender</th><th>Receiver</th><th>Amount</th><th>Date-Time</th></tr>";
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>".$row['sender']."</td>
                    <td>".$row['receiver']."</td>
                    <td>".$row['balance']."</td>
                    <td>".$row['datetime']."</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>No Transactions Found</h3>";
    }
}
?>
</body>
</html>
