<?php
// Check if the 'query' GET parameter is set
if (isset($_GET['query']) && !empty($_GET['query'])) {
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

    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Queries for different tables
    $queries = [
        'annoucement' => "SELECT message FROM annoucement WHERE message LIKE '%$searchTerm%'",
        'clients' => "SELECT names FROM clients WHERE names LIKE '%$searchTerm%'",
        'distr_sales' => "SELECT client_name FROM distr_sales WHERE client_name LIKE '%$searchTerm%'",
        'distr_stock' => "SELECT product_name FROM distr_stock WHERE product_name LIKE '%$searchTerm%'",
        'feedback' => "SELECT distributer_names FROM feedback WHERE distributer_names LIKE '%$searchTerm%'",
        'orders' => "SELECT distributer_names FROM orders WHERE distributer_names LIKE '%$searchTerm%'",
        'payment' => "SELECT distributer_names FROM payment WHERE distributer_names LIKE '%$searchTerm%'",
        'products' => "SELECT product_name FROM products WHERE product_name LIKE '%$searchTerm%'",
        'sales' => "SELECT distributer_names FROM orders WHERE distributer_names LIKE '%$searchTerm%'"];
    

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";

    foreach ($queries as $table => $sql) {
        $result = $connection->query($sql);
        echo "<h3>Table of $table:</h3>";
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row[array_keys($row)[0]] . "</p>"; // Dynamic field extraction from result
            }
        } else {
            echo "<p>No results found in $table matching the search term: '$searchTerm'</p>";
        }
    }

    // Close the connection
    $connection->close();
} else {
    echo "<p>No search term was provided.</p>";
}
?>
