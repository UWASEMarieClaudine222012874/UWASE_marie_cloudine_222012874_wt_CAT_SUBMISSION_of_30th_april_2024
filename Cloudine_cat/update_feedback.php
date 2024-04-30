<?php
include('connection.php'); 

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    $stmt = $connection->prepare("SELECT * FROM Feedback WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['id'];
        $Y = $row['distributer_names'];
        $Z = $row['message'];
        $W = $row['date_'];
       
    } else {
        echo "Feedback not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Feedback</title>
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

        <label for="message">message:</label>
        <input type="text" name="message" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>

        <label for="date_">date_:</label>
        <input type="date" name="date_" value="<?php echo isset($W) ? $W : ''; ?>">
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
    $message = $_POST['message'];
    $date_ = $_POST['date_'];
    
    // Update the applicant_info in the database
    $stmt = $connection->prepare("UPDATE Feedback  SET distributer_names=?, message=?, date_=? WHERE id=? ");
            $stmt->bind_param("ssss", $id , $distributer_names, $message, $date_);

    $stmt->execute();
    
    // Redirect to client.php
    header('Location:Feedback.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
