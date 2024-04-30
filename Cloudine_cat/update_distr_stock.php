<?php
include('connection.php'); 

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    $stmt = $connection->prepare("SELECT * FROM distr_stock WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
         $X = $row['id'];
        $Y = $row['product_name'];
        $Z = $row['product_id'];
        $W = $row['amount'];
    } else {
        echo "distr_stock not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update distr_stock</title>
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
        <input type="id" name="id" value="<?php echo isset($X) ? $X : ''; ?>">
        <br><br>

        <label for="product_name">product_name:</label>
        <input type="text" name="product_name" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>

        <label for="product_id">product_id:</label>
        <input type="text" name="product_id" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>

        <label for="amount">amount:</label>
        <input type="text" name="amount" value="<?php echo isset($W) ? $W : ''; ?>">
        <br></br>

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $id = $_POST['id'];
   $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];
    $amount = $_POST['amount'];
    
    // Update the applicant_info in the database
    $stmt = $connection->prepare("UPDATE distr_stock SET product_name=?, product_id=?, amount=? WHERE id=?");
   $stmt->bind_param("ssss", $product_name, $product_id, $amount, $id); 
    $stmt->execute();
    
    // Redirect to client.php
    header('Location:distr_stock.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
