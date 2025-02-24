

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Invoice</title>
</head>
<body>
    <h1>Delete Invoice #<?php echo htmlspecialchars($invoice['id']); ?></h1>
    <p>Are you sure you want to delete this invoice?</p>
    <p>Date: <?php echo htmlspecialchars($invoice['date']); ?></p>
    <p>Amount: <?php echo htmlspecialchars($invoice['amount']); ?></p>
    <form method="post" action="index.php?route=invoice_delete&id=<?php echo htmlspecialchars($invoice['id']); ?>">
        <button type="submit">Delete</button>
        <a href="index.php?route=invoices">Cancel</a>
    </form>
</body>
</html>