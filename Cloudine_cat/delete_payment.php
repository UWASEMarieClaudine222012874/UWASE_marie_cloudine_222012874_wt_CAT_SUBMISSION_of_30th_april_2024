<?php
   include('connection.php');
// Check if Product_Id is set
if(isset($_REQUEST['id'])) {
    $cid = $_REQUEST['id'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete payment</title>
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
    $stmt = $connection->prepare("DELETE FROM payment WHERE id=?");
    $stmt->bind_param("i",$cid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>echo 
             <a href='payment.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }
?>
</body>
</html>
<?php  
    $stmt->close();
} else {
    echo "id is not set.";
}

$connection->close();
?>
