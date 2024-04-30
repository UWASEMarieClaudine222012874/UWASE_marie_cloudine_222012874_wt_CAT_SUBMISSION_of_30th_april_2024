<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Annoucement</title>
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <style>
    /* Normal link */
    a {
      padding: px;
      color: white;
      background-color: pink;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
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
      margin-left: 15px;
      margin-top: 4px;
    }

    /* Extend margin left for search button */
    input.form-control {
      margin-left: 15px;
      padding: 8px;
    }
  </style>
</head>
<body bgcolor="orange">
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
     <li style="display: inline; margin-right: 10px;"><a href="./annoucement.php">annoucememnt</a>
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
  <h1>Announcement</h1>
  <!-- Announcement form -->
  <form method="post">
    <label for="id">id:</label>
    <input type="number" id="id" name="id"><br><br>

    <label for="message">message:</label>
    <input type="text" id="message" name="message" required><br><br>

    <label for="date_added">date_added:</label>
    <input type="date" id="date_added" name="date_added" required><br><br>

    <input type="submit" value="Insert">
  </form>

  <?php
  // Connection details
     include('connection.php');

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Prepare and bind parameters with appropriate data types
      $stmt = $connection->prepare("INSERT INTO annoucement (id, message, date_added) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $id, $message, $date_added);

      // Set parameters from POST data with validation (optional)
      $id = intval($_POST['id']); // Ensure integer for ID
      $message = htmlspecialchars($_POST['message']); // Prevent XSS
      $date_added = htmlspecialchars($_POST['date_added']); // Sanitize date
      

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

  <!-- Display announcement table -->
  <center><h2>Table of Annoucement</h2></center>
  <table border="5">
    <tr>
      <th>id</th>
      <th>message</th>
      <th>date_added</th>
      <th>UPDATE</th>
      <th>DELETE</th>
    </tr>
    <?php
    // Establish a new connection
    $connection = new mysqli($host, $user, $pass, $database);

    // Check if connection was successful
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare SQL query to retrieve all announcements
    $sql = "SELECT * FROM annoucement";
    $result = $connection->query($sql);

    // Check if there are any announcements
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                  <td>" . $row['id'] . "</td>
                  <td>" . $row['message'] . "</td>
                  <td>" . $row['date_added'] . "</td>
                  <td><a href='update_annoucement.php?id=". $row['id']."'>UPDATE</a></td><td><a href='delete_annoucement.php?id=". $row['id']."'>DELETE</a></td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No data found</td></tr>";
    }
    // Close the database connection
    $connection->close();
    ?>
  </table>
</section>

<footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 & reg, Designed by: UM Claudine</h2></b>
  </center>
</footer>
</body>
</html>
