<?php
    // Connection details
   include('connection.php');

// Check if Product_Id is set
if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    ?>
     <!DOCTYPE html>
    <html>
    <head>
        <title>Delete distr_sales</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="pid" value="<?php echo $pid; ?>">
            <input type="submit" value="Delete">
        </form>
    <?php  
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM distr_sales WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>echo 
             <a href='distr_sales.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "id is not set.";
}

$connection->close();
?>
