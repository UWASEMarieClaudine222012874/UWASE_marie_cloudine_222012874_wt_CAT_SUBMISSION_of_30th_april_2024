<?php
include('connection.php');

// Check if 'id' is set
if(isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Annoucement</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <!-- Corrected variable name from $iid to $id -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Delete">
        </form>
    <?php  
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM annoucement WHERE id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>";
        echo "<a href='annoucement.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
    $stmt->close();
    ?>
</body>
</html>
<?php  
} else {
    echo "ID is not set.";
}

$connection->close();
?>
