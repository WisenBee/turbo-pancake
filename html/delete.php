<!DOCTYPE html>
<html>

<head>
    <title>Delete Product</title>
    <link rel="stylesheet" type="text/css" href="../css/delete.css">
</head>

<body>
    <div class="confirmation-page">
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this product?</p>
        <form action="../additional/deleteProduct.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
            <button type="submit" class="delete-button">Delete</button>
        </form>
        <a href="../index.php">Cancel</a>
    </div>
</body>

</html>