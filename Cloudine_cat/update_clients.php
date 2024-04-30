<?php
include('connection.php'); 

if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    $stmt = $connection->prepare("SELECT * FROM clients WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $X = $row['id'];
        $Y = $row['names'];
        $Z = $row['address'];
        $M = $row['age'];
        $N = $row['gender'];
        $O = $row['email'];
        $P = $row['password'];
        $S = $row['role'];
    } else {
        echo "clients not found.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Clients</title>
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

        <label for="names">names:</label>
        <input type="text" id="Names" name="names" value="<?php echo isset($Y) ? $Y : ''; ?>">
        <br><br>
       
        <label for="address"> address:</label>
        <input type="text" id="address" name="address" value="<?php echo isset($Z) ? $Z : ''; ?>">
        <br><br>
        <label for="age"> age:</label>
        <input type="age" id="age" name="age" value="<?php echo isset($M) ? $M : ''; ?>">
        <br><br>

        <label for="gender"> gender:</label>
        <input type="text" id="gender" name="gender" value="<?php echo isset($N) ? $N : ''; ?>">
        <br><br>

        <label for="email"> email:</label>
        <input type="text" id="email" name="email" value="<?php echo isset($O) ? $O : ''; ?>">
        <br><br>

        <label for="password"> password:</label>
        <input type="password" id="password" name="password" value="<?php echo isset($P) ? $P : ''; ?>">
        <br><br>

        <label for="role"> role:</label>
        <input type="role" id="role" name="role" value="<?php echo isset($S) ? $S : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $id = $_POST['id'];
    $names = $_POST['names'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    
    // Update the applicant_info in the database
    $stmt = $connection->prepare("UPDATE clients SET names=?, address=?, age=?, gender=?, email=?, password=?, role=? WHERE id=?");
    $stmt->bind_param("sssssssi", $names, $address, $age, $gender, $email, $password, $role, $id);
    $stmt->execute();
    
    // Redirect to client.php
    header('Location: clients.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
