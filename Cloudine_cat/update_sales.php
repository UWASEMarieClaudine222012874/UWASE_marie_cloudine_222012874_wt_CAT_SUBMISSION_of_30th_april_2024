<?php
include('connection.php'); 

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    $stmt = $connection->prepare("SELECT * FROM sales WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $X = $row['id'];
        $Y = $row['distributer_names'];
        $Z = $row['istributer_id'];
        $W = $row['date_'];
        $N = $row['product_'];
        $D = $row['amount'];
        $R = $row['boxes'];
    } else {
        echo "sales not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update sales</title>
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
        <input type="text" name="distributer_names" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>
       
        <label for="istributer_id">istributer_id:</label>
        <input type="text" name="istributer_id" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="date_">date_:</label>
        <input type="number" name="date_" value="<?php echo isset($N) ? $N : ''; ?>">
        <br><br>

        <label for="product_">product_:</label>
        <input type="text" name="product_" value="<?php echo isset($D) ? $D : ''; ?>">
        <br><br>

        <label for="amount">amount:</label>
        <input type="text" name="amount" value="<?php echo isset($R) ? $R : ''; ?>">
        <br><br>
         <label for="boxes">boxes:</label>
        <input type="text" name="boxes" value="<?php echo isset($R) ? $R : ''; ?>">
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
    $istributer_id = $_POST['istributer_id'];
    $date_ = $_POST['date_'];
    $product_ = $_POST['product_'];
    $amount = $_POST['amount'];
    $boxes = $_REQUEST['boxes'];

    
    // Update the applicant_info in the database
    $stmt = $connection->prepare("UPDATE sales SET distributer_names=?, istributer_id=?, date_=?, product_=?, amount=?, boxes=? WHERE id=?");
    $stmt->bind_param("ssssssi", $distributer_names, $istributer_id, $date_, $product_, $amount, $boxes, $id );
    $stmt->execute();
    
    // Redirect to client.php
    header('Location: sales.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
