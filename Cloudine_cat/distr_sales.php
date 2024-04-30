<html lang="en">
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Distr_sales</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
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
      margin-left: 15px; /* Adjust this value as needed */
      padding: 8px;
    }
  </style>
</head>

<body bgcolor="chocolate">
  <header>
  </header>
  <form class="d-flex" role="search" action="search.php">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
      name="query">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">
    <img src="./Images/Inyange logo.jpg" width="90" height="60" alt="Logo">
  </li>
  <li style="display: inline; margin-right: 10px;"><a href="./HOME.html">HOME</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./ABOUT US.html">ABOUT US</a></li>
      <li style="display: inline; margin-right: 10px;"><a href="./CONTACT US.html">CONTACT US</a></li>
  <li style="display: inline; margin-right: 10px;"><a href="./Annoucement.php">annoucememnt</a></li>
  <li style="display: inline; margin-right: 10px;"><a href="./clients.php">clients</a></li>
  <li style="display: inline; margin-right: 10px;"><a href="./distr_sales.php">distr_sales</a></li>
  <li style="display: inline; margin-right: 10px;"><a href="./distr_stock.php">distr_stock</a></li>
  <li style="display: inline; margin-right: 10px;"><a href="./feedback.php">feedback</a></li>
  <li style="display: inline; margin-right: 10px;"><a href="./orders.php">orders</a></li>
   <li style="display: inline; margin-right: 10px;"><a href="./payment.php">payment</a></li>
   <li style="display: inline; margin-right: 10px;"><a href="./products.php">products</a></li>
   <li style="display: inline; margin-right: 10px;"><a href="./sales.php">sales</a></li>
    <li class="dropdown" style="display: inline; margin-right: 10px;">
      <a href="#" style="padding: 10px; color:darkgreen; background-color: darkblue; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Change Acount</a>
        <a href="logout.php">Logout</a>
      </div>
    </li><br><br>
  </ul>

<section>
    <h1>distr_sales</h1>
<form method="post">

<label for="id">id:</label>
<input type="id" id="id" name="id" required><br><br>

<label for="client_name">client_name:</label>
<input type="text" name="client_name" required><br><br>

<label for="product">product:</label>
<input type="product" id="product" name="product" required><br><br>

<label for="quantity"> quantity:</label>
<input type="quantity" id="quantity" name="quantity" required><br><br>

<label for="amount">amount:</label>
<input type="amount" id="amount" name="amount" required><br><br>

<label for="date_">date_:</label>
<input type="date" id="date_" name="date_" required><br><br>

            </select><br><br>

<input type="Submit" name="Add" value="Insert"><br><br>

</form>
 <?php
    // Connection details
   include('connection.php');


    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Prepare and bind parameters with appropriate data types
$stmt = $connection->prepare("INSERT INTO distr_sales(id, client_name, product, quantity, amount, date_) VALUES (?, ?, ?, ?, ?,?)");
$stmt->bind_param("ssssss", $id, $client_name, $product, $quantity, $amount, $date_);


        // Set parameters from POST data with validation (optional)
        $id = ($_POST['id']); // Ensure integer for ID
        $client_name = ($_POST['client_name']); 
        $product = ($_POST['product']); 
        $quantity= ($_POST['quantity']); 
        $amount = ($_POST['amount']); 
        $date_ = ($_POST['date_']);

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

    <h2 style="text-align: center;">distr_sales Table</h2>
    <table border="1">
        <tr>
            <th>id</th>
            <th>client_name</th>
            <th>product</th>
            <th>quantity</th>
            <th>amount</th>
            <th>date_</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        

        // Establish a new connection
        $connection = new mysqli($host, $user, $pass, $database);

        // Check if connection was successful
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Prepare SQL query to retrieve all clients
        $sql = "SELECT * FROM distr_sales";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $id = $row['id']; 
                echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['client_name'] . "</td>
                    <td>" . $row['product'] . "</td>
                    <td>" . $row['quantity'] . "</td>
                    <td>" . $row['amount'] . "</td>
                    <td>" . $row['date_'] . "</td>

                    <td><a style='padding: 4px;' href='update_distr_sales.php?id=$id'>Update</a></td>
                     
                    <td><a style='padding: 4px;' href='delete_distr_sales.php?id=$id'>Delete</a></td> 


                   
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
