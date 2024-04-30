<?php
include('connection.php'); 

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    $stmt = $connection->prepare("SELECT * FROM products WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
$x = $row['id'];
        $Y = $row['product_name'];
        $Z = $row['boxes'];
        $W = $row['amount'];
        $D = $row['date_added'];
       
    } else {
        echo "products not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update products</title>
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

        <label for="product_name">product_name:</label>
        <input type="text" name="product_name" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>
       
        <label for="boxes">boxes:</label>
        <input type="text" name="boxes" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="amount">amount:</label>
        <input type="number" name="amount" value="<?php echo isset($N) ? $N : ''; ?>">
        <br><br>

        <label for="date_added">date_added:</label>
        <input type="text" name="date_added" value="<?php echo isset($R) ? $R : ''; ?>">
        <br><br>
        

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $id = $_POST['id'];
       $product_name = $_POST['product_name'];
    $boxes = $_POST['boxes'];
    $amount= $_POST['amount'];
    $date_added = $_REQUEST['date_added'];
    
    // Update the applicant_info in the database
    $stmt = $connection->prepare("UPDATE products  SET product_name=?, boxes=?,amount=?,date_added=? WHERE id=?");
    $stmt->bind_param("sssss", $product_name, $boxes,  $amount, $date_added, $id);


    $stmt->execute();
    
    // Redirect to client.php
    header('Location:products.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
