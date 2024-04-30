<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orders</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;<!DOCTYPE html>

      background-color: pink;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */

      padding: 8px;
     
    }
  </style>
  
<header>
   

</head>

<body bgcolor="darkblue">
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
      name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/Inyange logo.jpg" width="90" height="60" alt="Logo">
  </li>
  <li style="display: inline; margin-right: 10px;"><a href="./HOME.html">HOME</a>
    <li style="display: inline; margin-right: 10px;"><a href="./ABOUT US.html">ABOUT US</a>
      <li style="display: inline; margin-right: 10px;"><a href="./CONTACT US.html">CONTACT US</a>
  <li style="display: inline; margin-right: 10px;"><a href="./Annoucement.php">annoucememnt</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./clients.php">clients</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./distr_sales.php">distr_sales</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./distr_stock.php">distr_stock</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./feedback.php">feedback</a>
  </li>
    <li style="display: inline; margin-right: 10px;"><a href="./orders.php">orders</a>
  </li>
   <li style="display: inline; margin-right: 10px;"><a href="./payment.php">payment</a>
  </li>
   <li style="display: inline; margin-right: 10px;"><a href="./products.php">products</a>
  </li>
   <li style="display: inline; margin-right: 10px;"><a href="./sales.php">sales</a>
  </li>
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color:darkgreen; background-color: darkblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Change Acount</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
    
    
    
  </ul>

</header>
<section>


<?php
include('connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set parameters from POST data with validation (optional)
    $id = $_POST['id']; // Assuming 'id' is integer
    $distributer_names = $_POST['distributer_names'];
    $istributer_id = $_POST['istributer_id'];
    $date_ = $_POST['date_'];
    $product_ = $_POST['product_'];
    $amount = $_POST['amount'];
    $boxes = $_POST['boxes'];

    // Prepare and bind parameters with appropriate data types
    $stmt = $connection->prepare("INSERT INTO sales (id, distributer_names, istributer_id, date_, product_, amount, boxes) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Error: " . $connection->error);
    }
    
    $stmt->bind_param("issssss", $id, $distributer_names, $istributer_id, $date_, $product_, $amount, $boxes);

    // Execute prepared statement with error handling
    if ($stmt->execute()) {
        echo "New record has been added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sales</title>
    <style>
        /* CSS styles */
    </style>
</head>
<body>
    <!-- HTML content -->
    <h1>sales</h1>
    <form method="post">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>

        <label for="distributer_names">Distributer Names:</label>
        <input type="text" name="distributer_names" required><br><br>

        <label for="istributer_id">istributer_id:</label>
        <input type="number" id="istributer_id" name="istributer_id" required><br><br>


        <label for="date_">Date:</label>
        <input type="date" id="date_" name="date_" required><br><br>

        <label for="product_">Date:</label>
        <input type="product_" id="product_" name="product_" required><br><br>


        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" required><br><br>
                <label for="boxes">boxes:</label>
        <input type="text" id="boxes" name="boxes" required><br><br>


        <input type="submit" name="Add" value="Insert"><br><br>
    </form>

    <!-- PHP code for displaying payment table -->
    <h2 style="text-align: center;">Sales Table</h2>
    <table border="1">
        <tr>
            <th>id</th>
            <th>distributer_names</th>
            <th>istributer_id</th>
            <th>Date_</th>
            <th>product_</th>
            <th>Amount</th>
            <th>boxes</th>
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
        $sql = "SELECT * FROM sales";
        $result = $connection->query($sql);


if ($result->num_rows > 0) {
    // Output data for each row
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Distributor Names</th><th>Distributor ID</th><th>Date</th><th>Product</th><th>Amount</th><th>Boxes</th><th>Delete</th><th>Update</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $id = $row['id']; 
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['distributer_names'] . "</td>
                <td>" . $row['istributer_id'] . "</td>
                <td>" . $row['date_'] . "</td>
                <td>" . $row['product_'] . "</td>
                <td>" . $row['amount'] . "</td>
                <td>" . $row['boxes'] . "</td>
                <td><a style='padding: 4px;' href='delete_sales.php?id=$id'>Delete</a></td>
                <td><a style='padding: 4px;' href='update_sales.php?id=$id'>Update</a></td> 
            </tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

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

