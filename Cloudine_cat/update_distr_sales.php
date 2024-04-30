<?php
include('connection.php'); 

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    $stmt = $connection->prepare("SELECT * FROM distr_sales WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['id'];
        $Y = $row['client_name'];
        $Z = $row['product'];
        $W = $row['quantity'];
        $N = $row['amount'];
        $D = $row['date_'];
       
    } else {
        echo "distr_sales not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update distr_sales</title>
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

        <label for="client_name">client_name:</label>
        <input type="client_name" name="client_name" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>
       
        <label for="product">product:</label>
        <input type="product" name="product" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>

        <label for="quantity">quantity:</label>
        <input type="quantity" name="quantity" value="<?php echo isset($W) ? $W : ''; ?>">
        <br><br>

        <label for="amount">amount:</label>
        <input type="amount" name="amount" value="<?php echo isset($N) ? $N : ''; ?>">
        <br><br>

        <label for="date_">date_:</label>
        <input type="date" name="date_" value="<?php echo isset($D) ? $D : ''; ?>">
        <br><br>

        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    // Retrieve updated values from form
    $id= $_POST['id'];
    $client_name = $_POST['client_name'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];
    $date_ = $_POST['date_'];
 
    
    // Update the consultationsession in the database
         $stmt = $connection->prepare("UPDATE distr_sales  SET client_name=?, product=?, quantity=?, amount=?, date_=? WHERE id=?");
    $stmt->bind_param("ssssss", $client_names, $product, $quantity, $amount, $date_ , $id);
    $stmt->execute();
    
    // Redirect to consultationsession.php
    header('Location:distr_sales.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
