<?php
include('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters with appropriate data types
    $stmt = $connection->prepare("INSERT INTO payment (id, distributer_names, distributer_id, date_, amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $id, $distributer_names, $distributer_id, $date_, $amount);

    // Set parameters from POST data with validation (optional)
    $id = $_POST['id']; // Assuming 'id' is integer
    $distributer_names = $_POST['distributer_names'];
    $distributer_id = $_POST['distributer_id'];
    $date_ = $_POST['date_'];
    $amount = $_POST['amount'];

    // Execute prepared statement with error handling
    if ($stmt->execute()) {
        echo "New record has been added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        /* CSS styles */
    </style>
</head>
<body>
    <!-- HTML content -->
    <h1>Payment</h1>
    <form method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="distributer_names">Distributer Names:</label>
        <input type="text" name="distributer_names" required><br><br>

        <label for="distributer_id">Distributer ID:</label>
        <input type="text" id="distributer_id" name="distributer_id" required><br><br>

        <label for="date_">Date:</label>
        <input type="date" id="date_" name="date_" required><br><br>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required><br><br>

        <input type="submit" name="Add" value="Insert"><br><br>
    </form>

    <!-- PHP code for displaying payment table -->
    <h2 style="text-align: center;">Payment Table</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Distributer Names</th>
            <th>Distributer ID</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        include('connection.php');

        // Establish a new connection
        $connection = new mysqli($host, $user, $pass, $database);

        // Check if connection was successful
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Prepare SQL query to retrieve all payment data
        $sql = "SELECT * FROM payment";
        $result = $connection->query($sql);

        // Check if there are any payments
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $id = $row['id']; 
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['distributer_names'] . "</td>
                    <td>" . $row['distributer_id'] . "</td>
                    <td>" . $row['date_'] . "</td>
                    <td>" . $row['amount'] . "</td>
                    <td><a style='padding: 4px;' href='update_payment.php?id=$id'>Update</a></td> 
                    <td><a style='padding: 4px;' href='delete_payment.php?id=$id'>Delete</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>

    <footer>
        <center> 
            <b><h2>UR CBE BIT &copy, 2024 & reg, Designer by: UM Claudine</h2></b>
        </center>
    </footer>
</body>
</html>
