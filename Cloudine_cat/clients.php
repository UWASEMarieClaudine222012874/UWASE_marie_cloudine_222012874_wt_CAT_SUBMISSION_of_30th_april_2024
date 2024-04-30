<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>clients</title>
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
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"name="query">
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
    <h1>clients</h1>
<form method="post">

<label for="id">id:</label>
<input type="id" id="id" name="id" required><br><br>

<label for="names">names:</label>
<input type="names" name="names" required><br><br>

<label for="">address:</label>
<input type="phone" id="address" name="address" required><br><br>

<label for="age"> age:</label>
<input type="text" id="age" name="age" required><br><br>

<label for="gender">gender:</label>
<input type="text" id="gender" name="gender" required><br><br>

<label for="email">email:</label>
<input type="text" id="email" name="email" required><br><br>

<label for="password">password:</label>
<input type="text" id="password" name="password" required><br><br>

<label for="role">role:</label>
<input type="text" id="role" name="role" required><br><br>

            </select><br><br>

<input type="Submit" name="Add" value="Insert"><br><br>

</form>
 <?php
      include('connection.php');


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
        $stmt = $connection->prepare("INSERT INTO clients(id, names, address, age, gender, email, password, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $id , $name, $address, $age, $gender, $email, $password, $role);

        // Set parameters from POST data with validation (optional)
        $id = ($_POST['id']); // Ensure integer for ID
        $names = ($_POST['names']); 
        $address = ($_POST['address']); 
        $age= ($_POST['age']); 
        $gender = ($_POST['gender']); 
        $email= ($_POST['email']);
        $password= ($_POST['password']); 
        $role= ($_POST['role']); 

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

<?php
// Connection details
$host = "localhost";
$user = "uwase";
$pass = "222012874";
$database = "inyange_enterprises";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// SQL query to fetch data from Course Info table
$sql = "SELECT * FROM clients ";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clients </title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">clients Table</h2>
    <table border="1">
        <tr>
            <th>id</th>
            <th>names</th>
            <th>address</th>
            <th>age</th>
            <th>gender</th>
            <th>email</th>
            <th>password</th>
            <th>role</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        // Define connection parameters
        $host = "localhost";
        $user = "uwase";
        $pass = "222012874";
        $database = "inyange_enterprises";

        // Establish a new connection
        $connection = new mysqli($host, $user, $pass, $database);

        // Check if connection was successful
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Prepare SQL query to retrieve all clients
        $sql = "SELECT * FROM clients";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $Cid = $row['id']; 
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['names'] . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>" . $row['age'] . "</td>
                    <td>" . $row['gender'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['role'] . "</td>
                   <td><a href='update_clients.php?id=". $row['id']."'>UPDATE</a></td><td><a href='delete_clients.php?id=". $row['id']."'>DELETE</a></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
  </body>
    </section>

  
<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 & reg, Designer by: UM Claudine</h2></b>
  </center>
</footer>
</body>
</html>