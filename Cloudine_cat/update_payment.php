<?php
include('connection.php'); 

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    $stmt = $connection->prepare("SELECT * FROM payment WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['id'];
        $Y = $row['distributer_names'];
        $Z = $row['distributer_id'];
        $W = $row['date_'];
        $D = $row['amount'];
       
    } else {
        echo "payment not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update payment</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>

<html>
<body>
    <form method="POST"onsubmit="return confirmUpdate();">
         <label for="id">id:</label>
         <input type="id" id="id" name="id" value="<?php echo isset($X) ? $X : ''; ?>">
        <br><br>

        <label for="distributer_names">distributer_names:</label>
        <input type="text" name="distributer_names" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>
       
        <label for="distributer_id">distributer_id:</label>
        <input type="text" name="distributer_id" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>

        <label for="date_">date_:</label>
        <input type="date" name="date_" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="amount">amount:</label>
        <input type="text" name="amount" value="<?php echo isset($D) ? $D : ''; ?>">
        <br><br>
        

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $id = $_POST['id'];
$distributer_names = $_POST['distributer_names'];
    $distributer_id = $_POST['distributer_id'];
    $date_ = $_POST['date_'];
    $amount = $_POST['amount'];
    
    // Update the applicant_info in the database

        $stmt = $connection->prepare("UPDATE payment SET distributer_names=?, distributer_id=?, date_=?, amount=?, WHERE id=?");
    $stmt->bind_param("sssss",$distributer_names, $distributer_id, $date_, $amount, $id);
    $stmt->execute();
    
    // Redirect to client.php
    header('Location:payment.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
