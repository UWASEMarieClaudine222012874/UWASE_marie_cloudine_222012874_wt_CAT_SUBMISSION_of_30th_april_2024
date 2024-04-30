<?php
include('connection.php'); 

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    $stmt = $connection->prepare("SELECT * FROM annoucement WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $X = $row['id'];
        $Y = $row['message'];
        $Z = $row['date_added'];
       
    } else {
        echo "annoucement not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update annoucement</title>
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

        <label for="Name">message:</label>
        <input type="text" id="Name" name="message" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>
       
        <label for="date_added"> date_added:</label>
        <input type="date" id="date_added" name="date_added" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $id = $_POST['id'];
    $message = $_POST['message'];
    $date_added = $_POST['date_added'];
    
    // Update the applicant_info in the database
    $stmt = $connection->prepare("UPDATE annoucement  SET message=?, date_added=? WHERE id=?");
    $stmt->bind_param("sss", $message, $date_added, $id);
    $stmt->execute();
    
    // Redirect to client.php
    header('Location:annoucement.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
